@extends('web.layouts.app')
@section('panel')
<section class="hero-section hero-section-full-height">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12 p-0">
                <div id="hero-slide" class="carousel carousel-fade slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{asset('web/images/slide/volunteer-helping-with-donation-box.jpg')}}"
                            class="carousel-image img-fluid" alt="...">
                            <div class="carousel-caption d-flex flex-column justify-content-end">
                                <h4>"Substance Use Recovery <br>Aftercare”</h4>
                                <p>Comprehensive support & guidance for a successful recovery.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('web/images/slide/volunteer-selecting-organizing-clothes-donations-charity.jpg')}}"
                            class="carousel-image img-fluid" alt="...">
                            <div class="carousel-caption d-flex flex-column justify-content-end">
                                <h4>“Alcohol Use Recovery <br>Aftercare”</h4>
                                <p>Personalized emails and texts</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('web/images/slide/medium-shot-people-collecting-donations.jpg')}}"
                            class="carousel-image img-fluid" alt="...">
                            <div class="carousel-caption d-flex flex-column justify-content-end">
                                <h4>"Behavioral Health Recovery <br>Aftercare"</h4>
                                <p>Weekly sessions with an AOD Certified Counselor</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#hero-slide"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#hero-slide"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-padding section-bg" id="section_2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                <img src="{{asset('web/images/group-people-volunteering-foodbank-poor-people.jpg')}}"
                class="custom-text-box-image img-fluid" alt="">
            </div>
            <div class="col-lg-6 col-12">
                <div class="custom-text-box">
                    <h2 class="mb-2">Overview</h2>
                    <h5 class="mb-3">A state-of-the-art aftercare program</h5>
                    <p class="mb-0">At Xaftercare, we understand that recovery does not end when clients leave the rehab facility. To ensure sustained sobriety and a successful reintegration into daily life, we offer a state-of-the-art aftercare program designed to provide continuous support and cutting-edge resources. Our program combines the latest technology with compassionate, evidence-based care to maintain the highest standards of luxury and clinical excellence.</p>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="custom-text-box mb-lg-0">
                            <h5 class="mb-3">Our Mission</h5>
                            <p>Our mission at Xaftercare is to provide unparalleled aftercare support that is both interactive and engaging. We are dedicated to pushing the boundaries of aftercare by integrating advanced technology with our luxury, evidence-based approach to recovery.</p>
                            <ul class="custom-list mt-2">
                                <li class="custom-list-item d-flex">
                                    <i class="bi-check custom-text-box-icon me-2"></i>
                                    White Label Branding Options
                                </li>
                                <li class="custom-list-item d-flex">
                                    <i class="bi-check custom-text-box-icon me-2"></i>
                                    Luxurious, Comprehensive Aftercare Solution
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="custom-text-box d-flex flex-wrap d-lg-block mb-lg-0">
                            <div class="counter-thumb">
                                <div class="d-flex">
                                    <span class="counter-number" data-from="1" data-to="20"
                                    data-speed="1000"></span>
                                    <span class="counter-number-text"></span>
                                </div>
                                <span class="counter-text">No of Clinics</span>
                            </div>
                            <div class="counter-thumb mt-4">
                                <div class="d-flex">
                                    <span class="counter-number" data-from="1" data-to="120"
                                    data-speed="1000"></span>
                                    <span class="counter-number-text"></span>
                                </div>
                                <span class="counter-text">No of Clients</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="about-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-5 col-12">
                <img src="{{asset('web/images/portrait-volunteer-who-organized-donations-charity.jpg')}}"
                class="about-image ms-lg-auto bg-light shadow-lg img-fluid" alt="">
            </div>
            <div class="col-lg-5 col-md-7 col-12">
                <div class="custom-text-block">
                    <h2 class="mb-0">Founder's Vision</h2>
                    
                    <p><h4>Graeme Duncan</h4></p>
                    <p class="text-muted mb-lg-4 mb-md-4">Founder & CEO</p>
                    <p>Having managed residential rehabs for years, <b>Graeme Duncan</b> identified a significant gap in the interactivity and effectiveness of existing aftercare programs. Motivated by a desire to offer a more comprehensive solution, he created Xaftercare to ensure clients have access to the best possible resources as they navigate their recovery journey.</p>
                    
                    
                </div>
            </div>
        </div>
    </div>
</section>
<section class="cta-section section-padding section-bg">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-5 col-12 ms-auto">
                <h2 class="mb-0">Ensure your Future.<br> Successfully plan your tomorrow!</h2>
            </div>
            <div class="col-lg-5 col-12">
                <a href="#" class="me-4"><b>Enroll Today!</b></a>
                <a href="#section_4" class="custom-btn btn smoothscroll">Become a member</a>
            </div>
        </div>
    </div>
</section>
<section class="section-padding" id="section_3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 text-center mb-4">
                <h2>Services for clients.</h2>
                <p>By choosing Xaftercare, corporate rehab facilities can offer their clients a luxurious, comprehensive aftercare solution that enhances recovery outcomes and supports sustained sobriety.</p>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                <div class="custom-block-wrap">
                    <img src="{{asset('web/images/causes/group-african-kids-paying-attention-class.jpg')}}"
                    class="custom-block-image img-fluid" alt="">
                    <div class="custom-block">
                        <div class="custom-block-body">
                            <h5 class="mb-3">Daily Communications</h5>
                            <p>Receive personalized emails and texts with essential recovery tips, daily commitments, scheduled activities etc.</p>
                            <div class="progress mt-4">
                                <div class="progress-bar w-75" role="progressbar" aria-valuenow="75"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            
                        </div>
                        <a href="enrol.html" class="custom-btn btn">Enroll now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                <div class="custom-block-wrap">
                    <img src="{{asset('web/images/causes/poor-child-landfill-looks-forward-with-hope.jpg')}}"
                    class="custom-block-image img-fluid" alt="">
                    <div class="custom-block">
                        <div class="custom-block-body">
                            <h5 class="mb-3">Educational Resources</h5>
                            <p>Clients gain access to an extensive library of multimedia educational content, including videos, articles, and interactive modules. </p>
                            <div class="progress mt-4">
                                <div class="progress-bar w-50" role="progressbar" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            
                        </div>
                        <a href="enrol.html" class="custom-btn btn">Enroll now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="custom-block-wrap">
                    <img src="{{asset('web/images/causes/african-woman-pouring-water-recipient-outdoors.jpg')}}"
                    class="custom-block-image img-fluid" alt="">
                    <div class="custom-block">
                        <div class="custom-block-body">
                            <h5 class="mb-3">Group Classes</h5>
                            <p>We offer weekly group classes mediated by a certified Alcohol and Other Drugs (AOD) Counselor. </p>
                            <div class="progress mt-4">
                                <div class="progress-bar w-100" role="progressbar" aria-valuenow="100"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            
                        </div>
                        <a href="enrol.html" class="custom-btn btn">Enroll now</a>
                    </div>
                </div>
            </div>
            <div> <br><br><br><br></div>
            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                <div class="custom-block-wrap">
                    <img src="{{asset('web/images/causes/vc.jpeg')}}"
                    class="custom-block-image img-fluid" alt="">
                    <div class="custom-block">
                        <div class="custom-block-body">
                            <h5 class="mb-3">Virtual Counselor</h5>
                            <p>Understanding that challenges can arise at any time, our aftercare program includes access to a virtual counselor available 24 hours a day</p>
                            <div class="progress mt-4">
                                <div class="progress-bar w-75" role="progressbar" aria-valuenow="75"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            
                        </div>
                        <a href="enrol.html" class="custom-btn btn">Enroll now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                <div class="custom-block-wrap">
                    <img src="{{asset('web/images/causes/chat.png')}}"
                    class="custom-block-image img-fluid" alt="">
                    <div class="custom-block">
                        <div class="custom-block-body">
                            <h5 class="mb-3">Interactive Platforms</h5>
                            <p>Our program includes forums and chat groups where clients can interact with other members for healthy, encouraging conversations. </p>
                            <div class="progress mt-4">
                                <div class="progress-bar w-50" role="progressbar" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            
                        </div>
                        <a href="enrol.html" class="custom-btn btn">Enroll now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="custom-block-wrap">
                    <img src="{{asset('web/images/causes/breath.jpeg')}}"
                    class="custom-block-image img-fluid" alt="">
                    <div class="custom-block">
                        <div class="custom-block-body">
                            <h5 class="mb-3">Accountability Tools</h5>
                            <p>Advanced programs including facial recognition breathalyzer check-ins for stringent monitoring and compliance.
                            </p>
                            <div class="progress mt-4">
                                <div class="progress-bar w-100" role="progressbar" aria-valuenow="100"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            
                        </div>
                        <a href="enrol.html" class="custom-btn btn">Enroll now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="volunteer-section section-padding" id="section_4">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <h2 class="text-white mb-4">Continue your Journey of Recovery!</h2>
                <p> <button type="submit" class="form-control">Sign up today</button></p>
                
            </div>
            <div class="col-lg-6 col-12">
                
            </div>
        </div>
    </div>
</section>

<section class="testimonial-section section-padding section-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 mx-auto">
                <h2 class="mb-lg-3">Client Testimonials</h2>
                <div id="testimonial-carousel" class="carousel carousel-fade slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="carousel-caption">
                                <h5 class="carousel-title"><em>The daily texts and emails kept me on track and motivated. The summaries of my commitments and the inspirational content were exactly what I needed to stay focused on my recovery. This program made me feel supported every single day.</em></h5>
                                <small class="carousel-name"><span class="carousel-name-title">Alex S</span>,
                                </small>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="carousel-caption">
                                <h5 class="carousel-title"><em>Having direct access to a virtual counselor was a game-changer for me. The links to my counselor and the group forums provided the support and accountability I needed. It felt like I had a team with me every step of the way.</em></h5>
                                <small class="carousel-name"><span class="carousel-name-title">Jamie L</span>,
                                </small>
                            </div>
                        </div>
                        
                        <div class="carousel-item">
                            <div class="carousel-caption">
                                <h5 class="carousel-title"><em>The educational media and video inspirations were incredibly helpful. I learned so much and felt constantly motivated to keep moving forward. The aftercare program provided me with the tools and knowledge to overcome my challenges.</em></h5>
                                <small class="carousel-name"><span class="carousel-name-title">Taylor M</span>,
                                </small>
                            </div>
                        </div>
                        <br><br>
                        <ol class="carousel-indicators">
                            <li data-bs-target="#testimonial-carousel" data-bs-slide-to="0" class="active">
                                <img src="{{asset('web/images/avatar/portrait-young-redhead-bearded-male.jpg')}}"
                                class="img-fluid rounded-circle avatar-image" alt="avatar">
                            </li>
                            <li data-bs-target="#testimonial-carousel" data-bs-slide-to="1" class="">
                                <img src="{{asset('web/images/avatar/portrait-beautiful-young-woman-standing-grey-wall.jpg')}}"
                                class="img-fluid rounded-circle avatar-image" alt="avatar">
                            </li>
                            <li data-bs-target="#testimonial-carousel" data-bs-slide-to="2" class="">
                                <img src="{{asset('web/images/avatar/pretty-blonde-woman-wearing-white-t-shirt.jpg')}}"
                                class="img-fluid rounded-circle avatar-image" alt="avatar">
                            </li>
                            
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="volunteer-section section-padding" id="section_4">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <h2 class="text-white mb-4">Partner with Us for Aftercare Excellence</h2>
                <p class="text-white"> Enhance your rehab center’s services by partnering with Xaftercare. Our comprehensive aftercare program provides continuous support, resources, and motivation for your clients. Sign up now to learn how we can help you ensure the success and well-being of your clients.</p>
                <p> <button type="submit" class="form-control">Sign up now</button></p>
                
            </div>
            <div class="col-lg-6 col-12">
                
            </div>
        </div>
    </div>
</section>
<section class="contact-section section-padding" id="section_6">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-12 ms-auto mb-5 mb-lg-0">
                <div class="contact-info-wrap">
                    <h2>Get in touch</h2>
                    <div class="contact-image-wrap d-flex flex-wrap">
                        <img src="{{asset('web/images/avatar/pretty-blonde-woman-wearing-white-t-shirt.jpg')}}"
                        class="img-fluid avatar-image" alt="">
                        <div class="d-flex flex-column justify-content-center ms-3">
                            <p class="mb-0">Clara Barton</p>
                            <p class="mb-0"><strong>Admin</strong></p>
                        </div>
                    </div>
                    <div class="contact-info">
                        <h5 class="mb-3">Contact Infomation</h5>
                        
                        <p class="d-flex mb-2">
                            <i class="bi-telephone me-2"></i>
                            <a href="tel: 305-240-9671">
                                (+1) 4074086385
                            </a>
                        </p>
                        <p class="d-flex">
                            <i class="bi-envelope me-2"></i>
                            <a href="mailto:admin@Xaftercare.com">
                                admin@Xaftercare.com
                            </a>
                        </p>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-12 mx-auto">
                <form class="custom-form contact-form" action="#" method="post" role="form">
                    <h2>Contact form</h2>
                    <p class="mb-4">Or, you can just send an email:
                        <a href="#">admin@Xaftercare.com</a>
                    </p>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <input type="text" name="first-name" id="first-name" class="form-control"
                            placeholder="Jack" required>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <input type="text" name="last-name" id="last-name" class="form-control"
                            placeholder="Doe" required>
                        </div>
                    </div>
                    <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control"
                    placeholder="Jackdoe@gmail.com" required>
                    <textarea name="message" rows="5" class="form-control" id="message"
                    placeholder="What can we help you?"></textarea>
                    <button type="submit" class="form-control">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection