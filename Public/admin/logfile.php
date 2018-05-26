<?php require_once("../../includes/initialize.php"); ?>
<?php if (!$session->is_logged_in()) {
	redirect_to("login.php");  } ?>

<?php 
	$logfile = '../../logs/log.txt';

	if ($_GET['clear'] == 'true' ) {
		file_put_contents($logfile, '');
		// add the first log entry
		log_action('logs cleared' , "by User ID {$session->user_id} ");
		// redirect to this same page so that the ULR won't
		// have " clear = true " any more
		redirect_to('logfile.php?clear=false');
	}
?>

<?php include('../layouts/admin_header.php'); ?>

<a href="index.php"> &laquo; Back </a>
<br />
<h2>Log File</h2>
<p> <a href="logfile.php?clear=true">Clear Log file</a> </p>

<?php 
	if (file_exists($logfile) && is_readable($logfile) && $handle = fopen($logfile, 'r') ) {
		echo "<ul class=\"log-entries\">";
		while (!feof($handle)) {
			// fgets for long by line reading
			$entry = fgets($handle);
			// so it doesnt get new list element with nothing in it
			if(trim($entry != "")){
				echo "<li>{$entry}</li>";
			}
		}
		echo" </ul>";
		fclose($handle);
	}else{
		echo " couldnt read from the file {$logfile}.";
	}

?>