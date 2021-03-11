@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <a href="{{ route('bdo.create') }}" class="btn btn-rounded btn-info pull-right">{{__('Add New BDO')}}</a>
        </div>
    </div>

    <br>

    <!-- Basic Data Tables -->
    <!--===================================================-->
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{__('BDOS')}}</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th width="10%">SL#</th>
                    <th>{{__('Name')}}</th>
                    <th>{{__('Email')}}</th>
                    <th>{{__('Phone')}}</th>
                    <th>{{__('Referred Code')}}</th>
                    <th>{{__('Profit (2.5%)')}}</th>
                    <th>{{__('Status')}}</th>
                    <th width="10%">{{__('Options')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bdos as $key => $bdo)
                    @if($bdo != null)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $bdo->name }}</td>
                            <td>{{ $bdo->email}}</td>
                            <td>{{ $bdo->phone }}</td>
                            <td>{{ $bdo->referral_code}}</td>

                            <td>
                                {{--@php
                                    $merchants = DB::table('users')->where('is_merchant', 1)
                                                                   ->where('distributor_id', $distributor->id)->get();
                                     $distributor_profit = 0;
                                     foreach ($merchants as $merchant){
                                        $result = DB::table('order_details')->where('user_id', $merchant->id)->sum('profit');
                                        $distributor_profit += $result * (10/100);

                                    }
                                @endphp
                                @if($distributor_profit != null)
                                    {{ $distributor_profit}} BHD ({{ $merchants->count() }})
                                @else
                                    0.00 BHD (0)
                                @endif--}}
                                @php
                                    $merchants = DB::table('users')->where('is_merchant', 1)->get();
                                    $bdo_profit = 0;
                                    foreach ($merchants as $merchant){
                                        $result = DB::table('order_details')->where('user_id', $merchant->id)->sum('profit');
                                        $bdo_profit += $result * (2.5/100);

                                    }
                                @endphp
                                @if($bdo_profit != null)
                                    {{ $bdo_profit }} BHD
                                @else
                                    0.0 BHD
                                @endif
                            </td>
                            <td>
                                <input  type="checkbox"   class="toggle-class" data-id="{{$bdo->id}}"  data-toggle="toggle" data-on="Active" data-onstyle="success" data-offstyle="danger" data-off="InActive" {{ $bdo->status==true ? 'checked' : '' }}>
                            </td>
                            <td>
                                <div class="btn-group dropdown">
                                    <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                        {{__('Actions')}} <i class="dropdown-caret"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li style="background: #1c3550; color: #fff;"><a href="{{route('bdo.edit', encrypt($bdo->id))}}">{{__('Edit')}}</a></li>
                                        <li style="background: #8a2020; color: #fff;">
                                            <form class="d-inline-block" action="{{ route('bdo.destroy', $bdo->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn" {{--@if($total_distributors > 0) disabled @endif--}} onclick="return confirm('Are you confirm ?')">{{__('Delete')}}</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                   @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
@section('script')
    <script src="{{asset('assets/js/bootstrap-toggle.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.delete-confirm').click(function(event) {
                var form =  $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                Swal.fire({
                    title: Are you sure to delete ${name}?,
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        //submit form
                        form.submit();
                    }
                })
            });
        });
    </script>

    <script>
        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var user_id = $(this).data('id');

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: '{{ route("change.status") }}',
                    data: {'status': status, 'user_id': user_id},
                    success: function(data){
                        // console.log(data);
                        if(!data.error) {
                            toastr.success(data.success);
                        }

                    }
                });
            })
        })
    </script>
@endsection
