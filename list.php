<?php 
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
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
								
								<div id="product-897" class="post-897 product type-product status-publish has-post-thumbnail product_cat-chairs product_tag-baby product_tag-items product_tag-store first instock shipping-taxable purchasable product-type-variable has-default-attributes has-children">
		
									<?php 
									$r = $_GET['region'];
									$childcarerelated = $db_handle->runQuery("SELECT * FROM childcare WHERE companyregion = '$r'");
										if (!empty($childcarerelated)) { 
									?>
										
									<section class="related products">
										<h2>Child Care Center in <?php echo $r ?></h2>
										<ul class="products">
										<?php 
											
												foreach($childcarerelated as $key=>$value){
										?>
										
											<li class="post-826 product type-product status-publish has-post-thumbnail product_cat-diapers product_tag-baby product_tag-diapers product_tag-food  column-1_3 first instock shipping-taxable purchasable product-type-variable has-default-attributes has-children">
											<div class="post_item post_layout_thumbs">
											<div class="post_featured hover_icon">
												<a href="#">
												<img width="400" height="400" src="images/partner/<?php echo $childcarerelated[$key]["foto1"]?>" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" /></a><div class="mask"></div>			
												<div class="icons"><a href="detail.php?id=<?php echo $childcarerelated[$key]["id"]?>" aria-hidden="true" class="icon-visibility"></a></div>
											</div><!-- /.post_featured -->
											<div class="post_data">
												<div class="post_data_inner">
													<div class="post_header entry-header">
														<h2 class="woocommerce-loop-product__title"><a href="#"><?php echo $childcarerelated[$key]["businessname"]?></a></h2>			
													</div><!-- /.post_header -->
													<div class="sc_services_item_content"><p><span class="icon-map-go"> <?php echo $childcarerelated[$key]["companyaddress"]."<br>".$childcarerelated[$key]["companyregion"]."  ".$childcarerelated[$key]["companypostcode"] ;?></span></p>
													</div>
													<span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span></span></span>
													<a rel="nofollow" href="detail.php?id=<?php echo $childcarerelated[$key]["id"]?>" data-quantity="1" data-product_id="826" data-product_sku="" class="button product_type_variable add_to_cart_button">See details</a>				
												</div><!-- /.post_data_inner -->
											</div><!-- /.post_data -->
											</div><!-- /.post_item -->
											</li>
											
										<?php } } else{ ?>
										<h2>Child Care Center in <?php echo $r ?></h2>
										<label>Not Found childcare in <?php echo $r;?><br>Search Again</label>
										
										<?php } ?>
										</ul>
									</section>
									
								</div><!-- #product-897 -->
								
								<div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_100 vc_sep_border_width_2 vc_sep_pos_align_center vc_separator_no_text vc_custom_1498734784692  vc_custom_1498734784692" >
									<span class="vc_sep_holder vc_sep_holder_l">
									<span  style="border-color:#39417d;" class="vc_sep_line"></span></span>
									<span class="vc_sep_holder vc_sep_holder_r">
									<span  style="border-color:#39417d;" class="vc_sep_line"></span></span>
								</div>
								
								<div class="wpb_column vc_column_container vc_col-sm-12 sc_layouts_column_icons_position_left">
									<div class="vc_column-inner ">
										<div class="wpb_wrapper">
										<h4 style='color:crimson'>1. Where ? </h4>
										<form method='post' action='list.php'>
											<tr>
											<td class="label"><label for="pa_size">Kelurahan</label></td>
											<td class="value">
												<select id="pa_size" class="" name="attribute_pa_size" data-attribute_name="attribute_pa_size" data-show_option_none="yes">
												<option value="">Choose an option</option>
												
												<?php 
												
												$kelurahan = $db_handle->runQuery("SELECT * FROM region ORDER BY companyregion" );
												if (!empty($kelurahan)) { 
													foreach($kelurahan as $key=>$value){
												
												?>
												<option value="<?php echo $kelurahan[$key]['companyregion']?>" id='region' ><?php echo $kelurahan[$key]['companyregion'].' '.$kelurahan[$key]['companypostcode'] ?></option>
												<?php } } ?>
												</select>		
												
											</td>
											<div class="vc_empty_space  hide_on_mobile"   style="height: 2em" ><span class="vc_empty_space_inner"></span></div>
											<button type="button"  class="button alt w3-button w3-green w3-section w3-padding" id='a'>
											<i class='fa fa-search' aria-hidden='true'></i> &nbsp &nbsp Go Find!</button>
										</tr>
										</form>
										</div>
									</div>
								</div>
								
							</article><!-- /.post_item_single -->
						</div><!-- </.content> -->
					</div><!-- </.content_wrap> -->			
				</div><!-- </.page_content_wrap> -->
	</div>
</div>
<div class="vc_empty_space"   style="height: 2em" ><span class="vc_empty_space_inner"></span></div>
																		

<?php include "script.php"; ?>	
<a href="#" class="trx_addons_scroll_to_top trx_addons_icon-up" title="Scroll to top"></a>
</body>

<?php
if(isset($_POST['book'])){
	echo "<script>alert('asique')</script>";
}

?>


<script>

$('#a').on('click', 
function(){
	
	var region = $('select').val();
	window.location='list.php?region='+ region;
	//alert('aw');
});

</script>

