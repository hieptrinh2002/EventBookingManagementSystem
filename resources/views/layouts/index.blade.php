<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Festava Live</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">

    <link href="{{asset("app/css/bootstrap.min.css")}}" rel="stylesheet">

    <link href="{{asset("app/css/bootstrap-icons.css")}}" rel="stylesheet">

    <link href="{{asset("app/css/templatemo-festava-live.css")}}" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/blogs/blog-4/assets/css/blog-4.css">

</head>

<body>
    <main>
        @include("layouts/navbar")

        @yield("content")

        @include("layouts/footer")
    </main>

    <!-- JAVASCRIPT FILES -->
    <script src="{{asset("app/js/jquery.min.js")}}"></script>
    <script src="{{asset("app/js/bootstrap.min.js")}}"></script>
    <script src="{{asset("app/js/jquery.sticky.js")}}"></script>
    <script src="{{asset("app/js/click-scroll.js")}}"></script>
    <script src="{{asset("app/js/custom.js")}}"></script>
</body>

</html>