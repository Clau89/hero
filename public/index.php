<?php
declare(strict_types=1);

use \Hero\App;

require_once dirname(__DIR__) . '/vendor/autoload.php';

header("Content-type: text/plain");

App::run();
