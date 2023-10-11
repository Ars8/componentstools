<?php

require '../vendor/autoload.php';

use Aura\SqlQuery\QueryFactory;

$queryFactory = new QueryFactory('mysql');
$select = $queryFactory->newSelect();

var_dump($queryFactory);

echo 123;