<?php
namespace View;

\Application\SessionManager::instance()->loginRequired();

$id = \Main::GET('id');
$info = \Persistence\Context::surveyInfoContext()->get($id);
$data = $info->getData();
$items = \Persistence\Context::surveyContext()->get($id)->getItems();

foreach ($items as $item)
{
    $itemId = $item->getId();
    $count = 0;
    if (isset($data[$itemId]))
        $count = $data[$itemId];
    echo $item->getText() . ' ' . $count . '<br>';
}
