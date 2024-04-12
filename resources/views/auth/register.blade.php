<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    @include('utils/cdn')
    <link rel="stylesheet" href=" {{ asset('css/custom.css') }}">
    @include('utils/favi')
    
</head>
<body class="d-flex justify-content-center align-items-center">
    <div class="container-md">
        <div class="row d-flex justify-content-center align-items-center flex-column  ">
            <div class="col-6 d-flex justify-content-center align-items-center">
                <img src="{{ asset('images/brandip.png')}}" alt="brandlogo">
            </div>
            <div class="col-6 d-flex justify-content-center align-items-center mb-3 ">
                <h1>Create An Account</h1>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </div>
            @endif
            <div class="col-6" class="d-flex justify-content-center align-items-center">
                <form class="d-flex flex-column border-custom p-3 rounded" action="/register" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input class="form-control mb-3 " type="text" id="Name" name="name" placeholder="Name" oninput="validateInputText(this)" required>
                        <label for="Name">Name</label>
                        
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control mb-3 " type="email" id="email" name="email" placeholder="someone@anymail.com" required>
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="password" id="pass" name="password" placeholder="Password" required>
                        <label for="pass">Password</label>
                        <div id="passwordHelpBlock" class="form-text">
                            Your password must be 8-16 characters long, contain letters and numbers and special characters.
                        </div>
                    </div>
                    <button class="btn bg-custom shadow text-white fw-bold ">Register</button>
                </form>
                <p><a href="/loginview">Already Made An Account?</a></p>
            </div>
        </div>
    </div> 
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>