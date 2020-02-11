<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
    <style>
    body, html {
      height: 100%;
      margin: 0;
      font-family: 'Lobster', cursive;
      font-family: 'Source Code Pro', monospace;

    }
    li{

      background-color: black;
      float: left;
      border: none;
      outline: none;
      cursor: pointer;
      padding: 14px 16px;
      font-size: 17px;
      width: 20%;
    }
    li:hover{
     background-color: grey;
   }

   body{background-color:teal;
    color:white;
  }
  .error{
    color:orange;
  }
  body
{
    counter-reset: Count-Value;     
}
table
{
    border-collapse: separate;
    
}
tr td:first-child:before
{
  counter-increment: Count-Value;   
  content:  counter(Count-Value);
}
.btn-save{
  display:none;
}
</style>
</head>
<body>
    <ul class="nav nav-justified tabs">
      <li class="nav-item">
        <a class="nav-link active" href="<?php echo base_url(); ?>welcome/index">HOME</a>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="<?php echo base_url(); ?>welcome/category" id="navbardrop" data-toggle="dropdown">
        CATEGORY
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?php echo base_url(); ?>welcome/category">Create Category</a>
        <a class="dropdown-item" href="<?php echo base_url(); ?>welcome/cate_view">View Categories Created</a>
      </div>
    </li>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="<?php echo base_url(); ?>welcome/product" id="navbardrop" data-toggle="dropdown">
        PRODUCT
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?php echo base_url(); ?>welcome/product">Create Product</a>
        <a class="dropdown-item" href="<?php echo base_url(); ?>welcome/pro_view">View Products Created</a>
      </div>
    </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="<?php echo base_url(); ?>welcome/item" id="navbardrop" data-toggle="dropdown">
        ITEM
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?php echo base_url(); ?>welcome/item">Create Item</a>
        <a class="dropdown-item" href="<?php echo base_url(); ?>welcome/item_view">View Items Created</a>
      </div>
    </li>
    </ul>