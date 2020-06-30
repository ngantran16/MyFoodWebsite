<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    @include('partials/header')
        <div class="container">
            <div class="card">
                <div class="container-fliud">
                    <div class="wrapper row">
                        <div class="preview col-md-6">

                            <div class="preview-pic tab-content">
                              <div class="tab-pane active" id="pic-1"><img src='{{'/storage/'.$product->image }}'/></div>
                            </div>

                        </div>
                        <div class=" col-md-6">
                            <h3 class="product-title">{{$product->name}}</h3>
                            <div class="rating">
                                <div>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <span class="review-no">41 reviews</span>
                            </div>
                        <h4 class="price">CURRENT PRICE: <span>{{ $product->getDisplayPrice() }}</span></h4>

                        <p>DETAIL:
                            <span>
                                <?php foreach ($details as $detail) {
                                    echo ($detail->content);
                                }?>
                            </span>
                        </p>
                        <div class="action">
                            <form action="/addToCart/{{ $product->id }}" method="POST">
                                @csrf
                                <button class="btn btn-warning" type="submit">Add to cart</button>
                                <button class="btn btn-warning" type="button"><span class="fa fa-heart"></span></button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
