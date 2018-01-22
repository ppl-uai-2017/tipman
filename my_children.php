<?php 
session_start();
require "head.php";
$username = $_SESSION['username'];
$session = mysqli_query($con, "SELECT * FROM parents WHERE username = '$username'");
$detail = mysqli_fetch_assoc($session);
?>

<body>
<!--Header-->
  <div class="header" id="home">
    <!--Top-Bar-->
    <?php require "topbar.php"; ?>

<div class="w3-container">
  <div class="w3-row">
  <div  class="w3-container city">
    <h3 style='color:midnightblue'><i class= "fa fa-heart"></i> &nbsp My Children</h3><br/>
   
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modaladd" id="buttonadd"><i class="fa fa-plus"> &nbsp Add profile of your children</i></button>
    <h4 style='color:black'>Your children : </h4>
     <div style="overflow-x:auto;">
      <table>
      <tr>
        <th>No. </th>
        <th>Name</th>
        <th>Date of Birth</th>
        <th>Gender</th>
        <th>Relationship</th>
        <th>Explanation about your child</th>
      </tr>
      <?php 
      $child = mysqli_query($con, "SELECT * FROM children  where username_parents = '$username' ");
      $no=1;
      if(mysqli_num_rows($child)==0){ ?>
       <tr>
        <td colspan="6" style="text-align:center">You have no child profiles in your account. Click above to create your first child profile. </td>
      </tr>
      <?php } else { 
        while ($detail_child = mysqli_fetch_assoc($child)){ 
      ?>
	  <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $detail_child['first_name'].' '.$detail_child['last_name']; ?></td>
        <td><?php echo $detail_child['birth_place'].', '.$detail_child['date_of_birth']; ?></td>
        <td><?php echo $detail_child['gender']; ?></td>
        <td><?php echo $detail_child['relationship']; ?></td>
        <td><?php echo $detail_child['explanation']; ?></td>
        <!--<td>
        	<button type="button" title='edit' class="btn btn-info btn-lg" data-toggle="modal" data-target="#modaledit" id="buttonedit"><i class="fa fa-pencil"> </i></button>
        	<button type="button" title='delete' class="btn btn-info btn-lg" data-toggle="modal" data-target="#modaldelete" id="buttondelete"><i class="fa fa-trash"> </i></button>

        </td>-->
      </tr>
      <?php } $no++; } ?>
      
    </table>
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
          <h4 class="modal-title">Add your Child Profile</h4>
        </div>

        <div class="modal-body">
        	<form action="" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" method="post">
          	<div class="w3-row w3-section">
              <label>01. Profile</label>
			         <div class="w3-col" style="max-width:50px"><i class=" "></i></div>
			         <div class="w3-rest">
			    	        <label>First Name</label>
                    <input class="w3-input w3-border" placeholder='' name='first_name' type='text' required>  
                </div>
            </div>
            <div class="w3-row w3-section">
              <div class="w3-col" style="max-width:50px"><i class=" "></i></div>
                  <div class="w3-rest">
                    <label>Last Name</label>
                    <input class="w3-input w3-border" placeholder='' name='last_name' type='text' required>
                  </div>
            </div>
            <div class="w3-row w3-section">
            <div class="w3-col" style="max-width:50px"><i class=" "></i></div>
                <div class="w3-rest">
                  <label>Gender</label>
                  <select name='gender' required>
                    <option value=''>choose one</option>
                    <option value='Male'>Male</option>
                    <option value='Female'>Female</option>
                  </select>
                </div>
            <div class="w3-row w3-section">
              <div class="w3-col" style="max-width:50px"><i class=" "></i></div>
                  <div class="w3-rest">
                    <label>Birth Place</label>
                    <input class="w3-input w3-border" placeholder='' name='birth_place' type='text' required>
                  </div>
            </div>
            <div class="w3-row w3-section">
              <div class="w3-col" style="max-width:50px"><i class=" "></i></div>
                  <div class="w3-rest">
                    <label>Date of Birth</label>
                    <input class="w3-input w3-border" placeholder='' name='date_of_birth' type='date' required>
                  </div>
            </div>
            <div class="w3-col" style="max-width:50px"><i class=" "></i></div>
                <div class="w3-rest">
                  <label>Relationship</label>
                  <select name='relationship' required>
                    <option value=''>choose one</option>
                    <option value='Mother'>Mother</option>
                    <option value='Father'>Father</option>
                    <option value='Guardian'>Guardian</option>
                    <option value='Other'>Other</option>
                  </select>
                </div>
      			<div class="w3-row w3-section">
      			  <div class="w3-col" style="max-width:50px"><i class=""></i></div>
      			    <div class="w3-rest">
      			    	<label>Explanation about your child </label>
      			      <textarea class="w3-input w3-border"  name="explanation" type="text" placeholder="Explain briefly will help to treat your child better" required></textarea> 
      			    </div>
      			</div>
			<button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding" name='add' onclick='confirm("Are you sure want to add this child profile?")'>Add Child</button>
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
   		$first_name = $_POST['first_name'];
   		$last_name = $_POST['last_name'];
   		$gender = $_POST['gender'];
   		$birth_place = $_POST['birth_place'];
      $date_of_birth = $_POST['date_of_birth'];
      $relationship = $_POST['relationship'];
      $explanation = $_POST['explanation'];

   		mysqli_query($con, "INSERT INTO children(username_parents, first_name, last_name, gender, birth_place, date_of_birth, relationship, explanation) VALUES('$username','$first_name', '$last_name', '$gender', '$birth_place', '$date_of_birth', '$relationship', '$explanation') ") ;
   		echo '<script>
		  
		  swal({
		    title: "We have add your child!",
		    text: "Please continue your booking",
		    type: "success"
		  }).then(function() {
		    window.location = "my_children.php";
		  });
		  
		  </script>'; 
		  
   }
   ?>

 <script>
$(document).ready(function(){
   
    $("#buttonadd").click(function(){
        $("#modaladd").modal({backdrop: "static"});
    });
});
</script>