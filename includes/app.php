<?php
declare(strict_types=1);
ini_set('display_errors','on');

require 'functions.php';
require 'config/database.php';
require __DIR__.'/../vendor/autoload.php';

//connect to db
$db = connectionDB();
use App\ActiveRecord;
ActiveRecord::setDB($db);