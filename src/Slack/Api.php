<?php
namespace Lametric\Slack;

use Maknz\Slack\Client;

class Api
{
    /** @var array */
    private $parameters = [];

    public function call()
    {
        $webhook = 'https://hooks.slack.com/services/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';

        $ch = curl_init($webhook);

        $headers = ['Content-Type: application/json'];

        $data = json_encode([
            'channel' => '#analyse-alertes-api',
            'username' => $name,
            'text' => $text,
            'icon_emoji' => $icon
        ]);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $r = curl_exec($ch);
        echo $r;
        curl_close($ch);
    }

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
            'channel' => $this->parameters['channel'],
            'link_names' => true
        ];

        $client = new Client('https://hooks.slack.com/services/' . $this->parameters['token'], $settings);
        $client->withIcon($this->parameters['icon'])->send($this->parameters['text']);
    }
}
