<!--connect to database-->

<?php
include('./Connectors/connect.php');
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <!--bootstarp CSS link-->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ecommerce Website Using PHP and mySQL</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!--font link-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

  <!--navigation-bar-->
  <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
      <a class="navbar-brand" href="#">
        <h3>Emart</h3>
      </a>
      <div class="container-fluid">
        <img src="./images/logo.png" alt="" class="logo">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
            </li>

            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>


    <nav class="navbar navbar-expand-1g navbar-dark bg-secondary">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">

        <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li>
    </nav>


    <div class="row">
      <div class="col-md-2 bg-secondary p-0">
        <!--categories-->
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg info">
            <a href="#" class="nav-link text-info">
              <h4>Categories</h4>
            </a>
          </li>
          <?php
          $select_categories = "Select * from categories";
          $result_categories = mysqli_query($con, $select_categories);

          while ($row_data = mysqli_fetch_assoc($result_categories)) {
            $category_title = $row_data['category_title'];
            $category_id = $row_data['category_id'];
            echo "<li class='nav-item'><a href='index.php?$category_title=$category_id' class='nav-link text-light'>$category_title</a></li>";
          }
          ?>
        </ul>

      </div>
      <div class="col-md-10">
        <!--products-->
        <div class="row">

          <!--fetching Products-->

          <?php

          $select_query = "select * from products order by product_price";
          $result_query = mysqli_query($con, $select_query);


          while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image = $row['product_image'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            echo "<div class='col-md-4 mb-2'>
  <div class='card'>
              <img src='./admin/product_images/$product_image' 
              class='card-img-top' alt='$product_title'>
              <div class='card-body'>
                 <h5 class='card-title'>$product_title</h5> <p class='card-text'>$product_description</p>
                 <h5> Price: $product_price</h5>
                 <a href='#' class='btn btn-info'>Add to cart</a>
                 <a href='#' class='btn btn-secondary '>View more</a>
                 
              </div>




       </div>
    </div>";

          }
          ?>


          <!--bootstarp JS link-->
          <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>
</body>

</html>