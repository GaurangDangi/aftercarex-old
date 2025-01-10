<header class="site-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 d-flex flex-wrap">
                <p class="d-flex me-4 mb-0">
                    <i class="bi-telephone me-2"></i>
                    Phone: (+1) 4074086385
                </p>
                <p class="d-flex mb-0">
                    <i class="bi-envelope me-2"></i>
                    <a href="mailto:admin@Xaftercare.com">
                        admin@Xaftercare.com
                    </a>
                </p>
            </div>
            <div class="col-lg-3 col-12 ms-auto d-lg-block d-none">
                <ul class="social-icon">
                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-twitter"></a>
                    </li>
                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-facebook"></a>
                    </li>
                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-instagram"></a>
                    </li>
                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-linkedin"></a>
                    </li>
                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-youtube"></a>
                    </li>
                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-tiktok"></a>
                    </li>
                    <li class="social-icon-item">
                        <a href="14074086385" class="social-icon-link bi-whatsapp"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<nav class="navbar navbar-expand-lg bg-light shadow-lg">
    <div class="container">
        <a class="navbar-brand" href="home">
            <img src="images/logo.png" class="logo img-fluid" alt="Kind Heart Charity">
            <span>
                Xaftercare
                <small>Aftercare for Sustained Addiction Recovery </small>
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        @php $segment =  Request::segment(1); @endphp
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ ($segment=='home')?'active':'' }}" href="home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($segment=='about')?'active':'' }}" href="about">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link @if(in_array($segment, ['alcohol', 'substance', 'health'])) active @endif dropdown-toggle" href=""
                        id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">Aftercare Programs</a>
                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                        <li><a class="dropdown-item" href="alcohol">Alcohol Use <br>Recovery</a></li>
                        <li><a class="dropdown-item" href="substance">Substance Use <br>Recovery</a></li>
                        <li><a class="dropdown-item" href="health">Behavioral Health <br>Recovery</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($segment=='services')?'active':'' }}" href="services">Services</a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link @if(in_array($segment, ['privacy', 'disclaimer', 'refund', 'terms', 'white'])) active @endif dropdown-toggle" href=""
                        id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">Information</a>
                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                        <li><a class="dropdown-item" href="privacy">Privacy Policy</a></li>
                        <li><a class="dropdown-item" href="disclaimer">Disclaimer</a></li>
                        <li><a class="dropdown-item" href="refund">Refund Policy</a></li>
                        <li><a class="dropdown-item" href="terms">Terms of Use</a></li>
                        <li><a class="dropdown-item" href="white">White Label <br>Licensing</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($segment=='contact')?'active':'' }}" href="contact">Contact</a>
                </li>
                <li class="nav-item ms-3">
                    <a class="nav-link custom-btn custom-border-btn btn" href="https://www.xaftercare.com/backend/institution/login">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>