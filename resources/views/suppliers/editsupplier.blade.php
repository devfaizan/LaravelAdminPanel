<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Supplier</title>
    @include('utils/cdn')
    <link rel="stylesheet" href=" {{ asset('css/custom.css') }} ">
    @include('utils/favi')
</head>
<body>
    
    <div class="container-fluid cont-cont d-flex justify-content-center align-items-center align-items-stretch p-2">
        @include('utils/sidebar')

        <div class="container-fluid rounded bg-white" id="div3">
            <div class="container my-3">
                <h3 class="px-2 ">Edit {{$supplier->supplier_name}}</h3>
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
            <div class="container my-3 border d-flex justify-content-center ">
                <div class="col-6  ">
                    <form class="d-flex flex-column p-3 rounded " action="{{ route('updatesupplier', ['id' => $supplier->supplier_id]) }}" method="POST">
                        @csrf
                        <div class="form-floating mb-2">
                            <input class="form-control mb-2 " type="text" id="Name" name="name" placeholder="Supplier Name" value="{{ $supplier->supplier_name }}" oninput="validateInputText(this)">
                            <label for="Name">Supplier Name</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input class="form-control mb-2 " type="email" id="Email" name="email" placeholder="someone@anymail.com" value="{{ $supplier->supplier_email }}" disabled >
                            <label for="Email">Supplier Email</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input class="form-control mb-2 " type="text" id="Address" name="address" placeholder="address" value="{{ $supplier->supplier_address }}" >
                            <label for="Address">Supplier Address</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input class="form-control mb-2 " type="text" id="Phone" name="phone" placeholder="Phone" value="{{ $supplier->supplier_phone }}" oninput="validateInputNumber(this)">
                            <label for="Phone">Supplier Phone</label>
                        </div>
                        <button class="btn bg-custom shadow text-white fw-bold ">Update</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>