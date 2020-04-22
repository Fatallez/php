<?php

include dirname(__DIR__) . '/services/Autoloader.php';
spl_autoload_register([new Autoloader(), 'loadClass']);

$bd = new \App\services\DB();
$user = new \App\models\Basket($bd);
echo $user->getAll();
echo '<br>';
echo $user->getOne(23);
