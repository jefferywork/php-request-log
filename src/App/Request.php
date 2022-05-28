<?php
namespace Jefferywork\PhpRequestLog\App;

use GuzzleHttp\Client;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\StreamInterface;

class Request
{
    // wiki
    // https://www.cnblogs.com/makalochen/p/13558570.html

    private $timeout = 5;

    private $client;

    public function __construct($url)
    {
        $this->client = new Client([
            'base_uri' => $url,
            'timeout'  => $this->timeout,
        ]);
    }

    /**
     * GET 请求
     *
     * @param array $query
     * @return StreamInterface
     */
    public function get(array $query)
    {
        $response = $this->client->get("", [
            'query' => $query,
        ]);
        return $response->getBody();
    }

    /**
     * GET 异步请求
     *
     * @param array $query
     * @return PromiseInterface
     */
    public function getAsync(array $query)
    {
        return $this->client->getAsync("", [
            'query' => $query,
        ]);
    }

    /**
     * POST 请求
     *
     * @param array $params
     * @return StreamInterface
     */
    public function post(array $params)
    {
        $response = $this->client->post("", [
            'form_params' => $params,
        ]);
        return $response->getBody();
    }

    /**
     * POST 异步请求
     *
     * @param array $params
     * @return PromiseInterface
     */
    public function postAsync(array $params)
    {
        return $this->client->postAsync("", [
            'form_params' => $params,
        ]);
    }

}