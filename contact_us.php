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
		<!--Slider-->
			<div class="col-md-6 contact-agileits-w3layouts-left">
						<h3 class="title-w3-agile-sub">Contact Us</h3>
						<p class="para-agileits-w3layouts">We are as a developer of TIPMAN will be happy to hear what your opinion about us. Please contact us here! Let's keep in touch, parents!</p>
						<p class="sub">Al Azhar University of Indonesia<span class="glyphicon glyphicon-map-marker icon" aria-hidden="true"></span></p>
						<p class="sub">Mon-Fri : 9am - 7pm.  Sat : 9am - 12pm<span class="glyphicon glyphicon-time icon" aria-hidden="true"></span></p>
						<p class="add"><span>Tel :</span> 0895 3305 56387<span class="glyphicon glyphicon glyphicon-earphone icon" aria-hidden="true"></span></p>
						<p class="add"><span>Email :</span> <a class="mail" href="mailto:mail@example.com">tipman@gmail.com</a><span class="glyphicon glyphicon-envelope icon" aria-hidden="true"></span></p>
				<div class="mail-grid1-form ">
						<h3 class="title-w3-agile-sub">Send a Message</h3>
						<form action="" method="post">
							<?php if ($_SESSION['username']=='guest'){ ?>
								<input type="text" name="nama" placeholder="Name" required="" />
								<input type="email" name="email" placeholder="Email" required="" />
							<?php } else { ?>
								<label>Hallo, <?php echo $_SESSION['username']?><br/> Let us hear your message ..</label>
							<?php } ?>
							<textarea name="message" placeholder="Type your message here...." required=""></textarea>
							<input type="submit" value="Send Message" name='send'/>
						</form>
					</div>
					</div>
					<div class="col-md-6 w-agile-map">
						<div class="agileits-map">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2083270671815!2d106.79700031428298!3d-6.236248295485792!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f141731e7063%3A0x5c76e93c1857863b!2sUniversitas+Al+Azhar+Indonesia!5e0!3m2!1sid!2sid!4v1513357283138" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
							</div>

					</div>
					<div class="clearfix"></div>
		</div>
</body>

<?php
if (isset($_POST['send'])){
	$username = $_SESSION['username'];
	$nama = "";
  	$email = "";
	if($username=='guest'){
		$nama = $_POST['nama'];
  		$email = $_POST['email'];
	}
  	
  	$message = $_POST['message'];
  	mysqli_query($con,"INSERT INTO  message (username, name, email, text) 
	VALUES('$username', '$nama','$email', '$message')");
	echo '<script>swal("Your message is sent to us! Thank you:)");</script>'; 
	    

}

?>