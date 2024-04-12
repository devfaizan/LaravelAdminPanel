<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Stock</title>
    @include('utils/cdn')
    <link rel="stylesheet" href=" {{ asset('css/custom.css') }} ">
    @include('utils/favi')
</head>
<body>
    
    <div class="container-fluid cont-cont d-flex justify-content-center align-items-center align-items-stretch p-2">
        @include('utils/sidebar')

        <div class="container-fluid rounded bg-white" id="div3">
            <div class="container my-3">
                <h3 class="px-2 ">Edit {{$stocks->stock_id}}</h3>
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
                    <form class="d-flex flex-column p-3 rounded " action="{{ route('updatestock', ['id' => $stocks->stock_id]) }}" method="POST">
                        @csrf
                        <div class="form-floating mb-2">
                            <input class="form-control mb-2 " type="date" id="Pdate" name="pdate" value="{{ $stocks->purchase_date }}"
                                placeholder="Purchase Date" required>
                            <label for="Name">Purchase Date</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input class="form-control mb-2 " type="date" id="Edate" name="edate" value="{{ $stocks->expire_date }}"
                                placeholder="Expire Date" required>
                            <label for="Email">Expire Date</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input class="form-control mb-2 " type="text" id="Quantity" name="quantity" value="{{ $stocks->quantity }}"
                                placeholder="Quantity" oninput="validateInputNumber(this)" required>
                            <label for="Address">Quantity</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input class="form-control mb-2 " type="text" id="Cprice" name="cprice" value="{{ $stocks->cost_price }}"
                                placeholder="Cost Price" oninput="validateInputNumber(this)" required>
                            <label for="Phone">Cost Price</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input class="form-control mb-2 " type="text" id="Supplier" name="supplier" value="{{ $stocks->supplier_id }}"
                                placeholder="Supplier" oninput="validateInputNumber(this)" required>
                            <label for="Phone">Supplier ID</label>
                            <div id="supplierHelpBlock" class="form-text">
                                Check Supplier ID Carefully in <a href="/suppliers">Supplier Section</a>. 
                            </div>
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