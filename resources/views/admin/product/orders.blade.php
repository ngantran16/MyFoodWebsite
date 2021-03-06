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
    <div class="col-sm-3" style="background-color:lavender;">
        @include('partials/menu')
    </div>
    <div class="col-sm-9" style="background-color:#C6E2FF">
        <h3 style="text-align: center;">ORDERS' INFORMATION</h3>
        <div class = "container">
            <table class="table table-striped" style="width:100%;">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>ID User</th>
                    <th>Name</th>
                    <th>Products</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Total</th>
                    <th>Discount</th>
                    <th>Status</th>
                    <th>View</th>
                </tr>
                </thead>
                <?php $i = 1?>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td> {{ $i++ }} </td>
                            <td> {{ $order->id_user }} </td>
                            <td> {{ $order->name }}</td>
                            <td>
                            <?php $products = json_decode($order->product) ?>
                            @foreach ($products as $product)
                                {{ $product->name }}
                                <br>
                            @endforeach
                            </td>
                            <td> {{ $order->address }} </td>
                            <td> {{ $order->email }} </td>
                            <td> {{ $order->phone_number }} </td>
                            <td> {{ number_format($order->total,0,',','.')." VND" }} </td>
                            <td> {{ $order->discount }}%</td>
                            <td>
                                {{ $order->status }} <br>
                                <form action="{{'/admin/order/confirm/'.$order->id}}" method="POST">
                                    @csrf
                                    <button type="submit" class ="btn-success">Confirm</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{'/admin/order/view/'.$order->id}}" method="GET">
                                    <button type="submit" class ="btn btn-link">View</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>
</div>
</body>
</html>
