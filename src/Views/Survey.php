<?php

namespace View;

\Application\SessionManager::instance()->loginRequired();

$choice = \Main::POST('choice');
if ($choice !== false)
{
    \Persistence\Context::surveyInfoContext()->submitChoice(\Main::POST('surveyId'), $choice);
    \Main::Redirect('?p=Statistic&id=' . \Main::POST('surveyId'));
}

$id = \Main::GET('id');
if ($id === false)
    \Main::Redirect('?p=Overview');

$survey = \Persistence\Context::surveyContext()->get($id);

if ($survey === null)
    \Main::Redirect('?p=Overview');

?>

<html>
<head></head>
<body>
<div class="Title">
    <?=$survey->getName()?>
</div>
<div class="SurveyStatus">
    <div class="StatusMessage">

    </div>
    <div class="Result">
        <form action="?p=Survey" method="post">
        <input type="hidden" name="surveyId" value="<?=$id?>">
        <?php

        foreach ($survey->getItems() as $item)
        {

        ?>

        <input type="radio" name="choice" value="<?=$item->getId()?>" /> <?=$item->getText()?><br>

        <?php


        }
        ?>
            <input type="submit" value="Ok">

        </form>
    </div>
</div>
<div class="SurveyChoices">

</div>
</body>
</html>
