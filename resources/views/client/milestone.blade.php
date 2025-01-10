@extends('client.layouts.app')
@section('panel')
<style>
.disable-rewards{
    pointer-events: none;
    opacity: 0.2;
}
</style>
<!-- Main-body start -->
<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-body start -->
        <div class="page-body">
            <div class="row">
                <div class="col-xl-12"><h1 class="heading">My Milestones</h1></div>
                <!-- Project statustic start -->
                <div class="col-xl-12">
                    <div class="card proj-progress-card">
                        <div class="card-block">
                            @if(count($milestone)>0)
                            <div class="row">
                                @foreach($milestone as $key => $mil)
                                @php
                                    if($days_details[$key]['number_of_days'] == $mil->days_no){
                                        if($days_details[$key]['login_status'] == 1){
                                            $disableRewards = '';
                                        }else{
                                            $disableRewards = 'disable-rewards';
                                        }
                                    }else{
                                        $disableRewards = 'disable-rewards';
                                    }
                                @endphp

                                <div class="col-xl-2 col-md-6 {{$disableRewards}}">
                                    <div class="m-b-30 milestoneImg">
                                        <img class="img-fluid" src="{{asset($mil->image_url)}}" alt="Theme-Logo" />
                                    </div>
                                    <h5 class=" f-w-700 textAlign-center font16">{{ $mil->title }}</h5>
                                    <h6 class="textAlign-center">{{ $mil->days_no.'/'.count($milestone) }}</h6>
                                </div>
                                @endforeach
                            </div>
                            @else
                            <div class="row">
                                <h3>No Records Found!</h3>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Project statustic end -->
            </div>
        </div>
        <!-- Page-body end -->
    </div>
</div>
<!-- Project statustic end -->
@endsection