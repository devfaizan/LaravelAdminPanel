<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    @include('utils/cdn')
    <link rel="stylesheet" href=" {{ asset('css/custom.css') }} ">
    @include('utils/favi')
</head>
<body>
    
    <div class="container-fluid cont-cont d-flex justify-content-center align-items-center align-items-stretch p-2">
        @include('utils/sidebar')

        <div class="container-fluid rounded bg-white" id="div3">
            <div class="container my-3">
                <h3 class="px-2 ">Products</h3>
            </div>
            <hr class="bg-dark p-0 m-0">
            <div class="container p-1 d-flex justify-content-around mt-4 mb-4 p-2">
                <div class="col-3 text-center bg-custom rounded p-2 cp">
                    <a href="/addproduct" class="alink">
                        <div class="d-flex align-items-center justify-content-center ">
                            <span class="material-symbols-outlined me-3">add</span>
                            <span>Add Product</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="container mt-4 mb-4 p-2 ">
                <table class="table table-hover table-bordered">
                    <thead class="text-center">
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Liters</th>
                        <th scope="col">Status</th>
                        <th scope="col">Listed Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Stock ID</th>
                        <th scope="col">Added By</th>
                        <th scope="col">Updated By</th>
                        <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($products as $product)
                        <tr>
                            <th scope="row">{{ $product->product_id }}</th>
                            <td>
                                @if($product->images)
                                    @if($product->images->isNotEmpty())
                                        <img src="{{ asset('storage/productimages/' . $product->product_id . '/' . $product->images->first()->image_name) }}" alt="Product Image" style="max-width: 50px; max-height:50px;">
                                    @else
                                        No Image (Empty Collection)
                                    @endif
                                @else
                                    No Image (Null Collection)
                                @endif
                            </td>
                    
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->product_size }}</td>
                            <td>{{ $product->product_status }}</td>
                            <td>{{ $product->product_price }}</td>
                            <td>{{ $product->product_quantity }}</td>
                            <td>{{ $product->stock_id }}</td>
                            <td>{{ $product->admin->name }}</td>
                            <td> @if($product->last_update_by)
                                {{ $product->lastUpdateAdmin->name }}
                            @else
                                Not Updated
                            @endif</td>
                            <td>
                                <a href="{{ route('editproduct', ['id' => $product->product_id]) }}" class="material-symbols-outlined me-3">edit</a>
                                <a href="{{ route('deleteproduct', ['id' => $product->product_id]) }}" class="material-symbols-outlined me-3" onclick="return confirm('Are you sure you want to delete this product?')">delete</a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>