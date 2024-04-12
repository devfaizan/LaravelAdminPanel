<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stock</title>
    @include('utils/cdn')
    <link rel="stylesheet" href=" {{ asset('css/custom.css') }} ">
    @include('utils/favi')
</head>

<body>

    <div class="container-fluid cont-cont d-flex justify-content-center align-items-center align-items-stretch p-2">
        @include('utils/sidebar')

        <div class="container-fluid rounded bg-white" id="div3">
            <div class="container my-3">
                <h3 class="px-2 ">Stock</h3>
            </div>
            <hr class="bg-dark p-0 m-0">
            <div class="container p-1 d-flex justify-content-around mt-4 mb-4 p-2">
                <div class="col-3 text-center bg-custom rounded p-2 cp">
                    <a href="/addstock" class="alink">
                        <div class="d-flex align-items-center justify-content-center ">
                            <span class="material-symbols-outlined me-3">add</span>
                            <span>Add Stock</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="container my-3">
                <h3 class="px-2 ">Current Stock</h3>
            </div>
            <hr class="bg-dark p-0 m-0">
            <div class="container mt-4 mb-4 p-2 ">
                <table class="table table-hover table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Purchase Date</th>
                            <th scope="col">Expire Date</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Cost Price</th>
                            <th scope="col">Added By</th>
                            <th scope="col">Updated By</th>
                            <th scope="col">Supplier</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stocks as $stock)
                            <tr>
                                <th scope="row">{{ $stock->stock_id }}</th>
                                <td>{{ $stock->purchase_date }}</td>
                                <td>{{ $stock->expire_date }}</td>
                                <td>{{ $stock->quantity }}</td>
                                <td>{{ $stock->cost_price }}</td>
                                <td>{{ $stock->admin->name }}</td>
                                <td>
                                    @if($stock->last_update_by)
                                        {{ $stock->lastUpdateAdmin->name }}
                                    @else
                                        Not Updated
                                    @endif
                                </td>
                                <td>{{ $stock->supplier->supplier_name }}</td>
                                <td>
                                        <a href="{{ route('editstock', ['id' => $stock->stock_id]) }}" class="material-symbols-outlined me-3">edit</a>
                                        <a href="{{ route('deletestock', ['id' => $stock->stock_id]) }}" class="material-symbols-outlined me-3" onclick="return confirm('Are you sure you want to delete this batch of stock?')">delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $stocks->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>