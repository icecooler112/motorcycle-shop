<?php
require_once"include/connect.php";
if(isset($_SESSION["USER_ID"])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="include/libs/css/navbar.css">

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    
</head>
<style>
    body {
        background-color: #eceff4 !important;
    }
</style>

<body>

<ul style="width:220px;">
    <h3 class="text-white text-center mt-3 pb-3">
  </div>
            
        <li class="nav-item dropdown">
          <p class="nav-link dropdown" href="">
          <h5><?php echo $_SESSION["first_name"];?> <?php echo $_SESSION["last_name"];?></h5>
          </p>
        </li>
    </h3>
  <li><a class="active text-white text-center" href=""><i class="">Dashboard</i> </a></li>
  <li><a class="text-white text-center" href=""><i class=""> History </i></a></li>
  <li><a href=""><i class=""></i> </a></li>
  <li><a href=""> <i class=""></i> </a></li>
  <li><a href=""> <i class=" "></i> </a></li>
  <li><a href=""><i class=""></i></a></li>
  <hr width=auto size=3>
  <li><a class="nav-item text-white text-center" href="" data-toggle="modal" data-target="#LogoutModal" ><i class=""></i>Logout</a></li>
  </ul>
      </div>
<div id="LogoutModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Logout ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
          <h1 style="font-size:5.5rem;"><i class="fa fa-sign-out text-danger" aria-hidden="true"></i></h1>
          <p>Are you sure you want to log-out?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="logout.php" class="btn btn-danger">Logout</a>
      </div>
    </div>
  </div>
</div>

</body>

</html>

<?php 
}else{
    // header("location:login.php");} 
    include"login.php";
}
?>