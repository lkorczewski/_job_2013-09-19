<?php

require_once __DIR__ . '/classes/input.php';
require_once __DIR__ . '/classes/feed.php';
require_once __DIR__ . '/classes/layout.php';

$input = new Input();
$location = $input->get('location', 'http://xlab.pl/feed/');
$keyword = $input->get('keyword');

$feed = new Feed($location);
$items = $feed->search($keyword);

$layout = new Layout();
echo $layout->apply_to($items);

?>
