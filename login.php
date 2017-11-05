<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();

?>
<?php include "head.php";?> 
<style>
body{
	background-image:url("wp-content/uploads/2017/06/bg3015d.png");
}

</style>
<body class="page-template-default page page-id-180 custom-background body_tag scheme_default blog_mode_page body_style_wide is_single sidebar_hide expand_content remove_margins header_style_header-custom-20 header_position_default menu_style_top no_layout wpb-js-composer js-comp-ver-5.1.1 vc_responsive" >
	<div class="body_wrap">
		<div class="page_wrap">
			<div class="menu_mobile_overlay"></div>
				<div class="page_content_wrap scheme_default">
					<div class="content_wrap">
						<div class="content">
							<article id="post-180" class="post_item_single post_type_page post-180 page type-page status-publish hentry">
								<div class="post_content entry-content">
									<div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid vc_custom_1499348564322 vc_row-has-fill">
										<div class="wpb_column vc_column_container vc_col-sm-1 sc_layouts_column_icons_position_left">
											<div class="vc_column-inner ">
												<div class="wpb_wrapper">
												</div>
											</div>
										</div>
										<div class="wpb_column vc_column_container vc_col-sm-10 sc_layouts_column_icons_position_left">
											<div class="vc_column-inner ">
												<div class="wpb_wrapper"><div class="vc_empty_space"   style="height: 7.3em" >
													<span class="vc_empty_space_inner"></span>
												</div>
												<div class="vc_row wpb_row vc_inner vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-2 sc_layouts_column_icons_position_left">
													<div class="vc_column-inner ">
														<div class="wpb_wrapper"></div>
													</div>
												</div>
												<div class="wpb_column vc_column_container vc_col-sm-8 sc_layouts_column_icons_position_left">
													<div class="vc_column-inner ">
													<div class="wpb_wrapper">
														<div id="sc_title_498097990" class="sc_title color_style_default sc_title_default go-center">
														<h2 class="sc_item_title sc_title_title sc_align_center sc_item_title_style_default">Login Now</h2>
															<div class="sc_item_descr sc_title_descr sc_align_center"><p>Solusi orang tua bekerja!</p>
															</div>
														</div><!-- /.sc_title -->
													</div>
													</div>
												</div>
												<div class="wpb_column vc_column_container vc_col-sm-2 sc_layouts_column_icons_position_left">
													<div class="vc_column-inner ">
														<div class="wpb_wrapper">
														</div>
													</div>
												</div>
												</div>
												<div class="vc_empty_space"   style="height: 1.1em" ><span class="vc_empty_space_inner"></span></div>

												<div class="wpb_text_column wpb_content_element " >
													<div class="wpb_wrapper">
														<div role="form" class="wpcf7" id="wpcf7-f5-p180-o1" lang="en-US" dir="ltr">
															<div class="screen-reader-response"></div>
															<form action="" method="post" class="wpcf7-form" >
																	<h6>Username *</h6>
																	<div class="columns_wrap">
																		<div class="column-1_1"><span class="wpcf7-form-control-wrap your-first-name">
																		<input type="text" name="username" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Your Username" required/></span></div>
																		
																	</div>
																	<h6>Password *</h6>
																	<div class="columns_wrap">
																		<div class="column-1_1"><span class="wpcf7-form-control-wrap your-first-name">
																		<input type="password" name="password" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="******" required/></span></div>
																		
																	</div>
															
															<div class="center">
																<input type="submit" value="Login" name='login' class="wpcf7-form-control wpcf7-submit" />
															</div>
															
															<center><a href='register.php'><h6>Belum Punya Akun? daftar disini!</h6></a></center>
															<div class="wpcf7-response-output wpcf7-display-none"></div></form></div>

		</div>
	</div>
<div class="vc_empty_space"   style="height: 8em" ><span class="vc_empty_space_inner"></span></div>
<div class="vc_empty_space  hide_on_mobile"   style="height: 4em" ><span class="vc_empty_space_inner"></span></div>
</div>
</div>
</div>
<div class="wpb_column vc_column_container vc_col-sm-1 sc_layouts_column_icons_position_left">
<div class="vc_column-inner ">
<div class="wpb_wrapper"></div>
</div>
</div>
</div>
</div><!-- .entry-content -->

</article>
</div><!-- </.content> -->
</div><!-- </.content_wrap> -->			
</div><!-- </.page_content_wrap> -->
</div><!-- /.page_wrap -->

</div><!-- /.body_wrap -->


<?php
if (isset($_POST['login']))
{
	$username = $_POST['username'];
	$pass = $_POST['password'];
	echo $email;
	/* Validasi */
	$error = 0;
	
		if( empty( $username ) || empty( $pass ) )
		{
			echo "<script>swal('Maaf,Silakan mengisi username dan Password Anda!');</script>";
			$error++;
		}
		else
		{
			$row = $db_handle->runQuery("SELECT * FROM account WHERE username = '$username' ");
		
			if( empty( $row[0]['username'] ) )
			{
				echo "<script>swal('username has not been registered!');</script>";
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
						text: "Find your childcare!",
						type: "success"
					}).then(function() {
						window.location = "index.php";
					});
					
					</script>';	
				} //end else
			} //end else
		}
}

?>










