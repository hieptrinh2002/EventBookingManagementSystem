<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            Festava Live
        </a>

        <a href="ticket.html" class="btn custom-btn d-lg-none ms-auto me-4">Buy Ticket</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_1">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_2">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="{{ route('events.index') }}">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_3">Artists</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_4">Schedule</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_5">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_6">Contact</a>
                </li>
            </ul>

            @if(isset($isDisplay))
                <a href="{{ route('account.info') }}" class="nav-link">
                    <i class="fa-solid fa-user" style="color: #ffffff"></i>
                </a>
            @else
                <a href="{{ route('auth.login') }}" class="nav-link btn custom-btn d-lg-block d-none">Login</a>
            @endif

        </div>
    </div>
</nav>
