<meta name="csrf-token" content="{{ csrf_token() }}">

@extends('include.master')
@section('content')
    <div class="pageNavigaton">
        <div class="custom-container">
            <ul class="breadcrumbs">
                <li><a href="{{ url('/') }}"><i class="fa-solid fa-house"></i>&nbsp;Home</a></li>
                <li><a href="{{ route('blogListPage') }}">Blog List</a></li>
            </ul>
            {{-- <div class="pageContainer">
                <div class="pageItem">
                    <h3>Blogs</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab iste, eius quidem iusto numquam dolorem
                        aspernatur eos voluptatibus ducimus. Totam tenetur iste ut magnam.</p>
                </div>
            </div> --}}
        </div>
    </div>
    <section class="serviceSection pt-2 pb-5">
        <div class="custom-container">
            <div class="blogList-header">
                <div class="blogList-item">
                    <div class="shuffle_wrapper">
                        <span class="default-btn  Blog_id active" id="all" data-cat-id="">All</span>
                        @foreach ($categories as $cat)
                            <span class="default-btn Blog_id" id="{{ $cat->name }}"
                                data-cat-id="{{ $cat->id }}">{{ $cat->name }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="blogList-item">
                    <div class="blog-search">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search blogs, categories, keywords etc" />
                        <span class="search-icon search-submit"><i class="fa-solid fa-magnifying-glass"></i></span>
                    </div>
                </div>
            </div>
            <div class="row" id="post-list-results">

            </div>
            {{-- <div class="row my-shuffle-container">


            </div> --}}
    </section>
    <!-- AddToAny BEGIN -->
    {{-- <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
        <a class="a2a_button_facebook"></a>
        <a class="a2a_button_email"></a>
        <a class="a2a_button_whatsapp"></a>
        <a class="a2a_button_linkedin"></a>
        </div>
        <script defer src="https://static.addtoany.com/menu/page.js"></script>
        <!-- AddToAny END --> --}}
@endsection
@section('script')
{{-- <script src="assets/js/jquery-1.12.4.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Shuffle/6.1.0/shuffle.min.js"></script>
    <script>
        const page = window.location.pathname.split("/").pop();

        if (page === 'blog-list') {
            const Shuffle = window.Shuffle;
            const element = document.querySelector('.my-shuffle-container');
            const shuffleInstance = new Shuffle(element, {
                itemSelector: '.picture-item'
            });

            const filters = ['all', 'repairs', 'cleaning', 'restoration', 'customization'];

            filters.forEach(filter => {
                $(`#btn-${filter}`).on("click", function() {
                    shuffleInstance.filter(filter === 'all' ? '' : filter);
                    $(".filter, [id^='btn-']").removeClass("active");
                    $(this).addClass("active");
                });
            });

            $(".filter").on("click", function() {
                const filterCategory = $(this).data("filter_category");
                shuffleInstance.filter(filterCategory ? filterCategory : null);
                $(".filter, [id^='btn-']").removeClass("active");
                $(this).addClass("active");
            });
        }


        $(document).ready(function() {
            $('#post-list-results').on('click', '.like_Blog', function() {
                var postId = $(this).data('post-id');
                var $label = $(this).nextAll('label').first();
                var $icon = $(this); // The clicked icon

                $.ajax({
                    type: 'POST',
                    url: '/post/' + postId + '/like',
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr(
                            'content') // Correct way to pass CSRF token
                    },
                    success: function(response) {
                        if (response.success) {
                            $label.text(response.likes_count + ' Likes'); // Update like count
                            console.log(response.likes_count);

                            // Toggle active class for like button
                            $icon.toggleClass('active', response.liked);
                            console.log(response.liked ? "Icon color changed to red." :
                                "Icon color reset.");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            });
        });


        $(document).ready(function() {
            loadPosts("", "");

            $('.Blog_id').on('click', function() {

                var catId = $(this).data('cat-id');

                loadPosts(catId, "");

                $('.Blog_id').removeClass('active');
                $(this).addClass('active');

                let activeTab = catId === "latest" ? "#latestTab" : "#popularTab";
                $('.nav-tabs a[href="' + activeTab + '"]').tab("show");

            });

            // $('.search-submit').on('click', function() {
            //     var search = $('#search').val();
            //     console.log(search);
            //     loadPosts("", search);

            // });

            $("#search").on("input", function() {
                var search = $(this).val().trim();
                loadPosts("", search);
            });


            function loadPosts(category, search) {
                let filterData = {
                    category: category,
                    search: search,
                    '_token': '{{ csrf_token() }}'
                };


                $("#post-list-results").html('<p>Loading...</p>');

                $.ajax({
                    url: "/filter-results",
                    type: "POST",
                    data: filterData,
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") // CSRF protection
                    },
                    success: function(response) {
                        $("#post-list-results").html(response);
                    },
                    error: function(xhr) {
                        console.error("Error fetching data:", xhr);
                    }
                });
            }
        });
    </script>
@endsection
