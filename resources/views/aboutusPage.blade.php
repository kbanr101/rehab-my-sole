@extends('include.master')
@section('content')
    <div class="pageNavigaton">
        <div class="custom-container">
            <ul class="breadcrumbs">
                <li><a href="{{ url('/') }}"><i class="fa-solid fa-house"></i>&nbsp;Home</a></li>
                <li><a href="{{ route('aboutusPage') }}">About us</a></li>
            </ul>
        </div>
    </div>
    <section class="serviceSection pt-4 mt-4 pb-5">
        <div class="custom-container">
            <div class="mainTitle text-center x2_title m-auto pb-5">
                <h3>About us</h3>
                <p class="m-auto">Every Pair Has a Story. Let’s Keep Them Walking.</p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="aboutBox">
                        <div class="aboutBox-item w-100">
                            <img src="{{ asset('assets/media/background-landing.png') }}" width="" height=""
                                class="img-fluid" alt="About Us" />
                        </div>
                        <div class="aboutBox-item w-100">
                            <img src="{{ asset('assets/media/background-landing.png') }}" width="" height=""
                                class="img-fluid" alt="About Us" />
                        </div>
                        <div class="aboutBox-item w-100">
                            <img src="{{ asset('assets/media/background-landing.png') }}" width="" height=""
                                class="img-fluid" alt="About Us" />
                        </div>
                        <div class="aboutBox-item w-100">
                            <img src="{{ asset('assets/media/background-landing.png') }}" width="" height=""
                                class="img-fluid" alt="About Us" />
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <p class="text-center mx-700">At Rehab My Sole, we see more than just shoes—we see cherished memories and life’s journeys captured in every step. Our passion began with a simple belief: that every well-worn pair deserves a second chance. We’re here to revive your footwear’s past while paving the way for future adventures.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="aboutMission pt-5 pb-5">
        <div class="custom-container">
            <div class="mainTitle text-center m-auto pb-0">
                <h3>Our Story</h3>
                <p class="m-auto pb-3">From the familiar scuffs on your favorite sneakers to the worn elegance of timeless boots, we understand that shoes are not merely an accessory—they’re a part of your life’s narrative. Founded on the principles of sustainability, simplicity, and genuine care, Rehab My Sole was born out of the desire to preserve memories and reduce waste.</p>
                <p class="m-auto">Every repair, every custom design, and every restoration we perform is a labor of love—a commitment to extending the life of your most treasured footwear. Our team of skilled artisans treats each pair as a unique canvas, blending modern techniques with traditional craftsmanship to honor the legacy of your shoes.</p>
            </div>
        </div>
    </section>
    <section class="aboutMission pt-5 pb-5">
        <div class="custom-container">
            <div class="mainTitle text-center m-auto pb-5">
                <h3>Who We Are</h3>
                <p class="m-auto pb-3">We’re a dedicated team of cobblers, designers, and shoe care specialists who believe in a more mindful approach to footwear. Our work is driven by a passion for quality, sustainability, and the simple truth that every shoe tells its own story. With every service, we strive to deliver an experience that’s as personalized as it is transformative—ensuring your shoes not only look revived but feel ready for their next chapter.</p>
                <h3>Our Mission</h3>
                <p class="m-auto pb-3">To give every pair of shoes a renewed life—preserving memories, reducing waste, and empowering you to continue your journey with confidence and style.</p>
                <h3>We’re committed to:</h3>
                <ul class="pb-3" style="list-style: none">
                    <li>Craftsmanship You Trust: Every detail is handled with precision and care.</li>
                    <li>Sustainable Practices: Protecting the planet one pair of shoes at a time.</li>
                    <li>Personal Connection: Treating your footwear as if it were our own.</li>
                </ul>
                <h3>Our Vision</h3>
                <p class="pb-3 m-auto">We envision a future where every step is a celebration of the stories we share—where quality, sustainability, and heartfelt craftsmanship ensure that no memory is ever lost to time.</p>
                <h3>Our goal is to:</h3>
                <ul class="pb-3" style="list-style: none">
                    <li>Transform the way you care for your shoes.</li>
                    <li>Foster a community that values both style and sustainability.</li>
                    <li>Set a new standard for thoughtful, eco-friendly shoe care.</li>
                </ul>
                <p class="m-auto text-center">Join us in our journey to honor the past and stride confidently into the future—one step, one story, one sole at a time.</p>
            </div>
        </div>
    </section>
    <section class="aboutMeet pt-4">
        <div class="custom-container">
            <div class="mainTitle text-center m-auto pb-5">
                <h3>Meet our team</h3>
                <p class="m-auto">Rorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis.</p>
            </div>
            <div class="meetBlock">
                <div class="meetBlock-item">
                    <div class="meetFigure">
                        <img src="{{ asset('assets/media/background-landing.png') }}" width="" height=""
                            class="img-fluid" alt="Profile" />
                        <h4>First and Last Name</h4>
                        <span>Position Held</span>
                    </div>
                </div>
                <div class="meetBlock-item">
                    <div class="meetFigure">
                        <img src="{{ asset('assets/media/profle.png') }}" width="" height="" class="img-fluid"
                            alt="Profile" />
                        <h4>First and Last Name</h4>
                        <span>Position Held</span>
                    </div>
                </div>
                <div class="meetBlock-item">
                    <div class="meetFigure">
                        <img src="{{ asset('assets/media/profle.png') }}" width="" height="" class="img-fluid"
                            alt="Profile" />
                        <h4>First and Last Name</h4>
                        <span>Position Held</span>
                    </div>
                </div>
                <div class="meetBlock-item">
                    <div class="meetFigure">
                        <img src="{{ asset('assets/media/profle.png') }}" width="" height="" class="img-fluid"
                            alt="Profile" />
                        <h4>First and Last Name</h4>
                        <span>Position Held</span>
                    </div>
                </div>
                <div class="meetBlock-item">
                    <div class="meetFigure">
                        <img src="{{ asset('assets/media/profle.png') }}" width="" height="" class="img-fluid"
                            alt="Profile" />
                        <h4>First and Last Name</h4>
                        <span>Position Held</span>
                    </div>
                </div>
                <div class="meetBlock-item">
                    <div class="meetFigure">
                        <img src="{{ asset('assets/media/profle.png') }}" width="" height="" class="img-fluid"
                            alt="Profile" />
                        <h4>First and Last Name</h4>
                        <span>Position Held</span>
                    </div>
                </div>
                <div class="meetBlock-item">
                    <div class="meetFigure">
                        <img src="{{ asset('assets/media/profle.png') }}" width="" height="" class="img-fluid"
                            alt="Profile" />
                        <h4>First and Last Name</h4>
                        <span>Position Held</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="serviceSection pt-5 pb-5">
        <div class="custom-container">
            <div class="mainTitle text-center m-auto pb-5">
                <h3>FAQs</h3>
                <p class="m-auto mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores qui amet, esse omnis
                    illum sed nihil, debitis dolorum quae pariatur harum asperiores quidem saepe quas, necessitatibus earum
                    quod itaque. Molestias expedita eveniet aliquid cupiditate? Consectetur cumque error ipsam?</p>
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
                <p class="m-auto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores qui amet.</p>
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
    @include('sweetalert::alert')
@endsection
