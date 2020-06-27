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
        <div class="col-xs-5 .col-sm-6 .col-lg-4" style="background-color:lavender;">
            @include('partials/menu')
        </div>
        <div class="col-xs-7 .col-sm-6 .col-lg-8" style="background-color:lavender;">
            <h3 style="text-align: center;">CATEGORIES' INFORMATION</h3>
            <div class = "container">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <?php $i = 1?>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td> {{ $i++ }} </td>
                                <td> {{ $category->name }} </td>
                                <td>
                                    <form action="{{'/admin/category/'.$category->id.'/edit'}}" method="GET">
                                        <button type="submit" class ="btn btn-link">Edit</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{'/admin/category/'.$category->id}}" method="POST">
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
</body>
</html>
