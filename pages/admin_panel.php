<?php
    session_start();

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
        header('location:admin_login_page.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin Panel</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">

</head>

<body class="profile-page sidebar-collapse">

    <nav class = "navbar navbar-expand navbar-fixed-top" role = "navigation" style="background: black;">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" rel="tooltip" title="" data-placement="bottom" target="">
                Emart
                </a>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                    <span class="navbar-toggler-bar bar4"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="../assets/img/blurred-image-1.jpg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="admin_panel.php" onclick="scrollToDownload()">
                            <i class="now-ui-icons users_circle-08"></i>
                            <p>
                                <?php
                                 include('../config/dbconn.php');
                                 $query=mysqli_query($dbconn,"SELECT * FROM `admin` WHERE user_id='".$_SESSION['id']."'");
                                 $row=mysqli_fetch_array($query);
                                ?>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin_products.php">
                            <p>List of All Products</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link" href="" onclick="scrollToDownload()">
                            <p>Logout</p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
               <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <h4 class="title text-center">Administrator Dashboard</h4>
                        <div class="nav-align-center">
                            <ul class="nav nav-pills nav-pills-primary" role="tablist">             
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#products" role="tablist">
                                        <i class="now-ui-icons shopping_tag-content"></i>
                                    </a>
                                </li>         
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#user_accounts" role="tablist">
                                        <i class="now-ui-icons users_circle-08"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#admin_accounts" role="tablist">
                                        <i class="now-ui-icons users_circle-08"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Tab panes -->
                    <div class="tab-content gallery">
                        <div class="tab-pane active" id="products" role="tabpanel">
                            <div class="col-md-12 ml-auto mr-auto">
                                <div class="row collections">
                                    <br>
                                    <div class="row">
                                        <div align="center">
                                            <h3>Product Information</h3>
                                        </div>
                                    </div>
                                    <br>
                                      <?php
                                      include('../config/dbconn.php');

                                      $action = isset($_GET['action']) ? $_GET['action'] : "";
                                      if($action=='deleted'){
                                          echo "<div class='alert alert-success'>Record was deleted.</div>";
                                      }
                                      $query = "SELECT * FROM products ORDER BY prod_name ASC";
                                      $result = mysqli_query($dbconn,$query);
                                      ?>    
                                <br>
                                <br>
                                <table id="" class="table table-condensed table-striped">
                                    <tr>
                                      <th>Serial</th>
                                      <th>Product Name</th>
                                      <th>Description</th>
                                      <th>Cost</th>
                                      <th>Price</th>
                                      <th>Quantity</th>
                                      <th>Category</th>  
                                      <th>Tools</th>
                                    </tr>
                                        <?php
                                          if($result){
                                            while($res = mysqli_fetch_array($result)) {     
                                              echo "<tr>";
                                                echo "<td>".$res['prod_serial']."</td>";
                                                echo "<td>".$res['prod_name']."</td>";
                                                echo "<td>".$res['prod_desc']."</td>";
                                                echo "<td>".$res['prod_cost']."</td>";  
                                                echo "<td>".$res['prod_price']."</td>"; 

                                                $prod_qty=$res['prod_qty'];
                                                
                                                if ($prod_qty<=10){
                                                ?>
                                                 <td><span style="color:red;"><?php echo $res['prod_qty'];?> : Reorder!</span></td>  
                                                 <?php
                                                }else{
                                               ?>
                                               <td><?php echo $res['prod_qty'];?></td>
                                               </ul>
                                               <?php } 

                                                echo "<td>".$res['category']."</td>";
                                                echo "<td><a href=\"product_add_qty.php?prod_id=$res[prod_id]\">Change quantity</a> | <a href=\"product_update.php?prod_id=$res[prod_id]\">Edit</a> | <a href=\"product_delete.php?prod_id=$res[prod_id]
                                                \" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                                              echo "</tr>"; 
                                            }
                                          }?>
                                </table>
                                <br><br>
                                <a class="btn btn-success" href="product_add.php">Add Product</a>
                                </div>
                            </div>
                        </div>         
                        <div class="tab-pane" id="user_accounts" role="tabpanel">
                            <div class="col-md-12 ml-auto mr-auto">
                                <div class="row collections">
                                    <br>
                                    <div class="row">
                                        <div align="center">
                                            <h3>User Information</h3>
                                        </div>
                                    </div>
                                    <br>                
                                    
                                      <?php
                                      include('../config/dbconn.php');

                                      $action = isset($_GET['action']) ? $_GET['action'] : "";
                                      if($action=='deleted'){
                                          echo "<div class='alert alert-success'>Record was deleted.</div>";
                                      }
                                      $query = "SELECT * FROM users ORDER BY firstname ASC";
                                      $result = mysqli_query($dbconn,$query);
                                      ?>  
                                 
                                <br>
                                <br>
                                <table class="table table-condensed table-striped">
                                    <tr>
                                      <th>First Name</th>
                                      <th>Middle Name</th>
                                      <th>Last Name</th>
                                      <th>Address</th>
                                      <th>Email</th>
                                      <th>Contact</th>
                                      <th>Tools</th>
                                    </tr>
                                        <?php
                                          if($result){
                                            while($res = mysqli_fetch_array($result)) {     
                                              echo "<tr>";
                                                echo "<td>".$res['firstname']."</td>";
                                                echo "<td>".$res['middlename']."</td>";
                                                echo "<td>".$res['lastname']."</td>";
                                                echo "<td>".$res['address']."</td>";  
                                                echo "<td>".$res['email']."</td>"; 
                                                echo "<td>".$res['contact']."</td>";
                                                echo "<td><a href=\"user_delete.php?user_id=$res[user_id]
                                                \" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                                              echo "</tr>"; 
                                            }
                                          }?>
                                </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="admin_accounts" role="tabpanel">
                            <div class="col-md-12 ml-auto mr-auto">
                                <div class="row collections">
                                    <br>
                                    <div class="row">
                                        <div align="center">
                                            <h3>Admin Information</h3>
                                        </div>
                                    </div>
                                    <br>                
                                    
                                      <?php
                                      include('../config/dbconn.php');

                                      $action = isset($_GET['action']) ? $_GET['action'] : "";
                                      if($action=='deleted'){
                                          echo "<div class='alert alert-success'>Record was deleted.</div>";
                                      }
                                      $query = "SELECT * FROM admin ORDER BY firstname ASC";
                                      $result = mysqli_query($dbconn,$query);
                                      ?>  
                                <br>
                                <br>
                                <table class="table table-condensed table-striped">
                                    <tr>
                                      <th>First Name</th>
                                      <th>Last Name</th>
                                      <th>Email</th>
                                      <th>Username</th>
                                      <th>Option</th>
                                    </tr>
                                        <?php
                                          if($result){
                                            while($res = mysqli_fetch_array($result)) {     
                                              echo "<tr>";
                                                echo "<td>".$res['firstname']."</td>";
                                                echo "<td>".$res['lastname']."</td>";
                                                echo "<td>".$res['email']."</td>";
                                                echo "<td>".$res['username']."</td>";  
                                                echo "<td><a href=\"admin_account_update.php?user_id=$res[user_id]\">Edit</a></td>";
                                              echo "</tr>"; 
                                            }
                                          }?>
                                </table>
                                <br><br>
                                <a class="btn btn-success" href="admin_signup.php"> Add Account</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<script src="../assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="../assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        nowuiKit.initSliders();
    });

    function scrollToDownload() {

        if ($('.section-download').length != 0) {
            $("html, body").animate({
                scrollTop: $('.section-download').offset().top
            }, 1000);
        }
    }
</script>
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <script src="../plugins/app.min.js"></script>
    <script src="../plugins/demo.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script>
      $(function () {
        $("#example1").DataTable({
        });
      });
    </script>
</html>