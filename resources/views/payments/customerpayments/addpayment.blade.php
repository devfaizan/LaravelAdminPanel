<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Customer Payment</title>
    @include('utils/cdn')
    <link rel="stylesheet" href=" {{ asset('css/custom.css') }} ">
    @include('utils/favi')
</head>

<body>

    <div class="container-fluid cont-cont d-flex justify-content-center align-items-center align-items-stretch p-2">
        @include('utils/sidebar')

        <div class="container-fluid rounded bg-white" id="div3">
            <div class="container my-3">
                <h3 class="px-2 ">Add Customer Payment</h3>
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
                <h3 class="px-2 ">Add a New Customer Payment</h3>
            </div>
            <div class="container my-3 border d-flex justify-content-center ">
                <div class="col-6  ">
                    <form class="d-flex flex-column p-3 rounded " action="/addcustomerpayment" method="POST">
                        @csrf
                        <div class="form-floating mb-2">
                            <input class="form-control mb-2 " type="date" id="Pdate" name="pdate"
                                placeholder="Payment Date" required>
                            <label for="Name">Payment Date</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input class="form-control mb-2 " type="text" id="Amount" name="amount" placeholder="Payment Amount"
                                oninput="validateInputNumber(this)" required>
                            <label for="Phone">Payment Amount</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input class="form-control mb-2 " type="text" id="Sign" name="sign"
                                placeholder="Signed By" required>
                            <label for="Sign">Received By</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input class="form-control mb-2 " type="text" id="Customer" name="customer"
                                placeholder="Customer ID" oninput="validateInputNumber(this)" required>
                            <label for="Customer">Customer ID</label>
                            <div id="customerHelpBlock" class="form-text">
                                Check Customer ID Carefully. 
                            </div>
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