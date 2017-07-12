<?php

create_user('text.txt', 'Mike', '12345');

function create_user($user_accounts_file, $username, $password)
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
			sha1(uniqid()),
			$username,
			$password
		),
		FILE_APPEND
	);
}

 ?>
