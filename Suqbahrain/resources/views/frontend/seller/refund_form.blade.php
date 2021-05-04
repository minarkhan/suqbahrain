@extends('frontend.layouts.app')

@section('content')

    <section class="gry-bg py-4 profile">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-3 d-none d-lg-block">
                    @if(Auth::user()->user_type == 'seller')
                        @include('frontend.inc.seller_side_nav')
                    @elseif(Auth::user()->user_type == 'customer')
                        @include('frontend.inc.customer_side_nav')
                    @endif
                </div>

                <div class="col-lg-9">
                    <div class="main-content">
                        <!-- Page title -->
                        <div class="page-title">
                            <div class="row align-items-center">
                                <div class="col-md-6 col-12 d-flex align-items-center">
                                    <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                        {{__('Send Refund Request')}}
                                    </h2>
                                </div>
                            </div>
                        </div>

                        <form class="" action="{{route('refund_send_customer.customer', $order_detail)}}" method="POST" enctype="multipart/form-data" id="choice_form">
                            @csrf
                            <div class="form-box bg-white mt-4">
                                <div class="form-box-content p-3">
                                    {{-- <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('Product')}} <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <ul>
                                                @foreach ($order->orderDetails as $key => $orderdata )
                                                    <li>
                                                        {{ $orderdata->product->name }}
                                                    </li>
                                                @endforeach
                                            </ul>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('Total Amount')}} <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="number" class="form-control mb-3" name="name" placeholder="{{__('Total')}}" value="{{ $order->grand_total }}" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('Order Code')}} <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control mb-3" name="code" value="{{ $order->code }}" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('Refund Method')}} <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <select class="form-control mb-3" name="refund_method" id="">
                                                <option>Wallet</option>
                                                <option>Cash on Hand</option>
                                                <option>Benifit Pay</option>
                                                <option>Paypal</option>
                                                <option>Bank Account</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('Method Details')}} <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <textarea name="method_details" rows="8" placeholder="" class="form-control mb-3"></textarea>
                                        </div>
                                    </div> --}}
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('Product Name')}} <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control mb-3" name="name" placeholder="{{__('Product Name')}}" value="{{ $order_detail->product->name }}" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('Product Price')}} <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="number" class="form-control mb-3" name="name" placeholder="{{__('Product Price')}}" value="{{ $order_detail->product->unit_price }}" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('Order Code')}} <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control mb-3" name="code" value="{{ $order_detail->order->code }}" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('Refund Method')}} <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <select class="form-control mb-3" name="refund_method" id="">
                                                <option>Wallet</option>
                                                <option>Cash on Hand</option>
                                                <option>Benifit Pay</option>
                                                <option>Paypal</option>
                                                <option>Bank Account</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('Method Details')}} <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <textarea name="method_details" rows="8" placeholder="If available" class="form-control mb-3"></textarea>
                                            @if ($errors->has('method_details'))
                                                <span class="text-danger">{{ $errors->first('method_details') }}</span>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="form-box mt-4 text-right">
                                <button type="submit" class="btn btn-styled btn-base-1">{{ __('Send Request') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
