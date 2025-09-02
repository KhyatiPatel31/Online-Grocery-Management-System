<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
session_start();

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - All Stores</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- Main wrapper -->
    <div id="main-wrapper">
        <!-- Header -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Admin Panel</a>
                </div>
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <li class="nav-item">
                            <a class="nav-link nav-toggler hidden-md-up text-muted" href="javascript:void(0)">
                                <i class="mdi mdi-menu"></i>
                            </a>
                        </li>
                        <li class="nav-item m-l-10">
                            <a class="nav-link sidebartoggler hidden-sm-down text-muted" href="javascript:void(0)">
                                <i class="ti-menu"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="images/users/5.jpg" alt="user" class="profile-pic" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- Sidebar -->
        <div class="left-sidebar">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-label">Home</li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false">
                                <i class="fa fa-tachometer"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="dashboard.php">Dashboard</a></li>
                            </ul>
                        </li>
                        <li class="nav-label">Log</li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false">
                                <span><i class="fa fa-user f-s-20"></i></span>
                                <span class="hide-menu">Users</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="allusers.php">All Users</a></li>
                                <li><a href="add_users.php">Add Users</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false">
                                <i class="fa fa-archive f-s-20 color-warning"></i>
                                <span class="hide-menu">Store</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="allstores.php">All Stores</a></li>
                                <li><a href="add_store.php">Add Store</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false">
                                <i class="fa fa-cubes" aria-hidden="true"></i>
                                <span class="hide-menu">Item</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_items.php">All Items</a></li>
                                <li><a href="add_item.php">Add Item</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span class="hide-menu">Orders</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_orders.php">All Orders</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Page wrapper -->
        <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3>
                </div>
            </div>
            <!-- Container fluid -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All stores data</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Store-Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Url</th>
                                                <th>Open Hrs</th>
                                                <th>Close Hrs</th>
                                                <th>Open Days</th>
                                                <th>Address</th>
                                                <th>Store-Image</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM store ORDER BY rs_id DESC";
                                            $query = mysqli_query($db, $sql);

                                            if (mysqli_num_rows($query) > 0) {
                                                while ($rows = mysqli_fetch_assoc($query)) {
                                                    echo "<tr>
                                                        <td>{$rows['title']}</td>
                                                        <td>{$rows['email']}</td>
                                                        <td>{$rows['phone']}</td>
                                                        <td>{$rows['url']}</td>
                                                        <td>{$rows['o_hr']}</td>
                                                        <td>{$rows['c_hr']}</td>
                                                        <td>{$rows['o_days']}</td>
                                                        <td>{$rows['address']}</td>
                                                        <td><img src='Res_img/{$rows['image']}' class='img-responsive radius' style='min-width:150px;min-height:100px;'></td>
                                                        <td>{$rows['date']}</td>
                                                        <td>
                                                            <a href='delete_stores.php?res_del={$rows['rs_id']}' class='btn btn-danger btn-flat btn-addon btn-xs m-b-10'>
                                                                <i class='fa fa-trash-o' style='font-size:16px'></i>
                                                            </a> 
                                                            <a href='update_store.php?res_upd={$rows['rs_id']}' class='btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5'>
                                                                <i class='ti-settings'></i>
                                                            </a>
                                                        </td>
                                                    </tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='11'><center>No Stores Data!</center></td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Container fluid -->
        </div>
    </div>
    <!-- End Wrapper -->
    <!-- All JavaScript -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/lib/datatables/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example23').DataTable();
        });
    </script>
</body>
</html>
