<?php
define('ROOT_PATH',dirname(__FILE__));
require("core/ClassLoader.php");
$classLoader = new ClassLoader();
$classLoader->register(ROOT_PATH.'/core');
//routing
$dispatcher = new Dispatcher();
$dispatcher->dispatch($_GET['url']);
