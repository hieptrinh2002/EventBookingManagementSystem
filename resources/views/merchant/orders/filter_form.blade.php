<form action="" method="GET" class="mb-3">
    <div class="row mb-3">
        <div class="col-md-3">
            <label for="quantity_from" class="form-label fw-bold">Quantity From:</label>
            <input type="number" id="quantity_from" name="quantity_from" class="w-100 p-2"
                style=" display: block;
                        border: 1px solid #ced4da;
                        border-radius: 0.25rem;"
                value="{{ request()->get('quantity_from') }}">
        </div>
        <div class="col-md-3">
            <label for="quantity_to" class="form-label fw-bold">Quantity To:</label>
            <input type="number" id="quantity_to" name="quantity_to" class="w-100 p-2"
                style=" display: block;
                        border: 1px solid #ced4da;
                        border-radius: 0.25rem;"
                value="{{ request()->get('quantity_to') }}">
        </div>

        <div class="col-md-3">
            <label for="payment_method" class="form-label fw-bold">Payment Method:</label>
            <select id="payment_method" name="payment_method" class="form-select px-3">
                <option value="0">--Select--</option>
                <option value="0" {{ request()->get('payment_method') == '0' ? 'selected' : '' }}>
                    MOMO</option>
                <option value="1" {{ request()->get('payment_method') == '1' ? 'selected' : '' }}>
                    COD</option>
                <option value="2" {{ request()->get('payment_method') == '2' ? 'selected' : '' }}>
                    FUNDIIN</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="status" class="form-label fw-bold">Status:</label>
            <select id="status" name="status" class="form-select px-3">
                <option value="">--Select--</option>
                <option value="0" {{ request()->get('status') == '0' ? 'selected' : '' }}>
                    CREATED</option>
                <option value="1" {{ request()->get('status') == '1' ? 'selected' : '' }}>
                    PENDING
                </option>
                <option value="2" {{ request()->get('status') == '2' ? 'selected' : '' }}>
                    SUCCESS
                </option>
                <option value="3" {{ request()->get('status') == '3' ? 'selected' : '' }}>
                    FAILED
                </option>
                <option value="4" {{ request()->get('status') == '4' ? 'selected' : '' }}>
                    CANCELED
                </option>
            </select>
        </div>
        <div class="row mb-3">
            <div class="col-md-3">
                <label for="amount_from" class="form-label fw-bold">Amount From:</label>
                <input type="number" id="amount_from" name="amount_from" class="w-100 p-2"
                    style=" display: block;
                        border: 1px solid #ced4da;
                        border-radius: 0.25rem;"
                    value="{{ request()->get('amount_from') }}">
            </div>
            <div class="col-md-3">
                <label for="amount_to" class="form-label fw-bold">Amount To:</label>
                <input type="number" id="amount_to" name="amount_to" class="w-100 p-2"
                    style=" display: block;
                        border: 1px solid #ced4da;
                        border-radius: 0.25rem;"
                    value="{{ request()->get('amount_to') }}">
            </div>
            <div class="col-md-3 mt-4 pt-2 px-5">
            </div>
            <div class="col-md-3 mt-4 pt-2 px-5">
                <button type="submit" class="btn btn-primary me-4">Search</button>
                <a href="{{ route('events.orders.index', $eventId) }}" class="btn btn-success">
                    Refresh
                </a>
            </div>
        </div>
    </div>

</form>
