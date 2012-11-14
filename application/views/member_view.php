<html>
<head>
	<title><?= $view_title ?></title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<body>
	<h1><?= $view_heading1 ?></h1>
	<hr />
	<?php $this->load->helper("form");
		echo form_open("member");
		echo "<p>".form_input("col1")."---".form_input("col2")."</p>";
		echo "<p>".form_submit("newMember", "Submit")."---".form_reset("", "Reset")."</p>";
		echo form_close();
	?>
	<ul>
		<?php
			//$members = array("hey", "you"); 
			//$members = "hey";
			
			//echo "<li>$members->result()</li>";
			//if(!@empty($members) & @is_array($members)) # this is to be used with array
			//if(!@empty($members) & @is_object($members)) # this is to be used with object from DB (OPTIONAL)
			//	foreach($members as  $item)
				foreach($members->result() as  $item)
					echo "<li>$item->id---$item->name</li>";
		?>
	</ul>
</body>
</html>