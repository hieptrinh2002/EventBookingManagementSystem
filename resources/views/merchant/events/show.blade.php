@extends('merchant.layouts.app')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body px-2 pb-2">
                <div class="container my-3">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            @if (isset($event))
                                <div class="card border-primary mb-3">
                                    <div class="card-header bg-primary text-white fw-bold fs-5">Event Details</div>
                                    <div class="card-body px-5">
                                        <div class="px-3">
                                            <div class="row d-flex justify-content-between">
                                                <div class="col-md-5">
                                                    <div class="mb-2">
                                                        <label class="fw-bold">Event Title:</label>
                                                        <p>{{ $event['title'] }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="mb-2">
                                                        <label class="fw-bold">Event Type:</label>
                                                        <p>{{ $event['type'] }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-2">
                                                <label class="fw-bold">Event Description:</label>
                                                <p>{{ $event['description'] }}</p>
                                            </div>
                                            <div class="mb-2">
                                                <label class="fw-bold">Event Location:</label>
                                                <p>{{ $event['location'] }}</p>
                                            </div>
                                            <div class="row d-flex justify-content-between">
                                                <div class="col-md-5">
                                                    <div class="mb-2">
                                                        <label class="fw-bold">Start Date:</label>
                                                        <p>{{ date('Y-m-d H:i', strtotime($event['startDate'])) }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="mb-2">
                                                        <label class="fw-bold">End Date:</label>
                                                        <p>{{ date('Y-m-d H:i', strtotime($event['endDate'])) }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row d-flex justify-content-between">
                                                <div class="col-md-5">
                                                    <div class="mb-2">
                                                        <label class="fw-bold">Stock:</label>
                                                        <p>{{ $event['stock'] }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="mb-2">
                                                        <label class="fw-bold">Event Status:</label>
                                                        <p>{{ $event['status'] }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row d-flex justify-content-between">
                                                <div class="col-md-5">
                                                    <div class="mb-2">
                                                        <label class="fw-bold">Minimum Quantity:</label>
                                                        <p>{{ $event['minQuantity'] }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="mb-2">
                                                        <label class="fw-bold">Maximum Quantity:</label>
                                                        <p>{{ $event['maxQuantity'] }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row d-flex justify-content-between">
                                                <div class="col-md-5">
                                                    <div class="mb-2">
                                                        <label class="fw-bold">Price:</label>
                                                        <p>{{ number_format($event['price'], 0, ',', '.') }} </p>
                                                    </div>
                                                </div>

                                            </div>
                                            <a href="{{ route('merchant.events.index') }}" class="btn btn-primary">Back to
                                                Events</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
