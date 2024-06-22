<form action="" method="GET">
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label class="fw-bold" for="price_from">Price From:</label>
                <input
                    style=" display: block;
                        border: 1px solid #ced4da;
                        border-radius: 0.25rem;"
                    type="number" id="price_from" name="price_from" class="form-control px-2"
                    value="{{ request('price_from') }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label class="fw-bold" for="price_to">Price To:</label>
                <input
                    style=" display: block;
                        border: 1px solid #ced4da;
                        border-radius: 0.25rem;"
                    type="number" id="price_to" name="price_to" class="form-control px-2"
                    value="{{ request('price_to') }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label class="fw-bold" for="stock">Min stock:</label>
                <input
                    style=" display: block;
                        border: 1px solid #ced4da;
                        border-radius: 0.25rem;"
                    type="number" id="stock" name="stock" class="form-control px-2"
                    value="{{ request('stock') }}">
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label class="fw-bold" for="min_quantity">Min Quantity:</label>
                <input
                    style=" display: block;
                        border: 1px solid #ced4da;
                        border-radius: 0.25rem;"
                    type="number" id="min_quantity" name="min_quantity" class="form-control px-2"
                    value="{{ request('min_quantity') }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label class="fw-bold" for="max_quantity">Max Quantity:</label>
                <input
                    style=" display: block;
                        border: 1px solid #ced4da;
                        border-radius: 0.25rem;"
                    type="number" id="max_quantity" name="max_quantity" class="form-control px-2"
                    value="{{ request('max_quantity') }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label class="fw-bold" for="location">Location:</label>
                <input
                    style=" display: block;
                        border: 1px solid #ced4da;
                        border-radius: 0.25rem;"
                    type="text" id="location" name="location" class="form-control px-2"
                    value="{{ request('location') }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label class="fw-bold" for="start_date">Start Date:</label>
                <input
                    style=" display: block;
                        border: 1px solid #ced4da;
                        border-radius: 0.25rem;"
                    type="date" id="start_date" name="start_date" class="form-control px-2"
                    value="{{ request('start_date') }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label class="fw-bold" for="end_date">End Date:</label>
                <input
                    style=" display: block;
                        border: 1px solid #ced4da;
                        border-radius: 0.25rem;"
                    type="date" id="end_date" name="end_date" class="form-control px-2"
                    value="{{ request('end_date') }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label class="fw-bold" for="status">Status:</label>
                <select id="status" name="status" class="form-select">
                    <option value="">--Select--</option>
                    <option value="NOT_YET_STARTED" {{ request('status') == 'NOT_YET_STARTED' ? 'selected' : '' }}>
                        NOT_YET_STARTED</option>
                    <option value="HAPPENING" {{ request('status') == 'HAPPENING' ? 'selected' : '' }}>HAPPENING
                    </option>
                    <option value="ENDED" {{ request('status') == 'ENDED' ? 'selected' : '' }}>ENDED</option>
                </select>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label class="fw-bold" for="type">Type:</label>
                <select id="type" name="type" class="form-select">
                    <option value="">--Select--</option>
                    <option value="TALK_SHOW" {{ request('type') == 'TALK_SHOW' ? 'selected' : '' }}>TALK_SHOW
                    </option>
                    <option value="CONFERENCE" {{ request('type') == 'CONFERENCE' ? 'selected' : '' }}>CONFERENCE
                    </option>
                    <option value="SEMINAR" {{ request('type') == 'SEMINAR' ? 'selected' : '' }}>SEMINAR</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mt-5">
                <input style="border: 1px solid #ced4da;
                        border-radius: 0.25rem;"
                    type="checkbox" id="is_out_of_stock" name="is_out_of_stock"
                    {{ request('is_out_of_stock') ? 'checked' : '' }}>
                <label class="fw-bold" for="is_out_of_stock">Is Out of Stock:</label>

            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <button type="submit" class="btn btn-primary mt-4">Search</button>
                <a href="{{ route('merchant.events.index') }}" class="btn btn-secondary mt-4 ms-3">Refresh</a>
            </div>
        </div>
    </div>
</form>
