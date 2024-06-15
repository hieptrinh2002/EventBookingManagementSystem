@extends('merchant.layouts.app')
@section('content')
    <div class="col-12">
        <div class="row">
            <h3 class="text-capitalize pt-3 px-4 col-3">Promotions table</h3>
            <a class="btn bg-gradient-primary col-2 mt-3" href="{{ route('merchant.promotions.create') }}" type="button">
                Create new</a>
        </div>
        <div class="card">
            <div class="card-body px-2 pb-2">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0 px-2">
                        <thead class="bg-light">
                            <tr class="text-center">
                                <th class="text-secondary">STT</th>
                                <th class="text-secondary">Code</th>
                                <th class="text-secondary">
                                    Start date
                                </th>
                                <th class="text-secondary">
                                    Date expire
                                </th>
                                <th class="text-secondary">
                                    Condition
                                </th>
                                <th class="text-secondary">Discount</th>
                                <th class="text-secondary">Status</th>

                                <th class="text-secondary"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($promotions as $key => $promotion)
                                <tr class="py-2">
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td class="text-center">
                                        {{ $promotion['code'] }}
                                    </td>
                                    <td class="text-center">
                                        {{ \Carbon\Carbon::parse($promotion['dateStart'])->format('d/m/Y H:i:s') }}</td>
                                    <td class="align-middle text-center">
                                        {{ \Carbon\Carbon::parse($promotion['dateExpire'])->format('d/m/Y H:i:s') }}
                                    </td>
                                    <td class="align-middle text-center"> {{ $promotion['condition'] }} </td>
                                    <td class="align-middle text-center"> {{ $promotion['discount'] }} %</td>
                                    <td>
                                        @if (strtotime($promotion['dateExpire']) < strtotime(now()))
                                            <span class="badge badge-sm bg-gradient-danger">Expired</span>
                                        @else
                                            <span class="badge badge-sm bg-gradient-success">Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;">
                                            <i class="material-icons fs-4 me-2">delete</i>
                                        </a>
                                        <a class="btn btn-link text-dark px-3 mb-0"
                                            href="{{ route('merchant.promotions.edit', $promotion['id']) }}">
                                            <i
                                                class="material-icons
                                            fs-4 me-2">edit</i>Edit
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
