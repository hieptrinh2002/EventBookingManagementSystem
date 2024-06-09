@extends('merchant.layouts.app')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body px-2 pb-2">
                <div class="container my-3">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card border-primary mb-3">
                                <div class="card-header bg-primary text-white">Create Event</div>
                                <div class="card-body px-5">
                                    <form class="px-3" method="post" action="{{ route('merchant.events.store') }}">
                                        @csrf
                                        @method('post')
                                        <input type="hidden" name="merchantId" value="{{ $merchantId }}">
                                        <div class="form-group mb-2">
                                            <label class="fw-bold" for="event-title">Event Title</label>
                                            <input type="text" class="form-control" id="event-title"
                                                placeholder="Enter event title" name="title">
                                            @error('title')
                                                <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="fw-bold" for="event-description">Event Description</label>
                                            <textarea class="form-control" id="event-description" rows="2" placeholder="Enter event description..."
                                                name="description"></textarea>
                                            @error('description')
                                                <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="fw-bold" for="event-location">Event Location</label>
                                            <input type="text" class="form-control" id="event-location"
                                                placeholder="Enter event location" name="location">
                                            @error('location')
                                                <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="row d-flex justify-content-between">
                                            <div class="col-md-5">
                                                <div class="form-group mb-2">
                                                    <label class="fw-bold" for="event-start-date">Start Date</label>
                                                    <input type="datetime-local" class="form-control" id="event-start-date"
                                                        name="startDate">
                                                    @error('startDate')
                                                        <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group mb-2">
                                                    <label class="fw-bold" for="event-end-date">
                                                        End Date</label>
                                                    <input type="datetime-local" class="form-control" id="event-end-date"
                                                        name="endDate">
                                                    @error('endDate')
                                                        <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row d-flex justify-content-between">
                                            <div class="col-md-5">
                                                <div class="form-group mb-2">
                                                    <label class="fw-bold" for="event-type">Event Type</label>
                                                    <input type="text" class="form-control" id="event-type"
                                                        placeholder="Enter event type" name="type">
                                                    @error('type')
                                                        <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group mb-2">
                                                    <label class="fw-bold" for="event-status">Event Status</label>
                                                    <input type="text" class="form-control" id="event-status"
                                                        placeholder="Enter event status" name="status">
                                                    @error('status')
                                                        <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row d-flex justify-content-between">
                                            <div class="col-md-5">
                                                <div class="form-group mb-2">
                                                    <label class="fw-bold" for="event-min-quantity">Minimum Quantity</label>
                                                    <input type="number" class="form-control" id="event-min-quantity"
                                                        placeholder="Enter minimum quantity" name="minQuantity">
                                                    @error('minQuantity')
                                                        <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group mb-2">
                                                    <label class="fw-bold" for="event-max-quantity">Maximum Quantity</label>
                                                    <input type="number" class="form-control" id="event-max-quantity"
                                                        placeholder="Enter maximum quantity" name="maxQuantity">
                                                    @error('maxQuantity')
                                                        <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row d-flex justify-content-between">
                                            <div class="col-md-5">
                                                <div class="form-group mb-2">
                                                    <label class="fw-bold" for="event-price">Price</label>
                                                    <input type="number" class="form-control" id="event-price"
                                                        placeholder="Enter price" name="price">
                                                    @error('price')
                                                        <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-5 mb-2">
                                                <div class="form-group mb-2">
                                                    <label class="fw-bold" for="event-currency">Currency</label>
                                                    <input type="text" class="form-control" id="event-currency"
                                                        placeholder="Enter currency" value="" name="currency">
                                                    @error('currency')
                                                        <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Create Event</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
