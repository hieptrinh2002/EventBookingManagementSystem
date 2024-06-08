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
                                    <form class="px-3">
                                        <div class="form-group mb-2">
                                            <div class="row d-flex justify-content-between mb-2">
                                                <div class="col-md-5">
                                                    <div class="form-group mb-2">
                                                        <label class="fw-bold" for="event-start-date">Start Date</label>
                                                        <input required type="datetime-local" class="form-control"
                                                            id="event-start-date" name="startDate">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group mb-2">
                                                        <label class="fw-bold" for="event-end-date" name="dateExpire">
                                                            Date expire
                                                        </label>
                                                        <input required type="datetime-local" class="form-control"
                                                            id="event-end-date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <div class="input-group input-group-static mb-4">
                                                    <label class="fw-bold">Code</label>
                                                    <input required type="text" value="" name="code"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <div class="input-group input-group-static mb-4">
                                                    <label class="fw-bold">Condition</label>
                                                    <input required type="number" value="" name="condition"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <div class="input-group input-group-static mb-4">
                                                    <label class="fw-bold">Discount </label>
                                                    <input required type="number" value="" name="discount "
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Create promotion</button>
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
