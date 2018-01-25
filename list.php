<?php 
session_start();
require "head.php";
$region = '';
if(isset($_POST['region'])){
  $region = $_POST['region'];  
}
?>


<body>
<!--Header-->
  <div class="header" id="home">
    <!--Top-Bar-->
    <?php require "topbar.php"; ?>
    <!--//Top-Bar-->
<div class="w3-aglie-about" id="about">
  <div class="container">
    <div class="w3-agile-about-grids">
      
<!--//Header-->
  <!-- Locations -->
<?php if(!empty($region)){ ?>
  <div class="wthreelocationsaits" id="locations">
    <div class="container">
    <div class="location-w3-head">
      <h3>Found Child Care in <?php echo $_POST['region'] ?> </h3>
      </div>
      <section class="grid3d vertical" id="grid3d">
        <div class="grid-wrap">
          <div class="grid">
          <?php 
            $result_childcare_= mysqli_query($con, "SELECT * FROM childcare WHERE companyregion LIKE '%".$region."%' OR companyaddress LIKE '%".$region."%' OR businessname LIKE '%".$region."%'  ");
            if(mysqli_num_rows($result_childcare_)!=0){
            while($row_childcare_ = mysqli_fetch_assoc($result_childcare_)){
              ?>
              <a href='details.php?id=<?php echo $row_childcare_['id']?>'><figure class="col-md-4 effect-zoe"><img  width='440px' height='253px' src="images/partner/<?php echo $row_childcare_['foto1']?>" alt="<?php echo $row_childcare_['businessname']?>"><figcaption><h4><?php echo $row_childcare_['businessname']?></h4><h6><?php echo $row_childcare_['companyaddress']." ". $row_childcare_['companyregion']." ". $row_childcare_['companypostcode']?></h6></figcaption></figure></a>
            </form>
          <?php } }else { ?>
            <center><h3 style='color:midnightblue'>Not Found Any, Search again  </h3></center>
          <?php } ?>
          </div>
        </div>
      </section>
    </div>
  </div>
<?php } ?>

<div class="main2" id="main">
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
  </div>

  
  <div class="wthreelocationsaits" id="locations">
    <div class="container">
    <div class="location-w3-head">
      <h3>Popular Child Care</h3>
      </div>
      <section class="grid3d vertical" id="grid3d">
        <div class="grid-wrap">
          <div class="grid">
            <?php 
              $sql_childcare = "SELECT * FROM childcare ORDER BY tanggal_gabung DESC LIMIT 9";
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


  </div>
</body>


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
  array_push($region,$row['region']);
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
