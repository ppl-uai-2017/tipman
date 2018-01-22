<?php 
session_start();
require "head.php";
$username = $_SESSION['username'];
$session = mysqli_query($con, "SELECT * FROM childcare WHERE username = '$username'");
$detail = mysqli_fetch_assoc($session);
$_SESSION['id'] = $detail['id'];
$id = $_SESSION['id'];
?>

<body>
<!--Header-->
  <div class="header" id="home">
    <!--Top-Bar-->
    <?php require "topbar.php"; ?>

<div class="w3-container">
  <div class="w3-row">
  <div  class="w3-container city">
    <h3 style='color:midnightblue'>Package - Manage your Package </h3><br/>
    <div style="overflow-x:auto;">
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modaladd" id="buttonadd"><i class="fa fa-plus"> &nbsp Add new package</i></button>
    <h4 style='color:black'>Your Package : </h4>
    <table>
      <tr>
        <th>No. </th>
        <th>Package Class</th>
        <th>Package Description</th>
        <th>Package Type </th>
        <th>Package Price </th>
        <th>Facility</th>
        <th></th>

      </tr>
      <?php 
      $pack = mysqli_query($con, "SELECT * FROM package  where id_childcare = '$id' ");
      $no=1;
      if(mysqli_num_rows($pack)==0){ 
      
      ?>
      <tr>
        <td colspan="6" style="text-align:center">You have no package registered.</td>
      </tr>
      <?php } else { while ($detail_pack = mysqli_fetch_assoc($pack)){ ?>
	  <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $detail_pack['package_class']; ?></td>
        <td><?php echo $detail_pack['package_class_description']; ?></td>
        <td><?php echo $detail_pack['package_type']; ?></td>
        <td><?php echo "IDR ".number_format($detail_pack['package_price']); ?> </td>
        <td><?php echo nl2br(htmlspecialchars($detail_pack['facility'])); ?></td>
        <td>
        	<!--<button type="button" title='edit' class="buttonedit btn btn-info btn-lg" data-toggle="modal" data-target="#modaledit" id="buttonedit" data-id='<?php //echo $detail_pack['id_package']?>'><i class="fa fa-pencil"> </i></button>-->
        	<button type="button" title='delete' class="buttondelete btn btn-info btn-lg" data-toggle="modal" data-target="#modaldelete" id="buttondelete" data-id='<?php echo $detail_pack['id_package']?>'><i class="fa fa-trash"> </i></button>

        </td>
      </tr>
      <?php  $no++; } }?>
      
    </table>
</div>
    <br/>
    <h3 style='color:midnightblue'>Activity - Manage your Activity Schedule </h3><br/>
    <div style="overflow-x:auto;">
    
    <h4 style='color:black'>Your Activity : </h4>
    <table>
      <tr>
        <th>No. </th>
        <th>Time</th>
        <th>Activity</th>
        <th></th>

      </tr>
      <?php 
      $act = mysqli_query($con, "SELECT * FROM activity  where id_childcare = '$id' ");
      $no=1;
      if(mysqli_num_rows($act)==0){
      
      ?>
      <tr>
        <td colspan="3" style="text-align:center">You have no activity registered.</td>
      </tr>  
     
      <?php } else { while ($detail_act = mysqli_fetch_assoc($act)){ ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $detail_act['jam_mulai'] ." - ". $detail_act['jam_selesai']?></td>
        <td><?php echo $detail_act['kegiatan']; ?></td>
        <td>
          <!--<button type="button" title='edit' class="buttonedit btn btn-info btn-lg" data-toggle="modal" data-target="#modaledit" id="buttonedit" data-id='<?php //echo $detail_pack['id_package']?>'><i class="fa fa-pencil"> </i></button>-->
          <button type="button" title='delete' class="buttondeleteact btn btn-info btn-lg" data-toggle="modal" data-target="#modaldeleteact" id="buttondeleteact" data-id='<?php echo $detail_act['id_activity']?>'><i class="fa fa-trash"> </i></button>
        </td>
      </tr>
      
      <?php  $no++; } } ?>
      <tr>
        <td colspan="4" style="text-align:center"> <button type="button" class="btn btn-info btn-lg" data-toggle="modaladdact" data-target="#modaladdact" id="buttonaddact"><i class="fa fa-plus"> &nbsp Add new Activity</i></button></td>
      </tr>
    </table>
</div>

  </div>



  </div>

</div>
</div>
</body>


  <!-- Modal -->
  <div class="modal fade" id="modaladd" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Add your Company Package</h4>
        </div>

        <div class="modal-body">
        	<form action="" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" method="post">
          	<div class="w3-row w3-section">
			  <div class="w3-col" style="max-width:50px"><i class=" "></i></div>
			    <div class="w3-rest">
			    	<label>Package Class</label>
			      <input class="w3-input w3-border" placeholder='Baby Class' name='package_class' required>
			    </div>
			</div>
			<div class="w3-row w3-section">
			  <div class="w3-col" style="max-width:50px"><i class=""></i></div>
			    <div class="w3-rest">
			    	<label>Package Description</label>
			      <input class="w3-input w3-border"  placeholder='Usia 3-15 Bulan' name="package_class_desc" type="text" required>
			    </div>
			</div>
      <div class="w3-row w3-section">
        <div class="w3-col" style="max-width:50px"><i class=""></i></div>
          <div class="w3-rest">
            <label>Package Type</label>
            <select class="w3-input w3-border"  name="package_type" type="text" required>
              <option value = "1 day">1 Day</option>
              <option value = "1 week">1 Week</option>
              <option value = "1 month">1 Month</option>
              <option value = "3 month">3 Month</option>
              <option value = "6 month">6 Month</option>
            </select>
          </div>
      </div>
			<div class="w3-row w3-section">
			  <div class="w3-col" style="max-width:50px"><i class=""></i></div>
			    <div class="w3-rest">
			    	<label>Package Price(without any symbol)</label>
			      <input class="w3-input w3-border"  placeholder='100000' name="package_price" type="text" required>
			    </div>
			</div>
			<div class="w3-row w3-section">
			  <div class="w3-col" style="max-width:50px"><i class=""></i></div>
			    <div class="w3-rest">
			    	<label>Package Facility </label>
			      <textarea class="w3-input w3-border" name="facility" type="text" required></textarea> 
			    </div>
			</div>
			<button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding" name='add' onclick='confirm("Are you sure want to add this package to your package?")'>Apply changes</button>
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
   if (isset($_POST['add'])){
   		$package_class = $_POST['package_class'];
   		$package_class_desc = $_POST['package_class_desc'];
   		$package_type = $_POST['package_type'];
      $package_price = $_POST['package_price'];
   		$facility = $_POST['facility'];

   		mysqli_query($con, "INSERT INTO package(id_childcare, package_class, package_class_description, package_price, package_type, facility) VALUES('$id','$package_class', '$package_class_desc', '$package_price', '$package_type', '$facility') ") ;
   		echo '<script>
		  
		  swal({
		    title: "We have applied your changes!",
		    text: "Your business package was added",
		    type: "success"
		  }).then(function() {
		    window.location = "package.php";
		  });
		  
		  </script>'; 
		  
   }
   ?>


  <!-- Modal -->
  <div class="modal fade" id="modaldelete" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Delete your Package? </h4>
        </div>

        <div class="modal-body">
          <form action="" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" method="post">
            
      <div class="w3-row w3-section">
        <div class="w3-col" style="max-width:50px"><i class=""></i></div>
          <div class="w3-rest">
            <label style='color:grey'>id package</label>
            <input class="w3-input w3-border" name="id_package" id='id_package' type="text" readonly style='color:grey'>
          </div>
      </div>
      <button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding" name='delete' onclick='confirm("Are you sure want to delete this package to your package?")'>Delete Package</button>
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
   if (isset($_POST['delete'])){
      $id_package = $_POST['id_package'];
      mysqli_query($con, "DELETE FROM package WHERE id_package='$id_package'");
      echo '<script>
      
      swal({
        title: "We have applied your changes!",
        text: "Your business package was deleted",
        type: "success"
      }).then(function() {
        window.location = "";
      });
      
      </script>'; 
      
   }
   ?>



  <!-- Modal -->
  <div class="modal fade" id="modaledit" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Edit your Package </h4>
        </div>
        <div class="modal-body">
          <form action="" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" method="post">
            
      <div class="w3-row w3-section">
        <div class="w3-col" style="max-width:50px"><i class=""></i></div>
          <div class="w3-rest">
            <label style='color:grey'>id package</label>
            <input class="w3-input w3-border" name="id_package" id='id_package' type="text" readonly style='color:grey'>
          </div>
      </div>
      <button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding" name='edit' onclick='confirm("Are you sure want to delete this package to your package?")'>Delete Package</button>
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
   if (isset($_POST['edit'])){
      $id_package = $_POST['id_package'];
      mysqli_query($con, "DELETE FROM package WHERE id_package='$id_package'");
      echo '<script>
      
      swal({
        title: "We have applied your changes!",
        text: "Your business package was deleted",
        type: "success"
      }).then(function() {
        window.location = "";
      });
      
      </script>'; 
      
   }
   ?>



 <script>
$(document).ready(function(){
   
    $("#buttonadd").click(function(){
        $("#modaladd").modal({backdrop: "static"});
    });
    $("#buttonaddact").click(function(){
        $("#modaladdact").modal({backdrop: "static"});
    });
    $(".buttondelete.btn.btn-info.btn-lg").click(function(){
      $("#modaldelete").modal({backdrop: "static"});
      var deleteid=$(this).data('id');
      $(".modal-body #id_package").val(deleteid); 
    });
    $(".buttondeleteact.btn.btn-info.btn-lg").click(function(){
      $("#modaldeleteact").modal({backdrop: "static"});
      var deleteid=$(this).data('id');
      $(".modal-body #id_activity").val(deleteid); 
    });
    $(".buttonedit.btn.btn-info.btn-lg").click(function(){
      $("#modaledit").modal({backdrop: "static"});
      var id_package=$(this).data('id');
      $(".modal-body #id_package").val(id_package); 
    });

    
    
    
});
</script>


  <!-- Modal -->
  <div class="modal fade" id="modaladdact" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Add your activity schedule</h4>
        </div>

        <div class="modal-body">
          <form action="" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" method="post">
            <div class="w3-row w3-section">
        <div class="w3-col" style="max-width:50px"><i class=" "></i></div>
          <div class="w3-rest">
            <label>Start Time</label>
            <input class="w3-input w3-border"  name='start_time' type="time"  required>
          </div>
      </div>
      <div class="w3-row w3-section">
        <div class="w3-col" style="max-width:50px"><i class=""></i></div>
          <div class="w3-rest">
            <label>Finish Time</label>
            <input class="w3-input w3-border"   name="finish_time" type="time" required>
          </div>
      </div>
      <div class="w3-row w3-section">
        <div class="w3-col" style="max-width:50px"><i class=""></i></div>
          <div class="w3-rest">
            <label>Activity</label>
            <textarea class="w3-input w3-border" name="activity" type="text" required></textarea> 
          </div>
      </div>
      <button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding" name='addact' onclick='confirm("Are you sure want to add this activity?")'>Apply changes</button>
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
   if (isset($_POST['addact'])){
      $jam_mulai = $_POST['start_time'];
      $jam_selesai = $_POST['finish_time'];
      $kegiatan = $_POST['activity'];

      mysqli_query($con, "INSERT INTO activity(id_childcare, jam_mulai, jam_selesai, kegiatan) VALUES('$id','$jam_mulai', '$jam_selesai', '$kegiatan') ") ;
      echo '<script>
      
      swal({
        title: "We have applied your changes!",
        text: "Your business activity was added",
        type: "success"
      }).then(function() {
        window.location = "";
      });
      
      </script>'; 
      
   }
   ?>

     <div class="modal fade" id="modaldeleteact" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Delete your activity? </h4>
        </div>

        <div class="modal-body">
          <form action="" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" method="post">
            
      <div class="w3-row w3-section">
        <div class="w3-col" style="max-width:50px"><i class=""></i></div>
          <div class="w3-rest">
            <label style='color:grey'>id activity</label>
            <input class="w3-input w3-border" name="id_activity" id='id_activity' type="text" readonly style='color:grey'>
          </div>
      </div>
      <button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding" name='deleteact' onclick='confirm("Are you sure want to delete this activity?")'>Delete Activity</button>
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
   if (isset($_POST['deleteact'])){
      $id_activity = $_POST['id_activity'];
      mysqli_query($con, "DELETE FROM activity WHERE id_activity='$id_activity'");
      echo '<script>
      
      swal({
        title: "We have applied your changes!",
        text: "Your activity was deleted",
        type: "success"
      }).then(function() {
        window.location = "";
      });
      
      </script>'; 
      
   }
   ?>