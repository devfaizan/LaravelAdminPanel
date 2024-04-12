<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    @include('utils/cdn')
    <link rel="stylesheet" href=" {{ asset('css/custom.css') }} ">
    @include('utils/favi')
</head>
<body>
    
    <div class="container-fluid cont-cont d-flex justify-content-center align-items-center align-items-stretch p-2">
        @include('utils/sidebar')
        <div class="container-fluid rounded bg-white" id="div3">
            <div class="container my-3">
                <h3 class="px-2 ">Payments</h3>
            </div>
            <div class="container ">
                <div class="container mb-2">
                    <h4 class="px-2 ">Supplier Payment</h4>
                    <hr class="bg-dark p-0 m-0">
                </div>
                <div class="container d-flex justify-content-center align-items-center h-25 ">
                    <div class="w-50 h-50 rounded d-flex flex-column justify-content-center align-content-center px-3 shadow">
                        <a href="/supplierpayment" type="button" class="btn btn-primary" >
                            Supplier Payment
                        </a>
                    </div>
                    <div class="w-50 h-50 rounded d-flex flex-column justify-content-center align-content-center px-3 shadow">
                        <a href="/customerpayment" type="button" class="btn btn-primary" >
                            Customer Payment
                        </a>
                    </div>
                    {{-- <div class="w-50 h-75 mx-2 rounded d-flex flex-column justify-content-center align-content-center px-3 shadow">
                        <div class="fw-bold" >numbers</div>
                        <span class="fw-light">Pending Orders</span>
                    </div> --}}
                </div>
            </div>
            {{-- <div class="container ">
                <div class="container mb-2">
                    <h4 class="px-2 ">Inventory</h4>
                    <hr class="bg-dark p-0 m-0">
                </div>
                <div class="container d-flex justify-content-center align-items-center h-25 ">
                    <div class="w-50 h-75 rounded d-flex flex-column justify-content-center align-content-center px-3 shadow">
                        <div class="fw-bold">numbers</div>
                        <span class="fw-light">Left in Stock</span>
                    </div>
                    <div class="w-50 h-75 mx-2 rounded d-flex flex-column justify-content-center align-content-center px-3 shadow">
                        <div class="fw-bold" >numbers</div>
                        <span class="fw-light">Added this month</span>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>