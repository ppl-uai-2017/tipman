<?php 
session_start();
require "head.php";
$id='';
if ( $_GET['id']){
	$id = $_GET['id'];
}
$cc = mysqli_query($con, "SELECT * FROM childcare WHERE id='$id'");
$detail = mysqli_fetch_assoc($cc);
$id = $detail['id'];
$username = $_SESSION['username'];
if ($username!='guest'){
	$user = mysqli_query($con, "SELECT * FROM parents WHERE username='$username'");
	$detail_user = 	mysqli_fetch_assoc($user);
}

?>


<body>
<!--Header-->
	<div class="header" id="home">
		<?php require "topbar.php"; ?>
		<div class="w3-aglie-about" id="about">
		<div class="container">
		<div class="w3-container">

		<div class="w3-row">
		    <a id='first' href="javascript:void(0)" onclick="openCity(event, 'dc');">
		      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Detail Childcare </div>
		    </a>
		    <a href="javascript:void(0)" onclick="openCity(event, 'g');">
		      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Gallery</div>
		    </a>
		    <a href="javascript:void(0)" onclick="openCity(event, 'as');">
		      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Activity Schedule</div>
		    </a>
		</div>

		<div id="dc" class="w3-container city" style="display:none">
		  <div class="col-md-12 ">  
		    <div class="col-md-6 about-left-grid">
				<h2 style='color:tomato'> <?php echo $detail['businessname']; ?></h2>
				<img src="images/partner/<?php echo $detail['foto1']; ?>" width='400px' />	
				<br/><br/>

					<h5 style='color:midnightblue'><i class='fa fa-building' style='color:black'></i> <?php echo $detail['companyaddress'].' '.$detail['companyregion']; ?></h5>
					<h5 style='color:midnightblue'><i class='fa fa-phone' style='color:black'></i> &nbsp <?php echo $detail['contactphone']; ?></h5>
					<h5 style='color:midnightblue'><i class='fa fa-envelope' style='color:black'></i> &nbsp <?php echo $detail['contactemail']; ?></h5>
					<h5 style='color:midnightblue'><i class='fa fa-internet-explorer ' style='color:black'></i> &nbsp <?php echo $detail['contactwebsite']; ?></h5>
				<p><?php echo $detail['companydesc']; ?></p>
			</div>
			<div class="col-md-6 about-right-grid">
				<br/><br/>
				<div class="agileits-map">
					<?php $gm = str_replace(' ', '%20', $detail['businessname']);?>
					<iframe width="200" height="250" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $gm; ?>&key=AIzaSyD4NxIKa9sRAd5c1YoW5mQctDOHbEWJQ0g" allowfullscreen></iframe> 
				</div>
			</div>
		</div>
		<div class="col-md-12 about-left-grid">
			<div>
				<br/><br/>
			    <div style="overflow-x:auto;">
			    <table>
			      <tr>
			        <th>No. </th>
			        <th>Package Class </th>
			        <th>Package Class Description</th>
			        <th>Package Price Type</th>
			        <th>Package Price</th>
			        <th>Facility</th>
			        <th></th>
			   	 </tr>
			      <?php 
			        $pack = mysqli_query($con, "SELECT * FROM package  WHERE id_childcare='$id'") ;
			        $no=1;
			        if(mysqli_num_rows($pack)!=0){
			        while($row_pack= mysqli_fetch_assoc($pack)){ ?>

			      <tr>
			        <td><?php echo $no; ?></td>
			        <td><?php echo $row_pack['package_class']; ?></td>
			        <td><?php echo $row_pack['package_class_description']; ?></td>
			        <td><?php echo $row_pack['package_type']; ?></td>
			        <td><?php echo "IDR ".number_format($row_pack['package_price']); ?></td>
			        <td><?php echo nl2br(htmlspecialchars($row_pack['facility'])); ?></td>
			        <td>
			        	<?php if($_SESSION['username']=='guest') { ?>
				        <button style='background-color:gray' title='please login first' type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#ModalLogin" id="buttonlogin" ><i class="fa fa-user"> &nbsp Book</i></button>
				        <?php } else { ?>
			       		<button type="button" class="buttonbook btn btn-info btn-lg" data-toggle="modal" data-target="#modalbook" id="buttonbook" data-id='<?php echo $row_pack['id_package'];?>'><i class="fa fa-clock-o" > &nbsp Book</i></button>
			       		<?php } ?>
			        </td>
			      </tr>
			      <?php $no++;  } } else { ?>
			      <tr><td colspan="6" style="text-align:center" >No Package Offered</td></tr>
			      <?php } ?>
			    </table>
			    </div>
			</div>
		</div>
		</div>
		<div id="g" class="w3-container city" style="display:none">
		    <br/>
			<div class="w3portfolioaits" id="gallery">
			<div class="w3portfolioaits-items">
				<?php 
			    $sql = mysqli_query($con, "SELECT * FROM gallery WHERE id_childcare = '$id'"); 
			    while($gallery = mysqli_fetch_assoc($sql)){
			    ?>
			    <div class="col-md-6 w3portfolioaits-item w3portfolioaits-item-1">
			      	<a class="example-image-link" href="images/gallery/<?php echo $gallery['filefoto']?>" data-lightbox="example-set" data-title="">
			          <div class="grid">
			            <figure class="effect-apollo">
			              <?php if (strpos($gallery['filefoto'], 'mp4') == false) { ?>
			              <img src="images/gallery/<?php echo $gallery['filefoto']?>" alt="Game Robo">
			              <?php } else { ?>
			              <video width="320" height="240" controls>
			                <source src="images/gallery/<?php echo $gallery['filefoto']?>" type="video/mp4">
			              </video>
			              <?php } ?>
			                <figcaption></figcaption>
			            </figure>
			          </div>
			    	</a>
			    </div>
			    <?php } ?>

			</div>
			<div class="clearfix"></div>

			</div>
		</div>

		</div>

		<div id="as" class="w3-container city" style="display:none">
		      <h4 style='color:midnightblue'>Activity Schedule</h4><br/>
			    <div style="overflow-x:auto;">
			    <table>
			      <tr>
			        <th>No. </th>
			        <th>Time</th>
			        <th>Activity</th>

			      </tr>
			      <?php 
			      $act = mysqli_query($con, "SELECT * FROM activity  where id_childcare = '$id' ");
			      $no=1;
			      if(mysqli_num_rows($act)==0){
			      
			      ?>
			      <tr>
			        <td colspan="3" style="text-align:center">No activity registered by childcare.</td>
			      </tr>  
			      
			      <?php } else { while ($detail_act = mysqli_fetch_assoc($act)){ ?>
			      <tr>
			        <td><?php echo $no; ?></td>
			        <td><?php echo $detail_act['jam_mulai'] ." - ". $detail_act['jam_selesai']?></td>
			        <td><?php echo $detail_act['kegiatan']; ?></td>
			        
			      </tr>
			      
			      <?php  $no++; } } ?>
			    </table>
			</div>
			</div>
		</div>
	</div>
</div>
			<!--<div class="col-md-6 about-left-grid">

				<h4 > $id; ?></h4>
				<h3>ABOUT OUR <span>TRIP</span></h3>
				<h5><span><i class="fa fa-check" aria-hidden="true"></i>s ac eros luctus, at dapibus libero gravida. Cras euismod, felis non egestas gravida, nisi purus placerat lacus, sed pulvinar ipsum turpis sed risus. </p>
				<h5><span><i class="fa fa-check" aria-hidden="true"></i></span>sed pulvi ipsum</h5>
				<p>Fusce convallis, ante non sodales dapibus, risus mauris viverra nibh, vel lacinia erat nulla at est. Vestibulum vestibulum risus ac eros luctus, at dapibus libero gravida. Cras euismod, felis non egestas gravida, nisi purus placerat lacus, sed pulvinar ipsum turpis sed risus. </p>
	            <h6><a href="#">view Services</a></h6>		
			</div>
			<div class="col-md-6 about-right-grid">
				<h4>OUR STORY</h4>
				<h3>Why<span>CHOOSE</span>US</h3>
				<h5>Quisque nisl felis, commodo vel urna ut, convallis vestibulum purus. Praesent eget libero id ligula ultrices aliquet eget eget diam. Sed at est dapibus, fringilla nisi vel, porta elit. Mauris tincidunt est erat, vitae aliquet massa molestie at. Sed in arcu sed ligula</h5>
				<p>Mauris dictum pharetra mi, id tincidunt mauris rutrum in. Sed pharetra tempus massa, in lobortis magna commodo sed. Phasellus sed magna massa. Praesent pharetra rhoncus lacus. Sed consequat lacus vitae eros laoreet, non vehicula nunc congue. Vestibulum et ex fermentum, pulvinar erat vitae, accumsan leo. Vivamus est tortor, imperdiet ut dictum in, tincidunt at erat.</p>
			   <h6><a href="#">know more</a></h6>		
			   </div>
			<div class="clearfix"></div>
		</div>-->

		<div class="copyright-agile"></div>

		<div class="wthreelocationsaits" id="locations">
		<div class="container">
		<div class="location-w3-head">
			<h3>Popular Child Care</h3>
			</div>
			<section class="grid3d vertical" id="grid3d">
				<div class="grid-wrap">
					<div class="grid">
					<?php 
						$sql_childcare = "SELECT * FROM childcare LIMIT 9";
						$result_childcare= mysqli_query($con, $sql_childcare);

						while($row_childcare = mysqli_fetch_assoc($result_childcare)){
					?>
					
	                <a href='details.php?id=<?php echo $row_childcare['id']?>'><figure class="col-md-4 effect-zoe"><img width='440px' height='253px' src="images/partner/<?php echo $row_childcare['foto1']?>" alt="<?php echo $row_childcare['businessname']?>"><figcaption><h4><?php echo $row_childcare['businessname']?></h4><h6><?php echo $row_childcare['companyaddress']." ". $row_childcare['companyregion']." ". $row_childcare['companypostcode']?></h6></figcaption></figure></a>
					<?php } ?>
					</div>
				</div>
			</section>
		</div>
	</div>

<script>
$("#click").on('click', function(){
  var id = document.getElementById('id_childcare').value;
  window.location='details.php?id='+id;
});

</script>
</div>
</body>
<!--//about-->


  <!-- Modal -->
  <div class="modal fade" id="modalbook" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Book an empty spot in <?php echo $detail['businessname']; ?></h4>
          <center><p class="modal-title">Dear <?php echo $detail_user['first_name'] ?>, Please fill form below to make a booking</p></center>
        </div>
        <div class="modal-body">
        	<form action="" class="w3-container w3-card-4 w3-light-white w3-text-pink w3-margin" method="post">
          	<div class="w3-row w3-section">
			  <div class="w3-col" style="max-width:50px"><i class=""></i></div>
			    <div class="w3-rest">
			      <label>Customer : <?php echo $detail_user['first_name'].' '.$detail_user['last_name'];?></label>
			    </div>
			</div> 
          	<div class="w3-row w3-section">
			  <div class="w3-col" style="max-width:50px"><i class=""></i></div>
			    <div class="w3-rest">
			      <label>Children : </label>
			      <?php 
			      $child = mysqli_query($con, "SELECT * FROM children WHERE username_parents='$username'");
			      
			      if(mysqli_num_rows($child)==0){
			      ?>
			      <select name="children" id="children" onchange="location = this.value;">
			      	<option value=''>choose children</option>
			      	<option value='my_children.php'>No Children, Add One</option>
			      </select>
			    </div>
			    <?php } else {  ?>
			    <select name="children" id="children" required >
			      	<option value='' style='color:dodgerblue'>choose children</option>
			      	<option onclick="location = this.value;" value='my_children.php' >Add Another Children</option>
			      	<?php while($d_child = mysqli_fetch_assoc($child)) { ?>
			      		<option style='color:dodgerblue' value='<?php echo $d_child['id_children']?>'><?php echo $d_child['first_name'].' '.$d_child['last_name']?></option>
			      	<?php } ?>
			     </select>
			    <?php } ?>
			</div>
			<div class="w3-row w3-section">
			  <div class="w3-col" style="max-width:50px"><i class=""></i></div>
			    <div class="w3-rest">
			      <label style='color:grey'>Package Class : </label>
			      <input class="w3-input w3-border" id='id_package' name="id_package" type="text" style='color:grey' readonly>
			    </div>
			</div>
			
			<div class="w3-row w3-section">
			  <div class="w3-col" style="max-width:50px"><i class=""></i></div>
			    <div class="w3-rest">
			      <label>Start Booking date : </label>
			      <input class="w3-input w3-border" name="setTodaysDate" type="date" required>
			    </div>
			</div>
			<div class="w3-row w3-section">
			  <div class="w3-col" style="max-width:50px"><i class=""></i></div>
			    <div class="w3-rest">
			      <label>Notes: </label>
			      <textarea class="w3-input w3-border" name="childincare" type="text"></textarea> 
			    </div>
			</div>

			<button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding" name='book'>Book</button>
			
			<br/>
		</form>
        	
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
   </div>

 <script>
$(document).ready(function(){
   
   $(".buttonbook.btn.btn-info.btn-lg").click(function(){
      $("#modalbook").modal({backdrop: "static"});
      var id_package=$(this).data('id');
      $(".modal-body #id_package").val(id_package); 
    });
    
    var today = new Date().toISOString().split('T')[0];
	document.getElementsByName("setTodaysDate")[0].setAttribute('min', today);

	
});
</script>

<?php 
$childincare = '';
if(isset($_POST['book'])){
	$username = $username;
	$id_children = $_POST['children'];
	$idchildcare = $id;
	$date = $_POST['setTodaysDate'];
	$starttime = $_POST['start_time'];
	$finishtime = $_POST['finish_time'];
	$childincare = $_POST['childincare'];
	$id_package = $_POST['id_package'];
	$statuspemesanan = 'menunggu';

	mysqli_query($con, "INSERT INTO pemesanan(idchildcare, username, date, starttime, finishtime, childincare, statuspemesanan, id_children, id_package) VALUES ('$idchildcare', '$username', '$date', '$starttime', '$finishtime', '$childincare', '$statuspemesanan', '$id_children', '$id_package')");
	echo '<script>
          swal({
            title: "Success Booking!",
            text: "Lets see your booking details!",
            type: "success"
          }).then(function() {
            window.location = "my_booking.php";
          });
          
          </script>'; 

}
?>



  <!-- Modal -->
  <div class="modal fade" id="ModalLogin" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Login</h4>
          <center><p class="modal-title">Solusi orang tua bekerja!</p></center>
        </div>

        <div class="modal-body">
        	<form action="" class="w3-container w3-card-4 w3-light-grey w3-text-green w3-margin" method="post">
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

			<button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding" name='login'>Login</button>
			<center><label>Don't have an account? <a href='parents.php' style='color:midnightblue'>Register Here!</a></label></center>
			<br/>
		</form>
        	
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
   </div>

 <script>
$(document).ready(function(){
   
    $("#buttonlogin").click(function(){
        $("#ModalLogin").modal({backdrop: "static"});
    });
});
</script>

<?php
if (isset($_POST['login']))
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
      $result= mysqli_query($con, "SELECT * FROM account WHERE username = '$username' and actor='parents'");
      $row = mysqli_fetch_assoc($result);
      if( empty( $row['username'] ) )
      {
        echo "<script>swal('username has not been registered!');</script>";
        echo "<script>document.getElementById('buttonlogin').click();</script>";
        $error++;
      }
      else
      {
        if( $row['password'] != $pass )
        {
          echo "<script>swal('Your Password is Wrong!');</script>";
          echo "<script>document.getElementById('buttonlogin').click();</script>";
          $error++;
        }
        else
        {
          session_unset();
          
          $_SESSION['username']=$row['username'];
          $_SESSION['actor']='parents';
          //echo $_SESSION['username'];
          echo '<script>
          swal({
            title: "Success Login!",
            text: "Find your childcare!",
            type: "success"
          }).then(function() {
            window.location = "";
          });
          
          </script>'; 
        } //end else
      } //end else
    }
}
?>

<script>
function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" w3-border-red", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-border-red";
}

$(document).ready(function(){
     document.getElementById('first').click();
     });
</script>
