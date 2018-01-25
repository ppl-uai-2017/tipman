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
    <h3 style='color:midnightblue'>Gallery - Manage your gallery </h3><br/>
    <div style="overflow-x:auto;">
    <button  type="button" class="buttonupload btn btn-info btn-lg" data-toggle="modal" data-target="#modalupload" id="buttonupload" data-id="<?php echo $id; ?>" ><i class="fa fa-upload">&nbsp Add new photo</i></button>


    <h4 style='color:black'>Your Gallery : </h4>
    <div class="w3portfolioaits" id="gallery">
    <div class="w3portfolioaits-items">
      
      <?php 
      $sql = mysqli_query($con, "SELECT * FROM gallery WHERE id_childcare = '$id'"); 
      while($gallery = mysqli_fetch_assoc($sql)){
      ?>
      <div class="col-md-3 w3portfolioaits-item w3portfolioaits-item-1">
        <a class="example-image-link" href="../images/gallery/<?php echo $gallery['filefoto']?>" data-lightbox="example-set" data-title="">
          <div class="grid">
            <figure class="effect-apollo">
              <img src="../images/gallery/<?php echo $gallery['filefoto']?>" alt="Game Robo">
                <figcaption></figcaption>
            </figure></a>
            <center>
            <button type="button" title='delete' class="buttondelete btn btn-info btn-lg" data-toggle="modal" data-target="#modaldelete" id="buttondelete" data-id='<?php echo $gallery['id']?>' data-file="<?php echo $gallery['filefoto']; ?>"><i class="fa fa-trash"> </i></button>
          </center>
          </div>
      </div>
      <?php } ?>

      <div class="clearfix"></div>
    </div>

  </div>
</div>
</div>
</div>
</div>
</body>

   <div class="modal fade" id="modalupload" role="dialog">
    <div class="modal-dialog>
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Upload your photo into gallery</h4>
        </div>

        <div class="modal-body">
          <form action="" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" method="post" enctype="multipart/form-data">
            <div class="w3-row w3-section">
        <div class="w3-col" style="max-width:50px"><i class=" "></i></div>
          <div class="w3-rest">
            <label style='color:grey'>id childcare :</label>
              <input type="text" name="id_childcare" id="id_childcare" style='color:grey' readonly>
          </div>
      </div>
            <div class="w3-row w3-section">
        <div class="w3-col" style="max-width:50px"><i class=" "></i></div>
          <div class="w3-rest">
            <label>Select image to upload:</label>
              <input type="file" name="filefoto" id="filefoto">
          </div>
      </div>
        
      <button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding" name='upload' onclick='confirm("Are you sure you want to add this photo into gallery? ")'>upload</button>
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
if(isset($_POST["upload"])) {
  $id_childcare = $_POST['id_childcare'];
  $target_dir = "../images/gallery/";
  $target_file = $target_dir . basename($_FILES["filefoto"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["filefoto"]["tmp_name"]);
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

          $filefoto = $_FILES["filefoto"]["name"];
          mysqli_query($con, "INSERT INTO gallery(id_childcare, filefoto) VALUES('$id_childcare', '$filefoto')") ;
          echo "<script>swal({
                title: 'We have applied your changes!',
                text: 'Your payment receipt has been uploaded',
                type: 'success'
              }).then(function() {
                window.location = '';
              });
            </script>";
      } else {
          echo "<script>swal('Sorry, there was an error uploading your file.')</script>";
      }
  }
}
?>


 <script>
$(document).ready(function(){
   $(".buttonupload.btn.btn-info.btn-lg").click(function(){
      $("#modalupload").modal({backdrop: "static"});
      var id_childcare=$(this).data('id');
      $(".modal-body #id_childcare").val(id_childcare); 
    });
   $(".buttondelete.btn.btn-info.btn-lg").click(function(){
      $("#modaldelete").modal({backdrop: "static"});
      var id_gallery=$(this).data('id');
      var file=$(this).data('file');
      $(".modal-body #id_gallery").val(id_gallery); 
      $(".modal-body #file").val(file); 
    });
   
});
</script>



  <!-- Modal -->
  <div class="modal fade" id="modaldelete" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Delete your photo? </h4>
        </div>

        <div class="modal-body">
          <form action="" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" method="post">
            
      <div class="w3-row w3-section">
        <div class="w3-col" style="max-width:50px"><i class=""></i></div>
          <div class="w3-rest">
            <label style='color:grey'>id photo</label>
            <input class="w3-input w3-border" name="id_gallery" id='id_gallery' type="text" readonly style='color:grey'>
            <input class="w3-input w3-border" name="file" id='file' type="text" readonly style='color:grey' hidden>
          </div>
      </div>
      <button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding" name='delete' onclick='confirm("Are you sure want to delete this photo from your gallery?")'>Delete Photo</button>
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
      $id_gallery = $_POST['id_gallery'];
      $file = $_POST['file'];
      mysqli_query($con, "DELETE FROM gallery WHERE id='$id_gallery'");
      unlink('../images/gallery/');
      echo '<script>
      
      swal({
        title: "We have applied your changes!",
        text: "Your photo was deleted",
        type: "success"
      }).then(function() {
        window.location = "";
      });
      
      </script>'; 
      
   }
   ?>