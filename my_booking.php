<?php 
session_start();
require "head.php";
$username = $_SESSION['username'];
$session = mysqli_query($con, "SELECT * FROM parents WHERE username = '$username'");
$booking =  mysqli_query($con, "SELECT c.businessname, pac.*, p.*, ch.* FROM pemesanan as p, childcare as c, children as ch, package as pac WHERE p.username = '$username' and idchildcare=id and ch.id_children = p.id_children and p.id_package=pac.id_package");
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
    <h3 style='color:midnightblue'><i class= "fa fa-book"></i> &nbsp My Booking</h3><br/>
   
    <h4 style='color:black'>Your Booking : </h4>
    <p style='color:midnightblue'><i class='glyphicon glyphicon-warning-sign'></i> &nbsp If your status is 'waiting', make sure you have confirm your payment by uploading your payment receipt</p>
    <p style='color:midnightblue'><i class='glyphicon glyphicon-warning-sign'></i> &nbsp If your status already 'accepted', you can just bring your child to the childcare at the time.</p>
     <div style="overflow-x:auto;">
      <table>
      <tr>
        <th>No. </th>
        <th>Child Care</th>
        <th>Children</th>
        <th>Package Class</th>
        <th>Package Price</th>
        <th>Start Booking date
        </th>
        
        <th>Payment Receipt</th>
        <th>Booking status</th>
      </tr>
      <?php
        $no=1;
        while ($bookingdet=mysqli_fetch_assoc($booking)){ 
      ?>
	  <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $bookingdet['businessname'] ?></td>
        <td><?php echo $bookingdet['first_name'].' '.$bookingdet['last_name']; ?></td>
        <td><?php echo $bookingdet['package_class']; ?></td>
        <td><?php echo "IDR ".number_format($bookingdet['package_price']); ?></td>
        <td><?php echo $bookingdet['date'] ?></td>
        <?php if($bookingdet['bukti_pembayaran']){ ?>
        <img src='images/bukti_pembayaran/<?php echo $bookingdet['bukti_pembayaran'] ?>' style='max-width:100px'/>
        <?php } else { ?>
        <td><button type="button" class="buttonupload btn btn-info btn-lg" data-toggle="modal" data-target="#modalupload" id="buttonupload" data-id="<?php echo $bookingdet['idpemesanan']; ?>"><i class="fa fa-upload"> &nbsp upload payment receipt</i></button>
        
        <?php } ?></td>
        <td><?php if($bookingdet['statuspemesanan']=='menunggu' ) echo 'waiting childcare confirmation'; 
        else if($bookingdet['statuspemesanan']=='terima') 
          { 
            echo 'accepted'; ?>
            <button type="button" class="buttonfinish btn btn-info btn-lg" data-toggle="modal" data-target="#modalfinish" id="buttonfinish" data-id='<?php echo $bookingdet['idpemesanan'];?>'><i class="fa fa-check"> &nbsp Finish Order</i></button>
        <?php
          }
        else if($bookingdet['statuspemesanan']=='tolak') 
          echo 'Sorry, your booking can not be accepted by '.$bookingdet['businessname'].', He says " '.$bookingdet['reason_tolak'].'. " Lets make another booking. We will send you the payment if you already paid. Thank You.'; else if($bookingdet['statuspemesanan']=='selesai') echo 'Finish Booking';

        ?>
            
        </td>
        
        
        <!--<td>
        	<button type="button" title='edit' class="btn btn-info btn-lg" data-toggle="modal" data-target="#modaledit" id="buttonedit"><i class="fa fa-pencil"> </i></button>
        	<button type="button" title='delete' class="btn btn-info btn-lg" data-toggle="modal" data-target="#modaldelete" id="buttondelete"><i class="fa fa-trash"> </i></button>

        </td>-->
      </tr>
      <?php $no++; }?>
      
    </table>
</div>

  </div>
  <ol class="">
    <br/><br/>
    <h2 style='color:black'> Bagaimana cara melakukan pembayaran?</h2>
    <h3 style='color:black'>Transfer melalui ATM BCA</h3>
    <li>Masukkan kartu ATM kemudian masukkan nomor PIN Anda</li>
    <li>Pilih "Transaksi lainnya", kemudian pilih "Transfer"</li>
    <li>Pilih Transfer ke Rek. BCA Virtual Account</li>
    <li>Silahkan masukkan nomor Virtual Account 711113917492912, lalu tekan "Benar"</li>
    <li>Periksa kembali data transaksi kemudian tekan "Benar"</li>
  </ol>

</div>
</div>
</body>



   <div class="modal fade" id="modalupload" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Upload your payment receipt</h4>
        </div>

        <div class="modal-body">
          <form action="" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" method="post" enctype="multipart/form-data">
            <div class="w3-row w3-section">
        <div class="w3-col" style="max-width:50px"><i class=" "></i></div>
          <div class="w3-rest">
            <label style='color:grey'>id pemesanan :</label>
              <input type="text" name="id_pemesanan" id="id_pemesanan" style='color:grey' readonly>
          </div>
      </div>
            <div class="w3-row w3-section">
        <div class="w3-col" style="max-width:50px"><i class=" "></i></div>
          <div class="w3-rest">
            <label>Select image to upload:</label>
              <input type="file" name="filefoto" id="filefoto">
          </div>
      </div>
        
      <button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding" name='upload' onclick='confirm("Are you sure this is the right payment receipt? You cant change it later")'>upload</button>
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
  $id_pemesanan = $_POST['id_pemesanan'];
  $target_dir = "images/bukti_pembayaran/";
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
          mysqli_query($con, "UPDATE pemesanan SET bukti_pembayaran = '$filefoto' where idpemesanan='$id_pemesanan'") ;
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


   <div class="modal fade" id="modalfinish" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Confirm your order</h4>
        </div>

        <div class="modal-body">
          <form action="" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" method="post" enctype="multipart/form-data">
            <div class="w3-row w3-section">
        <div class="w3-col" style="max-width:50px"><i class=" "></i></div>
          <div class="w3-rest">
            <label style='color:grey'>id pemesanan :</label>
              <input type="text" name="id_pemesanan" id="id_pemesanan" style='color:grey' readonly>
          </div>
      </div>
            <div class="w3-row w3-section">
        <div class="w3-col" style="max-width:50px"><i class=" "></i></div>
          <div class="w3-rest">
            <label>Write a review for child care :</label><br/>
              <textarea class="w3-input w3-border" name='review' id='review' placeholder="write your review briefly, it will help them to improve their services."></textarea> 
          </div>
      </div>
        
      <button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding" name='finish' onclick='confirm("Are you sure this order is finish? You can not change it later")'>Finish order</button>
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
$review = '';
if(isset($_POST['finish'])){
  $statuspemesanan = 'selesai';
  $id_pemesanan = $_POST['id_pemesanan'];
  $review = $_POST['review'];

  mysqli_query($con, "UPDATE pemesanan SET statuspemesanan='$statuspemesanan', review = '$review' WHERE idpemesanan = '$id_pemesanan'");
      echo '<script>
      
      swal({
        title: "We have confirm your finish booking!",
        text: "Please get another book",
        type: "success"
      }).then(function() {
        window.location = "index.php";
      });
      
      </script>'; 
}

?>

 <script>
$(document).ready(function(){
   
   $(".buttonupload.btn.btn-info.btn-lg").click(function(){
      $("#modalupload").modal({backdrop: "static"});
      var id_pemesanan=$(this).data('id');
      $(".modal-body #id_pemesanan").val(id_pemesanan); 
    });
   $(".buttonfinish.btn.btn-info.btn-lg").click(function(){
      $("#modalfinish").modal({backdrop: "static"});
      var id_pemesanan=$(this).data('id');
      $(".modal-body #id_pemesanan").val(id_pemesanan); 
    });
    

});
</script>