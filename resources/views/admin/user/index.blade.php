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
    <div class="col-sm-9" style="background-color:lavender;">
        <h3 style="text-align: center;">USERS' INFORMATION</h3>
        <div class = "container">
        <a href="/auth/register">Add a user</a>
        <table class="table table-striped" style="width:100%;">
            <thead>
            <tr>
                <th>STT</th>
                <th>username</th>
                <th>Email</th>
                <th>Address</th>
                <th>Role</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            </thead>
            <?php $i = 1?>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td> {{ $i++ }} </td>
                        <td> {{ $user->username }} </td>
                        <td> {{ $user->email }}</td>
                        <td> {{ $user->address }} </td>
                        <td> {{ $user->role }} </td>
                        <td>
                            <form action="{{'/admin/user/'.$user->id.'/edit'}}" method="GET">
                                <button type="submit" class ="btn btn-link">Edit</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{'/admin/user/'.$user->id}}" method="POST">
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
