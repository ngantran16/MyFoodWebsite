<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <p>
        @if(Auth::user())
        {{-- <p style = "color:white;">Welcome: {{Auth::user()->username}}</p> --}}
        <div class="dropdown">
            <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
            style="color:white; font-weight:bold; border:none; font-size:20px;">
                <i class="far fa-user"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#">Your profile</a>
              <a class="dropdown-item" href="#">Pay in 21APay</a>
              <a class="dropdown-item" href="#">Purchase history</a>
            </div>
          </div>
        @endif
    </p>
    <br><br>
    <a class="navbar-brand" href="#"><a href="/home">
    <img class = "logo" src="/img/logo.png" width="100px" height="80px"></a></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link header" href="/home" style="margin-right:30px;">Home page <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link header" href="#" style="margin-right:30px;">Contact</a>
        </li>
        <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle header" href="#" style="margin-right:30px;" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Category
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php $categories = Session::get('categories')?>
            @foreach ($categories as $category)
                <a class="dropdown-item" href="/home/category/{{ $category->id }}">{{ $category->name }}</a>
            @endforeach
            <div class="dropdown-divider header"></div>
            <a class="dropdown-item" href="/home">All products</a>
        </div>
        </li>
        <li class="nav-item active">
        <a class="nav-link header" href="#">Order</a>
        </li>
    </ul>
    <form class="form-inline" action="/search" method="GET">
        <input class="form-control" placeholder="Search" aria-label="Search" name = "result" style="width:300px; margin-left:90px; margin-top:10px;">
        <button class="btn btn-outline-danger" type="submit" style="margin-top: 10px;">Search</button>
    </form>
    </div>
</nav>
<form action="/cart" method="GET">
    <button type="submit" class=" btn-link cart" style="color:white;">
        <i class="fas fa-shopping-cart fa-2x"></i>
        <div style="width:25px; height:25px; border-radius:20px; background-color: red; position: relative; margin-left:50px; margin-top:-15px;">
            <span style="color:white;  ">
                @if (Session::has('quantity'))
                    <span>{{ Session::get('quantity') }}</span>
                @else
                    <span>0</span>
                @endif
            </span>
        </div>
    </button>
</form>

@if(Auth::user())
    <form action="/auth/logout" method="post">
        @csrf
        <button type="submit" class="btn button"><i class="fas fa-sign-out-alt"></i>Logout</button>
    </form>
@else
    <form action="/auth/login" method="get">
        <button type="submit" class = "btn button">Login</button>
    </form>
    <form action="/auth/register" method="get">
        <button type="submit" class = "btn register">Register</button>
    </form>
@endif
