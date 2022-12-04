<?php

use SWApi\Commands\People;
use SWApi\Commands\Planet;
use SWApi\Models\People as ModelsPeople;
use SWApi\Models\Planet as ModelsPlanet;

if (php_sapi_name() !== 'cli') {
    exit;
}

require_once __DIR__ . "/vendor/autoload.php";

// recursos a serem testados
$people = new People;
$planet = new Planet;

$peopleModel = new ModelsPeople;
$planetModel = new ModelsPlanet;


// buscar uma pessoa específica
dump("Buscando uma pessoa espefífica");
$alguem = $people->getFromId(2);
dump($alguem);

echo PHP_EOL;


// buscar um planeta
dump("Buscando um planeta específico");
$lugar = $planet->getFromId(2);
dump($lugar);

echo PHP_EOL;
echo PHP_EOL;


// banco de dados

// contagem dos registros atuais
dump("Contando a quantidade de pessoas no banco de dados");
dump($peopleModel->count());

echo PHP_EOL;

dump("Contando a quantidade de planetas no banco de dados");
dump($planetModel->count());

echo PHP_EOL;

// salvar o planeta retornado
dump("Salvando o planeta pesquisado, caso ainda não exista");
$planetModel->saveIfNotExists($lugar);

echo PHP_EOL;

dump("Salvando a pessoa pesquisada, caso ainda não exista");
$peopleModel->saveIfNotExists($alguem);


echo PHP_EOL;
echo PHP_EOL;


// listar todas as pessoas
dump("Buscando todas as pessoas na API");
$todasPessoas = $people->getAll();
dump($todasPessoas);

echo PHP_EOL;

dump("Buscando todos os planetas na API");
$todosPlanetas = $planet->getAll();
dump($todosPlanetas);

echo PHP_EOL;
echo PHP_EOL;

// salvar todos os planetas no banco de dados
dump("Salvando todos os planetas da API");

foreach($todosPlanetas as $p) {
    $planetModel->saveIfNotExists($p);
    dump("Salvo planeta {$p->name} ID: {$p->id}");
}

echo PHP_EOL;

// salvar todas as pessoas no banco de dados
dump("Salvando todas as pessoas da API");

foreach($todasPessoas as $p) {
    $peopleModel->saveIfNotExists($p);
    dump("Salvo pessoa {$p->name} ID: {$p->id}");
}

echo PHP_EOL;