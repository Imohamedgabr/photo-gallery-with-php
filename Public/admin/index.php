<?php 
	// include our necessary files
	require_once("../../includes/initialize.php");

	if (!$session->is_logged_in()) {
		redirect_to("login.php");
	}

?>

<?php include('../layouts/admin_header.php'); ?>

	<h2>Menu</h2>
	<ul>
		<li><a href="logfile.php?clear=false"> View Logfile</a></li>
		<br />
		<li><a href="photo_upload.php">Upload Photo</a></li>
		<br />
		<li><a href="list_photos.php">List Photos</a></li>
		<br />
		<li><a href="../index.php">Go To Home Page</a></li>
		<br />
		<li><a href="logout.php">Logout</a></li>
	</ul>

	</div>

<?php include('../layouts/admin_footer.php'); ?>
