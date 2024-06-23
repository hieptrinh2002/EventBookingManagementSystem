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
                    <a class="nav-link click-scroll" href="/events">Events</a>
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
                <li>

                </li>
            </ul>

            @if (session('isDisplay'))
            <i class="fa-solid fa-user" href="{{ route('account.info') }}" style="color: #ffffff"></i>
            @else
            <a href="{{ route('auth.login') }}" class="nav-link btn custom-btn d-lg-block d-none">Login</a>
            @endif

        </div>
    </div>
    <script>
        @if(isset($accessToken))
        $.cookie('accessToken', JSON.stringify({
            {}
        }), {
            expires: 1,
            path: '/'
        });
        TokenData = JSON.parse($.cookie("Token"));
        @endif
    </script>
</nav>