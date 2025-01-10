@extends('client.layouts.app')
@section('panel')
<!-- Main-body start -->
<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-body start -->
        <div class="page-body">
            <div class="row">
                @if(count($category_data)>0)
                @php $i = 1; @endphp
                @foreach($category_data as $key => $data)
                <div class="col-md-12 mb-1">
                  <div class="owl-slider">
                    <h5>{{ ucwords($key) }}</h5>
                    <div id="slider{{$i}}" class="owl-carousel">
                        @foreach($data as $d)
                        @php 
                        if($d['thumbnail']!=''){
                            $image_url = $d['thumbnail'];
                        }else{
                            $image_url = 'client/assets/images/banner_card.png';
                        }
                        @endphp
                        <div class="item">
                            <div class="card">
                                <div class="card-body image-container">
                                    @php
                                        if( ($d['type']=='Article') && (!empty($d['pdfUrl']))){
                                            $external_link = asset($d['pdfUrl']);
                                        }else{
                                            $external_link = $d['external_link'];
                                        }
                                    @endphp
                                    <a href="{{ $external_link }}" target="_blank">
                                        <img src="{{asset($image_url)}}" class="card-img-top" alt="banner_card">
                                        @if($d['type'] == 'Video')
                                            <div class="icon"><i class="fas fa-video"></i></div>
                                        @else
                                            <div class="icon"><i class="fas fa-newspaper"></i></div>
                                        @endif
                                        <p class="card-text text-left content">{{$d['title']}}</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                  </div>
                </div>
                @php $i++; @endphp
                @endforeach
                @else
                <div class="col-md-12">
                    <h4 class="text-center">No records found</h4>
                </div>
                @endif
            </div>
        </div>
        <!-- Page-body end -->
    </div>
</div>
<!-- Project statustic end -->
@endsection