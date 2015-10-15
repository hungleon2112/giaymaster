<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Giày MasterC - Admin</title>

    @include('_partials.admin_css_include')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">MasterC Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="/admin/dashboard"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#branch"><i class=""></i> Nhánh hàng <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="branch" class="collapse">
                            <li>
                                <a href="/admin/branch/add">Thêm</a>
                            </li>
                            <li>
                                <a href="/admin/branch/list">Danh sách</a>
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#brand"><i class=""></i> Thương hiệu <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="brand" class="collapse">
                            <li>
                                <a href="/admin/brand/add">Thêm</a>
                            </li>
                            <li>
                                <a href="/admin/brand/list">Danh sách</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#role"><i class=""></i> Role <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="role" class="collapse">
                            <li>
                                <a href="/admin/role/add">Thêm</a>
                            </li>
                            <li>
                                <a href="/admin/role/list">Danh sách</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#user"><i class=""></i> User <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="user" class="collapse">
                            <li>
                                <a href="/admin/user/add">Thêm</a>
                            </li>
                            <li>
                                <a href="/admin/user/list">Danh sách</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#product"><i class=""></i> Sản phẩm <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="product" class="collapse">
                            <li>
                                <a href="/admin/product/add">Thêm</a>
                            </li>
                            <li>
                                <a href="/admin/product/list">Danh sách</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#order"><i class=""></i> Đơn hàng <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="order" class="collapse">
                            <li>
                                <a href="/admin/order/list">Danh sách</a>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#coupon"><i class=""></i> Coupon <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="coupon" class="collapse">
                            <li>
                                <a href="/admin/coupon/add">Thêm</a>
                            </li>
                            <li>
                                <a href="/admin/coupon/list">Danh sách</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#agent"><i class=""></i> Đại lý <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="agent" class="collapse">
                            <li>
                                <a href="/admin/agentBeginner/list">Danh sách đại lý mới</a>
                            </li>
                            <li>
                                <a href="/admin/agentOfficial/list">Danh sách đại lý chính thức</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#discount"><i class=""></i> Discount <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="discount" class="collapse">
                            <li>
                                <a href="/admin/discount/add">Thêm</a>
                            </li>
                            <li>
                                <a href="/admin/discount/list">Danh sách</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
                @yield('content')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->




@include('_partials.admin_js_include')



</body>

</html>
