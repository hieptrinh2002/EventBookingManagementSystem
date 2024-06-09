@extends('merchant.layouts.app')
@section('content')
    <div class="col-12">
        @if (session('message'))
            @php
                $alertType = session('alert-type', 'info'); // Mặc định là 'info' nếu không có 'alert-type'
            @endphp
            <div class="alert alert-{{ $alertType }} fs-5">
                {{ session('message') }}
            </div>
        @endif
        <div class="row">
            <h3 class="text-capitalize pt-3 px-4 col-2">Events table</h3>
            <a class="btn bg-gradient-primary col-2 mt-3" href="{{ route('merchant.events.create') }}" type="button">
                Create new
            </a>
        </div>
        <div class="card">
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
                                <th class="text-secondary"></th>
                            </tr>
                        </thead>
                        <tbody>
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
                                    <td class="align-middle "> {{ $event['location'] }} </td>
                                    <td class="align-middle "> {{ $event['status'] }} </td>
                                    <td class="text-center "> {{ $event['maxQuantity'] }} </td>
                                    <td class="align-middle text-center">{{ number_format($event['price'], 0, ',', '.') }}
                                        {{ $event['maxQuantity'] }}
                                    </td>
                                    <td>
                                        <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;">
                                            <i class="material-icons fs-4 me-2">delete</i>
                                        </a>
                                        <a class="btn btn-link text-dark px-3 mb-0"
                                            href="{{ route('merchant.events.edit', $event['id']) }}">
                                            <i class="material-icons fs-4 me-2">edit</i>Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
