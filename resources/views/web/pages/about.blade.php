@extends('web.layouts.app')
@section('panel')
<section class="news-detail-header-section text-center">
    <div class="section-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <h1 class="text-white">About Us</h1>
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
                    
                    <ul class="social-icon mt-4">
                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-twitter"></a>
                        </li>
                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-facebook"></a>
                        </li>
                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-instagram"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection