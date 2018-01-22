<?php 
session_start();
require "head.php";
?>


<body>
<!--Header-->
	<div class="header" id="home">
		<!--Top-Bar-->
		<?php require "topbar.php"; ?>
		<!--//Top-Bar-->
<div class="w3-aglie-about" id="about">
<div class="container">
		<div class="w3-agile-about-grids">
			<div class="col-md-6 about-left-grid">
				<h4 style='color:midnightblue'>Parents,</h4>
				<p> We know that finding quality childcare can be difficult and very stressful. We aim to make this process simple and easy for you by providing you with all the information you need to make an educated decision about which centre will be best suited to you and your child.
				<br/><br/>
				Easily search and compare multiple childcare services in your area by viewing centre descriptions, photos, services offered, availabilities and even prices. You can share your experience with others by rating and posting a review of a centre to help others on their childcare search journey.
				<br/><br/>
				To make things easy, you can save your enrolment form information for future use, meaning you save time whenever you use empty spot. You can also save your favourite childcare centres and next time you log in, go straight to their page to see what empty spots they have available.
				<br/><br/>
				Once you have found the centre you like, book a tour or even book a casual spot at the centre right there and then, anywhere, anytime.
				<br/><br/>
				It’s as easy as that…<br/><br/>
				</p>
				<img src='images/logo/logo.jpg' width='300px'>
			</div>
			<div class="col-md-6 about-right-grid">
				<div class=" w3-services-grids-right">
				</div>
				<br/><br/>
				<center><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#ModalRegister" id="buttonregister"><i class="fa fa-star-o"> &nbsp Register New Account! It's Free!</i></button>
				<label>Already have an account? <a onclick='gotoindex()' style='color:crimson'> Login Here! </a></label>
				</center>
			<div class="clearfix"></div>
		</div>
</div>
</div>
</div>


  <!-- Modal -->
  <div class="modal fade" id="ModalRegister" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Register a Parent Account</h4>
          <center><p class="modal-title">It is free to create your profile, so why not take a few minutes to complete the form now. </p></center>
        </div>

        <div class="modal-body">
        	<form action="" class="w3-container w3-card-4 w3-light-grey w3-text-pink w3-margin" method="post">
          	<div class="w3-row w3-section">
			  <div class="w3-col" style="max-width:50px"><i class="w3-xxlarge fa fa-envelope"></i></div>
			    <div class="w3-rest">
			      <input class="w3-input w3-border" name="email" type="email" placeholder="email" required>
			    </div>
			</div>
			<div class="w3-row w3-section">
			  <div class="w3-col" style="max-width:50px"><i class="w3-xxlarge fa fa-street-view"></i></div>
			    <div class="w3-rest">
			      <input class="w3-input w3-border" name="firstname" type="text" placeholder="first name" required>
			    </div>
			</div>

          	<div class="w3-row w3-section">
			  <div class="w3-col" style="max-width:50px"><i class="w3-xxlarge fa fa-street-view"></i></div>
			    <div class="w3-rest">
			      <input class="w3-input w3-border" name="lastname" type="text" placeholder="last name" required>
			    </div>
			</div>
			<div class="w3-row w3-section">
			  <div class="w3-col" style="max-width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
			    <div class="w3-rest">
			      <input class="w3-input w3-border" name="username" type="text" placeholder="username" required>
			    </div>
			</div>
			<div class="w3-row w3-section">
			  <div class="w3-col" style="max-width:50px"><i class="w3-xxlarge fa fa-lock"></i></div>
			    <div class="w3-rest">
			      <input class="w3-input w3-border" name="password" type="password" placeholder="password" required>
			    </div>
			</div>

			<button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding" name='register'>Register</button>
			<center><label>Already have an account? <a href='index.php?action=login' style='color:midnightblue'>Login Here!</a></label></center>
			<br/>
		</form>
        	
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
   </div>


</body>
<!--//about-->

<script>
function gotoindex(){
	location.href= 'index.php?action=login';

}
</script>


<script>
$(document).ready(function(){
   
    $("#buttonregister").click(function(){
        $("#ModalRegister").modal({backdrop: "static"});
    });
});
</script>


<?php

if(isset($_POST['register'])){
	$email = $_POST['email'];
  	$firstname = $_POST['firstname'];
 	$lastname = $_POST['lastname'];
  	$password = $_POST['password'];
  	$username = $_POST['username'];
  	$actor = 'parents';
  	$cekusername = mysqli_query($con, "SELECT count(*) as jumlah FROM account WHERE username = '$username' ");
  	$jumlah = mysqli_fetch_assoc($cekusername);
  	if ($jumlah['jumlah']==0){
	  	$insert_customer = mysqli_query($con,"INSERT INTO parents (first_name, last_name, email, username) 
	  	VALUES('$firstname','$lastname', '$email','$username')");
	  	$insert_customer2 = mysqli_query($con,"INSERT INTO  account (username, password, actor) 
	  	VALUES('$username', '$password','$actor')");
	  
 		echo '<script>
          swal({
            title: "Successfully make your account, Welcome to TIPMAN!",
            text: "Lets login first!",
            type: "success"
          }).then(function() {
            window.location = "index.php?action=login";
          });
  
        </script>'; 
  	}
  	else{
    	echo '<script>swal("Sorry, username has been taken! Please registered in different username!");</script>'; 
    	echo "<script>document.getElementById('buttonregister').click();</script>";
    
    }
}
?>
