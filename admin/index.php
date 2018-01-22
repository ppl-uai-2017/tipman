<?php 
if (!isset($_SESSION)){
	session_start();
}
if(empty($_SESSION['username'])){
	$_SESSION['username']="guest";
	$_SESSION['actor']="childcare";
}
require "head.php";
$username = $_SESSION['username'];
$session = mysqli_query($con, "SELECT * FROM childcare WHERE username = '$username'");
$detail = mysqli_fetch_assoc($session);
?>


<body>
<!--Header-->
	<div class="header" id="home">
		<!--Top-Bar-->
		<?php require "topbar.php"; ?>
		<!--//Top-Bar-->
	</div>


	<!--/services-->
<div class="w3-agile-services" id="services">
	<div class="container">
		<div class="w3-services-head">
			<h3 style='color:white'>Welcome to TIPMAN, </br>Let's manage your Childcare.</h3>
		</div>
		<div class="col-md-6 w3-services-grids">
			<div class="w3-services-grids-left">
				<div class="w3-services-grids-left">
				<div class="col-md-6 w3-services-grid-icon1 w3-border-bootom1">
				<h4><span><a data-toggle="modal" data-target="#modaleditbusinessname" id="buttoneditbusinessname"><i class="fa fa-building" aria-hidden="true"></i></span>Edit Business Name </a></h4>
				<?php if(!empty($detail['businessname'])){ ?>
				<p><?php echo $detail['businessname']?></p>
				<?php } else {  echo "No description about your Childcare, Please Entry One."; } ?>
				</div>
				<div class="col-md-6 w3-services-grid-icon-text w3-border-bootom2">
				<h4><span><a data-toggle="modal" data-target="#modaleditcompanyaddress" id="buttoneditcompanyaddress"><i class="fa fa-map-marker" aria-hidden="true"></i></span>Edit Business Address</a></h4>
				<?php if(!empty($detail['companyaddress'])){ ?>
				<p><?php echo $detail['companyaddress']. " ".$detail['companyregion']." ".$detail['companypostcode']?></p>
				<?php } else {  echo "No description about your Childcare, Please Entry One."; } ?>

				</div>
				<div class="clearfix"></div>
			</div>
				
				<div class="col-md-6 w3-services-grid-icon-text w3-border-left">
				
				<h4><span><a data-toggle="modal" data-target="#modaleditcompanydesc" id="buttoneditcompanydesc"><i class="fa fa-align-left " aria-hidden="true"></i></span> Edit Business Description</a></h4>
				
				<?php if(!empty($detail['companydesc'])){ ?>
					<p><?php echo $detail['companydesc'] ?></p>
				<?php } else {  echo "No description about your Childcare, Please Entry One."; } ?>

				</div>
				<div class="clearfix"></div>
				</div>
		</div>
		<div class="col-md-6 w3-services-grids">
			<h4><span><a data-toggle="modal" data-target="#modaleditfoto" id="buttoneditfoto"><i class="fa fa-camera" aria-hidden="true"></i></span> &nbsp &nbsp Edit Display Photo</a></h4>
			<?php if(!empty($detail['foto1'])){ ?>
			<img src="../images/partner/<?php echo $detail['foto1']; ?>" style='max-width:500px'>
			<?php } else { echo "No display photo about your Childcare, Please upload one."; } ?>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
	<!--//services-->

<div class="copyright-agile">
	<p>&copy; 2017 TIPMAN - Titip Anak Aman</p>
</div>
<!-- //copyright -->

</body>
</html>

  <!-- Modal -->
  <div class="modal fade" id="modaleditbusinessname" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Edit your business name</h4>
        </div>

        <div class="modal-body">
        	<form action="" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" method="post">
          	<div class="w3-row w3-section">
			  <div class="w3-col" style="max-width:50px"><i class=" "></i></div>
			    <div class="w3-rest">
			    	<label>Old Business Name</label>
			      <input class="w3-input w3-border" value='<?php echo $detail['businessname']?>' disabled>
			    </div>
			</div>
			<div class="w3-row w3-section">
			  <div class="w3-col" style="max-width:50px"><i class=""></i></div>
			    <div class="w3-rest">
			    	<label>Enter your new Business Name</label>
			      <input class="w3-input w3-border" name="newbusinessname" type="text" required>
			    </div>
			</div>
			<button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding" name='editbusinessname' onclick='confirm("Are you sure want to change your company name?")'>Apply changes</button>
			<br/>
		</form>
        	
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
   </div>
   <?php 
   if (isset($_POST['editbusinessname'])){
   		$newbusinessname = $_POST['newbusinessname'];

   		mysqli_query($con, "UPDATE childcare SET businessname = '$newbusinessname' where username='$username'") ;
   		echo '<script>
		  
		  swal({
		    title: "We have applied your changes!",
		    text: "Your business name was changed",
		    type: "success"
		  }).then(function() {
		    window.location = "index.php";
		  });
		  
		  </script>'; 
		  
   }
   ?>

 <!-- Modal -->
  <div class="modal fade" id="modaleditcompanyaddress" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Edit your business address</h4>
        </div>

        <div class="modal-body">
        	<form action="" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" method="post">
          	<div class="w3-row w3-section">
			  <div class="w3-col" style="max-width:50px"><i class=" "></i></div>
			    <div class="w3-rest">
			    	<label>Old Business Address</label>
			      <input class="w3-input w3-border" value='<?php echo $detail['companyaddress']." ".$detail['companyregion']." ".$detail['companypostcode']?>' disabled>
			    </div>
			</div>
			<div class="w3-row w3-section">
			  <div class="w3-col" style="max-width:50px"><i class=""></i></div>
			    <div class="w3-rest">
			    	<label>Enter your new Business Address</label>
			      <input class="w3-input w3-border" name="newcompanyaddress" type="text" required>
			    </div>
			    <br/>
			    <div class="w3-rest">
			    <input type="text" class="typeahead form-control" style="max-width:700px" name='newregion' placeholder='region' required/>
			    </div>
			</div>
			<button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding" name='editcompanyaddress' onclick='confirm("Are you sure want to change your company address?")'>Apply changes</button>
			<br/>
		</form>
        	
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
   </div>
   <?php 
   if (isset($_POST['editcompanyaddress'])){
   		$newcompanyaddress = $_POST['newcompanyaddress'];
   		$newregion = $_POST['newregion'];

   		mysqli_query($con, "UPDATE childcare SET companyaddress = '$newcompanyaddress', companyregion='$newregion' where username='$username'") ;
   		echo '<script>
		  
		  swal({
		    title: "We have applied your changes!",
		    text: "Your business address was changed",
		    type: "success"
		  }).then(function() {
		    window.location = "index.php";
		  });
		  
		  </script>'; 
		  
   }
   ?>

     <!-- Modal -->
  <div class="modal fade" id="modaleditcompanydesc" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Edit your company desc</h4>
        </div>

        <div class="modal-body">
        	<form action="" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" method="post">
          	<div class="w3-row w3-section">
			  <div class="w3-col" style="max-width:50px"><i class=" "></i></div>
			    <div class="w3-rest">
			    	<label>Old Business Name</label>
			      <textarea class="w3-input w3-border" name='text'><?php echo $detail['companydesc']?></textarea>
			    </div>
			</div>
			
			<button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding" name='editcompanydesc' onclick='confirm("Are you sure want to change your company description?")'>Apply changes</button>
			<br/>
		</form>
        	
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
   </div>
   <?php 
   if (isset($_POST['editcompanydesc'])){
   		$newcompanydesc = $_POST['text'];

   		mysqli_query($con, "UPDATE childcare SET companydesc = '$newcompanydesc' where username='$username'") ;
   		echo '<script>
		  
		  swal({
		    title: "We have applied your changes!",
		    text: "Your business description was changed",
		    type: "success"
		  }).then(function() {
		    window.location = "index.php";
		  });
		  
		  </script>'; 
		  
   }
   ?>

   <div class="modal fade" id="modaleditfoto" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Edit your display photo</h4>
        </div>

        <div class="modal-body">
        	<form action="" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" method="post" enctype="multipart/form-data">
          	<div class="w3-row w3-section">
			  <div class="w3-col" style="max-width:50px"><i class=" "></i></div>
			    <div class="w3-rest">
			    	<label>Select image to upload:</label>
			      	<input type="file" name="filefoto" id="filefoto">
			    </div>
			</div>
		    
			<button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding" name='editfoto' onclick='confirm("Are you sure want to change your display photo?")'>Apply changes</button>
			<br/>
		</form>
        	
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
   </div>

<?php

// Check if image file is a actual image or fake image
if(isset($_POST["editfoto"])) {
	$target_dir = "../images/partner/";
	$target_file = $target_dir . $username ."_". basename($_FILES["filefoto"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["filefoto"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "<script>swal('Sorry, file already exists.')</script>";
	    $uploadOk = 0;
	}
	// Check file size
	if ($_FILES["filefoto"]["size"] > 500000) {
	    echo "<script>swal('Sorry, your file is too large.')</script>";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    echo "<script>swal('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "<script>swal('Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["filefoto"]["tmp_name"], $target_file)) {
	    	if ($detail['foto1']!=="default.jpg"){
	       		unlink($target_dir . $detail['foto1']);
	    	}
	        $filefoto = $username ."_".$_FILES["filefoto"]["name"];
	        mysqli_query($con, "UPDATE childcare SET foto1 = '$filefoto' where username='$username'") ;
	        echo "<script>swal({
						    title: 'We have applied your changes!',
						    text: 'Your display photo has been changed',
						    type: 'success'
						  }).then(function() {
						    window.location = 'index.php';
						  });
	        	</script>";
	    } else {
	        echo "<script>swal('Sorry, there was an error uploading your file.')</script>";
	    }
	}
}
?>


</body>
<!--//about-->

<script>
$(document).ready(function(){
   
    $("#buttoneditbusinessname").click(function(){
        $("#modaleditbusinessname").modal({backdrop: "static"});
    });
    $("#buttoneditcompanyaddress").click(function(){
        $("#modaleditcompanyaddress").modal({backdrop: "static"});
    });
    $("#buttoneditcompanydesc").click(function(){
        $("#modaleditcompanydesc").modal({backdrop: "static"});
    });
    $("#buttoneditfoto").click(function(){
        $("#modaleditfoto").modal({backdrop: "static"});
    });

});
</script>


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
	$(function () {
		$("#slider").responsiveSlides({
			auto: true,
			pager: true,
			nav: true,
			speed: 1000,
			namespace: "callbacks",
			before: function () {
				$('.events').append("<li>before event fired.</li>");
			},
			after: function () {
				$('.events').append("<li>after event fired.</li>");
			}
		});
	});
</script>
	
<!-- Calendar -->
<script>
	$(function() {
		$( "#datepicker,#datepicker1" ).datepicker();
	});
</script>
		<!-- //Calendar -->
	<!-- Portfolio-Popup-Box-JavaScript -->
<script type="text/javascript">
	$(function() {
		$('.w3portfolioaits-item a').Chocolat();
	});
</script>
		<!-- //Portfolio-Popup-Box-JavaScript -->
		<!-- Tour-Locations-JavaScript -->
<script>
	new grid3D( document.getElementById( 'grid3d' ) );
</script>
		<!-- //Tour-Locations-JavaScript -->
			
		<!-- smooth scrolling-bottom-to-top -->
<script type="text/javascript">
	$(document).ready(function() {
					/*
						var defaults = {
						containerID: 'toTop', // fading element id
						containerHoverID: 'toTopHover', // fading element hover id
						scrollSpeed: 1200,
						easingType: 'linear' 
						};
					*/								
					$().UItoTop({ easingType: 'easeOutQuart' });
					});
				</script>
				<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
		<!-- //smooth scrolling-bottom-to-top -->
		<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
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
