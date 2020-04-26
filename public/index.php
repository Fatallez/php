<?php
use App\services\Autoloader;

include dirname(__DIR__) . '/services/Autoloader.php';
spl_autoload_register([new Autoloader(), 'loadClass']);

//$user = new \App\models\User();
//$users = $user->getAll();
//var_dump($users);

//$user = new \App\models\User();
//$users = $user->getOne(1);
//var_dump($users);

$user = new \App\models\User();

$user->login = 'MadMax';
$user->password = 'mustang';
$user->name = 'Max';

$user->save();


//var_dump($user->getOne(2));
//echo '<br>';
//echo $user->getOne(12);

