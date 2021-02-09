<?php

use Lametric\Slack;

require_once __DIR__ . '/../vendor/autoload.php';
$config = require_once __DIR__ . '/../config/parameters.php';

Sentry\init(['dsn' => $config['sentry_key']]);

try {
    $parameters = new Slack\Validation($_GET);

    $api = new Slack\Api();
    $api->setParameters($parameters->getParameters());
    $api->send();

} catch (Exception $e) {
    // will return X on LaMetric screen
    $response = new Slack\Response();
    $response->setUnAuthorized();
}
