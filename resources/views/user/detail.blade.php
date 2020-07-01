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
    <style>
        /* .comment{
            position: relative;
            float:right;
            margin-top:-35px;
            margin-right:20px;
        } */
    </style>
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
                                <button class="btn buy" style = "width:100px;" type="submit">Add to cart</button>
                                <button class="btn buy" style = "width:50px;"type="button"><span class="fa fa-heart"></span></button>
                            </form>
                        </div>
                        <div class = "show_comment">
                            <h4>{{ $comments->count() }} Comments </h4>
                            @foreach ($comments as $comment)
                                <p><b>{{ $comment->name }}</b></p>
                                <div class = "row">
                                    <div class ="col-sm-9">
                                        <p>{{ $comment->content }}</p>
                                    </div>
                                    <div class ="col-sm-3">
                                        <p>{{ date('d-m-Y', strtotime( $comment->created_at)) }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="margin-top:50px">
                <h3>Questions/Comments:</h3>
                <form action="/details/{{ $product->id }}/comment" method = "POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:(<span style="color:red;">*</span>)</label>
                        <input class="form-control"  placeholder="Enter your name" name = "name" style="width:460px;">
                        @error('name')
                            <div style="color:red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email:(<span style="color:red;">*</span>)</label>
                        <input class="form-control"  placeholder="Enter your email" name = "email" style="width:460px;">
                        @error('email')
                            <div style="color:red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="comment">Comment:</label>
                        <input class="form-control"  placeholder="Enter comment" name ="content" style="width:460px;">
                        @error('content')
                            <div style="color:red;">{{ $message }}</div>
                        @enderror
                        <br>
                        <button class = "btn btn-primary" type = "submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        @include('partials\footer')
</body>
</html>
