<?php

require '../../vendor/autoload.php';

use NINEJKH\Tpl\Tpl;

$tpl = new Tpl('../tpl');
$tpl->assign('title', 'foobar');
$tpl->display('index');
