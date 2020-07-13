<!doctype html>
<html>

<head>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <form method={{$method}} action={{$action}}>
        <div class="container">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="form-group">
                <label for="name">Email</label>
                <input type="name" name="email" class="form-control" id="name">
            </div>
            <!-- TODO: LOGO -->
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</body>

</html>