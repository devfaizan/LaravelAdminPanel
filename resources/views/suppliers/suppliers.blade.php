<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Suppliers</title>
    @include('utils/cdn')
    <link rel="stylesheet" href=" {{ asset('css/custom.css') }} ">
    @include('utils/favi')
</head>
<body>
    
    <div class="container-fluid cont-cont d-flex justify-content-center align-items-center align-items-stretch p-2">
        @include('utils/sidebar')

        <div class="container-fluid rounded bg-white" id="div3">
            <div class="container my-3">
                <h3 class="px-2 ">Suppliers</h3>
            </div>
            <hr class="bg-dark p-0 m-0">
            <div class="container p-1 d-flex justify-content-around mt-4 mb-4 p-2">
                <div class="col-3 text-center bg-custom rounded p-2 cp">
                    <a href="/addsupplier" class="alink">
                        <div class="d-flex align-items-center justify-content-center ">
                            <span class="material-symbols-outlined me-3">add</span>
                            <span>Add Supplier</span>
                        </div>
                    </a>
                </div>
                {{-- <div class="col-3 text-center bg-custom rounded p-2 cp">
                    <a href="/editsupplier" class="alink">
                        <div class="d-flex align-items-center justify-content-center ">
                            <span class="material-symbols-outlined me-3">edit</span>
                            <span>Edit Supplier</span>
                        </div>
                    </a>
                </div> --}}
            </div>
            <div class="container my-3">
                <h3 class="px-2 ">Current Suppliers</h3>
            </div>
            <hr class="bg-dark p-0 m-0">
            <div class="container mt-4 mb-4 p-2 ">
                <table class="table table-hover table-bordered ">
                    <thead>
                        <tr>
                        <th scope="col" class="text-center">ID</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Email</th>
                        <th scope="col" class="text-center">Address</th>
                        <th scope="col" class="text-center">Phone</th>
                        <th scope="col" class="text-center">Added By</th>
                        <th scope="col" class="text-center">Updated By</th>
                        <th scope="col" class="text-center">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($suppliers as $supplier)
                            <tr>
                                <th scope="row">{{ $supplier->supplier_id }}</th>
                                <td>{{ $supplier->supplier_name }}</td>
                                <td>{{ $supplier->supplier_email }}</td>
                                <td>{{ $supplier->supplier_address }}</td>
                                <td>{{ $supplier->supplier_phone }}</td>
                                <td>{{ $supplier->admin->name }}</td>
                                <td>
                                    @if($supplier->last_update_by)
                                        {{ $supplier->lastUpdateAdmin->name }}
                                    @else
                                        Not Updated
                                    @endif
                                </td>
                                <td>
                                        <a href="{{ route('editsupplier', ['id' => $supplier->supplier_id]) }}" class="material-symbols-outlined me-3">edit</a>
                                        <a href="{{ route('deletesupplier', ['id' => $supplier->supplier_id]) }}" class="material-symbols-outlined me-3" onclick="return confirm('Are you sure you want to delete this supplier?')">delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $suppliers->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>