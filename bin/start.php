#!/usr/bin/env php

<?php


$pathForGithub = __DIR__.'/../vendor/autoload.php';
$pathForPackagist = __DIR__.'/../../../autoload.php';

if (file_exists($pathForGithub)) {
    require_once($pathForGithub);
} else {
    require_once($pathForPackagist);
}

use Pims12\ColdHot\Controller\Controller;

$controller = new Controller();
$controller->menu();
