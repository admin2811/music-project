<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="{{asset( 'img/Screenshot 2023-09-23 143941.png')}}" alt="" style="width:50%"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    @if(Request::is('/'))
                    <a class="nav-link active" aria-current="page" href="/">Trang chủ</a>
                    @else
                    <a class="nav-link" href="/">Trang chủ</a>
                    @endif
                </li>
                <li class="nav-item">
                    @if(Request::is('login'))
                    <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Đăng Nhập</a>
                    @else
                    <a class="nav-link" href="{{ route('login') }}">Đăng Nhập</a>
                    @endif
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>