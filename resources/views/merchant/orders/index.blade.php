@extends('merchant.layouts.app')
@section('content')
    <div class="col-12">
        @if (Session::has('message'))
            <script>
                swal({
                    title: "Message",
                    text: "{{ Session::get('message') }}",
                    icon: "{{ Session::get('alert-type') }}",
                    button: "OK",
                    timer: 2000,
                });
            </script>
        @endif
        <div class="row">
            <h3 class="text-capitalize pt-3 px-4 col-2">Order table</h3>
        </div>
        <div class="card">
            <div class="card-body px-2 pb-2">
                <div class="px-5">
                    @include('merchant.orders.filter_form')
                </div>

                @if (isset($orders))
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0 px-2">
                            <thead class="bg-light">
                                <tr class="text-center">
                                    <th class="text-secondary">STT</th>
                                    <th class="text-secondary">Customer email</th>
                                    <th class="text-secondary">Phone number</th>
                                    <th class="text-secondary">Payment method</th>
                                    <th class="text-secondary">Created date</th>
                                    <th class="text-secondary">Quantity</th>
                                    <th class="text-secondary">Total</th>
                                    <th class="text-secondary">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key => $order)
                                    <tr class="py-2">
                                        <td class="text-center">{{ $key + 1 }}</td>
                                        <td class="text-center"> {{ $order['email'] }} </td>
                                        <td class="text-center"> {{ $order['phoneNumber'] }} </td>
                                        <td class="text-center">
                                            @if ($order['paymentMethod'] == 0)
                                                <span class="my-3 badge bg-primary">COD</span>
                                            @elseif ($order['paymentMethod'] == 1)
                                                <span class="my-3 badge bg-success">MOMO</span>
                                            @elseif ($order['paymentMethod'] == 2)
                                                <span class="my-3 badge bg-info">FUNDIIN</span>
                                            @else
                                                {{ $order['paymentMethod'] }}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            {{ \Carbon\Carbon::parse($order['createdDate'])->format('d/m/Y H:i:s') }}
                                        </td>
                                        <td class="text-center"> {{ $order['quantity'] }} </td>
                                        <td class="ps-3"> {{ $order['amount'] }} </td>
                                        <td class="text-center">
                                            @if ($order['status'] == 0)
                                                CREATED <i class="mx-2 fas fa-check-circle"></i>
                                            @elseif ($order['status'] == 1)
                                                PENDING<i class="mx-2 fas fa-check-circle" style="color: orange;"></i>
                                            @elseif ($order['status'] == 2)
                                                SUCCESS <i class="mx-2 fas fa-check-circle" style="color: green;"></i>
                                            @elseif ($order['status'] == 3)
                                                FAILED <i class="mx-2 fas fa-check-circle" style="color: red;"></i>
                                            @else
                                                CANCELED{{ $order['status'] }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <hr>
                    <div class="mx-4">
                        {{ $orders->links('vendor.pagination.bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
