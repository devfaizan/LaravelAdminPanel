{{-- small menu starts --}}
<div class="container-fluid basis-custom-width-div1 rounded align-self-end p-0 m-1 visually-hidden" id="div1">
    <div class="logo d-flex justify-content-center align-items-center p-0 m-0">
        <a href="/home">
            <img src="{{ asset('images/brandip.png')}}" class="logo-img-small" alt="brandlogo">
        </a>
    </div>
    @for ($i = 0; $i < 20; $i++)
        &nbsp;
    @endfor
    <div class="container p-0 m-0 ">
        <hr class="bg-dark p-0 m-2">
        <ul class="home-list p-0 m-0">
            <li class="home-list-li">    
                <a href="/home" class="home-a-link">
                    <div class="d-flex align-items-center ">
                        <span class="material-symbols-outlined me-3">home</span>
                    </div>
                </a>
            </li>
            <li class="home-list-li">
                <a href="/home" class="home-a-link">
                    <div class="d-flex align-items-center ">
                        <span class="material-symbols-outlined me-3">orders</span>
                    </div>
                </a>
            </li>
            <li class="home-list-li">
                <a href="/stocks" class="home-a-link">
                    <div class="d-flex align-items-center ">
                        <span class="material-symbols-outlined me-3">inventory</span>
                    </div>
                </a>
            </li>
            <li class="home-list-li">
                <a href="/suppliers" class="home-a-link">
                    <div class="d-flex align-items-center ">
                        <span class="material-symbols-outlined me-3">conveyor_belt</span>
                    </div> 
                </a>
            </li>
            <li class="home-list-li mb-0 ">
                <a href="/products" class="home-a-link">
                    <div class="d-flex align-items-center ">
                        <span class="material-symbols-outlined me-3">inventory_2</span>
                    </div>
                </a>
            </li>
            <li class="home-list-li mb-0 ">
                <a href="/mainpayment" class="home-a-link">
                    <div class="d-flex align-items-center ">
                        <span class="material-symbols-outlined me-3">payments</span>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    @for ($i = 0; $i < 10; $i++)
        &nbsp;
    @endfor
    <div class="container p-0 m-0  basis-custom-height d-flex flex-column justify-content-end pb-2  ">
        <hr class="bg-dark p-0 m-2">
        <div class=" custom-height d-flex flex-column ">
            <div class="rounded-circle logo-img-cont-custom-small d-flex justify-content-center align-items-center align-self-center border">
                <img src="{{ Auth::user()->image}}" class="pfp-img-small  rounded-circle" alt="userimg">
            </div>
            @for ($i = 0; $i < 3; $i++)
                    &nbsp;
                @endfor
            <div class="infos">
                <div class="d-flex justify-content-between p-2  ">
                    <form action="/logout" method="POST">
                        @csrf
                        <button title="Logout" class="material-symbols-outlined border-0 bg-transparent">Logout</button>
                    </form>
                </div>
                <ul class="home-list p-0 m-0">
                    <li class="home-list-li">
                        <a href="/updateprofile" class="home-a-link">
                            <div class="d-flex align-items-center ">
                                <span class="material-symbols-outlined me-3">person</span>
                            </div>
                        </a>
                    </li> 
                </ul>
            </div>   
        </div>
        <hr class="bg-dark p-0 m-2">
    </div>
    <button class="rounded bg-dark-subtle" id="menu-button">
        <div class="material-symbols-outlined" id="div1-menu">menu</div>
    </button>
</div>
{{-- small menu ends --}}

{{-- normal menu starts --}}
<div class="container-fluid basis-custom-width rounded  d-flex align-items-stretch " id="div2">
    <div class="container align-self-stretch  d-flex flex-column align-items-stretch">
        <div class="logo d-flex justify-content-center align-items-center p-0 m-0 ">
            <a href="/home">
                <img src="{{ asset('images/brandip.png')}}" class="logo-img" alt="brandlogo">
            </a>
        </div>
        <div class="container p-0 m-0 ">
            <hr class="bg-dark p-0 m-2">
            <ul class="home-list p-0 m-0">
                <li class="home-list-li">    
                    <a href="/home" class="home-a-link">
                        <div class="d-flex align-items-center ">
                            <span class="material-symbols-outlined me-3">home</span>
                            <span>Home</span>
                        </div>
                    </a>
                </li>
                <li class="home-list-li">
                    <a href="/home" class="home-a-link">
                        <div class="d-flex align-items-center ">
                            <span class="material-symbols-outlined me-3">orders</span>
                            <span>Orders</span>
                        </div>
                    </a>
                </li>
                <li class="home-list-li">
                    <a href="/stocks" class="home-a-link">
                        <div class="d-flex align-items-center ">
                            <span class="material-symbols-outlined me-3">inventory</span>
                            <span>Stock</span>
                        </div>
                    </a>
                </li>
                <li class="home-list-li">
                    <a href="/suppliers" class="home-a-link">
                        <div class="d-flex align-items-center ">
                            <span class="material-symbols-outlined me-3">conveyor_belt</span>
                            <span>Suppliers</span>
                        </div> 
                    </a>
                </li>
                <li class="home-list-li mb-0 ">
                    <a href="/products" class="home-a-link">
                        <div class="d-flex align-items-center ">
                            <span class="material-symbols-outlined me-3">inventory_2</span>
                            <span>Products</span>
                        </div>
                    </a>
                </li>
                <li class="home-list-li mb-0 ">
                    <a href="/mainpayment" class="home-a-link">
                        <div class="d-flex align-items-center ">
                            <span class="material-symbols-outlined me-3">payments</span>
                            <span>Payments</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="container p-0 m-0  basis-custom-height d-flex flex-column justify-content-end pb-2  ">
            <hr class="bg-dark p-0 m-2">
            <div class=" custom-height d-flex flex-column ">
                <div class="rounded-circle logo-img-cont-custom d-flex justify-content-center align-items-center align-self-center border">
                    <img src="{{ Auth::user()->image}}" class="pfp-img rounded-circle" alt="userimg">
                </div>
                <div class="infos">
                    <div class="p-2" >
                        <span class="fw-bold text-capitalize">{{Auth::user()->name}}</span>
                    </div>
                    <div class="d-flex justify-content-between p-2  ">
                        <div class="fw-lighter ">{{Auth::user()->email}}</div>
                        <form action="/logout" method="POST">
                            @csrf
                            <button title="Logout" class="material-symbols-outlined border-0 bg-transparent">Logout</button>
                        </form>
                    </div>
                    <ul class="home-list p-0 m-0">
                        <li class="home-list-li">
                            <a href="/updateprofile" class="home-a-link">
                                <div class="d-flex align-items-center ">
                                    <span class="material-symbols-outlined me-3">person</span>
                                    <span>Update Profile</span>
                                </div>
                            </a>
                        </li> 
                    </ul>
                </div>   
            </div>
            <div class="d-flex justify-content-between p-2 mt-4 " id="div2-close">
                <div >Close Menu</div>
                <div class="material-symbols-outlined">close_small</div>
            </div>
        </div>
    </div>
</div>
{{-- normal menu ends --}}