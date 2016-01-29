<?php

namespace Views;

if (\Main::POST('registerSubmit') !== false)
{
	$user = new \Model\User();
	$user->setUsername(\Main::POST('username'));
	$user->setPassword(\Main::POST('password'));
	$user->setEmail(\Main::POST('email'));
	\Persistence\Context::userContext()->add($user);
	\Main::Redirect('index.php?p=Login');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
<form action="index.php?p=Register" method="post">
	<input type="text" name="username" placeholder="Benutzername" ><br>
	<input type="text" name="password" placeholder="Passwort" ><br>
	<input type="email" name="email" placeholder="E-Mail" ><br>
	<input type="submit" name="registerSubmit" value="Registrierung abschließen">
</form>
</body>
</html>
