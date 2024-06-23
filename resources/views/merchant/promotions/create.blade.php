@extends('merchant.layouts.app')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body px-2 pb-2">
                <div class="container my-3">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card border-primary mb-3">
                                <div class="card-header bg-primary text-white fs-5 fw-bold">Create Promotion</div>
                                <div class="card-body px-5">
                                    <form class="px-3" method="post" action="{{ route('merchant.promotions.store') }}">
                                        @csrf
                                        @method('post')
                                        <input type="hidden" name="merchantId" value="{{ $merchantId }}">
                                        <div class="form-group mb-2">
                                            <div class="row d-flex justify-content-between mb-2">
                                                <div class="col-md-5">
                                                    <div class="form-group mb-2">
                                                        <label class="fw-bold" for="event-start-date">Start Date</label>
                                                        <input type="datetime-local" class="form-control"
                                                            id="event-start-date" name="dateStart"
                                                            value="{{ old('dateStart') }}">
                                                        @error('dateStart')
                                                            <span class="text-danger"> {{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group mb-2">
                                                        <label class="fw-bold" for="event-end-date">Date expire</label>
                                                        <input type="datetime-local" class="form-control" name="dateExpire"
                                                            id="event-end-date" value="{{ old('dateExpire') }}">
                                                        @error('dateExpire')
                                                            <span class="text-danger"> {{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <div class="input-group input-group-static mb-4">
                                                    <label class="fw-bold">Code</label>
                                                    <input type="text" value="{{ old('code') }}" name="code"
                                                        class="form-control">
                                                    @error('code')
                                                        <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group mb-2">
                                                <div class="input-group input-group-static mb-4">
                                                    <label class="fw-bold">Quantity available</label>
                                                    <input type="text" value="{{ old('quantityAvailable') }}"
                                                        name="quantityAvailable" class="form-control">
                                                    @error('quantityAvailable')
                                                        <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group mb-2">
                                                <div class="input-group input-group-static mb-4">
                                                    <label class="fw-bold">Condition (VND)</label>
                                                    <input type="number" value="{{ old('condition') }}" name="condition"
                                                        step="0.01" class="form-control">
                                                    @error('condition')
                                                        <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <div class="input-group input-group-static mb-4">
                                                    <label class="fw-bold">Discount (%) </label>
                                                    <input type="number" value="{{ old('discount') }}" name="discount"
                                                        step="0.01" class="form-control">
                                                    @error('discount')
                                                        <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Create promotion</button>
                                        </div>
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
