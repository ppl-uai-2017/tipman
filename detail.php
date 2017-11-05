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
							
								<?php 
											
									$id = $_GET['id'];
									$childcare = $db_handle->runQuery("SELECT * FROM childcare WHERE id ='$id'" );
									if (!empty($childcare)) { 
										foreach($childcare as $key=>$value){
								?>
								
								<div id="product-897" class="post-897 product type-product status-publish has-post-thumbnail product_cat-chairs product_tag-baby product_tag-items product_tag-store first instock shipping-taxable purchasable product-type-variable has-default-attributes has-children">

									<div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images" data-columns="4" style="opacity: 0; transition: opacity .25s ease-in-out;">
										<figure class="woocommerce-product-gallery__wrapper">
											<div data-thumb="images/partner/<?php echo $childcare[$key]["foto1"]?>" class="woocommerce-product-gallery__image"><a href="images/partner/<?php echo $childcare[$key]["foto1"]?>">
											<img width="600" height="600" src="images/partner/<?php echo $childcare[$key]["foto1"]?>" class="attachment-shop_single size-shop_single wp-post-image" alt="" title="image-3" data-caption="" data-src="images/partner/<?php echo $childcare[$key]["foto1"]?>"  /></a></div>	</figure>
									</div>
														
									<div class="summary entry-summary">
										<h1 class="product_title entry-title"><?php echo $childcare[$key]["businessname"]?></h1><p class="price"><span class="woocommerce-Price-amount amount"><?php echo $childcare[$key]["businessname"]?></span></p>
											
											<div class="woocommerce-product-details__short-description">
												<h4 class="woocommerce-Reviews-title"><?php echo $childcare[$key]["companyaddress"].' '.$childcare[$key]["companyregion"].' '.$childcare[$key]["companypostcode"]?></h4>
												<p><?php echo $childcare[$key]["companydesc"]?></p>
											</div>
												<div class="single_variation_wrap">
													<div class="woocommerce-variation single_variation"></div>
													<div class="woocommerce-variation-add-to-cart variations_button">
													    <?php if($_SESSION['username']=='guest'){ ?>
														<button type="submit" class="button alt w3-button w3-large"  name='book' onclick="document.getElementById('login').style.display='block'">
														<i class='fa fa-child' aria-hidden='true'></i> &nbsp &nbsp Book A Seat</button>
														<?php } else{ ?>
														<button type="submit" class="button alt w3-button w3-large"  name='book' onclick="document.getElementById('login').style.display='block'">
														<i class='fa fa-child' aria-hidden='true'></i> &nbsp &nbsp Book A Seat</button>
														<?php } ?>
														
														<input type="hidden" name="add-to-cart" value="897" />
														<input type="hidden" name="product_id" value="897" />
														<input type="hidden" name="variation_id" class="variation_id" value="0" />
														</div>
												</div>
											
											
									</div><!-- .summary -->
		
									<div class="woocommerce-tabs wc-tabs-wrapper">
										<ul class="tabs wc-tabs" role="tablist">
											<li class="description_tab" id="tab-title-description" role="tab" aria-controls="tab-description">
												<a href="#tab-description">What's Included</a>
											</li>
											<li class="additional_information_tab" id="tab-title-additional_information" role="tab" aria-controls="tab-additional_information">
												<a href="#tab-additional_information">Additional information</a>
											</li>
											<li class="reviews_tab" id="tab-title-reviews" role="tab" aria-controls="tab-reviews">
												<a href="#tab-reviews">Reviews (0)</a>
											</li>
										</ul>
										<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab" id="tab-description" role="tabpanel" aria-labelledby="tab-title-description">
					
											<h2>What's Included ?</h2>

											<table class="shop_attributes">
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
										<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--additional_information panel entry-content wc-tab" id="tab-additional_information" role="tabpanel" aria-labelledby="tab-title-additional_information">
											<h2>Additional information</h2>
											<table class="shop_attributes">
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
										<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--reviews panel entry-content wc-tab" id="tab-reviews" role="tabpanel" aria-labelledby="tab-title-reviews">
											<div id="reviews" class="woocommerce-Reviews">
												<div id="comments">
													<h2 class="woocommerce-Reviews-title">Reviews</h2>
														<p class="woocommerce-noreviews">There are no reviews yet.</p>
												</div>
												<div id="review_form_wrapper">
													<div id="review_form">
														<div id="respond" class="comment-respond">
															<span id="reply-title" class="comment-reply-title">Be the first to review &ldquo;<?php echo $childcare[$key]["businessname"]?>&rdquo; <small><a rel="nofollow" id="cancel-comment-reply-link" href="index.html#respond" style="display:none;">Cancel reply</a></small></span>			
															<form action="" method="post" id="commentform" class="comment-form" novalidate>
															<p class="comment-notes"><span id="email-notes">Your email address will not be published.</span>
															Required fields are marked <span class="required">*</span></p>
															<p class="comment-form-author"><label for="author">Name <span class="required">*</span></label> 
															<input id="author" name="author" type="text" value="" size="30" aria-required="true" required /></p>
															<p class="comment-form-email"><label for="email">Email <span class="required">*</span></label> 
															<input id="email" name="email" type="email" value="" size="30" aria-required="true" required /></p>
															<p class="comment-form-comment">
															<label for="comment">Your review <span class="required">*</span></label>
															<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required></textarea></p>
															<p class="form-submit"><input name="submit" type="submit" id="submit" class="submit" value="Submit" /> 
															<input type='hidden' name='comment_post_ID' value='897' id='comment_post_ID' />
															<input type='hidden' name='comment_parent' id='comment_parent' value='0' /></p>			
															</form>
														</div><!-- #respond -->
													</div>
												</div>
												<div class="clear"></div>
											</div>
										</div>
									</div>
									<?php } } ?>
									
									<?php 
									$postcode = $childcare[$key]["companypostcode"];
									$childcarerelated = $db_handle->runQuery("SELECT * FROM childcare WHERE companypostcode ='$postcode' and id!='$id'" );
										if (!empty($childcarerelated)) { 
									?>
										
									<section class="related products">
										<h2>Related Child Care Center</h2>
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
													<span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span></span></span>
													<a rel="nofollow" href="detail.php?id=<?php echo $childcarerelated[$key]["id"]?>" data-quantity="1" data-product_id="826" data-product_sku="" class="button product_type_variable add_to_cart_button">See details</a>				
												</div><!-- /.post_data_inner -->
											</div><!-- /.post_data -->
											</div><!-- /.post_item -->
											</li>
											
										<?php } } ?>
										</ul>
									</section>
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
	<h2>Book A Seat</h2>
		<div id="login" class="w3-modal">
			<div class="w3-modal-content w3-card-2 w3-animate-zoom" style="max-width:1500px">
				<div class="w3-center"><br>
					<span onclick="document.getElementById('login').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
					
				</div>
				<form class="w3-container" >
					<div class="w3-section">
					
						<h4>1. Your details </h4>
						<label><b>Name</b></label>
						<input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Your Name" name="name" id='namem' required>
						<label><b>Phone</b></label>
						<input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Your Phone Number" name="phone" id='phonem' required>
						<label><b>Email</b></label>
						<input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Your Email" name="email" id='emailm' required>
						
						<div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_100 vc_sep_border_width_2 vc_sep_pos_align_center vc_separator_no_text vc_custom_1498734784692  vc_custom_1498734784692" >
							<span class="vc_sep_holder vc_sep_holder_l">
							<span  style="border-color:#39417d;" class="vc_sep_line"></span></span>
							<span class="vc_sep_holder vc_sep_holder_r">
							<span  style="border-color:#39417d;" class="vc_sep_line"></span></span>
						</div>
						
						<h4>2. Set the date</h4>
				
						<div class="wpb_text_column wpb_content_element " >
							<div class="wpb_wrapper">
								<div role="form" class="wpcf7" id="wpcf7-f5-p180-o1" lang="en-US" dir="ltr">
									<div class="screen-reader-response"></div>
									
									<div class="columns_wrap">
										<div class="column-1_2">
										<h6>Date*</h6>
										<p><span class="wpcf7-form-control-wrap ">
										<input type="text" name="pickupdate" id='datem' value="" size="40" class="wpcf7-form-control wpcf7-date wpcf7-validates-as-required" aria-required="true" placeholder="Date" /> </span>
										</p></div>
									</div>
									<div class="columns_wrap">
										<div class="column-1_2">
										<h6>Start Time</h6>
										<p><span class="wpcf7-form-control-wrap">
										<input type="text" name="timestart" id='starttimem' value="" size="40" class="wpcf7-form-control wpcf7-date wpcf7-time" placeholder="Start Time" /> </span>
										</p></div>
										<div class="column-1_2">
										<h6>Finish Time</h6>
										<p><span class="wpcf7-form-control-wrap">
										<input type="text" name="timefinish" id='finishtimem' value="" size="40" class="wpcf7-form-control wpcf7-date wpcf7-time" placeholder="Finish Time" /> </span>
										</p></div>
									</div>
									<h6>Children in Care</h6>
										<div class="columns_wrap">
										<div class="column-1_1">
										<span class="wpcf7-form-control-wrap textarea-children-care">
										<textarea name="textarea-children-care" id='childincarem' cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Children in Care"></textarea></span>
										</div>
										</div>
									<div class="center">
									<button type="button"  class="button alt w3-button w3-pink w3-section w3-padding" id='a'>Reserve the seat!</button>
														
										<!--<button class="w3-button w3-block " type="button"  name='submit' id='a'>-->
									</div>
									<div class="wpcf7-response-output wpcf7-display-none"></div>
								</div>
							</div>
						</div>
						<div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
							<button onclick="document.getElementById('login').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
						</div>
				</form>
				
			</div>
		</div>
</div>

<?php include "script.php"; ?>	
</html>


<?php
if(isset($_POST['book'])){
	echo "<script>alert('asique')</script>";
}

?>

<script>

$("#submit").on('click', function(){
	alert('alhamdulillah ya Allah');
	
});

$('#a').on('click', 
function(){
	if(document.getElementById('namem').value == '' || document.getElementById('phonem').value == '' || document.getElementById('emailm').value == ''
	|| document.getElementById('datem').value == '' || document.getElementById('starttimem').value == '' || document.getElementById('finishtimem').value == ''
	|| document.getElementById('childincarem').value == ''){
		swal('Please fill on the field');
	}
	else{
		swal({
		title:"Are you want to reserve the seat?",
		text:"",
		icon:"warning",
		buttons: true,
		dangerMode: true,
		})
		.then((willorder) => {
				if(willorder){
					swal("Your Invoice is Generated!", {
					icon: "success",
					}).then(function() {
						window.location = "invoice.php";
					});
				} else {
					swal("Have a search!");
				}
		});
		
	}
	
});

</script>


