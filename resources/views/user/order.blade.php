<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="{{URL::asset('../css/order.css')}}">
</head>
<body>
    <div class="container wrapper">
            <div class="row cart-head">
                <div class="container">
                <div class="row">
                    <p></p>
                </div>
                <div class="row">
                    <p></p>
                </div>
                </div>
            </div>
            <div class="row cart-body">
                <form class="form-horizontal" method="post" action="/payment" enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                        <!--REVIEW ORDER-->
                        <?php $total = 0 ?>
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Review Order <div class="pull-right"><small><a class="afix-1" href="/cart">Edit Cart</a></small></div>
                            </div>
                            <div class="panel-body">
                                @foreach ($cart as $item)
                                    @foreach ($item->products as $product)
                                        <?php $total += $product->price * $item->quantity ?>
                                    @endforeach
                                    <div class="form-group">
                                        <div class="col-sm-3 col-xs-3">
                                            @foreach ($item->products as $product)
                                                <img class="img-responsive" style = "width:120px; height:80px;" src='{{'/storage/'.$product->image }}'/>
                                            @endforeach
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="col-xs-12">{{ $item->name }}</div>
                                            <div class="col-xs-12"><small>Quantity:<span>{{ $item->quantity }}</span></small></div>
                                            @foreach ($item->products as $product)
                                                <div class="col-xs-12"><small>Unit price:
                                                    <span>
                                                        {{ number_format($product->price,0,',','.')." VND" }}
                                                    </span></small>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-sm-3 col-xs-3 text-right">
                                            <h6>
                                                @foreach ($item->products as $product)
                                                    {{ number_format($product->price * $item->quantity,0,',','.')." VND" }}
                                                @endforeach
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="form-group"><hr /></div>
                                @endforeach
                                <div class="form-group"><hr /></div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <strong>Order Total</strong>
                                        <div class="pull-right">
                                            <b>{{ number_format($total,0,',','.')." VND" }} </b>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <strong>Discount</strong>
                                        <div class="pull-right">
                                            <b>
                                                @if (Session::has('discount'))
                                                   {{ Session::get('discount') }}%
                                                @endif
                                            </b>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <strong>Total</strong>
                                        <div class="pull-right">
                                            <b>
                                                @if (Session::has('discount'))
                                                   {{ number_format($total - (Session::get('discount')*$total)/100,0,',','.')." VND" }}
                                                @endif
                                            </b>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div style="float:right; margin-right:20px;">
                                        <button type="submit" class="btn btn-primary btn-submit-fix">Payment</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--REVIEW ORDER END-->
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6" >
                        <!--SHIPPING METHOD-->
                        <div class="panel panel-info">
                            <div class="panel-heading">Address</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <h4>Shipping Address</h4>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>City:</strong></div>
                                    <div class="col-md-12">
                                        <input type="text" name="city" class="form-control"/>
                                        @error('city')
                                            <div style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-xs-12">
                                        <strong>First Name:</strong>
                                        <input type="text" name="firstname" class="form-control"/>
                                        @error('firstname')
                                            <div style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="span1"></div>
                                    <div class="col-md-6 col-xs-12">
                                        <strong>Last Name:</strong>
                                        <input type="text" name="lastname" class="form-control"/>
                                        @error('lastname')
                                            <div style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Address:</strong></div>
                                    <div class="col-md-12">
                                        <input type="text" name="address" class="form-control"/>
                                        @error('address')
                                            <div style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Phone Number:</strong></div>
                                    <div class="col-md-12">
                                        <input type="text" name="phonenumber" class="form-control"/>
                                        @error('phonenumber')
                                            <div style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Email Address:</strong></div>
                                    <div class="col-md-12">
                                        <input type="text" name="email" class="form-control"/>
                                        @error('email')
                                            <div style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                </div>
                            </div>
                        </div>
                </form>
            </div>
    </div>
</body>
</html>
