<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>
    <div class="row">
        <div class="col-sm-3" style="background-color:#C6E2FF; position: relative; height:800px;">
           <p style="margin-top:110px;"><span style="font-weight: bold; margin-left:50px;"> Customer Name: </span> {{ $order->name }}</p>
           <p><span style="font-weight: bold; margin-left:50px;"> Address: </span> {{ $order->address }}</p>
           <p><span style="font-weight: bold; margin-left:50px;"> Email: </span> {{ $order->email }}</p>
           <p><span style="font-weight: bold; margin-left:50px;"> Phone Number: </span> {{ $order->phone_number }}</p>
           <p> <span style="font-weight: bold; margin-left:50px;"> Payment: {{ number_format($order->total,0,',','.')." VND" }} </span> </p>
           <p><span style="font-weight: bold; margin-left:50px;"> Discount: </span> {{ $order->discount }}%</p>
        </div>
        <div class="col-sm-9" style="background-color:#F8F8FF;">
            <h3 style="text-align: center;">ORDERS HISTORY</h3>
            <div class = "container">
                <table class="table table-striped" style="width:100%;">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>ID Product</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <?php $i = 1?>
                    <tbody>
                        @foreach ($order->product as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ number_format ($item->price,0,',','.')." VND" }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format ($item->price * $item->quantity,0,',','.')." VND" }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
