<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
?>

<!DOCTYPE html>
<html lang="en-US" class="no-js scheme_default">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<?php include "head.php";
include 'base.php';?>
</head>


<body class="page-template-default page page-id-180 custom-background body_tag scheme_default blog_mode_page body_style_wide is_single sidebar_hide expand_content remove_margins header_style_header-custom-20 header_position_default menu_style_top no_layout wpb-js-composer js-comp-ver-5.1.1 vc_responsive">
  <div class="body_wrap">
    <div class="page_wrap">
      <?php include "header.php";?>
      <div class="menu_mobile_overlay"></div>
      <div class="page_content_wrap scheme_default">
        <div class="content_wrap">
          <div class="content">
            <article id="post-299" class="post_item_single post_type_page post-299 page type-page status-publish hentry">
              <div class="wpb_text_column wpb_content_element " >
                 <div class="wpb_wrapper">
                    <div role="form" class="wpcf7" id="wpcf7-f5-p180-o1" lang="en-US" dir="ltr">
                      <div class="screen-reader-response"></div>
                      <form action="" method="post" class="wpcf7-form" >
                        <br/>
                        <h4>Childcare Application - Enter Details</h4>
                        <h5 style='color:crimson'>01. Business Detail</h5>
                          <h6>Business Name *</h6>
                           <div class="columns_wrap">
                              <div class="column-1_1"><span class="wpcf7-form-control-wrap your-first-name">
                                <input type="text" name="company_name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="" required/></span>
                              </div>
                            </div>
                            <h6>Sertification Number *</h6>
                           <div class="columns_wrap">
                              <div class="column-1_1"><span class="wpcf7-form-control-wrap your-first-name">
                                <input type="text" name="nosertifikasi " value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="" required/></span>
                              </div>
                            </div>
                            <h6>Company Address *</h6>
                            <div class="columns_wrap">
                              <div class="column-1_1"><span class="wpcf7-form-control-wrap your-first-name">
                                <input type="text" name="company_address" value="" size="80" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="company address" required/></span>
                              </div>
                            </div>
                            <div class="columns_wrap">
                              <div class="column-1_2"><span class="wpcf7-form-control-wrap your-first-name">
                                <select name='city'>
                                  <option value = ''>City</option>
                                  <?php 
                                  $city = $db_handle->runQuery("SELECT * FROM city ");
                                  foreach($city as $key=>$value){
                                  ?>
                                  <option value = '<?php echo $city[$key]["city"]?>'><?php echo $city[$key]["city"]?></option>
                                  <?php } ?>
                                </select>
                              </span></div>
                              <div class="column-1_2"><span class="wpcf7-form-control-wrap your-first-name">
                                <select name='region'>
                                  <option value = ''>Region</option>
                                  <?php 
                                  $region = $db_handle->runQuery("SELECT * FROM region ");
                                  foreach($region as $key=>$value){
                                  ?>
                                  <option value = '<?php echo $region[$key]["companyregion"]?>'><?php echo $region[$key]["companyregion"]?></option>
                                  <?php } ?>
                                </select>
                                </span></div>
                            </div>
                            <h6>Contact Name*</h6>
                            <div class="columns_wrap">
                              <div class="column-1_2"><span class="wpcf7-form-control-wrap your-first-name">
                                <input type="text" name="contact_last_name" value="" size="80" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="contact first name" required/></span></div>
                              <div class="column-1_2"><span class="wpcf7-form-control-wrap your-first-name">
                                <input type="text" name="contact_first_name" value="" size="80" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="contact last name" required/></span></div>
                            </div>
                            <h6>Contact Phone *</h6>
                           <div class="columns_wrap">
                              <div class="column-1_1"><span class="wpcf7-form-control-wrap your-first-name">
                                <input type="text" name="contact_phone" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="" required/></span>
                              </div>
                            </div>
                            <h6>Contact Email *</h6>
                           <div class="columns_wrap">
                              <div class="column-1_1"><span class="wpcf7-form-control-wrap your-first-name">
                                <input type="text" name="contact_email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="" required/></span>
                              </div>
                            </div>
                            <h5 style='color:crimson'>02. Account Detail</h5>

                            <div class="columns_wrap">
                              <h6>Username* &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Password*</h6>
                              <div class="column-1_2"><span class="wpcf7-form-control-wrap your-first-name">
                                <input type="text" name="username" value="" size="80" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="" required/></span></div>
                              
                              <div class="column-1_2"><span class="wpcf7-form-control-wrap your-first-name">
                                <input type="password" name="password" value="" size="80" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="" required/></span></div>
                            </div>
                            
                            <div class="center">
                              <input type="submit" value="Register as Partner" name='register' class="wpcf7-form-control wpcf7-submit" />
                            </div>
                            <center><a href='login_cc.php'><h6>Have an account? Please Log in!</h6></a></center>
                            <div class="wpcf7-response-output wpcf7-display-none"></div>
                          </form>
                        </div>
                      </div>
                    </div>
            </article>
          </div><!-- </.content> -->
        </div><!-- </.content_wrap> -->     
      </div><!-- </.page_content_wrap> -->
    </div><!-- /.page_wrap -->
  </div><!-- /.body_wrap -->
<a href="#" class="trx_addons_scroll_to_top trx_addons_icon-up" title="Scroll to top"></a>
</body>

</html>



<?php

if(isset($_POST['register'])){
  $businessname = $_POST['company_name'];
  $nosertifikasi = $_POST['nosertifikasi'];
  $company_address = $_POST['company_address'];
  $city = $_POST['city'];
  $region = $_POST['region'];
  $contact_first_name = $_POST['contact_first_name'];
  $contact_last_name = $_POST['contact_last_name'];
  $contact_phone = $_POST['contact_phone'];
  $contact_email = $_POST['contact_email'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $actor = 'childcare';
  
  if ($cekusername[0]['jumlah']==0){
  $insert_childcare = $db_handle->runQuery("INSERT INTO childcare (businessname, nosertifikasi, contactfirstname, contactlastname, contactphone, contactemail, companyaddress, companyregion, username) 
  VALUES('$businessname','$nosertifikasi', '$contact_first_name','$contact_last_name', '$contact_phone', '$contact_email', '$company_address', '$region', '$username')");
  $insert_childcare = $db_handle->runQuery("INSERT INTO  account (username, password, actor) 
  VALUES('$username', '$password','$actor')");
  
  echo '<script>
  
  swal({
    title: "Thank you for registering!",
    text: "Please login and manage your childcare!",
    type: "success"
  }).then(function() {
    window.location = "childcare.php";
  });
  
  </script>'; 
  }
  else{
    echo '<script>
  
    swal("Sorry, username has been taken! Please registered in different username!");
    
    </script>'; 
    
  }
}

?>



