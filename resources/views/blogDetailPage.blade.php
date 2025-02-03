@extends('include.master')
@section('title', $post->title)

@section('meta_description', Str::limit(strip_tags($post->seo_description), 160))
@section('meta_keywords', Str::limit(strip_tags($post->seo_keywords), 160))


@section('content')
    <div class="blogPlay">
        <span id="read-selected-content" aria-label="Read Content"><i class="fa-solid fa-play"></i></span>
        <span id="stop-reading" aria-label="Stop Reading"><i class="fa-solid fa-pause"></i></span>
    </div>
    <section class="serviceSection pt-2 pb-5">
        <div class="custom-container">
            <ul class="breadcrumbs">
                <li><a href="{{ url('/') }}"><i class="fa-solid fa-house"></i>&nbsp;Home</a></li>
                <li><a href="{{ route('blogListPage') }}">Blog List</a></li>
                <li><a href="{{ route('blogListPage') }}">Why Giving Your Shoes a Second Life Matters</a></li>
            </ul>
            <div class="row">
                <div class="col-md-8" id="selected-content">
                    <div class="pageNavigaton pt-4 pb-4">
                        <div class="pageContainer">
                            <div class="pageItem">
                                <h3>{{ $post->title }}</h3>
                            </div>
                            <div class="pageItem">
                                <div class="pageItem_right">
                                    <p><span>{{ \Carbon\Carbon::parse($post->created_at)->format('l,') }}</span><label>{{ \Carbon\Carbon::parse($post->created_at)->format('M d, Y') }}</label></p>
                                    <p><span class="like_Blog like_Blog{{ $post->id }} {{ $post->likes_count ? 'active':'' }}" data-post-id="{{ $post->id }}"><i class="fa-regular fa-heart " style=""></i></span><label>{{ $post->likes_count }} Likes</label></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blogDiscriptions" id="text-to-speak">
                        {!! $post->description !!}
                    </div>
                    <div class="blogTopNavigation">
                        <span></span>
                        <a href="{{ route('blogDetailPage', $nextPostSlug) }}">Next story <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div id="sideBlogList">
                        <div class="blogTopNavigation">
                            <h3>Follow Us:</h3>
                        </div>
                        <ul class="soacial-media d-flex m-0 p-0">
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="https://www.facebook.com/rehabmysole/"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa-regular fa-paper-plane"></i></a></li>
                            <li><a href="https://www.instagram.com/rehab_my_sole/"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                        <div class="blogTopNavigation">
                            <h3>Recent Stories</h3>
                            <a href="{{ route('blogListPage') }}"><svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.4458 3.79004L13.2334 1.19416C16.7282 0.0292268 18.627 1.93715 17.4712 5.43196L14.8754 13.2196C13.1325 18.4572 10.2707 18.4572 8.52783 13.2196L7.75732 10.9081L5.4458 10.1376C0.208172 8.39475 0.208172 5.54203 5.4458 3.79004Z" stroke="#292D32" stroke-width="1.37591" stroke-linecap="round" stroke-linejoin="round" /></svg></a>
                        </div>
                        @foreach ($recentPost as $newPost)
                            <div class="blogCard recentPost mb-4" style="--data-image-url: url('{{ asset($newPost->image) }}')">
                                <div class="blogCard_Image mb-3">
                                    <img src="{{ asset($newPost->image) }}" alt="Blog card" class="img-fluid w-100 d-none" />
                                    <span class="like_Blog like_Blog{{ $newPost->id }}" data-post-id="{{ $newPost->id }}"><i class="fa-regular fa-heart" style="{{ $newPost->likes_count ? 'color:red;' : '' }}"></i></span>
                                </div>
                                <div class="blog_contents p-3">
                                    <h3><a href="{{ route('blogDetailPage', $newPost->slug) }}">{{ $newPost->title }}</a></h3>
                                    <span class="blog_date">{{ \Carbon\Carbon::parse($newPost->created_at)->format('d M Y') }}</span>
                                    {{-- <p class="moreText active">{!! Str::limit($newPost->short_description, 50) !!}</p>
                                    <div class="blog_action">
                                        <span class="moreBtn">See more</span>
                                        <a href="{{ route('blogDetailPage', $newPost->slug) }}"><svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.4458 3.79004L13.2334 1.19416C16.7282 0.0292268 18.627 1.93715 17.4712 5.43196L14.8754 13.2196C13.1325 18.4572 10.2707 18.4572 8.52783 13.2196L7.75732 10.9081L5.4458 10.1376C0.208172 8.39475 0.208172 5.54203 5.4458 3.79004Z" stroke="#292D32" stroke-width="1.37591" stroke-linecap="round" stroke-linejoin="round" /></svg></a>
                                    </div> --}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- blog Cards Start --}}
                {{-- blog Cards End --}}
            </div>
        </div>
    </section>
@endsection
@section('script')
<script>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const button = document.getElementById('read-selected-content');
        const content = document.getElementById('selected-content');

        button.addEventListener('click', function() {
            const text = content.textContent || content
                .innerText; // Get the text from the selected section
            const speech = new SpeechSynthesisUtterance(text); // Create a speech instance
            window.speechSynthesis.speak(speech); // Speak the text
        });
    });
</script>
<script>
    document.getElementById('stop-reading').addEventListener('click', function() {
        window.speechSynthesis.cancel(); // Stop any ongoing speech
    });
</script>
@endsection
