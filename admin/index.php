<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en-US" class="no-js scheme_default">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<?php include "head.php";?>
</head>

<body class="product-template-default single single-product postid-897 custom-background woocommerce woocommerce-page body_tag scheme_default blog_mode_shop body_style_wide  is_stream blog_style_excerpt sidebar_hide expand_content header_style_header-custom-20 header_position_default menu_style_top no_layout wpb-js-composer js-comp-ver-5.1.1 vc_responsive">
  <div class="body_wrap">
    <div class="page_wrap">
    <?php include "header.php"; ?>
      <div class="menu_mobile_overlay"></div>
        
        <div class="page_content_wrap scheme_default">
          <div class="content_wrap">
            <div class="content">
              <article class="post_item_single post_type_product">
              
                <?php 
                      
                  $username = $_SESSION['username'];
                  
                  $childcare = $db_handle->runQuery("SELECT * FROM childcare WHERE username ='$username'" );
                  $_SESSION['idchildcare']=$childcare[0]["id"];
                  if (!empty($childcare)) { 
                    foreach($childcare as $key=>$value){
                ?>
                <?php if($childcare[0]["status"]!='verified'){ ?>
                <center><h4 style='color:red'>--- Your Daycare's Company has not been yet Verified by TIPMAN. --- </h4></center>
                <center><h5 style='color:salmon'>Why is this happen?</h5></center>
                <?php  } ?>
                <div id="product-897" class="post-897 product type-product status-publish has-post-thumbnail product_cat-chairs product_tag-baby product_tag-items product_tag-store first instock shipping-taxable purchasable product-type-variable has-default-attributes has-children">
                  <?php if(empty($childcare[$key]["foto1"])){ ?>

                    <h3>No Image, Upload ones </h3>
                    <h6 style='color:crimson'><i class='fa fa-pencil' aria-hidden='true'></i>Upload Photo</h6>
                  <?php } else{ ?>
                  <h6 style='color:crimson' name='editfoto' <?php //onclick=" document.getElementById('editfoto').style.display='block'"?>><i class='fa fa-pencil' aria-hidden='true'></i>edit photo</h6>

                  <div class="woocommerce-product-gallery woocommerce-product-gallery--columns-4 images" data-columns="4" style="opacity: 0; transition: opacity .25s ease-in-out;">
                    <figure class="woocommerce-product-gallery__wrapper">

                      <div data-thumb="../images/partner/<?php echo $childcare[$key]["foto1"]?>" class="woocommerce-product-gallery__image"><a href="../images/partner/<?php echo $childcare[$key]["foto1"]?>">
                      <img width="600" height="600" src="../images/partner/<?php echo $childcare[$key]["foto1"]?>" class="attachment-shop_single size-shop_single wp-post-image" alt="" title="image-3" data-caption="" data-src="../images/partner/<?php echo $childcare[$key]["foto1"]?>"  /></a></div> 

                      </figure>
                      
                  </div>

                  <?php } ?>
                  <div class="summary entry-summary">
                     <h6 style='color:crimson'><i class='fa fa-pencil' aria-hidden='true'></i>edit business name</h6>
                    <h1 class="product_title entry-title"><?php echo $childcare[$key]["businessname"]?></h1><p class="price"><span class="woocommerce-Price-amount amount"><?php echo $childcare[$key]["businessname"]?></span></p>
                      
                      <div class="woocommerce-product-details__short-description">
                         <h6 style='color:crimson'><i class='fa fa-pencil' aria-hidden='true'></i>edit company address</h6>
                        <h4 class="woocommerce-Reviews-title"><?php echo $childcare[$key]["companyaddress"].' '.$childcare[$key]["companyregion"].' '.$childcare[$key]["companypostcode"]?></h4>
                         <h6 style='color:crimson'><i class='fa fa-pencil' aria-hidden='true'></i>edit description</h6>
                        <p><?php echo $childcare[$key]["companydesc"]?></p>
                      </div>
                  </div><!-- .summary -->
    
                  <div class="woocommerce-tabs wc-tabs-wrapper">
                    <ul class="tabs wc-tabs" role="tablist">
                      <li class="description_tab" id="tab-title-description" role="tab" aria-controls="tab-description">
                        <a href="#tab-description">What's Included</a>
                      </li>
                      <li class="package_tab" id="tab-title-description" role="tab" aria-controls="tab-description">
                        <a href="#tab-package">Our Package</a>
                      </li>
                      <li class="additional_information_tab" id="tab-title-additional_information" role="tab" aria-controls="tab-additional_information">
                        <a href="#tab-additional_information">Additional information</a>
                      </li>
                    </ul>
                    <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab" id="tab-description" role="tabpanel" aria-labelledby="tab-title-description">
          
                      <h2>What's Included ?</h2> 

                      <table class="shop_attributes">
                        <tr>
                          <th></th>
                          <td><p><h6 style='color:crimson'><i class='fa fa-pencil' aria-hidden='true'></i>edit what's included</h6></p></td>
                        </tr>
                         
                        <tr>
                          <th></th>
                          <td><p>Food/Meals Included</p></td>
                        </tr>
                        <tr>
                          <th></th>
                          <td><p>Milk Included</p></td>
                        </tr>
                        <tr>
                          <th></th>
                          <td><p>Outdoor Play Equipment</p></td>
                        </tr>
                        <tr>
                          <th></th>
                          <td><p>Educational/Development Programs</p></td>
                        </tr>
                        <tr>
                          <th></th>
                          <td><p>Nappies Included</p></td>
                        </tr>
                      </table>
                    </div>
                    <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab" id="tab-package" role="tabpanel" aria-labelledby="tab-title-description">
          
                      <h2>Our Package</h2>

                      <table class="shop_attributes">
                        <tr>
                          <th></th>
                          <td><p><h6 style='color:crimson'><i class='fa fa-pencil' aria-hidden='true'></i>edit packages</h6></p></td>
                        </tr>
                        <tr>
                          <th></th>
                          <td><p>BABY CLASS</p></td>
                        </tr>
                        <tr>
                          <th></th>
                          <td><p>Daily Fee</p></td>
                        </tr>
                        <tr>
                          <th></th>
                          <td><p>IDR 500.000</p></td>
                        </tr>
                        
                      </table>
                    </div>
                    <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--additional_information panel entry-content wc-tab" id="tab-additional_information" role="tabpanel" aria-labelledby="tab-title-additional_information">
                      <h2>Additional information</h2>
                      <table class="shop_attributes">
                        <tr>
                          <th></th>
                          <td><p><h6 style='color:crimson'><i class='fa fa-pencil' aria-hidden='true'></i>edit additional information</h6></p></td>
                        </tr>
                        <tr>
                          <th><i class='fa fa-phone' aria-hidden='true'></i></th>
                          <td><p><?php echo $childcare[$key]["contactphone"]?></p></td>
                        </tr>
                        <tr>
                          <th><i class='fa fa-envelope' aria-hidden='true'></i></th>
                          <td><p><?php echo $childcare[$key]["contactemail"]?></p></td>
                        </tr>
                        <tr>
                          <th><i class='fa fa-globe' aria-hidden='true'></i></th>
                          <td><p><?php echo $childcare[$key]["contactwebsite"]?></p></td>
                        </tr>
                      </table>
                    </div>
                  
                  </div>
                  <?php } } ?>
                  
                  
                    
                </div><!-- #product-897 -->
              </article><!-- /.post_item_single -->
            </div><!-- </.content> -->
          </div><!-- </.content_wrap> -->     
        </div><!-- </.page_content_wrap> -->
  </div>
</div>
<div class="vc_empty_space"   style="height: 3.6em" ><span class="vc_empty_space_inner"></span></div>
<div class="vc_empty_space"   style="height: 3.6em" ><span class="vc_empty_space_inner"></span></div>
<div class="vc_empty_space"   style="height: 3.6em" ><span class="vc_empty_space_inner"></span></div>
                                    

<?php include "script.php"; ?>  
<a href="#" class="trx_addons_scroll_to_top trx_addons_icon-up" title="Scroll to top"></a>
</body>



<div class="w3-container">
    <div id="editfoto" class="w3-modal">
      <div class="w3-modal-content w3-card-2 w3-animate-zoom" style="max-width:500px">
        <div class="w3-center"><br>
          <span onclick="document.getElementById('editfoto').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
          
        </div>
        <form class="w3-container" >
          <div class="w3-section">
          
            <h6>Upload your payment receive </h6>
            <label>and we'll verify your booking</label>
            <div class="vc_empty_space"   style="height: 2em" >
              <span class="vc_empty_space_inner"></span>
            </div>
            
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" style="form-layout:fixed; width:720px;" id="uploadform1" >
              <div class="form-group container2">
                <label class="col-sm-3 control-label">Select File To Upload</label>
              </div>
              <div id="filediv"><input type="file" name="fileToUpload" id="fileToUpload" class="col-sm-5 test" ></div>
                
              <div class="center">
              <button type="button" class="button alt w3-button w3-yellow w3-section w3-padding" id='editfoto'>Upload</button>
              </div>    
            </form>
            <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
              <button onclick="document.getElementById('editfoto').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
            </div>
        </form>
        
      </div>
    </div>
</div>

<div class="w3-container">
    <div id="editcompanyname" class="w3-modal">
      <div class="w3-modal-content w3-card-2 w3-animate-zoom" style="max-width:500px">
        <div class="w3-center"><br>
          <span onclick="document.getElementById('editcompanyname').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
          
        </div>
        <form class="w3-container" >
          <div class="w3-section">
          
            <h6>Upload your payment receive </h6>
            <label>and we'll verify your booking</label>
            <div class="vc_empty_space"   style="height: 2em" >
              <span class="vc_empty_space_inner"></span>
            </div>
            
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" style="form-layout:fixed; width:720px;" id="uploadform1" >
              <div class="form-group container2">
                <label class="col-sm-3 control-label">Select File To Upload</label>
              </div>
              <div id="filediv"><input type="file" name="fileToUpload" id="fileToUpload" class="col-sm-5 test" ></div>
                
              <div class="center">
              <button type="button" class="button alt w3-button w3-yellow w3-section w3-padding" id='editcompanyname  '>Upload</button>
              </div>    
            </form>
            <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
              <button onclick="document.getElementById('editcompanyname').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
            </div>
        </form>
        
      </div>
    </div>
</div>
<?php include "script.php"; ?>  
</html>

<script>
$('#editfoto').on('click', 
function(){






});

</script>
