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
            <h3 class="text-capitalize pt-3 px-4 col-2">Events table</h3>
            <a class="btn bg-gradient-primary col-2 mt-3" href="{{ route('merchant.events.create') }}" type="button">
                Create new
            </a>
        </div>
        <div class="card">
            <div class="px-5 my-3">
                @include('merchant.events.filter_form')
            </div>

            <div class="card-body px-2 pb-2">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0 px-2">
                        <thead class="bg-light">
                            <tr class="text-center">
                                <th class="text-secondary">STT</th>
                                <th class="text-secondary">Title</th>
                                <th class="text-secondary">
                                    Start date
                                </th>
                                <th class="text-secondary">
                                    End date
                                </th>
                                <th class="text-secondary">
                                    Location
                                </th>
                                <th class="text-secondary">Status</th>
                                <th class="text-secondary">MaxQuantity</th>
                                <th class="text-secondary">Price</th>
                                <th class="text-secondary">Stock</th>
                                <th class="text-secondary">Available</th>

                                <th class="text-secondary"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($events))
                                @foreach ($events as $key => $event)
                                    <tr class="py-2">
                                        <td class="text-center">{{ $key + 1 }}</td>
                                        <td> {{ $event['title'] }} </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($event['startDate'])->format('d/m/Y H:i:s') }}
                                        </td>
                                        <td class="align-middle ">
                                            {{ \Carbon\Carbon::parse($event['endDate'])->format('d/m/Y H:i:s') }}
                                        </td>
                                        <td class="align-middle ">
                                            @if (strlen($event['location']) > 30)
                                                {{ substr($event['location'], 0, 30) . '...' }}
                                            @else
                                                {{ $event['location'] }}
                                            @endif
                                        </td>
                                        <td class="align-middle ">
                                            @if ($event['status'] == 'NOT_YET_STARTED')
                                                <span class="my-3 badge bg-warning">{{ $event['status'] }}</span>
                                            @elseif ($event['status'] == 'HAPPENING')
                                                <span class="my-3 badge bg-success">{{ $event['status'] }}</span>
                                            @elseif ($event['status'] == 'ENDED')
                                                <span class="my-3 badge bg-secondary">{{ $event['status'] }}</span>
                                            @else
                                                <span class="my-3 badge bg-secondary">{{ $event['status'] }}</span>
                                            @endif
                                        </td>
                                        <td class="text-center "> {{ $event['maxQuantity'] }} </td>
                                        <td class="align-middle text-center">
                                            {{ number_format($event['price'], 0, ',', '.') }}
                                        </td>
                                        <td class="text-center "> {{ $event['stock'] }} </td>
                                        <td class="text-center ">
                                            @if ($event['stock'] > 0)
                                                <span class="badge bg-success">YES</span>
                                            @else
                                                <span class="badge bg-warning">NO</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-secondary text-success text-gradient px-3 mb-0"
                                                href="{{ route('events.orders.index', $event['id']) }}">
                                                view orders
                                            </a>
                                            <a class="btn btn-link text-dark px-3 mb-0"
                                                href="{{ route('merchant.events.edit', $event['id']) }}">
                                                <i class="material-icons fs-4 me-2">edit</i>Edit
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <hr>
            <div class="mx-4">
                {{ $events->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
