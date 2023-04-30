<?php
include('config/dbconn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Search Results</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet"/>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet"/>
    <link href="assets/style.css" rel="stylesheet"/>
</head>

<body class="index-page sidebar-collapse">
    
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
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="./assets/img/blurred-image-1.jpg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="pages/user_login_page.php" class="nav-link" href="javascript:void(0)" onclick="scrollToDownload()">
                            <p>Login</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/user_signup.php" class="nav-link" onclick="scrollToDownload()">
                            <p>Sign up</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/products.php">
                            <p>Our Products</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" onclick="scrollToDownload()">
                            <p>Cart</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="wrapper"></div>
        <br>
        <div class="main">
            <div class="section section-basic">
                <div class="container">
                    <br>
                    <div class="col-md-12">
                        <h2 class="title">Search Results</h2>
                        
                    </div>
                        <br>
                        <label><b>Search Product: &nbsp</b></label>       
                                <form method="POST" action="index_search.php" >
                                    <input type="text" name="search" class="search-query" placeholder="Enter product name">
                                </form>
                    </div>
                    <br><hr color="black">

                    <div class="tab-pane  active" id="">
                        <ul class="thumbnails">
                            <?php
                            if (isset($_POST['search'])){
                                                            
                            $search=$_POST['search'];
                                                                
                            $query="SELECT * FROM products WHERE category LIKE '%$search%' OR prod_name LIKE '%$search%' OR prod_desc LIKE '%$search%'";
                            $result = mysqli_query($dbconn,$query);
                            while($res=mysqli_fetch_array($result)){
                                $prod_id=$res['prod_id'];
                            ?> 

                            <div class="row-sm-3">
                                <div class="thumbnail">
                                    <?php if($res['prod_pic1'] != ""): ?>
                                    <img src="uploads/<?php echo $res['prod_pic1']; ?>" width="300px" height="200px">
                                    <?php else: ?>
                                    <img src="uploads/default.png" width="300px" height="200px">
                                    <?php endif; ?>
                                <div class="caption">
                                  <h5><b><?php echo $res['prod_name'];?></b></h5>
                                  <h6><a class="btn btn-success btn-round" title="Click for more details!" href="pages/product_details.php?prod_id=<?php echo $res['prod_id'];?>"><i class="now-ui-icons gestures_tap-01"></i>View</a><medium class="pull-right">Php<?php echo $res['prod_price']; ?></medium></h6>
                                </div>

                                </div>
                              <hr color="orange">
                              </div>
                                     
                                <?php }?> 
                            <?php }?> 

                        </ul>
                    </div>
        


    </div>     
</div>
        
    </div>
</body>
<script src="./assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="./assets/js/plugins/bootstrap-switch.js"></script>
<script src="./assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<script src="./assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="./assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>
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

    <script src="./plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="./plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/google-code-prettify/prettify.js"></script>
    <script src="assets/js/application.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>
    <script src="assets/js/bootstrap-affix.js"></script>
    <script src="assets/js/jquery.lightbox-0.5.js"></script>
    <script src="assets/js/bootsshoptgl.js"></script>
     <script type="text/javascript">
    $(function() {
        $('#gallery a').lightBox();
    });
    </script>

    <script src="./plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="./plugins/fastclick/fastclick.min.js"></script>
    <script src="./plugins/app.min.js"></script>
    <script src="./plugins/demo.js"></script>
    <script src="./plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="./plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script>
      $(function () {
        $("#example1").DataTable({
        });
      });
    </script>

</html>