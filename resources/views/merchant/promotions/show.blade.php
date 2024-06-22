@extends('merchant.layouts.app')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body px-2 pb-2">
                <div class="container my-3">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card border-primary mb-3">
                                <div class="card-header bg-primary text-white fs-5 fw-bold">Show promotion</div>
                                <div class="card-body px-5">
                                    <form class="px-3" method="post"
                                        action="{{ route('merchant.promotions.update', $promotion['id']) }}">
                                        @csrf
                                        @method('put')
                                        <input disabled type="hidden" name="merchantId"
                                            value="{{ $promotion['merchantId'] }}">

                                        <div class="form-group mb-2">
                                            <div class="row d-flex justify-content-between mb-2">
                                                <div class="col-md-5">
                                                    <div class="form-group mb-2">
                                                        <label class="fw-bold" for="promotion-start-date">Start Date</label>
                                                        <input disabled type="datetime-local" class="form-control"
                                                            id="promotion-start-date" name="dateStart"
                                                            value="{{ old('dateStart') ?? $promotion['dateStart'] }}">
                                                        @error('dateStart')
                                                            <span class="text-danger"> {{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group mb-2">
                                                        <label class="fw-bold" for="promotion-end-date">
                                                            Date expire
                                                        </label>
                                                        <input disabled type="datetime-local" class="form-control"
                                                            name="dateExpire" id="promotion-end-date"
                                                            value="{{ old('dateExpire') ?? $promotion['dateExpire'] }}">
                                                        @error('dateExpire')
                                                            <span class="text-danger"> {{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <div class="input-group input-group-static mb-4">
                                                    <label class="fw-bold">Code</label>
                                                    <input disabled type="text" name="code" class="form-control"
                                                        value="{{ old('code') ?? $promotion['code'] }}">
                                                    @error('code')
                                                        <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <div class="input-group input-group-static mb-4">
                                                    <label class="fw-bold">Condition</label>
                                                    <input disabled type="number" name="condition" step="0.01"
                                                        class="form-control"
                                                        value="{{ old('condition') ?? $promotion['condition'] }}">
                                                    @error('condition')
                                                        <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <div class="input-group input-group-static mb-4">
                                                    <label class="fw-bold">Quantity Available</label>
                                                    <input disabled type="number" name="quantityAvailable"
                                                        class="form-control"
                                                        value="{{ old('quantityAvailable') ?? $promotion['quantityAvailable'] }}">
                                                    @error('quantityAvailable')
                                                        <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <div class="input-group input-group-static mb-4">
                                                    <label class="fw-bold">Discount (%)</label>
                                                    <input disabled type="number" name="discount" step="0.01"
                                                        class="form-control"
                                                        value="{{ old('discount') ?? $promotion['discount'] }}">

                                                    @error('discount')
                                                        <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
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
