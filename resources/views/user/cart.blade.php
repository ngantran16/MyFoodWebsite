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
    </head>
    <body>
        @include('partials/header')
        <div class= "container">
            <div class = "shopping_cart">
                <h1>Shopping cart</h1>
                <a href="/home"><< Continue shopping</a>
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
                            <td>{{ number_format($cart->price,0,',','.')." VND" }} </td>
                            <td>
                                <form method="post" action="{{'/cart/update/'.$cart->id}}">
                                    @csrf
                                    <button class="btn btn-light minus" type="Submit"  name="minus"><i class="fas fa-minus"></i></button>
                                    <input name = "quantity" value="{{ $cart->quantity }}" class = "quantity" style ="width:30px;">
                                    <button class="btn btn-light" type="Submit" name="plus"><i class="fas fa-plus"></i></button>
                                </form>
                            </td>
                            <td>
                                {{ number_format($cart->price * $cart->quantity,0,',','.')." VND" }}
                            </td>
                            <?php $total += $cart->price * $cart->quantity ?>
                            <td>
                            <form action="/cart/{{ $cart->id }}" method="post">
                                @csrf
                                @method("DELETE")
                                    <button class = "btn btn-danger" type="submit"><i class="far fa-trash-alt"></i></button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                        <tr>
                            <form action="/cart" method="get">
                                <td colspan="6">
                                    <input class="form-control" type="text" name="discount" style="width:200px;" placeholder="Enter coupon">
                                    <button class = "btn btn-primary" style="margin-left:210px; position: relative; margin-top:-35px;">Apply</button>
                                </td>
                            </form>
                        </tr>
                </tbody>
                </table>

                </div>
                <div class = "payment">
                    <h3 style = "position:relative; left:530px;">Total money</h3>
                            <table class="table table-bordered" style = "width:500px; position:relative; left:530px;">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class = "col-sm-6">Provisional total:</div>
                                            <div class = "col-sm-6"> {{ number_format($total,0,',','.')." VND" }} </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>
                                            <div class = "col-sm-6">Discount:</div>
                                            <div class = "col-sm-6">{{ $discount }} % </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <div class = "col-sm-6">Total:</div>
                                            <div class = "col-sm-6">{{ number_format($total - ($total * $discount)/100,0,',','.')." VND"}} </div>
                                        </th>
                                    </tr>
                                </tbody>
                        </table>
                        <form method="GET" action="/order">
                            <button class="btn btn-warning btn-pay">Payment</button>
                        </form>
            </div>
</body>
</html>
