<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Profile</title>
    @include('utils/cdn')
    <link rel="stylesheet" href=" {{ asset('css/custom.css') }} ">
    @include('utils/favi')
</head>
<body>
    
    <div class="container-fluid cont-cont d-flex justify-content-center align-items-center align-items-stretch p-2">
        @include('utils/sidebar')
        <div class="container-fluid rounded bg-white" id="div3">
            <div class="container my-3">
                <h3 class="px-2 ">Update Profile</h3>
            </div>
            <div class="container ">
                <div class="container d-flex justify-content-center align-items-center h-25 ">
                    <div class="rounded-circle pfp-img-cont-custom d-flex justify-content-center align-items-center align-self-center border">
                        <img src="{{ Auth::user()->image}}" class="pfp-img rounded-circle" alt="userimg">
                    </div>
                </div>
            </div>
            <div class="container ">
                <form class="d-flex flex-column p-3 rounded " action="/updateprofile" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-floating mb-3">
                        <input class="form-control mb-3 " type="text" id="Name" name="name" placeholder="Name" oninput="validateInputText(this)" value="{{Auth::user()->name}}" required >
                        <label for="Name">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control mb-3 " type="text" id="Phone" name="phone" placeholder="Phone" oninput="validateInputNumber(this)" value="{{Auth::user()->phone}}"  required>
                        <label for="Phone">Phone</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control mb-3 " type="file" id="Image" name="image" placeholder="Add Your Image">
                        <label for="Image">Image</label>
                    </div>
                    <button class="btn bg-custom shadow text-white fw-bold ">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>