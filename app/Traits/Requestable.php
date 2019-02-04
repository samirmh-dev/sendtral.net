<?php
/**
 * Created by PhpStorm.
 * User: Samir
 * Date: 04.02.2019
 * Time: 21:19
 */

namespace App\Traits;

use GuzzleHttp\Client;

trait Requestable
{
    protected $client;
    private $response;
    private $url;
    private $parameters;
    private $method;
    private $options;
    private $debug;

    /**
     * Requestable constructor.
     * @throws \InvalidArgumentException
     */
    public function __construct()
    {
        $this->client = new Client();
        $this->debug = true;
    }

    /**
     * @param $url
     * @param array $parameters
     * @param string $method
     * @param array $options
     * @return \Illuminate\Http\JsonResponse
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function request($url, $parameters = array(), $method = 'GET', $options = array())
    {
        if ($method !== "GET" && $method !== "POST")
            abort(419);

        $this->url = $url;
        $this->parameters = $parameters;
        $this->method = $method;
        $this->options = $options;
        return $this->makeResponse();
    }

    private function makeResponse()
    {
        $this->response =
            $this->method === 'GET'
                ? $this->client->request($this->method, $this->url . http_build_query($this->parameters), $this->options + ['debug' => $this->debug, 'allow_redirects' => false])
                : $this->client->request($this->method, $this->url, $this->options + ['debug' => $this->debug, 'allow_redirects' => false, 'form_params' => $this->parameters]);
        $content = $this->response->getBody()->getContents();
        if ($this->isJson($content))
            $content = json_decode($content, 1);
        return response()->json([
            'response' => $content,
            'status_code' => $this->response->getStatusCode()
        ], 200);
    }

    private function isJson($string)
    {
        return (json_last_error() == JSON_ERROR_NONE);
    }
}
