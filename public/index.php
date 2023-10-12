<?php

require '../vendor/autoload.php';

use App\QueryBuilder;

$db = new QueryBuilder();
d($db);
var_dump(get_class_methods($db));

// Create new Plates instance
//$templates = new League\Plates\Engine('../app/views');

// Render a template
//echo $templates->render('about', ['title' => 'Jonathan']);