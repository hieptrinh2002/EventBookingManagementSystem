<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Merchant sign up
    </title>
    <link href="{{ asset('merchant/assets/css//nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('merchant/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('merchant/assets/css/material-dashboard.css?v=3.1.0') }}" rel="stylesheet" />
</head>

<body class="">
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center"
                                style="background-image: url('{{ asset('merchant//assets/img/illustrations/illustration-signup.jpg') }}'); background-size: cover;">
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                            <div class="card card-plain">
                                <div class="card-header pb-1">
                                    <h4 class="font-weight-bolder">Sign Up</h4>
                                    @if (session('message'))
                                        @php
                                            $alertType = session('alert-type', 'info'); // Mặc định là 'info' nếu không có 'alert-type'
                                        @endphp
                                        <div class="alert alert-{{ $alertType }} fs-5">
                                            {{ session('message') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body pt-0">
                                    <form method="post" action="{{ route('merchant.register') }}">
                                        @csrf
                                        @method('post')

                                        <div class="mb-3 input-group input-group-outline">
                                            <label for="merchant-name" class="fw-bold w-100">Merchant name</label>
                                            <input type="text" class="form-control" id="merchant-name" name="name"
                                                value="{{ old('name') }}" placeholder="Enter merchant name">
                                        </div>
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="mb-3 input-group input-group-outline">
                                            <label for="phone-number" class="fw-bold w-100">Phone number</label>
                                            <input type="text" class="form-control" id="phone-number" name="phone"
                                                value="{{ old('phone') }}" placeholder="Enter phone number">
                                        </div>
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="mb-3 input-group input-group-outline">
                                            <label for="email" class="fw-bold w-100">Email</label>
                                            <input type="text" class="form-control" id="email" name="email"
                                                value="{{ old('email') }}" placeholder="Enter email">
                                        </div>
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="mb-3 input-group input-group-outline">
                                            <label for="description" class="fw-bold w-100">Description</label>
                                            <input type="text" class="form-control" id="description"
                                                name="description" value="{{ old('description') }}"
                                                placeholder="Enter description">
                                        </div>
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="mb-3 input-group input-group-outline">
                                            <label for="website" class="fw-bold w-100">Your link website</label>
                                            <input type="text" class="form-control" id="website" name="linkWebsite"
                                                value="{{ old('linkWebsite') }}" placeholder="Enter your website link">
                                        </div>
                                        @error('linkWebsite')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="mb-3 input-group input-group-outline">
                                            <label for="address" class="fw-bold w-100">Address</label>
                                            <input type="text" class="form-control" id="address" name="address"
                                                value="{{ old('address') }}" placeholder="Enter address">
                                        </div>
                                        @error('address')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="mb-3 input-group input-group-outline">
                                            <label for="username" class="fw-bold w-100">Username</label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                value="{{ old('username') }}" placeholder="Enter username">
                                        </div>
                                        @error('username')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="mb-3 input-group input-group-outline">
                                            <label for="password" class="fw-bold w-100">Password</label>
                                            <input type="password" class="form-control" id="password"
                                                name="password" placeholder="Enter password">
                                        </div>
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="mb-2 form-check form-check-info text-start ps-0 mb-2">
                                            <input class="form-check-input" type="checkbox" id="flexCheckDefault"
                                                checked>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                I agree to the <a href="javascript:;"
                                                    class="text-dark font-weight-bolder">Terms and Conditions</a>
                                            </label>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">
                                                Sign Up
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-2 text-sm mx-auto">
                                        Already have an account?
                                        <a href="{{ route('merchant.pages.login') }}"
                                            class="text-primary text-gradient font-weight-bold">Sign in</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>
