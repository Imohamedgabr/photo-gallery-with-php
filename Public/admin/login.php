<?php 
	// include our necessary files
	require_once("../../includes/initialize.php");

if ($session->is_logged_in()) {
		redirect_to("index.php");
	}        
	$message = "";

	if (isset($_POST['submit'])) { // form is submitted

		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		// check the database to see if the username/ password exist

		$found_user = User::authenticate($username, $password);

		if ($found_user) {
			$session->login($found_user);
			log_action('Login' , "{$found_user->username} logged in."); 
			redirect_to("index.php");
		}else{ // username/password wasn't found
		$message = "Username / password combination incorrect .";

		}
	}else{ // form was not submitted

		$username = "";
		$password = "";
	}
	?>

<?php include('../layouts/admin_header.php'); ?>

		<h2>Staff login</h2>

	<?php echo output_message($message); ?>

	<form action="login.php" method="post" >
		<table>
			
				<tr>
						<td>Username: </td>
						<td>
						<!-- Make SURE NO SPACES AFTER THE CLOSING PHP TAGS 
						SO YOU DONT FIND IT IN THE VALUE OF THE USERNAME OR PASS -->
							<input type="text" name="username" maxlength="30" value="<?php echo htmlentities($username); ?>">	
						</td>
				</tr>
				<tr>
						<td>Password: </td>
						<td>
			<input type="password" name="password" maxlength="30" value="<?php echo htmlentities($password); ?>">	
						</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" name="submit" value="login">	
					</td>
				</tr>
			
		</table>

	</form>
	</div>
	
<?php include('../layouts/admin_footer.php'); ?>