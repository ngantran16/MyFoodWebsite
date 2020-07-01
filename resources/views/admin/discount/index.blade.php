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
        <div class="col-sm-9" style="background-color:#C6E2FF;">
            <h3 style="text-align: center;">DISCOUNTS' INFORMATION</h3>
            <div class = "container">
                <table class="table table-striped" style="width:100%;">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Code</th>
                        <th>Sale</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <?php $i = 1?>
                    <tbody>
                        @foreach ($discounts as $discount)
                            <tr>
                                <td> {{ $i++ }} </td>
                                <td> {{ $discount->code }} </td>
                                <td> {{ $discount->sale }}%</td>
                                <td>
                                    <form action="{{'/admin/discount/'.$discount->id}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class = "btn btn-link"><i class="far fa-trash-alt"></i></button>
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
