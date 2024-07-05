@extends("layouts.index")


@section('styles')
    <link href="{{asset("app/css/checkout.css")}}" rel="stylesheet">
@endsection

@section("content")
<section class="py-3 py-md-5 py-xl-8 my-5">

<div class="container">
        <div class="py-5 text-center">

            <h2>Checkout form</h2>
            <p class="lead">Please complete the form below to proceed with your purchase. All required fields must be filled out correctly to ensure a smooth transaction.</p>
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">

                <div class="card center-component">
                    <header>
                        <h3 class="align-content-between" style="margin: auto">Ticket information</h3>
                        <hr>
                        <div class="block">
                            <div class="group">
                                <h4>{{$event['title']}}</h4>
                            </div>
                        </div>
                    </header>
                    <main>
                        <div class="icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 20H18.5C20.9853 20 23 17.9853 23 15.5C23 13.0147 20.9853 11 18.5 11H18V10C18 6.68629 15.3137 4 12 4C8.68629 4 6 6.68629 6 10V11H5.5C3.01472 11 1 13.0147 1 15.5C1 17.9853 3.01472 20 5.5 20Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            </svg>
                        </div>
                        <div class="content">
                            <article>
                                <header>
                                    <h2>{{$event['title']}} <span>{{ number_format($event['price'], 0) }} {{ $event['currency'] }} / ticket</span></h2>
                                </header>
                                <main>
                                    <p>{{$event['description']}}</p>
                                </main>
                                <div>
                                    <div class="badge">
                                        Start date: {{$event['startDate']}}
                                    </div>
                                    <div class="badge">
                                        End date: {{$event['endDate']}}
                                    </div>
                                </div>
                            </article>
                            <hr>
                            <article>
                                <div class="subtotal">
                                    Quantity
                                    <span>
                            <input id="quantityInput" type="number" class="quantity-input" data-quantity-target="" value="1" step="1" min="1" max="5" name="quantity">
                        </span>
                                </div>
                            </article>
                            <article>
                                <div class="subtotal">
                                    Price
                                    <span id="price">{{ number_format($event['price'], 0) }} {{ $event['currency'] }}</span>
                                </div>
                            </article>
                            <article class="total">
                                <footer>
                                    Total billing
                                    <span id="result">
                            {{number_format($event['price'] * $quantityDisplay)}} {{$event['currency']}}
                        </span>
                                </footer>
                            </article>
                        </div>
                    </main>
                </div>

                <form class="card p-2" style="margin-top: 10px;">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">Redeem</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                <form class="needs-validation" novalidate method="post" action = "/checkout/{{$event['id']}}">
                    @csrf
                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted"></span></label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" value="">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="mb-3">
                        <input type="hidden" class="form-control" name="quantity" value="" id="quantity-checkout" placeholder="1234 Main St" required>
                    </div>

                    <div class="mb-3">
                        <input type="hidden" class="form-control" name="price" value="{{$event['price']}}" id="price" placeholder="1234 Main St" required>
                    </div>

                    <div class="mb-3">
                        <label for="address2">Phone Number </label>
                        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="enter your phone number">
                    </div>

                    <h4 class="mb-3">Payment</h4>

                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="momo" name="paymentMethod" type="radio" class="custom-control-input" value="MOMO" checked required>
                            <label class="custom-control-label" for="credit">MOMO</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="fundiin" name="paymentMethod" type="radio" class="custom-control-input" value="FUNDIIN" required>
                            <label class="custom-control-label" for="debit">FUNDIIN</label>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Payment</button>
                </form>
            </div>
        </div>

    </div>

</section>

<script>
    const quantityInput = document.getElementById('quantityInput');
    const price = document.getElementById('price');
    let quantityCheckout = document.getElementById('quantity-checkout');

    quantityInput.addEventListener('change', function() {
        const enteredValue = parseInt(this.value);

        if (isNaN(enteredValue) || enteredValue < 1 || enteredValue > 5) {
            alert("Please enter a valid quantity between 1 and 5.");
            this.value = 1; // Set back to default
            return; // Prevent further processing
        }

        const currentQuantity = enteredValue;  // Update currentQuantity

        // Update the quantity display element (optional)
        document.getElementById('quantityInput').textContent = currentQuantity;

        quantityCheckout = currentQuantity;

        const totalPrice = parseFloat(price.textContent.replace(/[^0-9.-]/g, '')) * currentQuantity;
        const formattedPrice = formatNumber(totalPrice); // Format with two decimal places

        // Update the result element with both formatted price and currency
        document.getElementById('result').textContent = formattedPrice + ' ' + '{{ $event['currency'] }}';
    });

    function formatNumber(number) {
        const parts = number.toFixed(0).split('.');
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ','); // Add commas for thousands
        return parts.join('.');
    }

    var button = document.getElementsByClassName("button");

    var addSelectClass = function(){
        removeSelectClass();
        this.classList.add('selected');
    }

    var removeSelectClass = function(){
        for (var i =0; i < button.length; i++) {
            button[i].classList.remove('selected')
        }
    }

    for (var i =0; i < button.length; i++) {
        button[i].addEventListener("click",addSelectClass);
    }

</script>

@endsection
