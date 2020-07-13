<!doctype html>
<html>

<head>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <form method='POST' action="{{$action}}">
        @method($method??'POST')
        <div class="container">
            @csrf
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" name="firstName" class="form-control" id="firstName" value="{{$firstName??''}}">
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" name="lastName" class="form-control" id="lastName" value="{{$lastName??''}}">
            </div>
            <div class="form-group">
                <label for="name">Email</label>
                <input type="email" name="email" class="form-control" id="name" value="{{$email??''}}">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" name="phone" class="form-control" id="phone" value="{{$phone??''}}">
            </div>
            <div class="form-group">
                <label for="companyName">Company Name</label>
                <input type="text" name="companyName" class="form-control" id="companyName" value="{{$companyName??''}}">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</body>

</html>