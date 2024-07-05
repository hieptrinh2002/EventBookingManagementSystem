@extends("layouts.index")

@section('styles')
    <link href="{{ asset('app/css/account.css') }}" rel="stylesheet">
@endsection

@section("content")

    <section class="py-3 py-md-5 py-xl-8 my-5">
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div id="orderDetails" class="order_card">
                                <div class="d-flex flex-column align-items-center text-center">
                                    @isset($orderDetail)
                                        <div class='card-body'>
                                            <div class='profile-info'>
                                                <h5>Order Information</h5>
                                                <p><strong>OrderId:</strong> {{ htmlspecialchars($orderDetail['id']) }}</p>
                                                <p><strong>Event Name:</strong> {{ htmlspecialchars($orderDetail['eventName']) }}</p>
                                                <p><strong>Quantity:</strong> {{ htmlspecialchars($orderDetail['quantity']) }}</p>
                                                <p><strong>Price:</strong> {{ htmlspecialchars($orderDetail['price']) }}</p>
                                                <p><strong>Organization Location:</strong> {{ htmlspecialchars($orderDetail['eventAddress']) }}</p>
                                                <p><strong>Status:</strong> {{ htmlspecialchars($orderDetail['status']) }}</p>
                                                <a class='btn btn-primary' id='cancelButton' href='#'>Cancel</a>
                                            </div>
                                        </div>
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const cancelButton = document.getElementById('cancelButton');

                if (cancelButton) {
                    cancelButton.addEventListener('click', function(event) {
                        event.preventDefault();

                        const orderId = @json($orderDetail['id']);
                        const userId = @json($orderDetail['userId']);
                        const url = `http://localhost:8080/order/api/cancel-order`;

                        console.log('Cancelling order', { orderId, userId }); // Debug log

                        const options = {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({ orderId: orderId, userId: userId })
                        };

                        fetch(url, options)
                            .then(response => response.json())
                            .then(data => {
                                console.log('Response from API', data); // Debug log
                                if (data.status === 'SUCCESS') {
                                    location.reload();
                                } else {
                                    alert('Error cancelling order: ' + data.message);
                                }
                            })
                            .catch(error => {
                                console.error('Error cancelling order:', error);
                                alert('Error cancelling order: ' + error.message);
                            });
                    });
                }
            });
        </script>
    </section>
@endsection
