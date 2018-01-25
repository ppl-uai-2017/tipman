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
    <a id='first' href="javascript:void(0)" onclick="openCity(event, 'bip');">
       <?php 
        $jumlah = mysqli_query($con, "SELECT COUNT(*) as jumlah FROM pemesanan as p WHERE p.statuspemesanan='terima' and p.idchildcare='$id'") ;
        $jml = mysqli_fetch_assoc($jumlah);
        ?>
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Booking in Progress (<?php echo $jml['jumlah']; ?>)</div>
    </a>
    <a href="javascript:void(0)" onclick="openCity(event, 'bna');">
      <?php 
        $jumlah_menunggu = mysqli_query($con, "SELECT COUNT(*) as jumlah FROM pemesanan as p WHERE p.statuspemesanan='menunggu' and p.idchildcare='$id'") ;
        $jml_menunggu = mysqli_fetch_assoc($jumlah_menunggu);
        ?>
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Booking Need Approval (<?php echo $jml_menunggu['jumlah']; ?>)</div>
    </a>
    <a href="javascript:void(0)" onclick="openCity(event, 'bh');">
       <?php 
        $jumlah_pemesanan = mysqli_query($con, "SELECT COUNT(*) as jumlah FROM pemesanan as p WHERE (p.statuspemesanan='selesai' or p.statuspemesanan='tolak') and p.idchildcare='$id'") ;
        $jml_pemesanan = mysqli_fetch_assoc($jumlah_pemesanan);
        ?>
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Booking History (<?php echo $jml_pemesanan['jumlah']; ?>)</div>
    </a>
    
  </div>

  <div id="bip" class="w3-container city" style="display:none">
    
    <h4 style='color:midnightblue'>Manage your booking - Booking in Progress </h4><br/>
    <div style="overflow-x:auto;">
    <table>
      <tr>
        <th>No. </th>
        <th>Customer </th>
        <th>Start Booking Date</th>
        <th>Finish Booking Date </th>
        <th>Children Name </th>
        <th>Package</th>
        <th>Total Payment </th>
        <th>Booking Status </th>
      </tr>
      <?php 
        $terima = mysqli_query($con, "SELECT p.*, pa.*, pac.*, child.first_name AS fn, child.last_name AS ln, child.gender, child.birth_place, child.date_of_birth, child.relationship, child.explanation, child.id_children FROM pemesanan as p, parents as pa, package as pac, children as child WHERE p.statuspemesanan='terima' and p.idchildcare='$id' and p.username = pa.username and p.id_package=pac.id_package and p.id_children=child.id_children") ;
        $no=1;
        if(mysqli_num_rows($terima)==0){ ?>
        <tr>
        <td colspan="10" style='text-align:center '>There is no booking</td>
        </tr>
        <?php
        }else{
        while($row_terima = mysqli_fetch_assoc($terima)){
        ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $row_terima['first_name'].' '.$row_terima['last_name']; ?></td>
        <td><?php echo $row_terima['date']; ?></td>
        <td><?php echo $row_terima['starttime']; ?></td>
        <td style="color:red"><a class="buttonchildren" data-toggle="modal" data-target="#modalchildren" id="buttonchildren" data-firstname='<?php echo $row_terima['fn'];?>' data-lastname='<?php echo $row_terima['ln'];?>' data-gender='<?php echo $row_terima['gender'];?>' data-birth_place='<?php echo $row_terima['birth_place'];?>' data-date_of_birth='<?php echo $row_terima['date_of_birth'];?>' data-relationship='<?php echo $row_terima['relationship'];?>' data-explanation='<?php echo $row_terima['explanation'];?>' ><?php echo $row_terima['fn'].' '.$row_terima['ln']; ?></td></a>
        <td><?php echo $row_terima['package_class']; ?></td>
        <td><?php echo "IDR ".number_format($row_terima['package_price']); ?></td>
        
        <td> have not confirm finish by customer </td>
      </tr>
      <?php } $no++; }?>
    </table>
</div>

  </div>

  <div id="bna" class="w3-container city" style="display:none">
    <h4 style='color:midnightblue'>Manage your booking - Booking Need Approval</h4><br/>
    <div style="overflow-x:auto;">
    <table>
      <tr>
        <th>No. </th>
        <th>Customer </th>
        <th>Start Booking Date</th>
        <th>Finish Booking Date </th>
        <th>Children Name </th>
        <th>Package</th>
        <th>Total Payment </th>
        <th>Bukti Pembayaran</th>
        <th>Booking Status </th>
      </tr>
      <?php 
        $menunggu = mysqli_query($con, "SELECT p.*, pa.*, pac.*, child.first_name AS fn, child.last_name AS ln, child.gender, child.birth_place, child.date_of_birth, child.relationship, child.explanation, child.id_children FROM pemesanan as p, parents as pa, package as pac, children as child WHERE p.statuspemesanan='menunggu' and p.idchildcare='$id' and p.username = pa.username and p.id_package=pac.id_package and p.id_children=child.id_children") ;
        $no=1;
        if(mysqli_num_rows($menunggu)==0){ ?>
        <tr>
        <td colspan="10" style='text-align:center '>There is no booking</td>
        </tr>
        <?php
        }else{
        while($row_menunggu = mysqli_fetch_assoc($menunggu)){

        ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $row_menunggu['first_name'].' '.$row_menunggu['last_name']; ?></td>
        <td><?php echo $row_menunggu['date']; ?></td>
        <td><?php echo $row_menunggu['starttime']; ?></td>
        <td style="color:red"><a class="buttonchildren" data-toggle="modal" data-target="#modalchildren" id="buttonchildren" data-firstname='<?php echo $row_menunggu['fn'];?>' data-lastname='<?php echo $row_menunggu['ln'];?>' data-gender='<?php echo $row_menunggu['gender'];?>' data-birth_place='<?php echo $row_menunggu['birth_place'];?>' data-date_of_birth='<?php echo $row_menunggu['date_of_birth'];?>' data-relationship='<?php echo $row_menunggu['relationship'];?>' data-explanation='<?php echo $row_menunggu['explanation'];?>' ><?php echo $row_menunggu['fn'].' '.$row_menunggu['ln']; ?></td></a>
        <td><?php echo $row_menunggu['package_class']; ?></td>
        <td><?php echo "IDR ".number_format($row_menunggu['package_price']); ?></td>
        
        <td>
          <?php if(empty($row_menunggu['bukti_pembayaran'])){ echo 'Customer has not been yet send his receipt payment.'; }else{ ?>
          <img src='../images/bukti_pembayaran/<?php echo $row_menunggu['bukti_pembayaran'] ?>' style='max-width:100px'/>
          <?php } ?>
        </td>
        <td><?php echo "waiting for your approval booking" ?>
          <button type="button" class="buttonstatus btn btn-info btn-lg" data-toggle="modal" data-target="#modalstatus" id="buttonstatus" data-id='<?php echo $row_menunggu['idpemesanan'];?>'><i class="fa fa-flag " > &nbsp  Change Status</i></button>

        </td>
      </tr>
      <?php $no++; }  }?>
    </table>
</div>

  </div>

  <div id="bh" class="w3-container city" style="display:none">
        <h4 style='color:midnightblue'>Manage your booking - Booking History </h4><br/>
    <div style="overflow-x:auto;">
    <table>
      <tr>
        <th>No. </th>
        <th>Customer </th>
        <th>Start Booking Date</th>
        <th>Finish Booking Date </th>
        <th>Children Name </th>
        <th>Package</th>
        <th>Total Payment </th>
        <th>Booking Status </th>
      </tr>
      <?php 
        $history = mysqli_query($con, "SELECT p.*, pa.*, pac.*, child.first_name AS fn, child.last_name AS ln, child.gender, child.birth_place, child.date_of_birth, child.relationship, child.explanation, child.id_children FROM pemesanan as p, parents as pa, package as pac, children as child WHERE (p.statuspemesanan='selesai' or p.statuspemesanan='tolak' ) and p.idchildcare='$id' and p.username = pa.username and p.id_package=pac.id_package and p.id_children=child.id_children") ;
        $no=1;
        $profit=0;
        if(mysqli_num_rows($history)==0){ ?>
        <tr>
        <td colspan="10" style='text-align:center '>There is no booking</td>
        </tr>
        <?php
        }else{
        $profit=0;
        while($row_history = mysqli_fetch_assoc($history)){
        ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $row_history['first_name'].' '.$row_history['last_name']; ?></td>
        <td><?php echo $row_history['date']; ?></td>
        <td><?php echo $row_history['starttime']; ?></td>
        <td><?php echo $row_history['fn'].' '.$row_history['ln']; ?></td>
        <td><?php echo $row_history['package_class']; ?></td>
        <td><?php echo "IDR ".number_format($row_history['package_price']); ?></td>
        
        <td><?php if($row_history['statuspemesanan']=='tolak') { echo "cancelled order"; } else { echo "finished order"; }?></td>
      </tr>
      <?php  if ($row_history['statuspemesanan']=='selesai') { $profit+=$row_history['package_price']; } $no++; } }?>
      <tr>
        <th colspan="10"> Total profit : <?php echo "IDR ".number_format($profit);  ?> </th>
      </tr>
    </table>
</div>
  </div>


</div>
</div>
</body>

<script>
    $(document).ready(function(){
     document.getElementById('first').click();

    $(".buttonstatus.btn.btn-info.btn-lg").click(function(){
      $("#modalstatus").modal({backdrop: "static"});
      var id_pemesanan=$(this).data('id');
      $(".modal-body #id_pemesanan").val(id_pemesanan); 
    });
    
    $(".buttonchildren").click(function(){
      $("#modalchildren").modal({backdrop: "static"});
      var first_name=$(this).data('firstname');
      $(".modal-body #first_name").val(first_name); 
      var last_name=$(this).data('lastname');
      $(".modal-body #last_name").val(last_name); 
      var gender=$(this).data('gender');
      $(".modal-body #gender").val(gender); 
      var birth_place=$(this).data('birth_place');
      $(".modal-body #birth_place").val(birth_place); 
      var date_of_birth=$(this).data('date_of_birth');
      $(".modal-body #date_of_birth").val(date_of_birth); 
      var relationship=$(this).data('relationship');
      $(".modal-body #relationship").val(relationship); 
      var explanation=$(this).data('explanation');
      $(".modal-body #explanation").val(explanation); 
    });

    $('.div1').hide();
    $('#status').change(function() {
      $('.div1').hide();
      $('#div' + $(this).val()).show();
    });

    });
  
</script>

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
</script>



  <!-- Modal -->
  <div class="modal fade" id="modalstatus" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">edit status order</h4>
         
        </div>
        <div class="modal-body">
          <form action="" class="w3-container w3-card-4 w3-light-white w3-text-pink w3-margin" method="post">
  
          <div class="w3-row w3-section">
            <div class="w3-col" style="max-width:50px"><i class=""></i></div>
              <div class="w3-rest">
                <label style='color:grey'>id pemesanan : </label>
                <input class="w3-input w3-border" id='id_pemesanan' name="id_pemesanan" type="text" style='color:grey' readonly>
              </div>
          </div>
            <div class="w3-row w3-section">
              <div class="w3-col" style="max-width:50px"><i class=""></i></div>
                <div class="w3-rest">
                  <label>Status Order : </label>
                  
                <select name="status" id="status" required>
                    <option value=''>change status</option>
                    <option value='terima'>Accept</option>
                    <option value='tolak'>We dont want to accept this order</option>
                </select>
         
            </div>
          </div>
          <div id="divtolak" class='div1'>
          <div class="w3-row w3-section">
            <div class="w3-col" style="max-width:50px"><i class=""></i></div>
              <div class="w3-rest">
                <label>Why ? </label>
                <textarea class="w3-input w3-border" name="reason_tolak" type="text" placeholder="Please explain briefly, so we can understand"></textarea> 
              </div>
          </div>
          </div>
          <button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding" name='updatestatus' onclick='confirm("Are you sure? You cant change it later")'>Appy Changes</button>
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
$reason_tolak = '';
if(isset($_POST['updatestatus'])){
  $id_pemesanan = $_POST['id_pemesanan'];
  $statuspemesanan = $_POST['status'];
  $reason_tolak = $_POST['reason_tolak'];


  mysqli_query($con, "UPDATE pemesanan SET statuspemesanan='$statuspemesanan', reason_tolak='$reason_tolak' WHERE idpemesanan = '$id_pemesanan'");
  echo '<script>
          swal({
            title: "Success update your order!",
            text: "Lets see your other order!",
            type: "success"
          }).then(function() {
            window.location = "";
          });
          
          </script>'; 

}
?>


  <!-- Modal -->
  <div class="modal fade" id="modalchildren" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Children Profile</h4>
         
        </div>
        <div class="modal-body">
          <form action="" class="w3-container w3-card-4 w3-light-white w3-text-pink w3-margin" method="post">
  
          <div class="w3-row w3-section">
            <div class="w3-col" style="max-width:50px"><i class=""></i></div>
              <div class="w3-rest">
                <label style='color:grey'>First Name : </label>
                <input class="w3-input w3-border" id='first_name' name="first_name" type="text" style='color:grey' readonly>
              </div>
          </div>
          <div class="w3-row w3-section">
            <div class="w3-col" style="max-width:50px"><i class=""></i></div>
              <div class="w3-rest">
                <label style='color:grey'>Last Name : </label>
                <input class="w3-input w3-border" id='last_name' name="last_name" type="text" style='color:grey' readonly>
              </div>
          </div>
          <div class="w3-row w3-section">
            <div class="w3-col" style="max-width:50px"><i class=""></i></div>
              <div class="w3-rest">
                <label style='color:grey'>Gender : </label>
                <input class="w3-input w3-border" id='gender' name="gender" type="text" style='color:grey' readonly>
              </div>
          </div>
          <div class="w3-row w3-section">
            <div class="w3-col" style="max-width:50px"><i class=""></i></div>
              <div class="w3-rest">
                <label style='color:grey'>Birth Place : </label>
                <input class="w3-input w3-border" id='birth_place' name="birth_place" type="text" style='color:grey' readonly>
              </div>
          </div>
          <div class="w3-row w3-section">
            <div class="w3-col" style="max-width:50px"><i class=""></i></div>
              <div class="w3-rest">
                <label style='color:grey'>Date of Birth : </label>
                <input class="w3-input w3-border" id='date_of_birth' name="date_of_birth" type="text" style='color:grey' readonly>
              </div>
          </div>
          <div class="w3-row w3-section">
            <div class="w3-col" style="max-width:50px"><i class=""></i></div>
              <div class="w3-rest">
                <label style='color:grey'>Relationship : </label>
                <input class="w3-input w3-border" id='relationship' name="relationship" type="text" style='color:grey' readonly>
              </div>
          </div>
          <div class="w3-row w3-section">
            <div class="w3-col" style="max-width:50px"><i class=""></i></div>
              <div class="w3-rest">
                <label style='color:grey'>Explanation about the child : </label>
                <input class="w3-input w3-border" id='explanation' name="explanation" type="text" style='color:grey' readonly>
              </div>
          </div>
          
          <br/>
        </form>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
   </div>