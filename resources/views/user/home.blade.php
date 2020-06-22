<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="../css/home.css">
</head>

<body>
    @include('partials\header')
    @include('partials\carousel')
        <div class = "container">
            <h1 class = "title">MÓN MỚI MỖI NGÀY</h1>
            <div class = "grid-container">
                @foreach ($products as $product)
                    <div class = "grid-item">
                        <div class="card" style="width: 30rem;">
                        <img class="card-img-top" src='{{'storage/'.$product->image }}' alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title"> {{ $product->name }} </h5>
                            <p class="card-text"> <span>{{ $product->price }} $ </span> <span class = "old_price"><strike>{{ $product->old_price }}</strike> $ </span> </p>

                            <div class = "row">
                                <div class = "col-sm 6">
                                    <form action="/home/addToCart/{{ $product->id }}" method="POST">
                                        @csrf
                                        <button class="btn btn-warning" type="submit">Mua</button>
                                    </form>
                                </div>
                                <div class = "col-sm 6">
                                    <form action="/home/details/{{ $product->id }}" method="POST">
                                        @csrf
                                        <button class="btn btn-warning">Chi tiết</button>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @include('partials/footer')
</body>
</html>
