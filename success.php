<?php
#always use same file for logins
$user_accounts_file = 'logins.txt';
$uname = htmlspecialchars($_GET["user"]);
$email = htmlspecialchars($_GET["email"]);
$password = ($_GET["pass"]);


if(true === create_user($user_accounts_file, $uname, $email, $password))
{
	header('Location: login.php?success=true');
  exit;
}
else if(false === check_user($user_accounts_file, $uname, $email, $password)){
  header("Location: register.php");
  exit;
}


function create_user($user_accounts_file, $uname, $email, $password)
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
	return (bool)file_put_contents(
		$user_accounts_file,
		sprintf(
			"%s|%s|%s\r\n",
			$email,
			$uname,
			$password
		),
		FILE_APPEND
	);
}
#test if an account exisi
?>