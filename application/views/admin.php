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
</head>
<body>
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
					<form class="navbar-form pull-right">
						<input class="span2" type="text" placeholder="Email">
						<input class="span2" type="password" placeholder="Password">
						<button type="submit" class="btn">Sign in</button> </form> </div><!--/.nav-collapse --> </div> </div> </div>

	<div id='container' class='container-narrow'>
		<h1><?=$heading?></h1><hr/>

		<div id="body">
		</div>

		<p><?=isset($message)? $message: '';?></p>

		<?php ## Registration Form
			$this->load->helper('form');
			echo form_open('index.php/attendee/register').'<br/><br/>';
			echo form_fieldset('Registration Form');
			echo form_label('*Name:','name');
			echo form_input(array('id' => 'name', 'name' => 'name'));
			echo '<span id="nameStatus" style="display:none"></span><br/><br/>';
			echo form_label('*Email:','email');
			echo form_input(array('id' => 'email', 'name' => 'email'));
			echo '<span id="emailStatus" style="display:none"></span><br/><br/>';
			echo form_submit(array('id' => 'register', 'type' => 'submit', 'value' => 'Register', 'class' => 'btn')).'<br/><br/>';
		?>

		<p><a id='adminAccess' href='index.php/attendee/admin'>Admin access</a></p>

		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
	</div>
	<?php
		echo "<script src='{$base_url}assets/js/jquery-1.8.2.min.js' type='text/javascript'></script>";
		echo "<script src='{$base_url}assets/js/bootstrap.min.js' type='text/javascript'></script>";
		echo "<script src='{$base_url}assets/js/default.js' type='text/javascript'></script>";
	?>
</body>
</html>