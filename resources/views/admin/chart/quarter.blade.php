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
                        <span class="info-box-text"><a href="admin/statistical/day">@lang('messages.chart.day')</a></span>
                        <span class="info-box-number">{{$day}}</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><a href="admin/statistical/week">@lang('messages.chart.week')</a></span>
                        <span class="info-box-number">
                   {{$week}}
                 </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><a href="admin/statistical/month">@lang('messages.chart.month')</a></span>
                        <span class="info-box-number">{{$month}}</span>
                    </div>
                </div>
            </div>
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><a href="admin/statistical/quarter">@lang('messages.chart.quarter')</a></span>
                        <span class="info-box-number">{{$quarter}}</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><a href={{route('statistic.index')}}>@lang('messages.chart.year')</a></span>
                        <span class="info-box-number">{{$year}}</span>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">@lang('messages.chart.reportQuarter')</h5>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                                    <i class="fas fa-wrench"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" role="menu">
                                    <a href="#" class="dropdown-item">@lang('messages.chart.action')</a>
                                    <a href="#" class="dropdown-item">@lang('messages.chart.another')</a>
                                    <a href="#" class="dropdown-item">@lang('messages.chart.something')</a>
                                    <a class="dropdown-divider"></a>
                                    <a href="#" class="dropdown-item">@lang('messages.chart.saparated')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Dashboard</div>
                                    <div class="panel-body">
                                        <canvas id="order-chart-quarter"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('js')
    <script src="{{ asset('/js/chart_quarter.js') }}"></script>
@endpush
@endsection
