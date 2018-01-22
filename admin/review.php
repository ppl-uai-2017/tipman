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
    <h3 style='color:midnightblue'><i class= "fa fa-commenting"></i> &nbsp Review</h3><br/>
    <div style="overflow-x:auto;">
    
    <h4 style='color:black'>Review for your child care : </h4>
    <?php 
      $r = mysqli_query($con, "SELECT * FROM pemesanan as p, parents as pa WHERE idchildcare='$id' and p.username=pa.username;");
      while($detailr = mysqli_fetch_assoc($r)){
        if(!empty($detailr['review'])){ 
      ?>
      <div style="overflow-x:auto;">
      <table style="width:100%">
      <tr>
        <th width=20%>Customer</th>
        <td><?php echo $detailr['first_name'].' '.$detailr['last_name']; ?></td>
      </tr>
      <tr>
        <th>Review</th>
        <td><?php echo $detailr['review']; ?></td>
      </tr>
    </table><br>
    <?php } } ?>
</div>

  </div>

</div>
</div>
</body>

