<?php

use App\QueryBuilder;

$db = new QueryBuilder();

$db->update([
    'title' => 'new title 22'
], 3, 'posts');
