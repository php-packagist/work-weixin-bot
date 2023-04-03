<?php

namespace PhpPackagist\WorkWeixinBot;

use Psr\Http\Message\ResponseInterface;

class Response
{
    /**
     * @var ResponseInterface
     */
    protected ResponseInterface $response;

    /**
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
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
     * @return ResponseInterface
     */
    public function getResponse(): ResponseInterface
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
