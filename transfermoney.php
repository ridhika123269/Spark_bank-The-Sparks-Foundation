<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">

</head>

<style>
    body{
    font-family: sans-serif;
    margin:0;
    line-height: 1.5;
    background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)) ,url("images/background.jpg");
    height: 100vh;
    -webkit-background-size:cover;
    background-size: cover;
    background-position: center center;
    position: relative;
    color: white;
}

*{
    box-sizing: border-box;
    margin:0;
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

/*responsive*/
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
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn,$sql);
?>

<?php
  include 'navbar.php';
?>

<div class="container">
        <h2 class="text-center pt-4" style="color:white">Transfer Money</h2>
        <br>
            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                    <table class="table table-hover table-sm table-striped table-condensed table-bordered">
                        <thead>
                            <tr>
                            <th scope="col" class="text-center py-2">Id</th>
                            <th scope="col" class="text-center py-2">Name</th>
                            <th scope="col" class="text-center py-2">E-Mail</th>
                            <th scope="col" class="text-center py-2">Balance</th>
                            <th scope="col" class="text-center py-2">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php 
                    while($rows=mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td class="py-2"><?php echo $rows['id'] ?></td>
                        <td class="py-2"><?php echo $rows['name']?></td>
                        <td class="py-2"><?php echo $rows['email']?></td>
                        <td class="py-2"><?php echo $rows['balance']?></td>
                        <td><a href="selecteduserdetail.php?id= <?php echo $rows['id'] ;?>"> <button type="button" class="btn">Transact</button></a></td> 
                    </tr>
                <?php
                    }
                ?>
            
                        </tbody>
                    </table>
                    </div>
                </div>
            </div> 
         </div>
         <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 
</body>
</html>