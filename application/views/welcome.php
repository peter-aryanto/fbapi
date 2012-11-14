<?php
	$url = $_SERVER['REQUEST_URI'];
	$start = 0;
	$length = strpos($url, 'index.php');
	if($length == 0) $length = strlen($url);
	$base_url = substr($url, 0, $length);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title><?=$pageTitle?></title>
	<?php
		echo "<link href='{$base_url}assets/css/bootstrap.min.css' rel='stylesheet'/>";
		echo "<link href='{$base_url}assets/css/bootstrap.min.css' rel='stylesheet'/>";
		echo "<link href='{$base_url}assets/css/bootstrap-responsive.min.css' rel='stylesheet'/>";
	    echo "<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->";
	    echo "<!--[if lt IE 9]>";
	    echo "  <script src=\"http:\/\/html5shim.googlecode.com/svn/trunk/html5.js\"></script>";
	    echo "<![endif]-->";
		echo "<link href='{$base_url}assets/css/default.css' rel='stylesheet'/>";
	?>


	<?php // CODES BELOW ARE FOR FB APP
    	//echo '<link rel="stylesheet" href="'.$base_url.'assets/fb-css/screen.css" media="Screen" type="text/css" />';
    	echo '<link rel="stylesheet" href="'.$base_url.'assets/fb-css/mobile.css" media="handheld, only screen and (max-width: 480px), only screen and (max-device-width: 480px)" type="text/css" />';	
		echo '<!--[if IEMobile]>';
		echo '<link rel="stylesheet" href="'.$base_url.'/assets/fb-css/mobile.css" media="screen" type="text/css"  />';
		echo '<![endif]-->';
    ?>
    <!-- These are Open Graph tags.  They add meta data to your  -->
    <!-- site that facebook uses when your content is shared     -->
    <!-- over facebook.  You should fill these tags in with      -->
    <!-- your data.  To learn more about Open Graph, visit       -->
    <!-- 'https://developers.facebook.com/docs/opengraph/'       -->
    <meta property="og:title" content="fbapi" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://fbapi.herokuapp.com/" />
    <meta property="og:image" content="https://fbapi.herokuapp.com/logo.png" />
    <meta property="og:site_name" content="fbapi" />
    <meta property="og:description" content="My first app" />
    <meta property="fb:app_id" content="513932031950249" />	

</head>
<body>
    <div id="fb-root"></div>
    <script type="text/javascript">
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '513932031950249', // App ID
          channelUrl : '//fbapi.herokuapp.com/channel.html', // Channel File
          status     : true, // check login status
          cookie     : true, // enable cookies to allow the server to access the session
          xfbml      : true // parse XFBML
        });

        // Listen to the auth.login which will be called when the user logs in
        // using the Login button
        FB.Event.subscribe('auth.login', function(response) {
          // We want to reload the page now so PHP can read the cookie that the
          // Javascript SDK sat. But we don't want to use
          // window.location.reload() because if this is in a canvas there was a
          // post made to this page and a reload will trigger a message to the
          // user asking if they want to send data again.
          window.location = window.location;
        });

        FB.Canvas.setAutoGrow();
      };

      // Load the SDK Asynchronously
      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>


    <div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></a>
				<a class="brand" href="#">CI+BootStrap</a>
				<div class="nav-collapse collapse">
					<ul class="nav">
						<li class="active">
							<a href="">Home</a></li>
						<li> 
							<a href="">About</a> </li>
						<li class="dropdown"> 
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li class="divider"></li>
								<li class="nav-header">Nav header</li>
								<li><a href="#">Separated link</a></li>
								<li><a href="#">One more separated link</a></li> </ul> </li> </ul>
					<header class="clearfix">
						<div class="fb-login-button pull-right" style='position:relative; top:0.7em;' data-scope="user_likes,user_photos"></div>
					</header>
					<!--<form class="navbar-form pull-right">
						<input class="span2" type="text" placeholder="Email">
						<input class="span2" type="password" placeholder="Password">
						<button type="submit" class="btn">Sign in</button> </form> 
					-->
				</div><!--/.nav-collapse --> </div> </div> </div>


	<div id='container' class='container-narrow'>
		<h1><?=$heading?></h1><hr/>

		<div id="body">
		</div>

		<p><?=isset($message)? $message: '';?></p>

		<?php ## Registration Form
			if(isset($message)? (strpos($message, 'registered') === false): true) {
				$this->load->helper('form');
				echo form_open('index.php/attendee/register').'<br/><br/>';
				echo form_fieldset('Registration Form');
				echo form_label('*Name:','name');
				echo form_input(array('id' => 'name', 'name' => 'name', 'value' => set_value('name'))).'<span class=error>'.form_error('name').'</span>';
				echo '<span id="nameStatus" style="display:none"></span><br/><br/>';
				echo form_label('*Email:','email');
				echo form_input(array('id' => 'email', 'name' => 'email', 'value' => set_value('email'))).'<span class=error>'.form_error('email').'</span>';
				echo '<span id="emailStatus" style="display:none"></span><br/><br/>';
				echo form_submit(array('id' => 'register', 'type' => 'submit', 'value' => 'Register', 'class' => 'btn')).'<br/><br/>';
			}
		?>

		<p><a id='adminAccess' href='index.php/attendee/admin'>Admin access</a></p>

		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
	</div>
	<?php
		echo "<script src='{$base_url}assets/js/jquery-1.8.2.min.js' type='text/javascript'></script>";
		echo "<script src='{$base_url}assets/js/bootstrap.min.js' type='text/javascript'></script>";
		echo "<script src='{$base_url}assets/js/default.js' type='text/javascript'></script>";
	?>
    

	<!-- from FB APP -->
    <script type="text/javascript">
      function logResponse(response) {
        if (console && console.log) {
          console.log('The response was', response);
        }
      }

      $(function(){
        // Set up so we handle click on the buttons
        $('#postToWall').click(function() {
          FB.ui(
            {
              method : 'feed',
              link   : $(this).attr('data-url')
            },
            function (response) {
              // If response is null the user canceled the dialog
              if (response != null) {
                logResponse(response);
              }
            }
          );
        });

        $('#sendToFriends').click(function() {
          FB.ui(
            {
              method : 'send',
              link   : $(this).attr('data-url')
            },
            function (response) {
              // If response is null the user canceled the dialog
              if (response != null) {
                logResponse(response);
              }
            }
          );
        });

        $('#sendRequest').click(function() {
          FB.ui(
            {
              method  : 'apprequests',
              message : $(this).attr('data-message')
            },
            function (response) {
              // If response is null the user canceled the dialog
              if (response != null) {
                logResponse(response);
              }
            }
          );
        });
      });
    </script>	
    <!--[if IE]>
      <script type="text/javascript">
        var tags = ['header', 'section'];
        while(tags.length)
          document.createElement(tags.pop());
      </script>
    <![endif]-->    
</body>
</html>