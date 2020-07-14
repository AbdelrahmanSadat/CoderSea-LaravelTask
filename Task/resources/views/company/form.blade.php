<!doctype html>
<html>

<head>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <form method='POST' action="{{$action}}" enctype="multipart/form-data">
        @method($method??'POST')
        <div class="container">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{$name??''}}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{$email??''}}">
            </div>
            <div class="col-md-6">
                <label for="logo">Logo (100x100 minimum)</label>
                <input type="file" id="logo" name="logo" class="form-control">
            </div>
            @error('logo')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</body>

</html>