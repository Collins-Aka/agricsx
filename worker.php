<?php

use Spiral\RoadRunner;
use Nyholm\Psr7;

require __DIR__ . '/vendor/autoload.php';

$worker = RoadRunner\Worker::create();
$psrFactory = new Psr7\Factory\Psr17Factory();

$worker = new RoadRunner\Http\PSR7Worker($worker, $psrFactory, $psrFactory, $psrFactory);

while ($req = $worker->waitRequest()) {
    try {
        $rsp = new Psr7\Response();
        $rsp->getBody()->write('Hello, World!');
        $worker->respond($rsp);
    } catch (\Throwable $e) {
        $worker->getLogger()->error((string)$e);
        $worker->respond(new Psr7\Response(500));
    }
}
