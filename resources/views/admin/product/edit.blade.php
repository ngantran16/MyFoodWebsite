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
    <div class = "container">
        <form method="POST" action="{{'/admin/product/'.$product->id}}" class = "form" enctype="multipart/form-data" >
            @csrf
            @method("PATCH")
            <h3 style="text-align: center;">EDIT A PRODUCT</h3>
            <div class="form-group">
                <label for="name">Name:</label>
                <input id="name" class="form-control" value="{{ $product->name }}" name = "nameEdit">
            </div>

            <div class="form-group">
                <label for="category">Category:</label>
                <select class="form-control" name="categoryEdit" id="categoryEdit">
                    @foreach ($categories as $category)
                        <option value = "{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input id="price" class="form-control" value="{{ $product->price }}" name = "priceEdit">
            </div>

            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input id="quantity" class="form-control" value="{{ $product->quantity }}" name = "quantityEdit">
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input class="form-control" type = "file" name = "imageEdit">
            </div>

            <div class="form-group">
                <label for="description">Detail:</label>
                <input class="form-control" value="{{ $product->detail->content }}" name = "detailEdit" style="height:100px;">
            </div>
            <button class="btn btn-primary" type = "submit">Submit</button>
        </form>
    </div>
</body>
</html>
