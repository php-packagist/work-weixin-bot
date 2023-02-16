<?php

namespace PhpPackagist\WorkWeixinBot;

class Response
{
    /**
     * @var \GuzzleHttp\Psr7\Response
     */
    protected \GuzzleHttp\Psr7\Response $response;

    /**
     * @param \GuzzleHttp\Psr7\Response $response
     */
    public function __construct(\GuzzleHttp\Psr7\Response $response)
    {
        $this->response = $response;
    }

    /**
     * @return bool
     */
    public function success(): bool
    {
        return $this->getStatusCode() >= 200 && $this->getStatusCode() < 300;
    }

    /**
     * @return bool
     */
    public function failed(): bool
    {
        return ! $this->success();
    }

    /**
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getResponse(): \GuzzleHttp\Psr7\Response
    {
        return $this->response;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->response->getBody()->getContents();
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->response->getStatusCode();
    }

    /*
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->response->getHeaders();
    }

    /**
     * @param string $name
     *
     * @return array
     */
    public function getHeader(string $name): array
    {
        return $this->response->getHeader($name);
    }
}
