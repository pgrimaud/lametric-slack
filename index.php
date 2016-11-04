<?php

require_once __DIR__ . '/vendor/autoload.php';

use Lametric\Slack;

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
