<?php

use Guzzle\Http\Client;

class BaseModel
{
    protected function request($endpoint, $method, $parameters)
    {
        $client = new Client(Config::get("api.endpoint"));

        if ($method == "POST")
        {
            $request = $client->post($endpoint, null, $parameters);
        }
        else
        {
            $query = http_build_query($parameters);
            $request = $client->get($endpoint . "?" . $query);
        }

        $response = $request->send();
        return $response->json();
    }
}