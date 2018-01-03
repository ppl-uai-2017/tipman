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
                        <h4>Login here - Manage your Account</h4>
                            <div class="columns_wrap">
                              <h6>Username* &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Password*</h6>
                              <div class="column-1_2"><span class="wpcf7-form-control-wrap your-first-name">
                                <input type="text" name="username" value="" size="80" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="" required/></span></div>
                              
                              <div class="column-1_2"><span class="wpcf7-form-control-wrap your-first-name">
                                <input type="password" name="password" value="" size="80" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="" required/></span></div>
                            </div>
                            
                            <div class="center">
                              <input type="submit" value="Log in" name='logincc' class="wpcf7-form-control wpcf7-submit" />
                            </div>
                            <center><a href='login_cc.php'><h6> Don't have an account? Register here!</h6></a></center>
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
if (isset($_POST['logincc']))
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
      $row = $db_handle->runQuery("SELECT * FROM account WHERE username = '$username' and actor='childcare'");
    
      if( empty( $row[0]['username'] ) )
      {
        echo "<script>swal('username has not been registered as a Partner of TIPMAN!');</script>";
        $error++;
      }
      else
      {
        if( $row[0]['password'] != $pass )
        {
          echo "<script>swal('Your Password Is Wrong!');</script>";
          $error++;
        }
        else
        {
          session_unset();
          
          $_SESSION['username']=$row[0]['username'];
          $_SESSION['actor']='parents';
          //echo $_SESSION['username'];
          echo '<script>
          swal({
            title: "Success Login!",
            text: "Manage your childcare!",
            type: "success"
          }).then(function() {
            window.location = "admin/index.php";
          });
          
          </script>'; 
        } //end else
      } //end else
    }
}

?>