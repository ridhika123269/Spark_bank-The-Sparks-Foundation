<html lang="en">
    <head>
	 <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">

        <title>SPARKS FOUNDATION BANK</title>
        <link rel="stylesheet" href="Home.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>


      <header style="height: 500px;">
          <div class="wrapper">
              <div class="logo">
                  <img src="images/logo.jpg" alt="">
              </div>
              <ul class="nav-area">
                  <li><a href="#">Home</a></li>
                  <li><a href="createuser.php">Create a User</a></li>
                  <li><a href="transfermoney.php">Transfer Money</a></li>
                  <li><a href="transactionhistory.php">Transaction History</a></li>
              </ul>
          </div>

          <div class="welcome" style="margin-top: 250px;">
              <div class="banner">
            
            <h2><center>WELCOME</center></h2>
        </div>
             
          </div>

      </header>  





      <div class="slideshow-container">

<!-- Full-width images with number and caption text -->
<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="images/Home_Loan.jpg" style="width:100%; height:50%">
  <div class="text" >Best Home Loan</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="images/Education_Loan.jpg" style="width:100% ; height:50%">
  <div class="text">Student Loan</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="images/car_loan.jpg" style="width:100% ; height:50%">
  <div class="text">Car Loan</div>
</div>

<!-- Next and previous buttons -->
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
<span class="dot" onclick="currentSlide(1)"></span>
<span class="dot" onclick="currentSlide(2)"></span>
<span class="dot" onclick="currentSlide(3)"></span>
</div>


<style>
    * {box-sizing:border-box}

/* Slideshow container */
.slideshow-container {
  max-width: 60%;
  position: relative;
  margin: auto;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: blueviolet;
  font-size: 30px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 2.0s;
  animation-name: fade;
  animation-duration: 2.0s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}
    </style>

    <script>
        var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
        </script>













      <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900');
        *
        {
            margin: 0;
            padding: 0;
            font-family: 'Poppins',sans-serif;
        }
        .banner
        {
            position: absolute;
	    margin-left: 370px;
	   
            width: 550px;
            height: 25vh;
            overflow: hidden;
            display: flex;
        }
        
        .banner h2
        {
           
           margin: auto;
            width: 100%;
            height: 100%;
            background: #fff;
            font-size: 100px;
            text-align: center;
            text-transform: uppercase;
            color: #000;
            mix-blend-mode: screen;
        }
    </style>
      <style>
          #foot
{

    margin-top: 100px;
    height: 180px;
	background-color: black;
	color: white;
    width:100%;
}
#contact
{
	padding-left: 45px;
	font-size: 25px;
}
#fadd
{
	padding-left: 800px;
}
      </style>
      <table id="foot" width="100%">
        <tr>
	<td></td>
        <td id="contact">
        Contact Me - 
        </td>
        </tr>
        <tr>
        <td id="fadd" width="30%">
        <i class="fa fa-linkedin-square" style="font-size:25px;"></i> 
        </td>
        <td><a href="https://www.linkedin.com/in/ridhika-sahni-b033661b5/">
        www.linkedin.com/in/ridhika-sahni-b033661b5
	</a>
        </td>
        </tr>
        
        
        
        </table>
     <br>
     <b style="margin-left:1000px; background-color: black; color: white; padding: 20px;text-align:right; font-size: 10px;"><i>Designed by <b>Ridhika Sahni</b></i></b>
     <br><br>
      <b style="margin-left:1000px; background-color: black; color: white; padding: 20px;text-align:right; font-size: 10px;"><i> <b>The Sparks Foundation</b> </i></b>
     <br><br><br><br><br>
    </body>
</html>
