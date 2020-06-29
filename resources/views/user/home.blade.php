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
            <form method="get" action="/home">
                @csrf
                <button class= "asc" name="asc"><i class="fas fa-sort-down fa-2x"></i></button>
                <button class= "des" name="des"><i class="fas fa-sort-up fa-2x"></i></button>
            </form>
            <div class = "grid-container">
                @foreach ($products as $product)
                    <div class = "grid-item">
                        <div class="card" style="width: 30rem;">
                        <img class="card-img-top" src='{{'/storage/'.$product->image }}' style = "height:250px;">
                            <div class="card-body">
                            <h4 class="card-title"> {{ $product->name }} </h4>
                            <div class="stars">
                                @for ($i = 0; $i < $product->star; $i++)
                                    <span class="fa fa-star checked"></span>
                                @endfor
                            </div>
                            <p class="card-text"> <span>{{ $product->getDisplayPrice() }}</span> </p>

                            <div class = "row">
                                <div class = "col-sm 6">
                                    <form action="/addToCart/{{ $product->id }}" method="POST">
                                        @csrf
                                        <button class="btn btn-warning" type="submit">Mua</button>
                                    </form>
                                </div>
                                <div class = "col-sm 6">
                                    <form action="/details/{{ $product->id }}" method="POST">
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
            <a class="previous" href="/home/?page={{$page-1}}">&laquo; Previous</a>
            <a class="next" href="/home/?page={{$page+1}}">Next &raquo;</a>
        </div>
        @include('partials/footer')
</body>
</html>
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>
