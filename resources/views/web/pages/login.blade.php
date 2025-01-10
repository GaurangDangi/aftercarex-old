@extends('web.layouts.app')
@section('panel')
<section class="news-detail-header-section text-center">
    <div class="section-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <h1 class="text-white">Login Portal</h1>
            </div>
        </div>
    </div>
</section>
<section class="news-section section-padding">
    <div class="container">
        <div class="row">
            <section class="contact-section section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-12 ms-auto mb-5 mb-lg-0">
                            <div class="contact-info-wrap">
                                <h2>Get in touch</h2>
                                
                                <div class="contact-image-wrap d-flex flex-wrap">
                                    <img src="images/avatar/pretty-blonde-woman-wearing-white-t-shirt.jpg"
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
                                <h2>Login to the Portal</h2>
                                <div class="row">
                                    <input type="text" name="mobileno" id="first-name" class="form-control"
                                    placeholder="Mobile No" required>
                                    <br><br>
                                    
                                    <input type="password" name="password" id="password" class="form-control"
                                    placeholder="OTP" required>
                                    
                                    <button type="submit" class="form-control">Submit</button>
                                </div>
                            </form>
                            <br><br>
                            <p>Don't have an Account? Contact <a href="mailto:admin@Xaftercare.com">Admin</a></p>
                        </div>        
                    </div>
                </div>
            </section>    
        </div>
    </div>
</section>
@endsection