<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Suppliers</title>
    @include('utils/cdn')
    <link rel="stylesheet" href=" {{ asset('css/custom.css') }} ">
    @include('utils/favi')
</head>
<body>
    
    <div class="container-fluid cont-cont d-flex justify-content-center align-items-center align-items-stretch p-2">
        @include('utils/sidebar')

        <div class="container-fluid rounded bg-white" id="div3">
            <div class="container my-3">
                <h3 class="px-2 ">Add Suppliers</h3>
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
            <hr class="bg-dark p-0 m-0">
            {{-- <div class="container p-1 d-flex justify-content-around mt-2 p-2">
                <div class="col-3 text-center bg-custom rounded p-2 cp">
                    <a href="/addsupplier" class="alink">
                        <div class="d-flex align-items-center justify-content-center ">
                            <span class="material-symbols-outlined me-3">add</span>
                            <span>Add Supplier</span>
                        </div>
                    </a>
                </div>
                <div class="col-3 text-center bg-custom rounded p-2 cp">
                    <a href="/editsupplier" class="alink">
                        <div class="d-flex align-items-center justify-content-center ">
                            <span class="material-symbols-outlined me-3">edit</span>
                            <span>Edit Supplier</span>
                        </div>
                    </a>
                </div>
            </div> --}}
            <div class="container my-3">
                <h3 class="px-2 ">Add a New Supplier</h3>
            </div>
            <div class="container my-3 border d-flex justify-content-center ">
                <div class="col-6  ">
                    <form class="d-flex flex-column p-3 rounded " action="/addsupplier" method="POST">
                        @csrf
                        <div class="form-floating mb-2">
                            <input class="form-control mb-2 " type="text" id="Name" name="name" placeholder="Supplier Name"  oninput="validateInputText(this)" required>
                            <label for="Name">Supplier Name</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input class="form-control mb-2 " type="email" id="Email" name="email" placeholder="someone@anymail.com" required>
                            <label for="Email">Supplier Email</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input class="form-control mb-2 " type="text" id="Address" name="address" placeholder="address" required>
                            <label for="Address">Supplier Address</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input class="form-control mb-2 " type="text" id="Phone" name="phone" placeholder="Phone" oninput="validateInputNumber(this)" required>
                            <label for="Phone">Supplier Phone</label>
                        </div>
                        <button class="btn bg-custom shadow text-white fw-bold ">Confirm</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>