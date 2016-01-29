<?php

namespace Views;

$errorMsg = "";

if (\Main::POST('username') !== false)
{
	$user = \Persistence\Context::userContext()->get(\Main::POST('username'), \Main::POST('password'));
	if ($user !== false)
	{
		\Application\SessionManager::instance()->login($user);
		\Main::Redirect('index.php?p=Overview');
	}
	else
	{
		$errorMsg = "Anmeldeinformationen inkorrekt!";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<form action="index.php?p=Login" method="post">
		<input type="text" name="username" placeholder="Benutzername">
		<input type="password" name="password" placeholder="Passwort">
		<input type="submit" name="loginSubmit" value="Login">
		<?=$errorMsg?>
	</form>
</body>
</html>