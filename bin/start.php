#!/usr/bin/env php

<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Pims12\ColdHot\Controller\Controller;

$controller = new Controller();
$controller->menu();
