<?php
session_start();
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time(); 

if(empty($_SESSION['username'])){
	$_SESSION['username']="guest";
	$_SESSION['actor']="parents";
}

require "head.php";
?>
<body>
<!--Header-->
	<div class="header" id="home">
		<!--Top-Bar-->
		<?php require "topbar.php"; ?>
		<!--//Top-Bar-->
		<!--Slider-->
		<div class="slider">
			<div class="callbacks_container">
				<ul class="rslides" id="slider">
					<li>
						<div class="slider-img slider-img1 ">
						</div>
						<div class="slider-info">
							
							<h3>- TIPMAN -<br/> Titip Anak Aman</h3>
						    <p>Anak Senang, Ayah-Ibu tenang!</p>
						</div>
					</li>
					<li>
						<div class="slider-img slider-img2">
							
						</div>
						<div class="slider-info">
							<div id="rcorners1"><p style='font-size:30px;font-weight:200'>Children close their ears to advise, but <br/>open their eyes to example</p></div>
						</div>
					</li>
					<li>
						<div class="slider-img slider-img3">
							
						</div>
						<div class="slider-info">
							<div id="rcorners3"><p style='font-size:30px;font-weight:200;color:white'>Tell me and I forget. <br/>
							Teach me and I remember.<br/>
							Involve me and I learn. <br/></p></div>
						</div>
					</li>
					<li>
						<div class="slider-img slider-img4">
						</div>
						<div class="slider-info">
							<div id="rcorners2"><p style='font-size:30px;font-weight:200;color:black'>Positivity & Guidance <br/>are the best gifts a parent can give to their child</p></div>
						</div>
					</li>

				</ul>
				
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="main" id="main">
		<div class="w3layouts_main_grid">
		<div class="booking-form-head-agile">
		<h3>Search Child Care</h3>
		</div>
			<form action="list.php" method="post">
				<div class="agileits_w3layouts_main_grid w3ls_main_grid">
					<div class="col-md-12 agileits_w3layouts_grid agileinfo_grid">
						<h5> 1. Where ? </h5><br/>
						<input type="text" class="typeahead form-control" style="max-width:700px" name='region' required/>
					</div>
				</div>
				<div class="agileinfo_main_grid">
					<div class="clearfix"> </div>
				
				<div class="w3_main_grid">
					<div class="w3_main_grid_right">
						<input type="submit" value="Search Location">
					</div>

				</div>
		</div>
		</form>

</div>

<!--//Header-->
	<!-- Locations -->
	
	<div class="wthreelocationsaits" id="locations">
		<div class="container">
		<div class="location-w3-head">
			<h3>Popular Child Care</h3>
			</div>
			<section class="grid3d vertical" id="grid3d">
				<div class="grid-wrap">
					<div class="grid">
					<?php 
						$sql_childcare = "SELECT * FROM childcare ORDER BY tanggal_gabung DESC LIMIT 9 ";
						$result_childcare= mysqli_query($con, $sql_childcare);

						while($row_childcare = mysqli_fetch_assoc($result_childcare)){
					?>
					
	                
	              	<a href='details.php?id=<?php echo $row_childcare['id']?>'><figure class="col-md-4 effect-zoe"><img width='440px' height='253px' src="images/partner/<?php echo $row_childcare['foto1']?>" alt="<?php echo $row_childcare['businessname']?>"><figcaption><h4><?php echo $row_childcare['businessname']?></h4><h6><?php echo $row_childcare['companyaddress']." ". $row_childcare['companyregion']." ". $row_childcare['companypostcode']?></h6></figcaption></figure></a>
					<?php } ?>
					</div>
				</div>
			</section>
		</div>
	</div>
<div class="copyright-agile">
</div>

<div class="wthreelocationsaits" id="locations">
		<div class="container">
		<div class="location-w3-head">
			<h3>HOW TO JOIN TIPMAN</h3>
			</div>
			<section class="grid3d vertical" id="grid3d">
				<div class="grid-wrap">
					<div class="grid">
						<div class="w3-agile-about-grids">
							<div class="col-md-6 about-left-grid">
								<h3 style='color:tomato'>AS <span>CUSTOMER</span></h3>
								<div class="col-md-3 about-left-grid">
									<img src='images/img/1.jpg' style='max-width:30px '><br/><br/>
									Find Login Button, Register!
								</div>
								<div class="col-md-3 about-left-grid">
									<img src='images/img/2.png' style='max-width:30px '><br/><br/>
									Fill out the form needed. It doesn't take a long time!
								</div>
								<div class="col-md-3 about-left-grid">
									<img src='images/img/3.png' style='max-width:100px '><br/><br/>
									Confirm your registration
								</div>
								<div class="col-md-3 about-left-grid">
									<img src='images/img/4.jpg' style='max-width:30px '><br/><br/>
									Congrats! Successfully registered. Start your journey to find the best childcare for your child!
								</div>
							</div>
							<div class="col-md-6 about-left-grid">
								<h3 style='color:tomato'>AS <span>CHILDCARE CENTRE</span></h3>
								<div class="col-md-3 about-left-grid">
									<img src='images/img/1.jpg' style='max-width:30px '><br/><br/>
									Find Childcare center Tab, click Login Button and Register!
								</div>
								<div class="col-md-3 about-left-grid">
									<img src='images/img/2.png' style='max-width:30px '><br/><br/>
									Fill out the form needed. It doesn't take a long time!
								</div>
								<div class="col-md-3 about-left-grid">
									<img src='images/img/3.png' style='max-width:100px '><br/><br/>
									Confirm your registration
								</div>
								<div class="col-md-3 about-left-grid">
									<img src='images/img/4.jpg' style='max-width:30px '><br/><br/>
									Congrats! Successfully registered. Manage your own childcare!
								</div>
							</div>
			
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>

<div class="copyright-agile">
	<p>&copy; 2017 TIPMAN - Titip Anak Aman</p>
</div>
<!-- //copyright -->

<!-- js -->
<?php 
$sql_region = "

SELECT region AS region
FROM region

UNION DISTINCT

SELECT city 
FROM city 

UNION DISTINCT

SELECT businessname 
FROM childcare 

;
";
$result_region= mysqli_query($con, $sql_region);
$region = array();

while($row = mysqli_fetch_assoc($result_region)){
	$region[] = $row['region'];
}

?>
<script>
	$(function () {
		$("#slider").responsiveSlides({
			auto: true,
			pager: true,
			nav: true,
			speed: 1000,
			namespace: "callbacks",
			before: function () {
				$('.events').append("<li>before event fired.</li>");
			},
			after: function () {
				$('.events').append("<li>after event fired.</li>");
			}
		});
	});
</script>
	
<!-- Calendar -->
<script>
	$(function() {
		$( "#datepicker,#datepicker1" ).datepicker();
	});
</script>
		<!-- //Calendar -->
	<!-- Portfolio-Popup-Box-JavaScript -->
<script type="text/javascript">
	$(function() {
		$('.w3portfolioaits-item a').Chocolat();
	});
</script>
		<!-- //Portfolio-Popup-Box-JavaScript -->
		<!-- Tour-Locations-JavaScript -->
<script>
	new grid3D( document.getElementById( 'grid3d' ) );
</script>
		<!-- //Tour-Locations-JavaScript -->
			
		<!-- smooth scrolling-bottom-to-top -->
<script type="text/javascript">
	$(document).ready(function() {
					/*
						var defaults = {
						containerID: 'toTop', // fading element id
						containerHoverID: 'toTopHover', // fading element hover id
						scrollSpeed: 1200,
						easingType: 'linear' 
						};
					*/								
					$().UItoTop({ easingType: 'easeOutQuart' });
					});
				</script>
				<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
		<!-- //smooth scrolling-bottom-to-top -->
		<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<script>
	var substringMatcher = function (strs) {
    return function findMatches(q, cb) {
        var matches, substringRegex;

        // an array that will be populated with substring matches
        matches = [];

        // regex used to determine if a string contains the substring `q`
        substrRegex = new RegExp(q, 'i');

        // iterate through the pool of strings and for any string that
        // contains the substring `q`, add it to the `matches` array
        $.each(strs, function (i, str) {
            if (substrRegex.test(str)) {
                // the typeahead jQuery plugin expects suggestions to a
                // JavaScript object, refer to typeahead docs for more info
                matches.push({
                    value: str
                });
            }
        });

        cb(matches);
    };
};

var states = <?php echo json_encode($region); ?>
/*var states = ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
    'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
    'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
    'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
    'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
    'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
    'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
    'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
    'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'];
*/
$('input.typeahead').typeahead({
    hint: true,
    highlight: true,
    minLength: 1
}, {
    name: 'states',
    displayKey: 'value',
    source: substringMatcher(states)
});
$('.typeahead.input-sm').siblings('input.tt-hint').addClass('hint-small');
$('.typeahead.input-lg').siblings('input.tt-hint').addClass('hint-large');


</script>


<script>
$("#click").on('click', function(){
  var id = document.getElementById('id_childcare').value;
  window.location='details.php?id='+id;
});

</script>

</body>
</html>