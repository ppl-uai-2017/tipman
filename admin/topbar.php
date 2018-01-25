
<div class="top-bar">
	<div class="container-fluid">
		<div class="header-nav">
			<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href=''><img src='../images/logo/logo.jpg' width='150px' height='70px'></a>
			</div>
							<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
				<nav class="cl-effect-15" id="cl-effect-15">
					<ul>
            <li><a href="index.php" >Home</a></li>
            <li><a href="gallery.php">Gallery</a></li>
						<li><a href="order.php" >Order</a></li>
            <li><a href="package.php">Package</a></li>
						<li><a href="review.php">Review</a></li>
            <li><a href="contact_us.php">Contact us</a></li>
						<li><a href="logout.php" title='Logout'><label style='color:midnightblue'><?php echo $_SESSION['username']."   "; ?><i class='glyphicon glyphicon-off'></i></label></a>
						</li>
					</ul>
				</nav>
			</div>
			</nav>
		</div>
	</div>
</div>


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

if (!empty($_GET)){
	if ($_GET['action']=='login'){
			echo "<script>document.getElementById('buttonlogin').click();</script>";
	}
}
?>

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
            window.location = "index.php";
          });
          
          </script>'; 
        } //end else
      } //end else
    }
}

?>
