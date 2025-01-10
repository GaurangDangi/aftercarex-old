<!DOCTYPE html>
<html lang="en" class="light-style layout-compact layout-navbar-fixed layout-menu-fixed     " dir="ltr" data-theme="theme-default" data-assets-path="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/" data-base-url="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1" data-framework="laravel" data-template="vertical-menu-theme-default-light">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>{{ $pageTitle ?? '' }}</title>
  <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
  <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
  <!-- laravel CRUD token -->
  <meta name="csrf-token" content="xkbVTXERbgyAtJmYYpRPYcu7N2FEVqn1OtRE0y73">
  <!-- Canonical SEO -->
  <link rel="canonical" href="https://themeselection.com/item/sneat-bootstrap-laravel-admin-template/">
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
        '../../../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
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
<link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxiconsc4a7.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome8a69.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons80a8.css') }}" />
<!-- Core CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/corea8ac.css') }}" class="template-customizer-core-css" />
<link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default4c4b.css') }}" class="template-customizer-theme-css" />
<link rel="stylesheet" href="{{ asset('assets/css/demob77a.css') }}" />
<!-- Vendors CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbare482.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead05d2.css') }}" />

<!-- Vendor Styles -->
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/app-email.css') }}" />
@stack('style-datatable')
<!-- Page Styles -->

<script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
<script src="{{ asset('assets/vendor/js/template-customizer.js') }}"></script>
<script src="{{ asset('assets/js/config.js') }}"></script>
</head>
<body>
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DDHKGP" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
    
@yield('content')
<!-- BEGIN: Vendor JS-->
<script src="{{ asset('assets/vendor/libs/jquery/jquery1e84.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/popper/popper0a73.js') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrapcfc4.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar6188.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/hammer/hammer2de0.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead60e7.js') }}"></script>
<script src="{{ asset('assets/vendor/js/menu2dc9.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script src="{{ asset('assets/assets/js/app-email.js') }}"></script>
<script src="https://js.stripe.com/v3/"></script>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset('assets/js/maind63d.js') }}"></script>

<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
<script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
<!-- END: Page JS-->
<!-- Validation JS-->
<script src="{{ asset('assets/jsValidation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/jsValidation/form-validate.js') }}"></script>
<!-- END: Validation JS-->
@stack('script-datatable')
<!--Credit Card Modal -->
<div class="modal fade" id="StripCardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Credit Card Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="{{ route('stripe.token') }}" method="post" id="payment-form">
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <label class="form-label" for="card-element">Card Holder Name</label>
                        <input id="card_name" name="card_name" class="form-control" placeholder="John Doe" />
                    </div>
                    <div class="form-row">
                        <label class="form-label" for="card-element">Credit Card</label>
                        <div id="card-element"></div>
                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit Payment</button>
                </div>
            </form>          
        </div>
    </div>
</div>
<!-- Pricing Modal -->
<div class="modal fade" id="clientProgressBarModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel3">Client Barometer</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="demo-vertical-spacing">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Enroll for Mentor</button>
            </div>
        </div>
    </div>
</div>
<!--/ Pricing Modal -->
<script>
var stripe = Stripe('{{ config('services.stripe.key') }}');
var elements = stripe.elements();
var card = elements.create('card');
card.mount('#card-element');
card.addEventListener('change', function(event) {
    var displayError = document.getElementById('card-errors');
    if (event.error) {
        displayError.textContent = event.error.message;
    } else {
        displayError.textContent = '';
    }
});
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
    event.preventDefault();
    stripe.createToken(card).then(function(result) {
        if (result.error) {
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
        } else {
            stripeTokenHandler(result.token);
        }
    });
});
function stripeTokenHandler(token) {
    var form = document.getElementById('payment-form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
    form.submit();
}

$(document).on('click', '.client-progress-bar', function(e){
    var client_id = $(this).attr('client_id');
    /*if(client_id){
        $.ajax({
            type:'POST',
            url:"{{ route('client.progressBar') }}",
            dataType: "html",
            data:{
                client_id: client_id,
                _token   : "{{csrf_token()}}"
            },
            success:function(data){
                console.log(data);
                // let html = `<option value="">Select Sub-Category Name</option>`;
                // if(data.status =='success'){
                //     $.each(data.sub_categories, function(key, value){
                //         html += `<option value="${value.id}">${value.name}</option>`;
                //     });
                // }
                // $('#sub_category_id').html(html);
            }
        });
    }else{
        alert('Something Went Wrong');
    }*/
});
</script>
@stack('script')
</script>
</body>
</html>