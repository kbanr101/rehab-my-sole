@extends('include.master')
@section('title', $post->title)

@section('meta_description', Str::limit(strip_tags($post->seo_description), 160))
@section('meta_keywords', Str::limit(strip_tags($post->seo_keywords), 160))


@section('content')
<div class="blogPlay">
    <span id="read-selected-content" aria-label="Read Content"><i class="fa-solid fa-play"></i></span>
    <span id="stop-reading" aria-label="Stop Reading"><i class="fa-solid fa-pause"></i></span>
</div>
<div class="pageNavigaton pt-4 pb-4" id="selected-content">
        <div class="custom-container">
            <div class="pageContainer">
                <div class="pageItem">
                    <h3>{{ $post->title }}</h3>
                </div>
                <div class="pageItem">
                    <div class="pageItem_right">
                        <p><span class="like_Blog" data-post-id="{{ $post->id }}"><i class="fa-regular fa-heart" style="{{ $post->likes_count ? 'color:red;' : '' }}"></i></span><label>{{ $post->likes_count }} Likes</label>
                        <p><span>{{ \Carbon\Carbon::parse($post->created_at)->format('l,') }}</span><label>{{ \Carbon\Carbon::parse($post->created_at)->format('M d, Y') }}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="serviceSection pt-2 pb-5">
        <div class="custom-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="blogDiscriptions" id="text-to-speak">
                        {!! $post->description !!}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="blogTopNavigation">
                        <span></span>
                        <a href="{{ route('blogDetailPage', $nextPostSlug) }}">Next story <i
                                class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="blogTopNavigation">
                        <h3>Recent Stories</h3>
                        <a href="{{ route('blogListPage') }}">See all</a>
                    </div>
                </div>
                {{-- blog Cards Start --}}
                @foreach ($recentPost as $newPost)
                    <div class="col-md-4">
                        <div class="blogCard mb-4">
                            <div class="blogCard_Image mb-3">
                                <img src="{{ asset('storage/' . $newPost->image) }}" alt="Blog card"
                                    class="img-fluid w-100" />
                                <span class="like_Blog" data-post-id="{{ $newPost->id }}"><i class="fa-regular fa-heart"
                                        style="{{ $newPost->likes_count ? 'color:red;' : '' }}"></i></span>
                            </div>
                            <div class="blog_contents p-3">
                                <h3>{{ $newPost->title }}</h3>
                                <span
                                    class="blog_date">{{ \Carbon\Carbon::parse($newPost->created_at)->format('d M Y') }}</span>
                                <p class="moreText active">{!! Str::limit($newPost->short_description, 50) !!}</p>
                                <div class="blog_action">
                                    <span class="moreBtn">See more</span>
                                    <a href="{{ route('blogDetailPage', $newPost->slug) }}"><svg width="19"
                                            height="18" viewBox="0 0 19 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5.4458 3.79004L13.2334 1.19416C16.7282 0.0292268 18.627 1.93715 17.4712 5.43196L14.8754 13.2196C13.1325 18.4572 10.2707 18.4572 8.52783 13.2196L7.75732 10.9081L5.4458 10.1376C0.208172 8.39475 0.208172 5.54203 5.4458 3.79004Z"
                                                stroke="#292D32" stroke-width="1.37591" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- blog Cards End --}}
            </div>
        </div>
    </section>
@endsection
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
