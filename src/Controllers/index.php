<?php

include '../../config.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, DELETE, PATCH, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization');

require $config['VENDOR'];

$app = new \Slim\App();

$app->get('/hola-mundo', function($req, $res, $args)
{
    $hola = ['hola' => 'hola mundo'];
    return $res->withJson($hola);
});

$app->post('/upper-case', function($req, $res, $args){
    $json = $req->getBody();
    $values = json_decode($json);
    $name = "";
    foreach($values as $k => $v) {
        $name .= strtoupper($v) . " ";
    }
    $jsonRes = ["name" => $name];
    return $res->withJson($jsonRes);
});

$app->run();
