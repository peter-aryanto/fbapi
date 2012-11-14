<html>
	<head>
		<title><?= $page_title; ?></title>
	</head>
	<body>
		<h1><?= $heading; ?></h1>
		
		<ol>
			<?php foreach($todo as $item) {
							echo "<li> $item </li>";
						}
			?>
		</ol>
		
		
		
		<?php $this->load->helper('form'); ?>
		 
		<?php echo form_open('blog'); ?>
		 
		    <p>
		        <?php echo form_input('title'); ?>
		    </p>
		 
		    <p>
		        <?php echo form_textarea('content'); ?>
		    </p>
		 
		    <p>
		        <?php echo form_submit('submit', 'Submit'); ?>
		    </p>
		 
		<?php echo form_close(); ?>		
		
		<?php
			echo "<hr /> <p>";
			foreach($query->result() as $row)
					echo $row->title, " - ", $row->content, "<br />";
			echo "</p>";
		?>

		<?php
			echo "<hr /> <p>";
			echo $myObject->title, " - ", $myObject->content, "<br />";
			echo "</p>";
		?>

		<?php
			echo "<hr /> <p>";
			echo $myArray['title'], " - ", $myArray['content'], "<br />";
			echo "</p>";
		?>
	</body>
</html>