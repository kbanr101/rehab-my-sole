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
                        <span class="default-btn active" id='all'>All</span>
                        <span class="default-btn" id='btn-repairs'>Repairs</span>
                        <span class="default-btn" id='btn-cleaning'>Cleaning</span>
                        <span class="default-btn" id='btn-restoration'>Restoration</span>
                        <span class="default-btn" id='btn-customization'>Customization</span>
                    </div>
                </div>
                <div class="blogList-item">
                    <div class="blog-search">
                        <input type="search" name="search" class="form-control" placeholder="Search blogs, categories, keywords etc" />
                        <span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                    </div>
                </div>
            </div>
            <div class="row my-shuffle-container">
                @foreach ($posts as $post)
                <div class="mb-3 grid-col col-6 col-md-4 col-sm-4 picture-item" data-groups='["repairs"]'>
                    <div class="blogCard mb-4">
                        <div class="blogCard_Image mb-3">
                            <img src="{{ asset($post->image) }}" alt="Blog card" class="img-fluid w-100" />
                            <span class="like_Blog like_Blog{{ $post->id }}" data-post-id="{{ $post->id }}"><i class="fa-regular fa-heart" style="{{ $post->likes_count ? 'color:red;' : '' }}"></i></span>
                        </div>
                        <div class="blog_contents p-3">
                            <h3><a href="{{ route('blogDetailPage', $post->slug) }}">{{ $post->title }}</a></h3>
                            <span class="blog_date">
                                <p>{{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</p>
                            </span>
                            <p class="moreText active">{!! Str::limit($post->short_description, 50) !!}</p>
                            <div class="blog_action">
                                <span class="moreBtn">See more</span>
                                <a href="{{ route('blogDetailPage', $post->slug) }}"><svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M5.4458 3.79004L13.2334 1.19416C16.7282 0.0292268 18.627 1.93715 17.4712 5.43196L14.8754 13.2196C13.1325 18.4572 10.2707 18.4572 8.52783 13.2196L7.75732 10.9081L5.4458 10.1376C0.208172 8.39475 0.208172 5.54203 5.4458 3.79004Z" stroke="#292D32" stroke-width="1.37591" stroke-linecap="round" stroke-linejoin="round" /></svg></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-center">
                {{ $posts->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>
@endsection
@section('script')
    {{-- <script src="assets/js/jquery-1.12.4.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Shuffle/6.1.0/shuffle.min.js"></script>
    <script>
    const page = window.location.pathname.split("/").pop();

if (page === 'blog-list') {
    const Shuffle = window.Shuffle;
    const element = document.querySelector('.my-shuffle-container');
    const shuffleInstance = new Shuffle(element, { itemSelector: '.picture-item' });

    const filters = ['all', 'repairs', 'cleaning', 'restoration', 'customization'];

    filters.forEach(filter => {
        $(`#btn-${filter}`).on("click", function () {
            shuffleInstance.filter(filter === 'all' ? '' : filter);
            $(".filter, [id^='btn-']").removeClass("active");
            $(this).addClass("active");
        });
    });

    $(".filter").on("click", function () {
        const filterCategory = $(this).data("filter_category");
        shuffleInstance.filter(filterCategory ? filterCategory : null);
        $(".filter, [id^='btn-']").removeClass("active");
        $(this).addClass("active");
    });
}


    $(document).ready(function() {
        $('.like_Blog').on('click', function() {
            var postId = $(this).data('post-id');

            var $label = $(this).nextAll('label').first();
            var $icon = $(this).find('.like_Blog' + postId);
            // console.log($icon);
            $.ajax({
                type: 'POST',
                url: '/post/' + postId + '/like',
                data: {
                    '_token': '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        $label.text(response.likes_count + ' Likes');
                        console.log(response.likes_count);
                        if (response.liked) {
                            $('.like_Blog' + postId).addClass('active')
                            console.log("Icon color changed to red."); // Debugging
                        } else {
                            $('.like_Blog' + postId).removeClass('active')
                            // $icon.removeClass('active'); // Add red color if liked
                            console.log("Icon color reset."); // Debugging
                        }

                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
    });
</script>
@endsection
