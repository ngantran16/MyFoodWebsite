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
        <div class = "container">
            @if ($products->isEmpty())
            <h4>No search results for the keyword: <span style="color:red; font-weight:bold;"> {{ $result }} </span> </h4>
            @else
            <h4>Search results for keyword: <span style="color:red; font-weight:bold;"> {{ $result }} </span> </h4>
            <div class = "grid-container">
                @foreach ($products as $product)
                <div class = "grid-item">
                    <div class="card" style="width: 30rem;">
                        <div class = "circlee">
                            <img class="card-img-top clearfix" src='{{'/storage/'.$product->image }}' style = "height:250px;">
                            <p class = "sale"><b> -{{ $product->sale}}% </b></p>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"> {{ $product->name }} </h4>
                            <div class="stars">
                                @for ($i = 0; $i < $product->star; $i++)
                                    <span class="fa fa-star checked"></span>
                                @endfor
                            </div>
                        <p class="card-text" style="font-size: 20px; text-align:center;">{{ $product->getDisplayPrice() }}</p>

                            <div class = "button_product">
                                <form action="/addToCart/{{ $product->id }}" method="POST">
                                    @csrf
                                    <button class="btn buy" type="submit">Buy</button>
                                </form>
                                <form action="/details/{{ $product->id }}" method="POST">
                                    @csrf
                                    <button class="btn detail">Detail</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
        </div>
</body>
</html>
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>
