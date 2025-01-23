@extends('include.master')
@section('content')
    <div class="pageNavigaton pt-4 pb-4">
        <div class="container">
            <div class="pageContainer">
                <div class="pageItem">
                    <h3>Blogs</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab iste, eius quidem iusto numquam dolorem
                        aspernatur eos voluptatibus ducimus. Totam tenetur iste ut magnam.</p>
                </div>
            </div>
        </div>
    </div>
    <section class="serviceSection pt-2 pb-5">
        <div class="container">
            {{-- <div class="mainTitle text-center m-auto pb-5">
        <h3>Our Service</h3>
        <p class="m-auto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores qui amet, esse omnis illum sed nihil, debitis dolorum quae pariatur harum asperiores quidem saepe quas, necessitatibus earum quod itaque. Molestias expedita eveniet aliquid cupiditate? Consectetur cumque error ipsam?</p>
    </div> --}}
            <div class="row">
                {{-- blog Cards Start --}}
                @foreach ($posts as $post)
                    <div class="col-md-4">
                        <div class="blogCard mb-4">
                            <div class="blogCard_Image mb-3">
                                <img src="{{ asset('storage/' . $post->image) }}" alt="Blog card" class="img-fluid w-100" />
                                <span class="like_Blog" data-post-id="{{ $post->id }}"><i class="fa-regular fa-heart"
                                        style="{{ $post->likes_count ? 'color:red;' : '' }}"></i></span>
                            </div>
                            <div class="blog_contents p-3">
                                <h3>{{ $post->title }}</h3>
                                <span class="blog_date">
                                    <p>{{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</p>
                                </span>
                                <p class="moreText active">{!! Str::limit($post->short_description, 50) !!}</p>
                                <div class="blog_action">
                                    <span class="moreBtn">See more</span>
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
                <div class="d-flex justify-content-center">
                    {{ $posts->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </section>
@endsection
