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
				<h4 style='color:midnightblue'>Childcare Centres</h4>
				<p> 
				Tipman provides you with a way to maximise occupancy and increase revenue by filling empty spots within your centre that often go unused. You can manage placements and fill empty spots using our intuitive and easy to use website.
				<br/><br/>
				Tipman connects you with parents at the very start of their childcare search journey, online, allowing them to find and book quality childcare services at the click of a button.
				<br/><br/>
				When servicing childcare providers, Tipman's aim is simple. We want to ensure that your occupancy and in-turn your revenue is maximised. We do this by providing an easy to use website allowing you to advertise your permanent and casual spots, field enquiries, book centre tours and process casual bookings.
				<br/><br/>
				</p>
				<img src='images/logo/logo.jpg' width='300px'>
			</div>
			<div class="col-md-6 about-right-grid">
				<div class=" w3-services-grids-right2">
				</div>
				<br/><br/>
				<center><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#ModalRegisterCC" id="buttonregistercc">  Apply for an Account! &nbsp<i class="fa fa-chevron-circle-right"></i></button><br/><br/>
				<label>Already have an account? <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#ModalLoginCC" id="buttonlogincc">  Login Here! </a></label>
				</center>
			<div class="clearfix"></div>
		</div>
</div>
</div>
</div>


  <!-- Modal -->
  <div class="modal fade" id="ModalRegisterCC" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Applications for child care account</h4>
          <center><p class="modal-title">Please complete the form below. </p></center>
        </div>

        <div class="modal-body">
        	<form action="" class="w3-container w3-card-4 w3-light-grey w3-text-pink w3-margin" method="post">
        		<br/>
          	<label>01. Business Details</label>
          	<div class="w3-row w3-section">
			  <div class="w3-col" style="max-width:50px"><i class="w3-xxlarge fa fa-desktop  "></i></div>
			    <div class="w3-rest">
			      <input class="w3-input w3-border" name="businessname" type="text" placeholder="Business Name *" required>
			    </div>
			</div>
			<div class="w3-row w3-section">
			  <div class="w3-col" style="max-width:50px"><i class="w3-xxlarge fa fa-clipboard "></i></div>
			    <div class="w3-rest">
			      <input class="w3-input w3-border" name="nosertifikasi" type="text" placeholder="No Sertifikasi (only if you have)" >
			    </div>
			</div>

          	<div class="w3-row w3-section">
			  <div class="w3-col" style="max-width:50px"><i class="w3-xxlarge fa fa-building"></i></div>
			    <div class="w3-rest">
			      <input class="w3-input w3-border" name="companyaddress" type="text" placeholder="Company Address *" required>
			    </div>
			</div>
			<div class="w3-row w3-section">
			  <div class="w3-col" style="max-width:50px"><i class="w3-xxlarge fa fa-map-marker"></i></div>
			    <div class="w3-rest">
			      <input type="text" name="region" class="typeahead form-control" style="max-width:700px" placeholder="Company region *" required/>
			    </div>
			</div>
			<div class="w3-row w3-section">
			  <div class="w3-col" style="max-width:50px"><i class="w3-xxlarge fa fa-child"></i></div>
			    <div class="w3-rest">
			      <input class="w3-input w3-border" name="contactfirstname" type="text" placeholder="Contact First Name * " required>
			    </div>
			</div>
			<div class="w3-row w3-section">
			  <div class="w3-col" style="max-width:50px"><i class="w3-xxlarge fa fa-child"></i></div>
			    <div class="w3-rest">
			      <input class="w3-input w3-border" name="contactlastname" type="text" placeholder="Contact Last Name * " required>
			    </div>
			</div>
			<div class="w3-row w3-section">
			  <div class="w3-col" style="max-width:50px"><i class="w3-xxlarge fa fa-phone "></i></div>
			    <div class="w3-rest">
			      <input class="w3-input w3-border" name="contactphone" type="text" placeholder="Contact Phone *" required>
			    </div>
			</div>
			<div class="w3-row w3-section">
			  <div class="w3-col" style="max-width:50px"><i class="w3-xxlarge fa fa-envelope"></i></div>
			    <div class="w3-rest">
			      <input class="w3-input w3-border" name="contactemail" type="email" placeholder="Contact Email *" required>
			    </div>
			</div>
			<label>02. Account Details</label>
			<div class="w3-row w3-section">
			  <div class="w3-col" style="max-width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
			    <div class="w3-rest">
			      <input class="w3-input w3-border" name="username" type="text" placeholder="username *" required>
			    </div>
			</div>
			<div class="w3-row w3-section">
			  <div class="w3-col" style="max-width:50px"><i class="w3-xxlarge fa fa-lock"></i></div>
			    <div class="w3-rest">
			      <input class="w3-input w3-border" name="password" type="password" placeholder="password *" required>
			    </div>
			</div>

			<button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding" name='register'>Register & Get Account</button>
			<center><label>Already have an account? <a href='childcare.php' style='color:midnightblue'>Login Here!</a></label></center>
			<br/>
		</form>
        	
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
   </div>



  <!-- Modal -->
  <div class="modal fade" id="ModalLoginCC" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Login in your child care account</h4>
          <center><p class="modal-title">Welcome to TIPMAN </p></center>
        </div>

        <div class="modal-body">
        	<form action="" class="w3-container w3-card-4 w3-light-grey w3-text-pink w3-margin" method="post">
          	<div class="w3-row w3-section">
			  <div class="w3-col" style="max-width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
			    <div class="w3-rest">
			      <input class="w3-input w3-border" name="username" type="text" placeholder="Username *" required>
			    </div>
			</div>
			<div class="w3-row w3-section">
			  <div class="w3-col" style="max-width:50px"><i class="w3-xxlarge fa fa-lock"></i></div>
			    <div class="w3-rest">
			      <input class="w3-input w3-border" name="password" type="password" placeholder="password *" required>
			    </div>
			</div>
			<button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding" name='logincc'>Login</button>
			<center><label>Apply for an account? <a href='childcare.php' style='color:midnightblue'>Register Here!</a></label></center>
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
$(document).ready(function(){
   
    $("#buttonregistercc").click(function(){
        $("#ModalRegisterCC").modal({backdrop: "static"});
    });
});
</script>
<script>
$(document).ready(function(){
   
    $("#buttonlogincc").click(function(){
        $("#ModalLoginCC").modal({backdrop: "static"});
    });
});
</script>



<?php

if(isset($_POST['register'])){
  	$businessname = $_POST['businessname'];
  	if (!empty($_POST['nosertifikasi'])){
  		$nosertifikasi = $_POST['nosertifikasi'];
  	}
  	else {
  		$nosertifikasi = "";
  	}
 	$company_address = $_POST['companyaddress'];
  	$region = $_POST['region'];
  	$contact_first_name = $_POST['contactfirstname'];
  	$contact_last_name = $_POST['contactlastname'];
  	$contact_phone = $_POST['contactphone'];
  	$contact_email = $_POST['contactemail'];
  	$username = $_POST['username'];
  	$password = $_POST['password'];
    $tanggal_gabung =  date("Y-m-d H:i:s"); 
  	$actor = 'childcare';
    $foto1 = 'default.jpg';
  
  	$cekusername = mysqli_query($con, "SELECT count(*) as jumlah FROM account WHERE username = '$username'");
  	$jumlah = mysqli_fetch_assoc($cekusername);
  	if ($jumlah['jumlah']==0){
	  	$insert_childcare = mysqli_query($con,"INSERT INTO childcare (businessname, nosertifikasi, contactfirstname, contactlastname, contactphone, contactemail, companyaddress, companyregion, username, tanggal_gabung, foto1) 
	  	VALUES('$businessname','$nosertifikasi', '$contact_first_name','$contact_last_name', '$contact_phone', '$contact_email', '$company_address', '$region', '$username', '$tanggal_gabung', '$foto1')");
	  	$insert_childcare = mysqli_query($con,"INSERT INTO  account (username, password, actor) 
	  	VALUES('$username', '$password','$actor')");
  
 		echo '<script>
		  
		  swal({
		    title: "Thank you for registering!",
		    text: "Please login and manage your childcare!",
		    type: "success"
		  }).then(function() {
		    window.location = "childcare.php";
		  });
		  
		  </script>'; 
		  }
	else{
	    echo '<script>swal("Sorry, username has been taken! Please registered in different username!");</script>'; 
	    echo "<script>document.getElementById('buttonregistercc').click();</script>"; 
  }
}

?>


<!-- js -->
<?php 
$sql_region = "select * from region";
$result_region= mysqli_query($con, $sql_region);
$region = array();

while($row = mysqli_fetch_assoc($result_region)){
	$region[] = $row['region'];
}

?>
<script>
	var substringMatcher = function (strs) {
    return function findMatches(q, cb) {
        var matches, substringRegex;

        // an array that will be populated with substring matches
        matches = [];

        // regex used to determine if a string contains the substring `q`
        substrRegex = new RegExp(q, 'i');

        // iterate through the pool of strings and for any string that
        // contains the substring `q`, add it to the `matches` array
        $.each(strs, function (i, str) {
            if (substrRegex.test(str)) {
                // the typeahead jQuery plugin expects suggestions to a
                // JavaScript object, refer to typeahead docs for more info
                matches.push({
                    value: str
                });
            }
        });

        cb(matches);
    };
};

var states = <?php echo json_encode($region); ?>
/*var states = ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
    'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
    'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
    'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
    'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
    'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
    'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
    'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
    'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'];
*/
$('input.typeahead').typeahead({
    hint: true,
    highlight: true,
    minLength: 1
}, {
    name: 'states',
    displayKey: 'value',
    source: substringMatcher(states)
});
$('.typeahead.input-sm').siblings('input.tt-hint').addClass('hint-small');
$('.typeahead.input-lg').siblings('input.tt-hint').addClass('hint-large');


</script>


<?php
if (isset($_POST['logincc']))
{
  $username = $_POST['username'];
  $pass = $_POST['password'];
 
  /* Validasi */
  $error = 0;
  
    if( empty( $username ) || empty( $pass ) )
    {
      echo "<script>swal('Maaf,Silakan mengisi username dan Password Anda!');</script>";
      $error++;
    }
    else
    {
      $result= mysqli_query($con, "SELECT * FROM account WHERE username = '$username' and actor='childcare'");
      $row = mysqli_fetch_assoc($result);
      if( empty( $row['username'] ) )
      {
        echo "<script>swal('username has not been registered as a Partner of TIPMAN! Try Registering!');</script>";
        echo "<script>document.getElementById('buttonlogincc').click();</script>"; 
        $error++;
      }
      else
      {
        if( $row['password'] != $pass )
        {
          echo "<script>swal('Your Password Is Wrong!');</script>";
          $error++;
        }
        else
        {
          session_unset();
          
          $_SESSION['username']=$row['username'];
          $_SESSION['actor']='childcare';
          //echo $_SESSION['username'];
          echo '<script>
          swal({
            title: "Success Login!",
            text: "Manage your childcare!",
            type: "success"
          }).then(function() {
            window.location = "admin/index.php";
          });
          
          </script>'; 
        } //end else
      } //end else
    }
}

?>