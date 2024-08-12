<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Order</title>
    @include('utils/cdn')
    <link rel="stylesheet" href=" {{ asset('css/custom.css') }} ">
    @include('utils/favi')
</head>
<body>
    
    <div class="container-fluid cont-cont d-flex justify-content-center align-items-center align-items-stretch p-2">
        @include('utils/sidebar')

        <div class="container-fluid rounded bg-white" id="div3">
            <div class="container my-3">
                <h3 class="px-2 ">Edit {{$order->order_id}}</h3>
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
                    <form class="d-flex flex-column p-3 rounded " action="{{ route('updateorder', ['id' => $order->order_id]) }}" method="POST">
                        @csrf
                        <div class="form-floating mb-2">
                            <input class="form-control mb-2 " type="text" value="{{ $order->order_id }}"
                                placeholder="Order ID" disabled>
                            <label>Order ID</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input class="form-control mb-2 " type="text" value="{{ $order->customer->name }}"
                                placeholder="Customer" disabled>
                            <label>Customer</label>
                        </div>
                    
                        <label for="Status">Order Status</label> 
                        <select class="form-select mb-3" id="Status" name="status">
                            <option value="pending" {{ $order->order_status == 'pending' ? 'selected' : '' }} disabled>pending</option>
                            <option value="Inprocess" {{ $order->order_status == 'Inprocess' ? 'selected' : '' }}>Inprocess</option>
                            <option value="fulfilled" {{ $order->order_status == 'fulfilled' ? 'selected' : '' }}>fulfilled</option>
                        </select>
                        <div id="supplierHelpBlock" class="form-text">
                            Check Order Carefully in <a href="/orders">Order Section</a>. 
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