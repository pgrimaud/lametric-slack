<?php
namespace Lametric\Slack;

class Response
{
    public function setUnAuthorized()
    {
        http_response_code(403);
    }
}
