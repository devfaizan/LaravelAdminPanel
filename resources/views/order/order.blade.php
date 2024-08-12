<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orders</title>
    @include('utils/cdn')
    <link rel="stylesheet" href=" {{ asset('css/custom.css') }} ">
    @include('utils/favi')
</head> 

<body>

    <div class="container-fluid cont-cont d-flex justify-content-center align-items-center align-items-stretch p-2">
        @include('utils/sidebar')

        <div class="container-fluid rounded bg-white" id="div3">
            <div class="container my-3">
                <h3 class="px-2 ">Orders</h3>
            </div>
            <hr class="bg-dark p-0 m-0">
            <div class="container d-flex justify-content-center align-items-center h-25 ">
                <div class="w-25 h-50 rounded d-flex flex-column justify-content-center align-content-center px-3 shadow">
                    <div class="fw-bold">{{ $totalOrders }}</div>
                    <span class="fw-light">Total</span>
                </div>
                <div class="w-25 h-50 mx-2 rounded d-flex flex-column justify-content-center align-content-center px-3 shadow">
                    <div class="fw-bold" >{{ $pendingOrders }}</div>
                    <span class="fw-light">Pending</span>
                </div>
                <div class="w-25 h-50 rounded d-flex flex-column justify-content-center align-content-center px-3 shadow">
                    <div class="fw-bold">{{ $inprocessOrders }}</div>
                    <span class="fw-light">Inprocess</span>
                </div>
                <div class="w-25 h-50 mx-2 rounded d-flex flex-column justify-content-center align-content-center px-3 shadow">
                    <div class="fw-bold" >{{ $fulfilledOrders }}</div>
                    <span class="fw-light">Fulfilled</span>
                </div>
            </div>
            <div class="container p-2 ">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link {{ $status == '' ? 'active' : '' }}" href="{{ url('/orders') }}">All ({{ $totalOrders }}) </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $status == 'pending' ? 'active' : '' }}" href="{{ url('/orders/pending') }}">Pending ({{ $pendingOrders }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $status == 'Inprocess' ? 'active' : '' }}" href="{{ url('/orders/Inprocess') }}">Inprocess ({{ $inprocessOrders }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $status == 'fulfilled' ? 'active' : '' }}" href="{{ url('/orders/fulfilled') }}">Fulfilled ({{ $fulfilledOrders }})</a>
                    </li>
                </ul>
                <table class="table table-hover table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Status</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Customer Address</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Products</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <th scope="row">{{ $order->order_id }}</th>
                                <td>{{ $order->order_status }}</td>
                                <td>{{ $order->order_amount }}</td>
                                <td>{{ $order->customer->name }}</td>
                                <td>{{ $order->customer->address }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    @if($order->cart && $order->cart->items)
                                        <ul style="list-style: none;">
                                            @foreach($order->cart->items as $item)
                                                <li>PID: {{ $item->product_id }}, Qty: {{ $item->product_quantity }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        No items
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('editorder', ['id' => $order->order_id]) }}" class="material-symbols-outlined me-3">edit</a>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $orders->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>