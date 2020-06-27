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
        <form method="POST" action="{{'/admin/products'}}" class = "form" enctype="multipart/form-data" >
            @csrf
            <h3 style="text-align: center;">ADD A PRODUCT</h3>
            <div class="form-group">
                <label for="name">Name:</label>
                <input id="name" class="form-control" name = "name">
                @error('name')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="category">Category:</label>
                <select class="form-control" name="category" id="category">
                    @foreach ($categories as $category)
                        <option value = "{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input id="price" class="form-control" name = "price">
                @error('price')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input id="quantity" class="form-control" name = "quantity">
                @error('quantity')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input class="form-control" type = "file" name = "image">
                @error('image')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Detail:</label>
                <input class="form-control" name = "detail" style="height:100px;">
                @error('detail')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-primary" type = "submit">Submit</button>
        </form>
    </div>
</body>
</html>
