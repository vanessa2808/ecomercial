@section('content')
    @extends('admin.layouts.master')
@section('title', 'admin')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-12">
            <div class="col-sm-12">
                <h1 class="m-0 text-dark">@lang('messages.chart.welcome')</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">@lang('messages.chart.home')</a></li>
                    <li class="breadcrumb-item active">@lang('messages.chart.dashboard')</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="clearfix hidden-md-up"></div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">@lang('messages.chart.day')</span>
                        <span class="info-box-number">{{$day}}</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">@lang('messages.chart.week')</span>
                        <span class="info-box-number">{{$week}} </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">@lang('messages.chart.month')</span>
                        <span class="info-box-number">{{$month}}</span>
                    </div>
                </div>
            </div>
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">@lang('messages.chart.quarter')</span>
                        <span class="info-box-number">{{$quarter}}</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">@lang('messages.chart.year')</span>
                        <span class="info-box-number">{{$year}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
