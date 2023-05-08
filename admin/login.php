<?php
session_start();
require_once 'config/config.php';
// $token = bin2hex(openssl_random_pseudo_bytes(16));
// // If User has already logged in, redirect to dashboard page.
// if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === TRUE)
// {
// 	header('Location:index.php');
// }

// If user has previously selected "remember me option": 

if (isset($_COOKIE['series_id']) && isset($_COOKIE['remember_token']))
{
	// Get user credentials from cookies.
	$series_id = filter_var($_COOKIE['series_id']);
	$remember_token = filter_var($_COOKIE['remember_token']);
 	$connect = getDbInstance();
	// Get user By series ID: 
// 	$db->where('series_id', $series_id);
$username=$_POST['username'];
$password=$_POST['passwd'];
	//select
	$query="SELECT * FROM `admin` WHERE `username`='$username'AND`password`='$password'";
	$result=mysqli_query($connect,$query);
	if (!$row = mysqli_fetch_assoc($result)) {
        $_SESSION['username']=$row['username'];
        $_SESSION['passwd'] = $row['passwd'];
        // $_SESSION["isLogin"] = true;
		// echo $row['username'];
		$_SESSION['user_logged_in'] = TRUE;
        header("Location:index.php");
        exit;
    }else {
        $error='Invalid email or password';
    }
    //Close the connection
    mysqli_free_result($result);
    mysqli_close($conn);
}
// 	$row = $db->getOne('admin_accounts');

// 	if ($db->count >= 1)
// 	{
// 		// User found. verify remember token
// 		if (password_verify($remember_token, $row['remember_token']))
//         	{
// 			// Verify if expiry time is modified. 
// 			$expires = strtotime($row['expires']);

// 			if (strtotime(date()) > $expires)
// 			{
// 				// Remember Cookie has expired. 
// 				clearAuthCookie();
// 				header('Location:login.php');
// 				exit;
// 			}

// 			$_SESSION['user_logged_in'] = TRUE;
// 			$_SESSION['admin_type'] = $row['admin_type'];
// 			header('Location:index.php');
// 			exit;
// 		}
// 		else
// 		{
// 			clearAuthCookie();
// 			header('Location:login.php');
// 			exit;
// 		}
// 	}
// 	else
// 	{
// 		clearAuthCookie();
// 		header('Location:login.php');
// 		exit;
// 	}
// }

include BASE_PATH.'/includes/header.php';
?>
<div id="page-" class="col-md-4 col-md-offset-4">
	<form class="form loginform" method="POST" action="index.php">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">Please Sign in</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="control-label">username</label>
					<input type="text" name="username" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label class="control-label">password</label>
					<input type="password" name="passwd" class="form-control" required="required">
				</div>
				<div class="checkbox">
					<label>
						<input name="remember" type="checkbox" value="1">Remember Me
					</label>
				</div>
				<?php if (isset($_SESSION['login_failure'])): ?>
				<div class="alert alert-danger alert-dismissable fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?php
					echo $_SESSION['login_failure'];
					unset($_SESSION['login_failure']);
					?>
				</div>
				<?php
				 endif;
				 ?>
				<button type="submit"  class="btn btn-success loginField">Login</button>
			</div>
		</div>
	</form>
</div>
<?php include BASE_PATH.'/includes/footer.php'; ?>