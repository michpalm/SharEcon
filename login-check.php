<?php
#always use same file for logins
$user_accounts_file = 'logins.txt';
$uname = htmlspecialchars($_POST["username"]);
$pass = ($_POST["password"]);

#test if an account exisits with username $uname and password $pass
if(true === check_user($user_accounts_file, $uname, $pass))
{
  session_start();
  $_SESSION["username"] = $uname;
  $_SESSION["pass"] = $pass;
	header('Location: home.php');
  exit;
}
else if(false === check_user($user_accounts_file, $uname, $pass)){
  echo "Wrong username or password";

           $_SESSION["loginerror"] = 1;

        header("Location:login.php");
        exit;
}


/**
 * @param string $user_accounts_file
 * @param string $username
 * @param string $password
 * @return boolean
 */
function check_user($user_accounts_file, $username, $password)
{
	if(false === file_exists($user_accounts_file))
	{
		trigger_error(
			sprintf(
				'The $user_accounts_file does not exist at the specified location: %s ',
				$user_accounts_file
			),
			E_USER_ERROR
		);
		return false;
	}
	foreach(file($user_accounts_file) as $entry)
	{
		list($entry_key, $entry_username, $entry_password) = array_map('trim', explode('|', $entry));
		if($entry_username === $username && $entry_password === $password)
		{
			return true;
		}
	}
	return false;
}
?>
