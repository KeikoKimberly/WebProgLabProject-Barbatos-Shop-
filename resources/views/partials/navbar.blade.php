<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Barbatos Shop</a>
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
                <li>
                    <a href="{{route('products.manage')}}" class="nav-link">Manage Product</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
        <div class="d-flex me-auto">
            <a href="{{route('login')}}" class="nav-link">Login</a>
            <a href="{{route('register')}}" class="nav-link">Register</a>
        </div>
    </div>
</nav>
