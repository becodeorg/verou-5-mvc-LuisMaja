<?php

declare(strict_types=1);

require_once 'Model/Article.php';
require_once 'Controller/HomepageController.php';
require_once 'Controller/ArticleController.php';

require_once 'Core/DatabaseManager.php';
require_once 'config.php';
$databaseManager = new DatabaseManager($config["host"], $config["user"], $config["password"], $config["dbname"]);
$databaseManager->connect();