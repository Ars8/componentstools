<?php

use function Tamtamchik\SimpleFlash\flash;

 $this->layout('layout', ['title' => 'User Profile']) ?>
<?= flash()->display();?>
<h1>About Page</h1>
<p><?=$this->e($title)?></p>