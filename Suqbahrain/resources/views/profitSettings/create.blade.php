@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-6">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">{{__('Commission Settings')}}</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{ route('commissionSettings.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label class="control-label">{{__('Suqbahrain (%)')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="suqbahrain" value="{{  env('point_per_doller') }}" placeholder="Point for per doller">
                            @error('suqbahrain')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label class="control-label">{{__('BDO (%)')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="bdo" value="{{  env('bdo') }}" placeholder="ex:10">
                            @error('marchant')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label class="control-label">{{__('Merchant (%)')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="marchant" value="{{  env('marchant') }}" placeholder="ex:10">
                            @error('marchant')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label class="control-label">{{__('Distributor (%)')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="distributor" value="{{  env('distributor') }}" placeholder="ex:10">
                            @error('distributor')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label class="control-label">{{__('Start Date')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="date" class="form-control" name="profit_start" value="{{  env('profit start') }}" placeholder="ex:10">
                            @error('profit_start')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label class="control-label">{{__('End Date')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="date" class="form-control" name="profit_end" value="{{  env('Profit end') }}" placeholder="ex:10">
                            @error('profit_end')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-6 col-lg-offset-3">
                            <button class="btn btn-purple" type="submit">{{__('Save')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Basic Data Tables -->
<!--===================================================-->
<div class="panel">
    <div class="panel-heading bord-btm clearfix py-3">
        <h3 class="panel-title pull-left pad-no">{{__('Commission Histroy')}}</h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped res-table mar-no" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('Suqbahrain (%)')}}</th>
                    <th>{{__('customer (%)')}}</th>
                    <th>{{__('marchant (%)')}}</th>
                    <th>{{__('distributor (%)')}}</th>
                    <th>{{__('start date')}}</th>
                    <th>{{__('end date')}}</th>
                    <th width="10%">{{__('Action')}}</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($profitSettings as $key => $profitSetting)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{ $profitSetting->suqbahrain_comission }}</td>
                        <td>{{ $profitSetting->bdo_comission }}</td>
                        <td>{{$profitSetting->marchant_comission}}</td>
                        <td>{{$profitSetting->distributor_comission}}</td>
                        <td>{{$profitSetting->start_date}}</td>
                        <td>{{$profitSetting->end_date}}</td>
                        <td width="10%"><a href="#"></a> Delete</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="clearfix">
            <div class="pull-right">
                {{-- {{ $refunds->appends(request()->input())->links() }} --}}
            </div>
        </div>
    </div>
</div>


@endsection
4
