<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Suppliers Payments</title>
    @include('utils/cdn')
    <link rel="stylesheet" href=" {{ asset('css/custom.css') }} ">
    @include('utils/favi')
</head>
<body>
    
    <div class="container-fluid cont-cont d-flex justify-content-center align-items-center align-items-stretch p-2">
        @include('utils/sidebar')

        <div class="container-fluid rounded bg-white" id="div3">
            <div class="container my-3">
                <h3 class="px-2 ">Suppliers Payments</h3>
            </div>
            <hr class="bg-dark p-0 m-0">
            <div class="container p-1 d-flex justify-content-around mt-4 mb-4 p-2">
                <div class="col-3 text-center bg-custom rounded p-2 cp">
                    <a href="/addsupplierpayment" class="alink">
                        <div class="d-flex align-items-center justify-content-center ">
                            <span class="material-symbols-outlined me-3">add</span>
                            <span>Add Supplier Payment</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="container my-3">
                <h3 class="px-2 ">Payments Made</h3>
            </div>
            <hr class="bg-dark p-0 m-0">
            <div class="container mt-4 mb-4 p-2 ">
                <table class="table table-hover table-bordered ">
                    <thead>
                        <tr>
                        <th scope="col" class="text-center">ID</th>
                        <th scope="col" class="text-center">Payment Date</th>
                        <th scope="col" class="text-center">Amount</th>
                        <th scope="col" class="text-center">Signed By</th>
                        <th scope="col" class="text-center">Added By</th>
                        <th scope="col" class="text-center">Supplier</th>
                        <th scope="col" class="text-center">Updated By</th>
                        <th scope="col" class="text-center">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($supplierpayments as $payment)
                            <tr>
                                <th scope="row">{{ $payment->payment_id }}</th>
                                <td>{{ $payment->payment_date }}</td>
                                <td>{{ $payment->payment_amount }}</td>
                                <td>{{ $payment->signedby }}</td>
                                <td>{{ $payment->admin->name }}</td>
                                <td>{{ $payment->supplier->supplier_name }}</td>
                                <td>
                                    @if($payment->last_update_by)
                                        {{ $payment->lastUpdateAdmin->name }}
                                    @else
                                        Not Updated
                                    @endif 
                                </td>
                                <td>
                                        <a href="{{ route('editsupplierpayment', ['id' => $payment->payment_id]) }}" class="material-symbols-outlined me-3">edit</a>
                                        <a href="{{ route('deletesupplierpayment', ['id' =>  $payment->payment_id]) }}" class="material-symbols-outlined me-3" onclick="return confirm('Are you sure you want to delete this supplier payment?')">delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $supplierpayments->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>