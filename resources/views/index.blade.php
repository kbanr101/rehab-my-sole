@extends('include.master')
@section('content')
<section class="herobanner pt-5 pb-5 mt-5 mb-5">
    <div class="custom-container">
        <div class="centerContent text-center m-auto">
            <h3>Your Shoes Deserve a Second Chance</h3>
            <p>From expert cleaning and professional repairs to custom designs and full restorations, we specialize in bringing every type of footwear back to life. Let us help you take the next step in style.</p>
            <a class="defaultBtnClass" href="#">Explore Our Services</a>
        </div>
    </div>
</section>
<section class="videoSection">
    <div class="video-section">
        <img src="{{ asset('assets/media/shoe-video-bg.jpg') }}" alt="Video Thumbnail" class="video-thumbnail" id="thumbnail">
        <button class="play-button" id="playButton"><i class="fas fa-play"></i></button>
    </div>
    <div class="video-popup" id="videoPopup">
        <button class="close-button" id="closeButton">&times;</button>
        {{-- <video id="video" controls>
            <source src="video.mp4" type="video/mp4">Your browser does not support the video tag.
        </video> --}}
    </div>
</section>
<section class="serviceSection pt-5 pb-5">
    <div class="custom-container">
        <div class="mainTitle text-center m-auto pb-5">
            <h3>From Cleaning to Customization – We’ve Got Your Shoes Covered</h3>
            <p class="m-auto">At RehabMySole, no pair of shoes is too far gone. From sneakers to stilettos, we offer services to make your footwear look, feel, and perform like new again.</p>
        </div>
        <div class="row pb-3">
            <div class="col-md-3">
                <div class="serviceCard">
                    <div class="serviceImage">
                        <img src="{{ asset('assets/media/background-landing.png') }}" alt="Customize shoes" class="img-fluid w-100" />
                    </div>
                    <div class="serviceCard-detail p-3">
                        <h4>Cleaning</h4>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                        <div class="price_track">Price From: <span>$300</span></div>
                        <div class="serviceCard-action">
                            <a href="#" class="defaultBtnClass trBtnClass">Select</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="serviceCard">
                    <div class="serviceImage">
                        <img src="{{ asset('assets/media/background-landing.png') }}" alt="Customize shoes" class="img-fluid w-100" />
                    </div>
                    <div class="serviceCard-detail p-3">
                        <h4>Customization</h4>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                        <div class="price_track">Price From: <span>$300</span></div>
                        <div class="serviceCard-action">
                            <a href="#" class="defaultBtnClass trBtnClass">Select</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="serviceCard">
                    <div class="serviceImage">
                        <img src="{{ asset('assets/media/background-landing.png') }}" alt="Customize shoes" class="img-fluid w-100" />
                    </div>
                    <div class="serviceCard-detail p-3">
                        <h4>Repair</h4>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                        <div class="price_track">Price From: <span>$300</span></div>
                        <div class="serviceCard-action">
                            <a href="#" class="defaultBtnClass trBtnClass">Select</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="serviceCard">
                    <div class="serviceImage">
                        <img src="{{ asset('assets/media/background-landing.png') }}" alt="Customize shoes" class="img-fluid w-100" />
                    </div>
                    <div class="serviceCard-detail p-3">
                        <h4>Restoration</h4>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                        <div class="price_track">Price From: <span>$300</span></div>
                        <div class="serviceCard-action">
                            <a href="#" class="defaultBtnClass trBtnClass">Select</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="workSection pt-5 pb-5">
    <div class="custom-container">
        <div class="mainTitle text-center m-auto pb-5">
            <h3>How It Works – From Doorstep to Fresh Step</h3>
            <p class="m-auto">At Rehab My Sole, giving your favorite shoes a second life is simple and hassle-free. Just follow these easy steps, and we’ll take care of the rest!</p>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="workFigure">
                    <img src="{{ asset('assets/media/how-work.png') }}" alt="How it work" class="img-fluid w-100"  />
                </div>
            </div>
            <div class="col-md-6 align-items-center">
                <div class="workFigure-content">
                    <ul>
                        <li><h4><span>1</span>Explore Our Website</h4><p>Start by visiting our website, where you’ll find all the information you need about our services. Whether your shoes need a deep clean, repairs, restoration, or even customization, we’ve got options for every need. Take your time to browse and choose the service that’s perfect for your shoes.</p></li>
                        <li><h4><span>2</span> Tailor Your Service</h4><p>Once you’ve selected a service, let us know the specifics. Is it your trusty sneakers that need a thorough clean? Or maybe your formal shoes require a complete restoration? Share the details with us—because we know every pair of shoes tells its own story, and we want to treat yours with the personalized care it deserves. </p></li>
                        <li><h4><span>3</span> Secure Your Order</h4><p>When everything is set, it’s time to check out. Use our secure payment gateway to complete your order quickly and safely. You’ll receive a confirmation email with all the details of your service.</p></li>
                        <li><h4><span>4</span> Ship Your Shoes</h4><p> We’ll make this step as convenient as possible! Once your order is confirmed, we’ll send you a pre-paid shipping label. All you need to do is pack your shoes securely (don’t worry, we’ll give you tips on how to do this) and drop them off at your nearest shipping location. </p></li>
                        {{-- <li><h4><span>5</span> Watch Us Work Our Magic</h4><p> As soon as your shoes reach us, our team of skilled cobblers and shoe care specialists will get to work. Whether it’s cleaning off stubborn stains, repairing damaged soles, restoring worn-out leather, or adding a custom flair, we’ll handle your shoes with the utmost care and precision.</p></li>
                        <li><h4><span>6</span> Receive Your Refreshed Shoes</h4><p> Before you know it, your shoes will be on their way back to you, looking and feeling as good as new. Whether they’re ready to hit the streets, the office, or your next big adventure, your revitalized footwear will be ready to create more unforgettable moments.</p></li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="serviceSection pt-5 pb-5">
    <div class="custom-container">
        <div class="mainTitle text-center m-auto pb-5">
            <h3>Tips & Stories from the World of Shoe Care</h3>
            <p class="m-auto mb-3">Our blog is your go-to resource for everything from DIY shoe care tips to the latest trends in customization and restoration.</p>
            <div class="serviceCard-action text-center">
                <a href="{{ route("blogListPage") }}" class="defaultBtnClass trBtnClass">Explore Our Blog</a>
            </div>
        </div>
        <div class="row pb-3">
            {{-- blog Cards Start --}}
            @foreach ($posts as $post)
            <div class="col-md-4">
                <div class="blogCard mb-4">
                    <div class="blogCard_Image mb-3">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Blog card" class="img-fluid w-100" />
                        <span class="like_Blog"><i class="fa-regular fa-heart"></i></span>
                    </div>
                    <div class="blog_contents p-3">
                        <h3>{{ $post->title }}</h3>
                        <span class="blog_date">
                            <p>{{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</p>
                        </span>
                        <p class="moreText active">{!! Str::limit($post->description, 50) !!}</p>
                        <div class="blog_action">
                            <span class="moreBtn">See more</span>
                            <a href="#"><svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.4458 3.79004L13.2334 1.19416C16.7282 0.0292268 18.627 1.93715 17.4712 5.43196L14.8754 13.2196C13.1325 18.4572 10.2707 18.4572 8.52783 13.2196L7.75732 10.9081L5.4458 10.1376C0.208172 8.39475 0.208172 5.54203 5.4458 3.79004Z" stroke="#292D32" stroke-width="1.37591" stroke-linecap="round" stroke-linejoin="round" /></svg></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section class="serviceSection pt-5 pb-5">
    <div class="custom-container">
        <div class="mainTitle text-center m-auto pb-5">
            <h3>FAQs</h3>
            <p class="m-auto mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores qui amet, esse omnis illum sed nihil, debitis dolorum quae pariatur harum asperiores quidem saepe quas, necessitatibus earum quod itaque. Molestias expedita eveniet aliquid cupiditate? Consectetur cumque error ipsam?</p>
        </div>
        <div class="accordian-container">
            <div id="faqs">
                <div class="faqs-item">
                    <h2><span>What kinds of shoes can you service?</span><button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><i class="fa-solid fa-plus"></i></button></h2>
                    <div id="collapseOne" class="faqs-collapse collapse" data-bs-parent="#faqs">We work with all types of shoes, including sneakers, leather shoes, boots, and designer footwear.<br><hr></div>
                </div>
                <div class="faqs-item">
                    <h2><span>How long does the process take?</span><button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="fa-solid fa-plus"></i></button></h2>
                    <div id="collapseTwo" class="faqs-collapse collapse" data-bs-parent="#faqs">Most orders are completed within 7-10 business days. Complex restorations may take longer.<br><hr></div>
                </div>
                <div class="faqs-item">
                    <h2><span>Can you repair badly damaged shoes?</span><button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><i class="fa-solid fa-plus"></i></button></h2>
                    <div id="collapseThree" class="faqs-collapse collapse" data-bs-parent="#faqs">Yes, we specialize in repairing shoes of all conditions. If we can’t fix it, no one can!<br><hr></div>
                </div>
                <div class="faqs-item">
                    <h2><span>How do I send my shoes?</span><button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"><i class="fa-solid fa-plus"></i></button></h2>
                    <div id="collapseFour" class="faqs-collapse collapse" data-bs-parent="#faqs">We’ll email you a shipping label after your order is confirmed. Pack your shoes securely, attach the label, and ship them to us.<br><hr></div>
                </div>
                <div class="faqs-item">
                    <h2><span>Do you offer warranties on your services?</span><button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive"><i class="fa-solid fa-plus"></i></button></h2>
                    <div id="collapseFive" class="faqs-collapse collapse" data-bs-parent="#faqs">Absolutely! We stand by our work and offer warranties for repairs and restorations.<br><hr></div>
                </div>
                <div class="faqs-item">
                    <h2><span>Can I track my order?</span><button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix"><i class="fa-solid fa-plus"></i></button></h2>
                    <div id="collapseSix" class="faqs-collapse collapse" data-bs-parent="#faqs">Yes, you’ll receive tracking details for the return shipment once your shoes are ready.<br><hr></div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="joinForm pt-5 pb-5">
    <div class="container pt-4 pb-4">
        <div class="mainTitle text-center m-auto pb-5">
            <h3>Contact us</h3>
            <p class="m-auto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores qui amet.</p>
        </div>
        <form action="method" class="queryForm row">
            <div class="form-group mb-3 col-md-6">
                <label for="name">Enter your full name</label>
                <input type="text" name="name" placeholder="Enter your full name" class="form-control" autocomplete="off" />
            </div>
            <div class="form-group mb-3 col-md-6">
                <label for="email">Enter your email address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email address" class="form-control" autocomplete="off" />
            </div>
            <div class="form-group mb-3 col-md-12">
                <label for="message">Type your message</label>
                <textarea type="text" rows="5" id="message" name="message" placeholder="Type your message" class="form-control" autocomplete="off"></textarea>
            </div>
            <div class="form-group col-md-12">
                <button type="button" class="w-100 defaultBtnClass" aria-label="Submit Button">Send</button>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    const playButton = document.getElementById('playButton');
    const videoPopup = document.getElementById('videoPopup');
    const closeButton = document.getElementById('closeButton');
    const video = document.getElementById('video');
    const thumbnail = document.getElementById('thumbnail');

    function openPopup() {
        videoPopup.style.display = 'flex';
        video.play();
    }

    function closePopup() {
        videoPopup.style.display = 'none';
        video.pause();
        video.currentTime = 0;
    }

    playButton.addEventListener('click', openPopup);
    thumbnail.addEventListener('click', openPopup);
    closeButton.addEventListener('click', closePopup);
</script>
@endsection
