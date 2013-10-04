<?php
/**
 * Test Bootstrap
 * Created by PhpStorm.
 * User: hgsk
 * Date: 13/10/04
 * Time: 14:43
 *
 */
require("../punie/core/ClassLoader.php");
$classLoader = new ClassLoader();
$classLoader->register('../punie/core');
$classLoader->register('../punie/app');
$classLoader->register('../punie/app/models');
$classLoader->register('../punie/app/models/mapper');
$classLoader->register('../punie/app/controllers');
