<?php
$_GET['name'] = 'Kirill';

$name = $_GET['name'] ?? 'not setupted';

echo $name;