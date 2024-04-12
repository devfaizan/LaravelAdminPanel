<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
    @include('utils/cdn')
    <link rel="stylesheet" href=" {{ asset('css/custom.css') }} ">
    @include('utils/favi')
</head>
<body>
    
    <div class="container-fluid cont-cont d-flex justify-content-center align-items-center align-items-stretch p-2">
        @include('utils/sidebar')

        <div class="container-fluid rounded bg-white" id="div3">
            <div class="container my-2">
                <h3 class="px-2 ">Add Product</h3>
            </div>
            <hr class="bg-dark p-0 m-0">
            @if ($errors->any())
            <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
        @endif
            <div class="container my-2">
                <h3 class="px-2 ">Add a New Product</h3>
            </div>
            <div class="container my-2 border d-flex justify-content-center ">
                <div class="col-6  ">
                    <form class="d-flex flex-column p-1 rounded " action="/addproduct" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-1">
                            <input class="form-control mb-1 " type="file" id="Image" name="images[]" placeholder="Add Images" multiple required>
                            <label for="Image">Product Images</label>
                        </div>
                        <div class="form-floating mb-1">
                            <input class="form-control mb-1 " type="text" id="Name" name="name" placeholder="Product Name" required>
                            <label for="Name">Product Name</label>
                        </div>
                            <select class="form-select mb-2" name="size" required>
                                <option selected>Product Liters</option>
                                <option value="9">9 </option>
                                <option value="16">16</option>
                            </select>
                            <select class="form-select mb-2" name="status" required>
                                <option selected>Product Status</option>
                                <option value="Instock">Instock</option>
                                <option value="Out of stock">Out of stock</option>
                            </select>
                        <div class="form-floating mb-1">
                            <input class="form-control mb-1 " type="text" id="Price" name="price" placeholder="Product Price" oninput="validateInputNumber(this)" required>
                            <label for="Price">Product Price</label>
                        </div>
                        <div class="form-floating mb-1">
                            <input class="form-control mb-1 " type="text" id="Quantity" name="quantity" placeholder="Product Quanity" oninput="validateInputNumber(this)" required>
                            <label for="Quantity">Product Quanity</label>
                        </div>
                        <div class="form-floating mb-1">
                            <input class="form-control mb-2 " type="text" id="Stock" name="stock"
                                placeholder="Stock" oninput="validateInputNumber(this)" required>
                            <label for="Stock">Stock ID</label>
                            <div id="stockHelpBlock" class="form-text">
                                Check Stock ID Carefully in <a href="/stocks">Stock Section</a>. 
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