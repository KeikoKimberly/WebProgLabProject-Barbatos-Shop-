<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{route('homePage')}}">Barbatos Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">Category</a>
                    <div class="dropdown-menu">
                        @foreach ($categories as $category)
                            <a class="dropdown-item"
                                href="/products/productCategory/{{ $category->id }}">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </li>
                @if (Auth::check() && auth()->user()->role == 0)
                    <li>
                        <a href="{{route('products.manage')}}" class="nav-link">Manage Product</a>
                    </li>
                @endif

            </ul>
        </div>
        {{-- <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form> --}}
        <div class="d-flex me-auto">
            @if (Auth::check())
                @if (auth()->user()->role == 1)
                    <a href="{{route('cartItem.index')}}" class="nav-link text-black">Cart</a>
                @endif
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">{{auth()->user()->name}}</a>
                        <div class="dropdown-menu">
                            @if (auth()->user()->role == 1)
                                <a class="dropdown-item" href="{{route('transactions.history')}}">History</a>
                            @endif
                            <a class="dropdown-item" href="{{route('profile')}}">Profile</a>
                            <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>

            @else
                <a href="{{route('login')}}" class="nav-link text-black">Login</a>
                <a href="{{route('register')}}" class="nav-link text-black">Register</a>
            @endif
        </div>
    </div>
</nav>
