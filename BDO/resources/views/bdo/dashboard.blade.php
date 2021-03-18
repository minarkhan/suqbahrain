@extends('layouts.bdo.master')
@section('title', 'BDO Dashboard')
@section('content-head')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a {{--href="{{ route('bdo.dashboard') }}"--}}>Dashboard</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>0{{ $total_distributor }}</h3>

                            <p>Distributor Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
               {{-- <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <h3>--}}{{--{{ $merchant_today }}--}}{{--</h3>
                            <p>Today Merchant's</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->--}}
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">

                        <div class="inner">
                            {{-- <h3>{{ $bdo_profit }} BHD</h3> --}}
                            <h3>{{ number_format($availbleProfit, 2) }} BHD</h3>
                            <p>Your Total Earning BHD</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                        @if ( \Carbon\Carbon::now()->diffInDays($lastwithdraw->created_at) >= 30)
                            <a style="cursor: pointer;"  data-toggle="modal" data-target="#_withdraw" class="small-box-footer">
                            withdraw ({{ floor($availbleProfit) }} BHD) <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        @else
                            <a style="cursor: not-allowed;" class="small-box-footer" data-bs-toggle="tooltip" data-bs-placement="bottom" title="After withdrawable date you can withdraw your earning">
                            Withdraw ({{ floor($availbleProfit) }} BHD) <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        @endif

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-dark">
                        <div class="inner">
                            {{-- <h3>{{ $bdo_today_profit }} BHD</h3> --}}
                            <h3>{{ $depositPoint }} Points</h3>

                            {{-- <p>Today Earning ( 00.00 Point(s) )</p> --}}
                            <p>Total Earning Point(s) </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                        @if ( $depositPoint >= 2000 )
                            <a href="{{ route('pointconvert.index')}}" class="small-box-footer btn">
                            Convert {{ floor($depositPoint).'P' }} = {{ number_format($depositPoint *(1/2000), 2).'BDH ' }} <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        @else
                            <a style="cursor: not-allowed;" class="small-box-footer btn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="After 2000 Points You Can Convert to BDH" >
                            Convert {{ floor($depositPoint).'P' }} = {{ number_format($depositPoint *(1/2000), 2).'BDH ' }}<i class="fas fa-arrow-circle-right"></i>
                            </a>
                        @endif
                    </div>
                </div>
                <!-- ./col -->
                 <div class="col-lg-3 col-6">
                     <!-- small box -->
                     <div class="small-box bg-warning">
                         <div class="inner">
                             {{-- <h3>50<sup style="font-size: 20px">%</sup></h3> --}}
                             <h3>{{ $lastwithdraw->created_at->addDays(30)->format('j F Y')}}</h3>
                             <p>Next Withdrawable date</p>
                         </div>
                         <div class="icon">
                             <i class="ion ion-stats-bars"></i>
                         </div>
                         <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                     </div>
                 </div>
                 <!-- ./col -->
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">
                                Your Referral Code : <b>{{ \Illuminate\Support\Facades\Auth::user()->referral_code }} </b> <button   class="btn btn-primary float-right"value="copy" onclick="copyToClipboard()">Copy Shareable link!</button>
                            </span>
                            <span class="info-box-number">
                                <input class="form-control" type="text" id="copy_refcode" value="{{ 'https://suqbahrain.com/users/registration?ref=' .\Illuminate\Support\Facades\Auth::user()->referral_code }}" readonly>
                            </span>
                        </div>

                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                {{--<div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">CPU Traffic</span>
                            <span class="info-box-number">
                  10
                  <small>%</small>
                </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Likes</span>
                            <span class="info-box-number">41,410</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Sales</span>
                            <span class="info-box-number">760</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">New Members</span>
                            <span class="info-box-number">2,000</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->--}}
            </div>
            <!-- /.row -->
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
    <script>
        function copyToClipboard() {
            document.getElementById("copy_refcode").select();
            document.execCommand('copy');
        }
    </script>

<!-- _withdraw Modal -->
 @include('bdo.modal._withdraw')
 <!-- /_withdraw Modal -->

@endsection
