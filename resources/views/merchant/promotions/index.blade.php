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
            <h3 class="text-capitalize pt-3 px-4 col-3">Promotions table</h3>
            <a class="btn bg-gradient-primary col-2 mt-3" href="{{ route('merchant.promotions.create') }}" type="button">
                Create new</a>
        </div>
        <div class="card">
            <div class="card-body px-2 pb-2">
                @if (isset($promotions))
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
                                        Condition (VND)
                                    </th>
                                    <th class="text-secondary">Discount (%)</th>
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
                                            @elseif (strtotime($promotion['dateStart']) > strtotime(now()))
                                                <span class="badge badge-sm bg-gradient-warning">Not yet start</span>
                                            @else
                                                <span class="badge badge-sm bg-gradient-success">Active</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-link text-dark px-3 mb-0"
                                                href="{{ route('merchant.promotions.show', $promotion['id']) }}">
                                                <i
                                                    class="material-icons
                                            fs-4 me-2">edit</i>View
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
