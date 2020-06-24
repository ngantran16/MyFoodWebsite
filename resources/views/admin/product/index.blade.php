<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    @include('partials\menu')
        <div class="col pt-2">
            <h3 style="text-align: center;">PRODUCT'S INFORMATION</h3>
            <div class = "container">
                <a href="/product/create">Add a product</a>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <?php $i = 1?>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td> {{ $i++ }} </td>
                                <td> {{ $product->name }} </td>
                                <td> {{ $product->category->name }}</td>
                                <td> <img src="{{'/storage/'.$product->image}}" width="100px" height="60px">
                                </td>
                                <td> {{ $product->price }} </td>
                                <td> {{ $product->quantity }} </td>
                                <td>
                                    <form action="{{'/admin/product/'.$product->id.'/edit'}}" method="GET">
                                        <button type="submit" class ="btn btn-link">Edit</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{'/admin/product/'.$product->id}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class = "btn btn-link">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
</body>
</html>
