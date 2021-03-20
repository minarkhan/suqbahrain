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
                            <div class="col-md-6">
                                <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                    {{__('Bank Information')}}
                                </h2>
                            </div>
                            <div class="col-md-6">
                                <div class="float-md-right">
                                    <ul class="breadcrumb">
                                        <li><a href="{{ route('home') }}">{{__('Home')}}</a></li>
                                        <li><a href="{{ route('dashboard') }}">{{__('Dashboard')}}</a></li>
                                        <li><a href="{{ route('bankinfo.index') }}">{{__('bankinfo')}}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <div class="dashboard-widget text-center plus-widget mt-4 c-pointer" data-toggle="modal" data-target="#bankinfocreate_modal">
                                <i class="la la-plus"></i>
                                <span class="d-block title heading-6 strong-400 c-base-1">{{ __('Add New Bank Information') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="card no-border mt-4">
                        <table class="table table-sm table-hover table-responsive-md">
                            <thead>
                                <tr>
                                    <th>{{ __('SL#') }}</th>
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('A/C No.')}}</th>
                                    <th>{{__('Bank')}}</th>
                                    <th>{{__('IBAN')}}</th>
                                    {{-- <th>{{ __('Address') }}</th> --}}
                                    <th>{{__('Routing')}}</th>
                                    <th>{{__('Status')}}</th>
                                    <th>{{__('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($bankinfos) > 0)
                                    @foreach ($bankinfos as $key => $bankinfo)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{ $bankinfo->ac_holder}}</td>
                                            <td>{{ $bankinfo->ac_no }}</td>
                                            <td>{{ $bankinfo->bank_name }}</td>
                                            <td>{{ $bankinfo->iban_number }}</td>
                                            {{-- <td>{{ $bankinfo->address }}</td> --}}
                                            <td>{{ $bankinfo->routing_no }}</td>
                                            <td>
                                                @if ($bankinfo->status == 'pending')
                                                    <span class="badge badge-pill badge-danger">{{$bankinfo->status}}</span>
                                                @elseif ($bankinfo->status == 'Accepted')
                                                    <span class="badge badge-pill badge-secondary">{{$bankinfo->status}}</span>
                                                @else
                                                    <span class="badge badge-pill badge-success">{{$bankinfo->status}}</span>
                                                @endif
                                            </td>

                                            <td class="d-flex">

                                                <div class="" data-toggle="modal" data-target="#bankinfoedit_modal{{ $bankinfo->id }}">
                                                    <span class="btn btn-primary ml-2">{{ __('Edit') }}</span>
                                                </div>

                                                {{-- <a href="{{ route('bankinfo.edit', $bankinfo->id)}}" class="btn btn-primary ml-2">Edit</a> --}}

                                                <form class="d-inline-block pull-right" method="post" action="{{ route('bankinfo.destroy', $bankinfo->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger ml-2" onclick="return confirm('Are you confirm?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="text-center pt-5 h4" colspan="100%">
                                            <i class="la la-meh-o d-block heading-1 alpha-5"></i>
                                            <span class="d-block">{{ __('No history found.') }}</span>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination-wrapper py-4">
                        <ul class="pagination justify-content-end">
                            {{-- {{ $bankinfos->links() }} --}}
                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>


{{--
<div class="modal fade" id="bankinfo_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
        <div class="modal-content position-relative">
            <div class="modal-header">
                <h5 class="modal-title strong-600 heading-5">{{__('Create a bankinfo')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-3 pt-3">
                <form class="" action="{{ route('bankinfo.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">A/C Holder Name</label>
                        <input type="text" name="ac_holder" class="form-control" id="ac_holder" placeholder="Enter A/C holer name" value="{{ old('ac_holder') }}">
                        @error('ac_holder')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">A/C Number</label>
                        <input type="text" name="ac_no" class="form-control" id="ac_no" placeholder="Enter A/C Number" value="{{ old('ac_no') }}">
                        @error('ac_no')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">IBAN Number</label>
                        <input type="text" name="iban_number" class="form-control" id="iban_number" placeholder="Enter IBAN Number" value="{{ old('iban_number') }}">
                        @error('iban_number')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Bank Name</label>
                        <input type="text" name="bank_name" class="form-control" id="bank_name" placeholder="Enter Bank Name" value="{{ old('bank_name') }}">
                        @error('bank_name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Bank Address (Optional)</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Enter Bank Address" value="{{ old('address') }}">
                        @error('address')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Bank Routing No. (Optional)</label>
                        <input type="text" name="routing_no" class="form-control" id="routing_no" placeholder="Enter Bank Routing Number" value="{{ old('routing_no') }}">
                        @error('routing_no')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="">--- Select One ---</option>
                            <option value="primary">Primary Account</option>
                            <option value="secondary">Secondary Account</option>
                        </select>
                        @error('status')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text-right mt-4">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('cancel')}}</button>
                        <button type="submit" class="btn btn-base-1">{{__('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}

@if(count($bankinfos) > 0)
 @include('frontend.bankinfo.modal._edit')
@endif

{{-- @if ( count($bankinfos) > 0) --}}
 @include('frontend.bankinfo.modal._create')
{{-- @endif --}}

@endsection
