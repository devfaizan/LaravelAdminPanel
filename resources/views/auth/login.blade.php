<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('utils/cdn')
    <title>Login</title>
    <style>
        
        .border-custom{
            border: 1px solid;
            border-color: #2E3192; !important
        }
        .bg-custom{
            background: linear-gradient(120deg,#5d61ac,#7a7cbf); !important
        }
    </style>
    @include('utils/favi')
</head>
<body class="d-flex justify-content-center align-items-center">
        <div class="container-md">
            <div class="row d-flex justify-content-center align-items-center flex-column  ">
                <div class="col-6 d-flex justify-content-center align-items-center">
                    <img src="{{ asset('images/brandip.png')}}" alt="">
                </div>
                <div class="col-6 d-flex justify-content-center align-items-center mb-3 ">
                    <h1>Login</h1>
                </div>
                @if ($errors->has('loginError'))
                    <div class="alert alert-danger">
                        {{ $errors->first('loginError') }}
                    </div>
                @endif
                <div class="col-6" class="d-flex justify-content-center align-items-center">
                    <form class="d-flex flex-column border-custom p-3 rounded " action="/login" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control mb-3 " type="email" id="email" name="email" placeholder="someone@anymail.com" required>
                            <label for="email">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" type="password" id="pass" name="password" placeholder="Password" required>
                            <label for="pass">Password</label>
                        </div>
                        <button class="btn bg-custom shadow text-white fw-bold ">Login</button>
                    </form>
                    <span><a href="/registerview">Need to make an Account?</a></span>
                    @for ($i = 0; $i < 23; $i++)
                        &nbsp;
                    @endfor
                    <span><a href="/reset">Reset Your Password</a></span>
                </div>
            </div>
            
        </div>
    
</body>
</html>