<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>:: DISPERINDAG ::</title>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.css" rel="stylesheet">
<link rel="icon" type="/image/ico" href="/images/BAF-favicon.ico" />
<!-- Add custom CSS here -->
<link href="css/modern-business.css" rel="stylesheet">
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <!-- You'll want to use a responsive image option so this logo looks good on devices - I recommend using something like retina.js (do a quick Google search for it and you'll find it) --> 
      <a class="navbar-brand" href="index.php">
	  <img class="img-responsive_new tesmda" src="images/logo.png" alt=""></a> </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <div class="toggle_height"></div>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="index.php">HOME</a></li>
		<li class=""><a href="visimisi.php">Visi Misi</a></li>
		<li class=""><a href="faq.php">Faq</a></li>
		<li class=""><a href="kontak.php">Kontak</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container --> 
</nav>
<div class="section light_bluebg" style="padding-top:0;">
  <div class="container">
    <div class="row get_text">
      <h2>Sembako <strong> Online</strong> Dengan Harga <strong>Terjangkau</strong> 
	  <a href="faq.php" class="btn btn-info">Pelajari </a></h2>
    </div>
    <!-- /.row --> 
  </div>
  <!-- /.container --> 
</div>
<!-- /.section -->

<div class="section light_bg" style="padding-top:0; padding-bottom:0;">
  <div class="clear" style="text-align:center;"><img src="images/blue_arrow.png"></div>
  <div class="clear" style="height:30px;"></div>
  <div class="container">
  <div class="row">
  <div class="col-lg-12">
 <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Register</li>
          </ol>
        </div>
        </div>

         <!-- /.row -->
       <div class="row">

        <div class="col-sm-12 nor_text head_cont">
          <h3>Daftar isian pemohon</h3>
          <p>Mohon diisi data dengan benar, sperti berikan No Hp yang masih aktif digunakan.</p>
		<form role="form" method="POST" action="" style="padding:20px;">
	            <div class="row">
	              <div class="form-group col-lg-4">
	                <label for="input1">Name</label>
	                <input type="text" name="contact_name" class="form-control" id="input1">
	              </div>
				  <div class="form-group col-lg-4">
	                <label for="input1">No KTP</label>
	                <input type="text" name="contact_name" class="form-control" id="input1">
	              </div>
				  <div class="form-group col-lg-4">
	                <label for="input3">Nomor Hp Aktif</label>
	                <input type="phone" name="contact_phone" class="form-control" id="input3">
	              </div>
	              <div class="form-group col-lg-4">
	                <label for="input2">Email Aktif</label>
	                <input type="email" name="contact_email" class="form-control" id="input2">
	              </div>
	              
	              <div class="clearfix"></div>
	              <div class="form-group col-lg-12">
	                <label for="input4">Message</label>
	                <textarea name="contact_message" class="form-control" rows="6" id="input4"></textarea>
	              </div>
	              <div class="form-group col-lg-12">
	                <input type="hidden" name="save" value="contact"><BR>
	                <button type="submit" class="btn btn-info">Simpan</button>
	              </div>
              </div>
            </form>
        </div>

        

      </div>
      <!-- /.row -->

     <!-- /.row -->
  </div>
  <!-- /.container --> 
  <div class="clear" style="height:30px;"></div>
</div>
<!-- /.section -->










<div  class="footer_bar_bg">
  <div class="container">
    <footer>
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 navigation_text">DISPERINDAG Kepri &copy; 2020</div>
        <div class="col-lg-3 col-md-3 col-sm-4 social_foot"><a href="#"><img  class="img-responsive_new" src="images/linkedin_icon.png" /></a> <a href="#" target="_blank"><img  class="img-responsive_new" src="images/fb_icon.png" /></a> <a href="#" target="_blank"><img src="images/twt_icon.png" /></a> <a href="#" target="_blank"><img src="images/google_plus_icon.png" /></a> <a href="#" target="_blank"><img  class="img-responsive_new" src="images/youtube_icon.png" /></a></div>
      </div>
    </footer>
  </div>
  <!-- /.container --> 
</div>
<!-- JavaScript --> 
<script src="js/jquery-1.10.2.js"></script> 
<!--<script src="js/bootstrap.min.js"></script> --> 
<script src="js/bootstrap.js"></script> 
<script src="js/modern-business.js"></script> 
<script type="text/javascript">
$(document).ready( function() {
    $('#myCarousel').carousel({
		//pause: true,
    	interval: false
	});
		
});

$(document).ready(function() {
  //Set the carousel options
  $('#quote-carousel').carousel({
    pause: true,
    interval: 4000,
  });
});

</script>
</body>
</html>
