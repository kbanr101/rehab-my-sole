@extends('include.master')
@section('content')
    <section class="herobanner pt-5 pb-5 mt-5 mb-5">
        <div class="custom-container">
            <div class="centerContent text-center m-auto">
                <h3>Every Step Tells a Story</h3>
                <p>Revive cherished memories with sustainable, personalized care—because your shoes deserve another journey.
                </p>
                <a class="defaultBtnClass" href="#">Explore Our Services</a>
            </div>
        </div>
    </section>
    <section class="videoSection">
        <div class="video-section">
            <img src="{{ asset('assets/media/shoe-video-bg.jpg') }}" alt="Video Thumbnail" class="video-thumbnail"
                id="thumbnail">
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
                <p class="m-auto">At RehabMySole, no pair of shoes is too far gone. From sneakers to stilettos, we offer
                    services to make your footwear look, feel, and perform like new again.</p>
            </div>
            <div class="row pb-3">
                <div class="col-md-3">
                    <div class="serviceCard">
                        <div class="serviceImage">
                            <img src="{{ asset('assets/media/background-landing.png') }}" alt="Customize shoes"
                                class="img-fluid w-100" />
                        </div>
                        <div class="serviceCard-detail p-3">
                            <h4>Cleaning</h4>
                            <p>Revitalize, refresh, and rejuvenate your shoes with eco-friendly cleaning.</p>
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
                            <img src="{{ asset('assets/media/background-landing.png') }}" alt="Customize shoes"
                                class="img-fluid w-100" />
                        </div>
                        <div class="serviceCard-detail p-3">
                            <h4>Customization</h4>
                            <p>Transform ordinary footwear into art through sustainable, personalized customization.</p>
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
                            <img src="{{ asset('assets/media/background-landing.png') }}" alt="Customize shoes"
                                class="img-fluid w-100" />
                        </div>
                        <div class="serviceCard-detail p-3">
                            <h4>Repair</h4>
                            <p>Restore every worn detail meticulously with eco-conscious repair craftsmanship.</p>
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
                            <img src="{{ asset('assets/media/background-landing.png') }}" alt="Customize shoes"
                                class="img-fluid w-100" />
                        </div>
                        <div class="serviceCard-detail p-3">
                            <h4>Restoration</h4>
                            <p>Revive cherished memories by restoring shoes with sustainable elegance.</p>
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
                <h3>Your Shoe Revival Journey</h3>
                <p class="m-auto">Effortless steps from booking to doorstep.</p>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="workFigure">
                        <img src="{{ asset('assets/media/how-work.png') }}" alt="How it work" class="img-fluid w-100" />
                    </div>
                </div>
                <div class="col-md-6 align-items-center">
                    <div class="workFigure-content">
                        <ul>
                            <li>
                                <h4><span>1</span> Place Your Order</h4>
                                <p>Browse our services and select the care your shoes need—whether it’s cleaning,
                                    customization, repair, or restoration.</p>
                            </li>
                            <li>
                                <h4><span>2</span> Schedule a Pickup</h4>
                                <p>Enjoy doorstep convenience. Simply book a pickup time and we'll collect your shoes
                                    safely. </p>
                            </li>
                            <li>
                                <h4><span>3</span> Expert Restoration</h4>
                                <p>Our skilled artisans breathe new life into every pair, using sustainable, precise
                                    craftsmanship.</p>
                            </li>
                            <li>
                                <h4><span>4</span> Swift Delivery</h4>
                                <p>Your revitalized shoes are returned promptly—ready to carry you forward on your next
                                    adventure.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="serviceSection pt-5 pb-5">
        <div class="custom-container">
            <div class="mainTitle text-center m-auto pb-5">
                <h3>Blogs</h3>
                <p class="m-auto mb-3">Every post tells a story—discover insights, tips, and inspiration for every step.</p>
                <div class="serviceCard-action text-center">
                    <a href="{{ route('blogListPage') }}" class="defaultBtnClass trBtnClass">Explore Our Blog</a>
                </div>
            </div>
            <div class="row pb-3">
                {{-- blog Cards Start --}}
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
                                    <a href="{{ route('blogDetailPage', $post->slug) }}"><svg width="19"
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
            </div>
        </div>
    </section>
    <section class="serviceSection pt-5 pb-5">
        <div class="custom-container">
            <div class="mainTitle text-center m-auto pb-5">
                <h3>FAQs</h3>
                <p class="m-auto mb-3">Every question is a stepping stone on our shared journey—discover heartfelt insights
                    below.</p>
            </div>
            <div class="accordian-container">
                <div id="faqs">
                    <div class="faqs-item">
                        <h2><span>What kinds of shoes can you service?</span><button class="collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false"
                                aria-controls="collapseOne"><i class="fa-solid fa-plus"></i></button></h2>
                        <div id="collapseOne" class="faqs-collapse collapse" data-bs-parent="#faqs">We work with all
                            types of shoes, including sneakers, leather shoes, boots, and designer footwear.<br>
                            <hr>
                        </div>
                    </div>
                    <div class="faqs-item">
                        <h2><span>How long does the process take?</span><button class="collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                aria-controls="collapseTwo"><i class="fa-solid fa-plus"></i></button></h2>
                        <div id="collapseTwo" class="faqs-collapse collapse" data-bs-parent="#faqs">Most orders are
                            completed within 7-10 business days. Complex restorations may take longer.<br>
                            <hr>
                        </div>
                    </div>
                    <div class="faqs-item">
                        <h2><span>Can you repair badly damaged shoes?</span><button class="collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                aria-controls="collapseThree"><i class="fa-solid fa-plus"></i></button></h2>
                        <div id="collapseThree" class="faqs-collapse collapse" data-bs-parent="#faqs">Yes, we specialize
                            in repairing shoes of all conditions. If we can’t fix it, no one can!<br>
                            <hr>
                        </div>
                    </div>
                    <div class="faqs-item">
                        <h2><span>How do I send my shoes?</span><button class="collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                aria-controls="collapseFour"><i class="fa-solid fa-plus"></i></button></h2>
                        <div id="collapseFour" class="faqs-collapse collapse" data-bs-parent="#faqs">We’ll email you a
                            shipping label after your order is confirmed. Pack your shoes securely, attach the label, and
                            ship them to us.<br>
                            <hr>
                        </div>
                    </div>
                    <div class="faqs-item">
                        <h2><span>Do you offer warranties on your services?</span><button class="collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false"
                                aria-controls="collapseFive"><i class="fa-solid fa-plus"></i></button></h2>
                        <div id="collapseFive" class="faqs-collapse collapse" data-bs-parent="#faqs">Absolutely! We stand
                            by our work and offer warranties for repairs and restorations.<br>
                            <hr>
                        </div>
                    </div>
                    <div class="faqs-item">
                        <h2><span>Can I track my order?</span><button class="collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false"
                                aria-controls="collapseSix"><i class="fa-solid fa-plus"></i></button></h2>
                        <div id="collapseSix" class="faqs-collapse collapse" data-bs-parent="#faqs">Yes, you’ll receive
                            tracking details for the return shipment once your shoes are ready.<br>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="joinForm pt-5 pb-5">
        <div class="container pt-4 pb-4">
            <div class="mainTitle text-center m-auto pb-5">
                <h3>Contact us</h3>
                <p class="m-auto">Have a question? We're here to help.</p>
            </div>
            <form action="method" class="queryForm row">
                <div class="form-group mb-3 col-md-6">
                    <label for="name">Enter your full name</label>
                    <input type="text" name="name" placeholder="Enter your full name" class="form-control"
                        autocomplete="off" />
                </div>
                <div class="form-group mb-3 col-md-6">
                    <label for="email">Enter your email address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email address"
                        class="form-control" autocomplete="off" />
                </div>
                <div class="form-group mb-3 col-md-12">
                    <label for="message">Type your message</label>
                    <textarea type="text" rows="5" id="message" name="message" placeholder="Type your message"
                        class="form-control" autocomplete="off"></textarea>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"></script>
<script>
    $(document).ready(function() {
        $('#contactForm').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            // Validate form fields
            let isValid = true;
            let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Email validation regex

            $('#contactForm input').each(function() {
                if ($(this).val().trim() === '') {
                    isValid = false;
                    $(this).css('border', '1px solid red');
                } else {
                    $(this).css('border', '');
                }
            });

            // Validate name
            const name = $('#name').val().trim();
            if (name.length < 3) {
                isValid = false;
                $('#name').css('border', '1px solid red');
                $('#responseMessage').text('Name must be at least 3 characters long.').css({
                    'color': 'maroon',
                    'padding': '8px 10px'
                }).fadeIn();
                return;
            } else {
                $('#name').css('border', '');
            }

            // Validate email
            const email = $('#email').val().trim();
            if (!emailRegex.test(email)) {
                isValid = false;
                $('#email').css('border', '1px solid red');
                $('#responseMessage').text('Please enter a valid email address.').css({
                    'color': 'maroon',
                    'padding': '8px 10px'
                }).fadeIn();
                return;
            } else {
                $('#email').css('border', '');
            }

            if (!isValid) {
                $('#responseMessage').text('Please fill in all required fields.').css({
                    'color': 'maroon',
                    'padding': '8px 10px'
                }).fadeIn();
                return;
            }

            const submitButton = $('#contactForm button[type="submit"]');
            submitButton.prop('disabled', true).text('Submitting...');

            // Send AJAX request
            $.ajax({
                url: '{{ route('contact_submit') }}', // Backend PHP script
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#responseMessage').text(response.message).css({
                        'color': 'darkslategrey',
                        'padding': '8px 10px'
                    }).fadeIn();
                    $('#contactForm')[0].reset(); // Reset the form
                },
                error: function(xhr, status, error) {
                    $('#responseMessage').text('An error occurred. Please try again.').css({
                        'color': 'maroon',
                        'padding': '8px 10px'
                    }).fadeIn();
                },
                complete: function() {
                    // Re-enable the button after the request is complete
                    submitButton.prop('disabled', false).text('Submit');
                }
            });
        });
    });
</script>
