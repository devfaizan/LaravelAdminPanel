<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Supplier Payment </title>
    @include('utils/cdn')
    <link rel="stylesheet" href=" {{ asset('css/custom.css') }} ">
    @include('utils/favi')
</head>
<body>
    
    <div class="container-fluid cont-cont d-flex justify-content-center align-items-center align-items-stretch p-2">
        @include('utils/sidebar')

        <div class="container-fluid rounded bg-white" id="div3">
            <div class="container my-3">
                <h3 class="px-2 ">Edit {{$supplierpayments->payment_id}}</h3>
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
                    <form class="d-flex flex-column p-3 rounded " action="{{ route('updatesupplierpayment', ['id' => $supplierpayments->payment_id]) }}" method="POST">
                        @csrf
                        <div class="form-floating mb-2">
                            <input class="form-control mb-2 " type="date" id="Pdate" name="pdate" value="{{$supplierpayments->payment_date}}"
                                placeholder="Payment Date" required>
                            <label for="Name">Payment Date</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input class="form-control mb-2 " type="text" id="Amount" name="amount" placeholder="Payment Amount" value="{{$supplierpayments->payment_amount}}"
                                oninput="validateInputNumber(this)" required>
                            <label for="Phone">Payment Amount</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input class="form-control mb-2 " type="text" id="Sign" name="sign" value="{{$supplierpayments->signedby}}"
                                placeholder="Signed By" required>
                            <label for="Sign">Received By</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input class="form-control mb-2 " type="text" id="Supplier" name="supplier" value="{{$supplierpayments->supplier_id}}"
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