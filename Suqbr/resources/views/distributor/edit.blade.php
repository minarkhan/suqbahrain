@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">{{__('Update Distributor')}}</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{route('distributor.update', $distributor->id)}}" method="POST">

                        @csrf
                        @method('put')
                        <div class="form-group">
                            <div class="col-lg-3">
                                <label class="control-label">{{__('Name')}}</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="name" value="{{ $distributor->name }}" placeholder="Distributor name">
                            </div>
                        </div>
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <div class="col-lg-3">
                                <label class="control-label">{{__('Email')}}</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="email" class="form-control" name="email" value="{{ $distributor->email }}" placeholder="Distributor Email" >
                            </div>
                        </div>
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <div class="col-lg-3">
                                <label class="control-label">{{__('Phone')}}</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="phone" value="{{  $distributor->phone }}" placeholder="017XXXXXXXX" >
                            </div>
                        </div>
                        @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <div class="col-lg-3">
                                <label class="control-label">{{__('Password')}}</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="password" class="form-control" name="password"  placeholder="********" >
                            </div>
                        </div>
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                        {{-- <div class="form-group">
                             <div class="col-lg-3">
                                 <label class="control-label">{{__('Identification')}}</label>
                             </div>
                             <div class="col-lg-8">
                                 <input type="text" class="form-control" name="identification" value="{{  old('identification') }}" placeholder="Distributor pasport number" >
                             </div>
                         </div>
                         @error('identification')
                         <div class="text-danger">{{ $message }}</div>
                         @enderror--}}

                        <div class="form-group">
                            <div class="col-lg-3">
                                <label class="control-label">{{__('Address')}}</label>
                            </div>
                            <div class="col-lg-8">
                                <textarea type="text" name="address" id="address" cols="10" rows="4" class="form-control" placeholder="Your address">{{  $distributor->address }}</textarea>
                            </div>
                        </div>
                        @error('address')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <div class="col-lg-12 text-right">
                                <button class="btn btn-purple" type="submit">{{__('Update')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('script')
    <script type="text/javascript">

    </script>
@endsection

