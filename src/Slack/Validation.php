<?php

declare(strict_types=1);

namespace Lametric\Slack;

class Validation
{
    private array $parameters = [
        'channel',
        'icon',
        'name',
        'text',
        'token',
    ];

    /**
     * @param array $parameters
     * @throws \Exception
     */
    public function __construct(array $parameters = [])
    {
        foreach ($this->parameters as $name) {
            if (empty($parameters[$name])) {
                throw new \Exception('Missing parameter');
            }
            $this->parameters[$name] = addslashes(urldecode($parameters[$name]));
        }
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @param string $parameter
     *
     * @return string|null
     */
    public function getParameter(string $parameter): ?string
    {
        return isset($this->parameters[$parameter]) ? $this->parameters[$parameter] : null;
    }
}
