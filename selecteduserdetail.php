<?php
include 'config.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops!!! Negative values cannot be accepted...")';  // showing an alert box.
        echo '</script>';
    }


  
    // constraint to check insufficient balance.
    else if($amount > $sql1['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Oops!!! Insufficient Balance...")';  // showing an alert box.
        echo '</script>';
    }
    


    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops!!! Zero value cannot be accepted...')";
         echo "</script>";
     }


    else {
        
                // deducting amount from sender's account
                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$from";
                mysqli_query($conn,$sql);
             

                // adding amount to reciever's account
                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['name'];
                $receiver = $sql2['name'];
                $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction is Successful!!!');
                                     window.location='transactionhistory.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">

    <style type="text/css">
    	
		button{
			border:none;
			background: #d9d9d9;
		}
	    button:hover{
			background-color:#777E8B;
			transform: scale(1.1);
			color:white;
		}

    </style>
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
  include 'navbar.php';
?>

	<div class="container">
        <h2 class="text-center pt-4" style="font-size:43px">Transaction</h2>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  users where id=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table class="table table-striped table-condensed table-bordered">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Balance</th>
                </tr>
                <tr>
                    <td class="py-2"><?php echo $rows['id'] ?></td>
                    <td class="py-2"><?php echo $rows['name'] ?></td>
                    <td class="py-2"><?php echo $rows['email'] ?></td>
                    <td class="py-2"><?php echo $rows['balance'] ?></td>
                </tr>
            </table>
        </div>
        <br><br><br>
        <label>Transfer To:</label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM users where id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['name'] ;?> (Balance: 
                    <?php echo $rows['balance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
            <label>Amount:</label>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
            <button class="btn mt-3" name="submit" type="submit" id="myBtn">Transfer</button>
            </div>
        </form>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>