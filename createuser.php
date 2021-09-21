<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/createuser.css">
</head>

<style>
    body{
    font-family: sans-serif;
    margin:0;
    line-height: 1.5;
    background-image: url("images/background.jpg");
    height: 100vh;
    
    background-size: cover;
    background-position: center center;
    position: relative;
}

*{
    box-sizing: border-box;
    margin:0;
}


.container {
        color: white;
        font-size: 17px;

    }

.table-responsive-sm {
        color: white;
        font-size: 30px;

    }

.py-2  {
        color: white;
        font-size: 17px;

    }


.text-center {
        color: white;
        font-size: 20px;

    }
.transfer-popup{
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    z-index: 1099;
    background-color:rgba(0,0,0,0.6);
    visibility: hidden;
    opacity: 0;
    transition: all 1s ease;
}
.transfer-popup.show{
    visibility:visible;
    opacity: 1;
}
.transfer-popup .box{
    height:250px;
    background-color:#ffffff;
    width: 750px;
    position: absolute;
    left: 50%;
    top:50%;
    transform:translate(-50%,-50%);
    display: flex;
    flex-wrap: wrap;
    opacity: 0;
    margin-left: 50px;
    transition: all 1s ease;

}
.transfer-popup.show .box{
    opacity: 1;
    margin-left: 0;
}
.transfer-popup .box .img-area{
    flex:0 0 50%;
    max-width: 50%;
    position: relative;
    overflow: hidden;
    padding:30px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.transfer-popup .box .img-area h1{
    font-size: 30px;
}
.transfer-popup .box .img-area .img{
    position: absolute;
    left:0;
    top:0;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    animation: zoomInOut 7s linear infinite;
    z-index: -1;

}
@keyframes zoomInOut{
    0%,100%{
        transform: scale(1);
    }
    50%{
        transform: scale(1.1);
    }
}
.transfer-popup .box .form{
    flex:0 0 50%;
    max-width: 50%;
    padding:40px 30px;
}

.transfer-popup .box .form h1{
    color:#000000;
    font-size: 30px;
    margin:0 0 30px;
}

.transfer-popup .box .form .close{
    position: absolute;
    right: 10px;
    top:0px;
    font-size: 30px;
    cursor: pointer;
}


@media(max-width: 767px){
    .transfer-popup .box{
        width: calc(100% - 30px);
    }
    .transfer-popup .box .img-area{
        display: none;
    }
    .transfer-popup .box .form{
        flex: 0 0 100%;
        max-width: 100%;
    }
}

    </style>

    <style type="text/css">
      button{
        transition: 1.5s;
      }
      button:hover{
        background-color:#616C6F;
        color: white;
      }
    </style>

<body>
<?php
    include 'config.php';
    if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $balance=$_POST['balance'];
    $sql="insert into users(name,email,balance) values('{$name}','{$email}','{$balance}')";
    $result=mysqli_query($conn,$sql);
    if($result){
               echo "<script> alert('Hurray! User created');
                               window.location='transfermoney.php';
                     </script>";
                    
    }
  }
?>

<?php
  include 'navbar.php';
?>

        <h2 class="text-center pt-4" style="font-size:43px">Add New User</h2> 
        <br><br>

  <div class="background">
  <div class="container">
    <div class="screen">
      <div class="screen-header">
        <div class="screen-header-right">
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
        </div>
      </div>
      <div class="screen-body">
        <div class="screen-body-item left">
          <img class="img-fluid" src="images/user.jpg" style="border: none; border-radius: 50%;">
        </div>
        <div class="screen-body-item">
          <form class="app-form" method="post">
            <div class="app-form-group">
              <input class="app-form-control" placeholder="NAME" type="text" name="name" required>
            </div>
            <div class="app-form-group">
              <input class="app-form-control" placeholder="EMAIL" type="email" name="email" required>
            </div>
            <div class="app-form-group">
              <input class="app-form-control" placeholder="BALANCE" type="number" name="balance" required>
            </div>
            <br>
            <div class="app-form-group button">
              <input class="app-form-button" type="submit" value="CREATE" name="submit"></input>
              <input class="app-form-button" type="reset" value="RESET" name="reset"></input>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>