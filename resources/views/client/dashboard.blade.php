@extends('client.layouts.app')
@section('panel')
<!-- Main-body start -->
<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-body start -->
        <div class="page-body">
            <div class="row">
                
                <div class="col-xl-12"><h1 class="heading">Sobriety Progress</h1></div>
                <div class="col-xl-12">
                    <div class="card proj-progress-card">
                        <div class="card-block">
                            <div class="row" style="    align-items: center;">
                                <div class="col-xl-8 col-md-12">
                                    <h6 class="colHead">Progress until {{ $client->aftercare_service_length }} Days Sober</h6>
                                    <h5 class="m-b-30 f-w-700 pSubhead">{{ round($sobriety_percentage) }}% to complete</h5>
                                    <div class="progress">
                                        <div class="progress-bar bg-c-red" style="width:{{ round($sobriety_percentage) }}%"></div>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="col-xl-4 col-md-12">
                                    <div class="pImg">
                                        <img src="{{asset('client/assets/images/user.jpg')}}" alt="user image" class="img-radius ">
                                        <h6 class="textAlign-center f-w-700 textAlign-center sHeading">{{ $loginCount.'/'.$client->aftercare_service_length }}</h6>
                                        <h5 class="f-w-700 textAlign-center">Days Sober this Month</h5>
                                        <!-- <div class="d-inline-block">
                                            <h6>Shirley Hoe</h6>
                                            <p class="text-muted m-b-0">Sales executive , NY</p>
                                        </div> -->
                                    </div>
                                </div>
                                <!--  -->
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Project statustic start -->
                <div class="col-xl-12">
                    <div class="card proj-progress-card">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-xl-3 col-md-6">
                                    <!-- <h6 class="textAlign-center">DAS</h6> -->
                                    <h5 class="m-b-30 f-w-700 textAlign-center">DAS S21</h5>
                                    <canvas id="barChart"></canvas>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <!-- <h6 class="textAlign-center">DAS</h6> -->
                                    <h5 class="m-b-30 f-w-700 textAlign-center">KESSLER K10</h5>
                                    <canvas id="barChart1"></canvas>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <!-- <h6 class="textAlign-center">DAS</h6> -->
                                    <h5 class="m-b-30 f-w-700 textAlign-center">PRO MIS</h5>
                                    <canvas id="barChart2"></canvas>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <!-- <h6 class="textAlign-center">DAS</h6> -->
                                    <h5 class="m-b-30 f-w-700 textAlign-center">BAM</h5>
                                    <canvas id="barChart3"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Project statustic end -->
                <!-- Project statustic start -->
                <div class="col-xl-12">
                    <div class="card proj-progress-card">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-xl-3 col-md-6">
                                    <!-- <h6 class="textAlign-center">DAS</h6> -->
                                    <h5 class="m-b-30 f-w-700 textAlign-center">DAS S21</h5>
                                <section id="bar-chart"></section>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <!-- <h6 class="textAlign-center">DAS</h6> -->
                                <h5 class="m-b-30 f-w-700 textAlign-center">KESSLER K10</h5>
                            <section id="bar-chart1"></section>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <!-- <h6 class="textAlign-center">DAS</h6> -->
                            <h5 class="m-b-30 f-w-700 textAlign-center">PRO MIS</h5>
                        <section id="bar-chart2"></section>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <!-- <h6 class="textAlign-center">DAS</h6> -->
                        <h5 class="m-b-30 f-w-700 textAlign-center">BAM</h5>
                    <section id="new"></section>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Project statustic end -->
@endsection