@extends("layouts.index")

@section("content")
<section class="py-3 py-md-5 py-xl-8 my-5">
    <div class="container mt-5">
        @if ($event)
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $event['title'] }}</h1>
                <p class="text-muted">{{ $event['description'] }}</p>
                <div class="media my-4">
                    <img src="https://img.evbuc.com/https%3A%2F%2Fcdn.evbuc.com%2Fimages%2F754099869%2F1316595019433%2F1%2Foriginal.20240428-034919?w=940&auto=format%2Ccompress&q=75&sharp=10&s=5b5b595209bbc9e0b7c52021529464f1" class="mr-3" alt="Shichida Vietnam">
                </div>
                <div class="mb-3">
                    <h5>Date and time</h5>
                    <p><i class="far fa-calendar-alt"></i> {{ $event['startDate'] }}</p>
                </div>
                <div class="mb-3">
                    <h5>Location</h5>
                    <p><i class="fas fa-map-marker-alt"></i> {{ $event['location'] }}</p>
                </div>
                <div class="mb-3">
                    <h5>Refund Policy</h5>
                    <p>Contact the organizer to request a refund. Festava Live's fee is nonrefundable.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Only participate when there's a confirmation</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{$event['currency']}} {{$event['price']}}</h6>
                        <form action="{{ route('checkout.process', ['eventId' => $event['id']]) }}" method="GET">
                            <div class="form-group">
                                <label for="ticketQuantity">Ticket amount</label>
                                <input type="number" class="form-control" id="ticketQuantity" value="1" min="1">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" id="checkoutButton">Check out</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @else
        <p>No event found.</p>
        @endif
    </div>
</section>


@endsection