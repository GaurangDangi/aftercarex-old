<!DOCTYPE html>

<html lang="en" class="light-style   layout-menu-fixed     customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/" data-base-url="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1" data-framework="laravel" data-template="blank-menu-theme-default-light">


<!-- Mirrored from demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/auth/login-basic by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Jan 2024 06:58:55 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>{{ $pageTitle ?? '' }}</title>
  <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
  <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
  <!-- laravel CRUD token -->
  <meta name="csrf-token" content="xkbVTXERbgyAtJmYYpRPYcu7N2FEVqn1OtRE0y73">
  <!-- Favicon -->
  {{-- <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}" /> --}}
  <!-- Google Tag Manager (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
  <script>
    (function (w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        '../../../../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-5DDHKGP');
  </script>
  <!-- End Google Tag Manager -->
    

  <!-- Include Styles -->
  <!-- $isFront is used to append the front layout styles only on the front layout otherwise the variable will be blank -->
  <!-- BEGIN: Theme CSS-->
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com/">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxiconsc4a7.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome8a69.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons80a8.css') }}" />
<!-- Core CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/corea8ac.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default4c4b.css') }}" class="template-customizer-theme-css" />
<link rel="stylesheet" href="{{ asset('assets/css/demob77a.css') }}" />
<!-- Vendors CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbare482.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead05d2.css') }}" />

<!-- Vendor Styles -->
<!-- Vendor -->
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/form-validation/umd/styles/index.min.css') }}" />


<!-- Page Styles -->
<!-- Page -->
<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
</head>
<body>  
<!-- Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DDHKGP" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<!-- Layout Content -->  
<!-- Content -->
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="javascript::;" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">
                {{-- <img src="{{ asset('assets/img/logo.png') }}" alt="logo" style="width: 250px;"> --}}
              </span>
            </a>
          </div>
          <!-- /Logo -->
          
          <form id="twoStepsForm" class="mb-3" action="{{ $otp ? route('speaker.OtpVerify') : route('speaker.loginSubmit') }}" method="POST">
            @csrf
            @method('post')
            @if ($mobile)
            <h6 class="mb-2">Welcome to Speaker Login! 👋</h6>
            <p class="mb-4">Please sign-in to your account and start the adventure</p>
          
            <div class="mb-3">
                @php $mobile = old('mobile') ? old('mobile') : $mobileNumber; @endphp
                <label for="mobile" class="form-label">Mobile Number</label>
                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter your mobile number" value="{{ $mobileNumber }}" autofocus>
                @if($errors->has('mobile'))
                    <p class="text-danger">{{ $errors->first('mobile') }}</p>
                @endif
            </div>
            @endif
            
            @if ($otp)
            <div class="mb-3 form-verify-otp-toggle">
              <h4 class="mb-2">Two Step Verification 💬</h4>
              <p class="text-start mb-4">
                We sent a verification code to your mobile. Enter the code from the mobile in the field below.
                <!-- <span class="fw-medium d-block mt-2">******1234</span> -->
              </p>
              <p class="mb-0 fw-medium">Type your 4 digit verification code</p>
              <!-- <div class="input-group input-group-merge">
                <input type="text" id="verifyotp" class="form-control" name="verifyotp" autofocus /> 
              </div> -->

              <div class="auth-input-wrapper d-flex align-items-center justify-content-sm-between numeral-mask-wrapper">
              <input type="tel" name="verifyotp1" id="verifyotp1" class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1" autofocus>
              <input type="tel" name="verifyotp2" id="verifyotp2" class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1">
              <input type="tel" name="verifyotp3" id="verifyotp3" class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1">
              <input type="tel" name="verifyotp4" id="verifyotp4" class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1">
              </div>
              <!-- Create a hidden field which is combined by 3 fields above -->
              <input type="hidden" name="otp" id="otp"/>

              @if($errors->has('verifyotp'))
                    <p class="text-danger">{{ $errors->first('verifyotp') }}</p>
                @endif
            </div>
            @endif
            
            @if(Session::has('error'))
              <p class="text-danger">{{ Session::get('error') }}</p>
            @endif

            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">Log in</button>
            </div>
          </form>
        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>
<!--/ Content -->

<!-- BEGIN: Vendor JS-->
<script src="{{ asset('assets/vendor/libs/jquery/jquery1e84.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/popper/popper0a73.js') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrapcfc4.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar6188.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/hammer/hammer2de0.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead60e7.js') }}"></script>
<script src="{{ asset('assets/vendor/js/menu2dc9.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/form-validation/umd/bundle/popular.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/form-validation/umd/plugin-bootstrap5/index.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/form-validation/umd/plugin-auto-focus/index.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->

<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
<script type="text/javascript">
$(document).ready(function() {
    const $numeralMasks = $(".numeral-mask");

    // Function to handle input and keydown events
    const updateOTPValue = function(e) {
        const $currentInput = $(this);
        const inputValue = $currentInput.val();

        // Handle backspace
        if (e.keyCode === 8) {
            if (inputValue === "") {
                const $prevInput = $currentInput.prev(".numeral-mask");
                if ($prevInput.length) {
                    e.preventDefault(); // Prevent default backspace behavior (going back in browser)
                    $prevInput.focus().val(""); // Move focus to previous input field and clear its value
                }
            } else {
                $currentInput.val(""); // Clear current input field
            }
            return; // Exit function to prevent further execution on backspace
        }

        // Move focus to the next input field after entering a digit
        if (/^[0-9]$/.test(inputValue)) {
            const $nextInput = $currentInput.next(".numeral-mask");
            if ($nextInput.length) {
                $nextInput.focus();
            }
        }

        // Update [name="otp"] only if all inputs are filled
        let otpValue = "";
        $numeralMasks.each(function() {
            otpValue += $(this).val();
        });
        $('[name="otp"]').val(otpValue);
    };

    // Attach input and keydown event listeners to all elements with class "numeral-mask"
    $numeralMasks.on("input", updateOTPValue);
    $numeralMasks.on("keydown", updateOTPValue);
});


</script>
<!-- END: Page JS-->
</body>
</html>