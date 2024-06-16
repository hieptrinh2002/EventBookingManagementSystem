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
            <select id="payment_method" name="payment_method" class="form-select">
                <option value="">--Select--</option>
                <option value="MOMO" {{ request()->get('payment_method') == 'MOMO' ? 'selected' : '' }}>
                    MOMO</option>
                <option value="COD" {{ request()->get('payment_method') == 'COD' ? 'selected' : '' }}>
                    COD</option>
                <option value="FUNDIIN" {{ request()->get('payment_method') == 'FUNDIIN' ? 'selected' : '' }}>
                    FUNDIIN</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="status" class="form-label fw-bold">Status:</label>
            <select id="status" name="status" class="form-select">
                <option value="">--Select--</option>
                <option value="CREATED" {{ request()->get('status') == 'CREATED' ? 'selected' : '' }}>
                    CREATED</option>
                <option value="PENDING" {{ request()->get('status') == 'PENDING' ? 'selected' : '' }}>
                    PENDING
                </option>
                <option value="SUCCESS" {{ request()->get('status') == 'SUCCESS' ? 'selected' : '' }}>
                    SUCCESS
                </option>
                <option value="FAILED" {{ request()->get('status') == 'FAILED' ? 'selected' : '' }}>
                    FAILED
                </option>
                <option value="CANCELED" {{ request()->get('status') == 'CANCELED' ? 'selected' : '' }}>
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
