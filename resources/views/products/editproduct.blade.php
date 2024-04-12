<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
    @include('utils/cdn')
    <link rel="stylesheet" href=" {{ asset('css/custom.css') }} ">
    @include('utils/favi')
</head>
<body>
    
    <div class="container-fluid cont-cont d-flex justify-content-center align-items-center align-items-stretch p-2">
        @include('utils/sidebar')

        <div class="container-fluid rounded bg-white" id="div3">
            <div class="container my-3">
                <h3 class="px-2 ">Edit {{$product->product_name}}</h3>
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
                    <form class="d-flex flex-column p-3 rounded " action="{{ route('updateproduct', ['id' => $product->product_id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row image-container d-flex justify-content-center align-items-center border ">
                            @foreach($product->images as $image)
                                <div class="col-4 image-wrapper d-flex flex-column justify-content-center align-items-center ">
                                    <img src="{{ asset('storage/productimages/' . $product->product_id . '/' . $image->image_name) }}" alt="Product Image" style="max-width: 100px; max-height:100px;">
                                    <button type="button" class="delete-image" data-image-id="{{ $image->image_id }}">Delete</button>
                                </div>
                            @endforeach
                        </div>
                        <div>
                            <input class="form-control mb-2 " type="file" id="Image" name="images[]" placeholder="Add Images" multiple accept="image/*">
                        </div>
                        <div class="form-floating mb-2">
                            <input class="form-control mb-2 " type="text" id="Name" name="name" placeholder="Product Name" value="{{ $product->product_name }}">
                            <label for="Name">Product Name</label>
                        </div>
                        <select class="form-select mb-3" name="size">
                            <option value="9" {{ $product->product_size == '9' ? 'selected' : '' }}>9</option>
                            <option value="16" {{ $product->product_size == '16' ? 'selected' : '' }}>16</option>
                        </select>
                        <select class="form-select mb-3" name="status">
                            <option value="Instock" {{ $product->product_status == 'Instock' ? 'selected' : '' }}>Instock</option>
                            <option value="Out of stock" {{ $product->product_status == 'Out of stock' ? 'selected' : '' }}>Out Of stock</option>
                        </select>
                        <div class="form-floating mb-2">
                            <input class="form-control mb-2 " type="text" id="Price" name="price" placeholder="Product Price" oninput="validateInputNumber(this)" required value="{{ $product->product_price }}">
                            <label for="Price">Product Price</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input class="form-control mb-2 " type="text" id="Quantity" name="quantity" placeholder="Product Quanity" oninput="validateInputNumber(this)" required value="{{ $product->product_quantity }}">
                            <label for="Quantity">Product Quanity</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input class="form-control mb-2 " type="text" id="Stock" name="stock"
                                placeholder="Stock" oninput="validateInputNumber(this)" required value="{{ $product->stock_id }}">
                            <label for="Stock">Stock ID</label>
                            <div id="stockHelpBlock" class="form-text">
                                Check Stock ID Carefully in <a href="/stocks">Stock Section</a>. 
                            </div>
                        </div>
                        <button class="btn bg-custom shadow text-white fw-bold ">Update</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    const imageWrappers = document.querySelectorAll('.image-wrapper');

    imageWrappers.forEach(wrapper => {
        const deleteButton = wrapper.querySelector('.delete-image');
        const imageId = deleteButton.getAttribute('data-image-id');

        deleteButton.addEventListener('click', function () {
            fetch(`{{ url('/delete-image') }}/${imageId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            })
                .then(response => {
                    if (response.ok) {   
                        wrapper.remove();
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    });
});
    </script>
</body>
</html>