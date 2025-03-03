@if($posts->isEmpty())
    <p>Post not available</p>
@else
@foreach ($posts as $post)
    <div class="col-md-4">
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
                    <span class="moreBtn"></span>
                    <a href="{{ route('blogDetailPage', $post->slug) }}"><svg width="19" height="18"
                            viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
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
@endif

<div class="d-flex justify-content-center">
    {{ $posts->links('pagination::bootstrap-4') }}
</div>
