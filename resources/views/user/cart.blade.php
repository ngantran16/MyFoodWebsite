<html lang="en">
    <head>
    <title>Shopping cart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="../css/home.css">
    <style>
        .quantity{
            width:30px;
            text-align:center;
            position: relative;
            margin-left:40px;
            margin-top:-43px;
        }
        .minus{
            width:30px;
            text-align:center;
            position: relative;
            margin-left:72px;
            margin-top:-43px;
            width:35px;
        }
    </style>
    </head>
    <body>
        @include('partials/header')
        <div class= "container">
            <div class = "shopping_cart">
                <h1>Shopping cart</h1>
                <div style = "background-color:#ECECEC; margin-right:80px;">
                    <?php $total = 0 ?>
                <table class="table" >
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Product's name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $cart)
                        <tr>
                            <td><img src='{{'/storage/'.$cart->image }}' alt="" style="width:150px; height:100px;"></td>
                            <td>{{ $cart->name}}</td>
                            <td>{{ $cart->price}}</td>
                            <td>
                                <form method="post" action="{{'/cart/plus/'.$cart->id}}">
                                    @csrf
                                    <button class="btn btn-light"><i class="fas fa-plus"></i></button>
                                </form>
                                <input name = "quantityForm" value="{{ $cart->quantity }}" class = "quantity">
                                <form method="post">
                                    @csrf
                                    <button class="btn btn-light minus"><i class="fas fa-minus"></i></button>
                                </form>

                            </td>
                            <td>{{ $cart->price * $cart->quantity}}</td>
                            <?php $total += $cart->price * $cart->quantity ?>
                            <td>
                            <form action="/cart/{{ $cart->id }}" method="post">
                                @csrf
                                @method("DELETE")
                                    <button class = "btn btn-danger" type="submit">Xóa</button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
</body>
</html>
