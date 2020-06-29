
        <div id="sidebar" class="well sidebar-nav" style="height:100%; position: fixed; z-index: 1;top: 0;
        left: 0; width:400px;">
            <h5><i class="glyphicon glyphicon-home"></i>
                <small><b>MANAGEMENT</b></small>
            </h5>
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#">Products</a></li>
                <li><a href="../admin/products">Products List</a></li>
                <li><a href="../admin/categories">Categories List</a></li>
            </ul>
            <h5><i class="glyphicon glyphicon-user"></i>
                <small><b>USERS</b></small>
            </h5>
            <ul class="nav nav-pills nav-stacked">
                <li><a href="../admin/users">Users List</a></li>
                <li><a href="../admin/orders">Orders</a></li>
                <form action="/auth/logout" method="post">
                    @csrf
                    <button type="submit" class="btn btn-link">Logout</button>
                </form>

            </ul>
        </div>

