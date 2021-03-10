@extends('layouts.app')

@section('content')

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
                    <th>{{__('Product')}}</th>
                    <th>{{__('Customer')}}</th>
                    <th>{{__('Amount')}}</th>
                    <th>{{__('Delivery Status')}}</th>
                    <th>{{__('Payment Method')}}</th>
                    <th>{{__('Payment Status')}}</th>
                    <th>{{__('Profit')}}</th>
                    <th width="10%">{{__('Action')}}</th>
                </tr>
                </thead>
               <tbody>
                @foreach($order_details as $key => $order_detail)
                    @if($order_detail != null)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order_detail->product->name ?? $order_detail->product_id }}</td>
                            <td>{{ $order_detail->sellers->name ?? $order_detail->seller_id }}</td>
                            <td>{{ $order_detail->price }}</td>
                            <td>{{ $order_detail->delivery_status }}</td>
                            <td>{{ $order_detail->shipping_type }}</td>
                            <td>{{ $order_detail->payment_status }}</td>
                            <td>
                                @if($order_detail->profit != null)
                                {{ $order_detail->profit }}
                                @else
                                 0.00
                                @endif
                            </td>
                            <td>
                                <div class="btn-group dropdown">
                                    <form action="{{ route('deposit.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="order_detail_id" value="{{$order_detail->id}}">
                                        {{-- <input type="hidden" name="order_detail_id" value="{{ $order_detail->profit }}">
                                        <input type="hidden" name="order_detail_id" value="$order_detail->id"> --}}
                                        {{-- <a href="{{ route('deposit.store') }}" class="btn btn-primary dropdown-toggle dropdown-toggle-icon" >
                                            {{__('Splitting')}}
                                        </a> --}}
                                        <button
                                        class="btn dropdown-toggle dropdown-toggle-icon {{$order_detail->commission_splitting_status == 'done' ? 'btn-danger disabled' : 'btn-primary' }}">{{$order_detail->commission_splitting_status == 'done' ? __('done') : __('Splitting') }}</button>

                                           {{-- <form class="d-inline-block" action="{{ route('profit_distribution.destroy', $order_detail->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger"  --}}{{--onclick="return confirm('Are you confirm ?')"--}}{{-->{{__('Delete')}}</button>
                                            --}}
                                        </form>
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
    <script src="{{asset('asset/js/bootstrap-toggle.js')}}"></script>
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

    {{--<script>
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
    </script>--}}
@endsection

