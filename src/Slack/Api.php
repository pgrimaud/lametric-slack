<?php
namespace Lametric\Slack;

use Maknz\Slack\Client;

class Api
{
    /** @var array */
    private $parameters = [];

    /**
     * @param array $parameters
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
    }

    public function send()
    {
        $settings = [
            'username' => $this->parameters['name'],
            'link_names' => true
        ];

        $client = new Client('https://hooks.slack.com/services/' . $this->parameters['token'], $settings);
        $client->to($this->parameters['channel'])->withIcon($this->parameters['icon'])->send($this->parameters['text']);
    }
}
