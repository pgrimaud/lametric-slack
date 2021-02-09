<?php

declare(strict_types=1);

namespace Lametric\Slack;

class Response
{
    public function setUnAuthorized(): void
    {
        http_response_code(403);
    }
}
