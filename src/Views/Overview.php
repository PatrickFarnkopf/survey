<?php

namespace Views;

\Application\SessionManager::instance()->loginRequired();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Surveys</title>
</head>
<body>
<h1>Overview</h1>

<?php

$data = \Persistence\Context::surveyContext()->getAll();
foreach ($data as $row)
{
?>

	<a class="survey" href="?p=Survey&id=<?=$row->getId()?>">
		<?=$row->getName()?>
	</a>

<?php
}

?>

</body>
</html>