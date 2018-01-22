<?php 
session_start();
require "head.php";
$username = $_SESSION['username'];
?>

<body>
<!--Header-->
  <div class="header" id="home">
    <!--Top-Bar-->
    <?php require "topbar.php"; ?>

<div class="w3-container">
  <div class="w3-row">
  <div  class="w3-container city">
    <h3 style='color:midnightblue'><i class= "fa fa-commenting"></i> &nbsp Frequenty Asked Question</h3><br/>
    <div style="overflow-x:auto;">
    
    <div style="overflow-x:auto;">
      <table style="width:100%">
      <tr>
        <th>Apa itu tipman?</th>
      </tr>
      <tr>
        <td>TIPMAN adalah sebuah marketplace yang menghubungkan tempat penitipan anak yang ada di daerah JABODETABEK dengan para customer atau orang tua yang sedang melakukan pencarian untuk menemukan tempat penitipan anak terbaik untuk sang buah hati. </td>
      </tr>
    </table>
    <table style="width:100%">
      <tr>
        <th>Apakah tipman aman?</th>
      </tr>
      <tr>
        <td>Keamanan data baik customer maupun mitra kami tersimpan secara aman pada database kami, dan database tersebut hanya dapat diakses oleh administrator dari kami. Sehingga tipman merupakan marketplace yang aman dan dapat dipercaya.</td>
      </tr>
    </table>
    <table style="width:100%">
      <tr>
        <th>Apakah keuntungan dari tipman?</th>
      </tr>
      <tr>
        <td>Dengan menggunakan tipman customer jadi dapat melakukan transaksi secara aman dan efektif tanpa harus menghampiri Day Care yang dituju, dan terdapat verifikasi dari pihak kami. Kemudian customer juga dimudahkan untuk pencarian informasi Day Care berdasarkan lokasi kecamatan di Jakarta. Kemudian keuntungan bergabung menjadi mitra kami adalah memperluas pemasaran Day Care milik masing-masing dan juga menambah customer baru melalui situs kami. </td>
      </tr>
    </table>
    <table style="width:100%">
      <tr>
        <th>Wilayah mana saja yang menjadi cakupan tipman?</th>
      </tr>
      <tr>
        <td>Kami terbuka untuk tempat penitipan anak dengan cakupan Jakarta hingga Bogor, Depok, Tangerang dan Bekasi. </td>
      </tr>
    </table>
    <table style="width:100%">
      <tr>
        <th>Mengapa harus menggunakan tipman?</th>
      </tr>
      <tr>
        <td>Karena dengan menggunakan Tipman akan mempermudah orangtua dalam mencari informasi untuk menitipkan anaknya, lalu dengan tipman pelanggan dapat menyeleksi sendiri tempat penitipan anak yang dapat mereka percayai. Dengan tipman, memasarkan Day Care akan terasa lebih mudah.</td>
      </tr>
    </table>
    </div>

  </div>

</div>
</div>
</body>

<script>
$(function(){


});

</script>