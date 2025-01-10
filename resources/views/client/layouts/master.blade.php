<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ $pageTitle ?? '' }}</title>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
        <meta name="author" content="Codedthemes" />
        <!-- Favicon icon -->
        <!-- <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon"> -->
        <!-- Google font-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
        <!-- waves.css -->
        <link rel="stylesheet" href="{{asset('client/assets/pages/waves/css/waves.min.css')}}" type="text/css" media="all">
        <!-- Required Fremwork -->
        <link rel="stylesheet" type="text/css" href="{{asset('client/assets/css/bootstrap/css/bootstrap.min.css')}}">
        <!-- waves.css -->
        <link rel="stylesheet" href="{{asset('client/assets/pages/waves/css/waves.min.css')}}" type="text/css" media="all">
        <!-- themify icon -->
        <link rel="stylesheet" type="text/css" href="{{asset('client/assets/icon/themify-icons/themify-icons.css')}}">
        <!-- font-awesome-n -->
        <link rel="stylesheet" type="text/css" href="{{asset('client/assets/css/font-awesome-n.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('client/assets/css/font-awesome.min.css')}}">
        <!-- scrollbar.css -->
        <link rel="stylesheet" type="text/css" href="{{asset('client/assets/css/jquery.mCustomScrollbar.css')}}">
        <!-- morris chart -->
        <!-- <link rel="stylesheet" type="text/css" href="{{asset('client/assets/css/morris.js/css/morris.css')}}"> -->
        <!-- Style.css -->
        <link rel="stylesheet" type="text/css" href="{{asset('client/assets/css/style.css')}}">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="{{asset('client/assets/css/slider.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <style type="text/css">
        .textAlign-center{
        text-align: center;
        }
        :root {
        --color-primary: #000000;
        --color-label: #a7a7a7;
        --color-default: #e2dede;
        }
        /*.card-container {
        background: #ffffff;
        width: 20px;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 50px 100px rgba(0, 0, 0, 0.08);
        }*/
        body .apexcharts-tooltip.apexcharts-theme-light {
        color: var(--color-text);
        background: #ffffff;
        box-shadow: none;
        border: 0px solid #e7e7e7;
        /* border: 0; */
        padding: 2px;
        /* opacity: 1 !important; */
        }
        body .apexcharts-tooltip.apexcharts-theme-light .apexcharts-tooltip-title {
        display: none;
        }
        body
        .apexcharts-xaxistooltip.apexcharts-xaxistooltip-bottom.apexcharts-theme-light {
        display: none;
        }
        .pImg{text-align: center;}
        .pImg img{
        width: 200px;
        }
        .sHeading{
        font-size: 24px;
        padding-top: 10px;
        }
        .colHead{
        color: #8D8D8D;
        font-size: 20px;
        }
        .pSubhead{
        color: #0072C3;
        font-size: 16px;
        }
        /*.navbar-collapse{
        display: contents !important;
        }*/
        .heading{
        font-size: 36px;
        color: #6888BE;
        margin-bottom: 20px;
        }
        .navbar-expand-sm .navbar-nav {
        padding-left: 0px !important;
        }
        </style>
    </head>
    <body>
        <!-- Pre-loader start -->
        <div class="theme-loader">
            <div class="loader-track">
                <div class="preloader-wrapper">
                    <div class="spinner-layer spinner-blue">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                    <div class="spinner-layer spinner-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                    <div class="spinner-layer spinner-yellow">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                    <div class="spinner-layer spinner-green">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pre-loader end -->
        @yield('content')
    </div>
</div>
</div>
</div>
<!-- Required Jquery -->
<script type="text/javascript" src="{{asset('client/assets/js/jquery/jquery.min.js')}} "></script>
<script type="text/javascript" src="{{asset('client/assets/js/jquery-ui/jquery-ui.min.js')}} "></script>
<script type="text/javascript" src="{{asset('client/assets/js/popper.js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('client/assets/js/bootstrap/js/bootstrap.min.js')}} "></script>
<!-- waves js -->
<script src="{{asset('client/assets/pages/waves/js/waves.min.js')}}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{asset('client/assets/js/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
<!-- slimscroll js -->
<script src="{{asset('client/assets/js/jquery.mCustomScrollbar.concat.min.js')}} "></script>
<!-- menu js -->
<script src="{{asset('client/assets/js/pcoded.min.js')}}"></script>
<script src="{{asset('client/assets/js/vertical/vertical-layout.min.js')}} "></script>
<script type="text/javascript" src="{{asset('client/assets/js/script.js')}} "></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.1/Chart.min.js'></script>
<script type="text/javascript">var canvas = document.getElementById("barChart");
var ctx = canvas.getContext('2d');
// Global Options:
Chart.defaults.global.defaultFontColor = 'black';
Chart.defaults.global.defaultFontSize = 16;
var data = {
labels:false,
datasets: [
{
fill: true,
backgroundColor: [
'#4049FF',
'#E9EFFC'],
data: [25, 75],
// Notice the borderColor
borderColor:    ['black', 'black'],
borderWidth: [0,0]
}
]
};
// Notice the rotation from the documentation.
var options = {
title: {
display: false,
text: 'What happens when you lend your favorite t-shirt to a girl ?',
position: 'top'
},
rotation: 0.12 * Math.PI
};
// Chart declaration:
var myBarChart = new Chart(ctx, {
type: 'pie',
data: data,
options: options
});
// Fun Fact: I've lost exactly 3 of my favorite T-shirts and 2 hoodies this way :|</script>
<script type="text/javascript">var canvas = document.getElementById("barChart1");
var ctx = canvas.getContext('2d');
// Global Options:
Chart.defaults.global.defaultFontColor = 'black';
Chart.defaults.global.defaultFontSize = 16;
var data = {
labels:false,
datasets: [
{
fill: true,
backgroundColor: [
'#4049FF',
'#E9EFFC'],
data: [25, 75],
// Notice the borderColor
borderColor:    ['black', 'black'],
borderWidth: [0,0]
}
]
};
// Notice the rotation from the documentation.
var options = {
title: {
display: false,
text: 'What happens when you lend your favorite t-shirt to a girl ?',
position: 'top'
},
rotation: 0.12 * Math.PI
};
// Chart declaration:
var myBarChart = new Chart(ctx, {
type: 'pie',
data: data,
options: options
});
// Fun Fact: I've lost exactly 3 of my favorite T-shirts and 2 hoodies this way :|</script>
<script type="text/javascript">var canvas = document.getElementById("barChart2");
var ctx = canvas.getContext('2d');
// Global Options:
Chart.defaults.global.defaultFontColor = 'black';
Chart.defaults.global.defaultFontSize = 16;
var data = {
labels:false,
datasets: [
{
fill: true,
backgroundColor: [
'#4049FF',
'#E9EFFC'],
data: [25, 75],
// Notice the borderColor
borderColor:    ['black', 'black'],
borderWidth: [0,0]
}
]
};
// Notice the rotation from the documentation.
var options = {
title: {
display: false,
text: 'What happens when you lend your favorite t-shirt to a girl ?',
position: 'top'
},
rotation: 0.12 * Math.PI
};
// Chart declaration:
var myBarChart = new Chart(ctx, {
type: 'pie',
data: data,
options: options
});
// Fun Fact: I've lost exactly 3 of my favorite T-shirts and 2 hoodies this way :|</script>
<script type="text/javascript">var canvas = document.getElementById("barChart3");
var ctx = canvas.getContext('2d');
// Global Options:
Chart.defaults.global.defaultFontColor = 'black';
Chart.defaults.global.defaultFontSize = 16;
var data = {
labels:false,
datasets: [
{
fill: true,
backgroundColor: [
'#4049FF',
'#E9EFFC'],
data: [25, 75],
// Notice the borderColor
borderColor:    ['black', 'black'],
borderWidth: [0,0]
}
]
};
// Notice the rotation from the documentation.
var options = {
title: {
display: false,
text: 'What happens when you lend your favorite t-shirt to a girl ?',
position: 'top'
},
rotation: 0.12 * Math.PI
};
// Chart declaration:
var myBarChart = new Chart(ctx, {
type: 'pie',
data: data,
options: options
});
// Fun Fact: I've lost exactly 3 of my favorite T-shirts and 2 hoodies this way :|</script>
<!--bar chart-->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script type="text/javascript">
/* Get CSS Variables */
const colorPrimary = getComputedStyle(document.documentElement)
.getPropertyValue("--color-primary")
.trim();
const colorDefault = getComputedStyle(document.documentElement)
.getPropertyValue("--color-default")
.trim();
const colorLabel = getComputedStyle(document.documentElement)
.getPropertyValue("--color-label")
.trim();
const fontFamily = getComputedStyle(document.documentElement)
.getPropertyValue("--font-family")
.trim();
/* Declare Default Chart Options */
const defaultOptions = {
chart: {
toolbar: {
show: false
},
selection: {
enabled: false
},
zoom: {
enabled: false
},
width: "100%",
height: 300,
offsetY: 8
},
stroke: {
lineCap: "round"
},
dataLabels: {
enabled: false
},
legend: {
show: false
},
states: {
hover: {
filter: {
type: "none"
}
}
}
};
// Bar Chart
var barOptions = {
...defaultOptions,
chart: {
...defaultOptions.chart,
type: "bar"
},
tooltip: {
enabled: true,
fillSeriesColor: false,
style: {
fontFamily: fontFamily
},
y: {
formatter: (value) => {
return `${value}K`;
}
}
},
series: [
{
name: "2024",
data: [30, 50, 70, 90, 30, 50]
},
{
name: "2023",
data: [40, 20, 60, 80, 40, 20]
}
],
colors: [colorPrimary, colorDefault],
stroke: { show: false },
grid: {
borderColor: "rgba(0, 0, 0, 0)",
padding: { left: 0, right: 0, top: -16, bottom: -8 }
},
plotOptions: {
bar: {
horizontal: false,
columnWidth: "20%",
borderRadius: 2
}
},
yaxis: {
show: false
},
xaxis: {
labels: {
floating: false,
show: false,
style: {
fontFamily: fontFamily,
colors: colorLabel
}
},
axisBorder: {
show: false
},
axisTicks: {
show: false
},
crosshairs: {
show: false
},
categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"]
}
};
var barChart = new ApexCharts(document.querySelector("#bar-chart"), barOptions);
barChart.render();
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script type="text/javascript" src="{{asset('client/assets/js/slider.js')}} "></script>
</body>
</html>