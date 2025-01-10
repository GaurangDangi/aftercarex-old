@extends('client.layouts.app')
@section('panel')
<style>
.fontbold{
    font-weight: 800;
}
.pagination{
    padding-left: 12px;
    float: left;
}
</style>
<!-- Main-body start -->
<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-body start -->
        <div class="page-body">
            <div class="row">
                <div class="col-xl-12"><h1 class="heading">Live Group Classes</h1></div>
                <!-- Project statustic start -->
                @if(count($class)>0)
                @foreach($class as $c)
                <div class="col-xl-4">
                    <div class="item">
                        <div class="card">
                            <div class="card-body" style="padding: 10px 5px 5px 10px;">
                                <div class="title-box">
                                    <p class="title"><strong class="fontbold">Title: </strong> {{$c->title}} </p>
                                    <p class="subject"><strong class="fontbold">Subject: </strong> {{$c->subject}} </p>
                                </div>
                                <div class="date-box">
                                    <p class="start_date"><strong class="fontbold">Date Time: </strong> {{ date('d, F Y', strtotime($c->start_date)),}}  {{strtoupper(date('g:i a', strtotime($c->start_time)))}} </p>
                                    <p class="duration"><strong class="fontbold">Duration: </strong> {{$c->duration}} </p>
                                </div>
                                <div class="enroll-btn pull-right mb-1">
                                    <a href="{{$c->zoomLink}}" target="_blank" class="btn btn-primary btn-md" style="border-radius: 20px;">Enroll Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="col-xl-12">
                    <div class="item">
                        <h3 class="text-center">No records found</h3>
                    </div>
                </div>
                @endif
                <!-- Project statustic end -->
                <div class="col-xl-12 pull-right">
                    {{ $class->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
        <!-- Page-body end -->
    </div>
</div>
<!-- Project statustic end -->
@endsection