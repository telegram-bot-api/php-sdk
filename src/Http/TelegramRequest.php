<?php

namespace Telegram\Bot\Http;

use Telegram\Bot\Api;
use Telegram\Bot\Exceptions\TelegramRequestException;
use Telegram\Bot\Traits\HasAccessToken;

/**
 * Class TelegramRequest.
 *
 * Builds Telegram Bot API Request Entity.
 */
class TelegramRequest
{
    use HasAccessToken;

    /** @var string The HTTP method for this request. */
    protected string $method;

    /** @var string The API endpoint for this request. */
    protected string $endpoint;

    /** @var array The headers to send with this request. */
    protected array $headers = [];

    /** @var array The parameters to send with this request. */
    protected array $params = [];

    /** @var array The files to send with this request. */
    protected array $files = [];

    /** @var bool Indicates if the request to Telegram will be asynchronous (non-blocking). */
    protected bool $isAsyncRequest = false;

    /** @var int Timeout of the request in seconds. */
    protected int $timeout;

    /** @var int Connection timeout of the request in seconds. */
    protected int $connectTimeout;

    /**
     * Creates a new Request entity.
     *
     * @param string|null $accessToken
     * @param string|null $method
     * @param string|null $endpoint
     * @param array|null  $params
     * @param bool        $isAsyncRequest
     */
    public function __construct(
        string $accessToken = null,
        string $method = null,
        string $endpoint = null,
        array $params = [],
        bool $isAsyncRequest = false
    ) {
        $this->setAccessToken($accessToken);
        $this->setMethod($method);
        $this->setEndpoint($endpoint);
        $this->setParams($params);
        $this->setAsyncRequest($isAsyncRequest);
    }

    /**
     * Make this request asynchronous (non-blocking).
     *
     * @param $isAsyncRequest
     *
     * @return TelegramRequest
     */
    public function setAsyncRequest($isAsyncRequest): self
    {
        $this->isAsyncRequest = $isAsyncRequest;

        return $this;
    }

    /**
     * Validate that the HTTP method is set.
     *
     * @throws TelegramRequestException
     */
    public function validateMethod(): void
    {
        if (!$this->method) {
            throw TelegramRequestException::httpMethodNotSpecified();
        }

        if (!in_array($this->method, ['GET', 'POST'])) {
            throw TelegramRequestException::invalidHttpMethod();
        }
    }

    /**
     * Return the API Endpoint for this request.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    /**
     * Set the endpoint for this request.
     *
     * @param string $endpoint
     *
     * @return TelegramRequest
     */
    public function setEndpoint(string $endpoint): self
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    /**
     * Return the headers for this request.
     *
     * @return array
     */
    public function getHeaders(): array
    {
        $headers = $this->getDefaultHeaders();

        return array_merge($this->headers, $headers);
    }

    /**
     * Set the headers for this request.
     *
     * @param array $headers
     *
     * @return TelegramRequest
     */
    public function setHeaders(array $headers): self
    {
        $this->headers = array_merge($this->headers, $headers);

        return $this;
    }

    /**
     * The default headers used with every request.
     *
     * @return array
     */
    public function getDefaultHeaders(): array
    {
        return [
            'User-Agent' => 'Telegram-Bot-SDK/Telegram-Bot-SDK',
        ];
    }

    /**
     * Check if this is an asynchronous request (non-blocking).
     *
     * @return bool
     */
    public function isAsyncRequest(): bool
    {
        return $this->isAsyncRequest;
    }

    /**
     * Only return params on POST requests.
     *
     * @return array
     */
    public function getPostParams(): array
    {
        return ($this->getMethod() === 'POST') ? $this->getParams() : [];
    }

    /**
     * Return the HTTP method for this request.
     *
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * Set the HTTP method for this request.
     *
     * @param string
     *
     * @return TelegramRequest
     */
    public function setMethod(string $method): self
    {
        $this->method = strtoupper($method);

        return $this;
    }

    /**
     * Return the params for this request.
     *
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * Set the params for this request.
     *
     * @param array $params
     *
     * @return TelegramRequest
     */
    public function setParams(array $params): self
    {
        $this->params = array_merge($this->params, $params);

        return $this;
    }

    /**
     * Get Timeout.
     *
     * @return int
     */
    public function getTimeout(): int
    {
        return $this->timeout;
    }

    /**
     * Set Timeout.
     *
     * @param int $timeout
     *
     * @return TelegramRequest
     */
    public function setTimeout(int $timeout): self
    {
        $this->timeout = $timeout;

        return $this;
    }

    /**
     * Get Connection Timeout.
     *
     * @return int
     */
    public function getConnectTimeout(): int
    {
        return $this->connectTimeout;
    }

    /**
     * Set Connection Timeout.
     *
     * @param int $connectTimeout
     *
     * @return TelegramRequest
     */
    public function setConnectTimeout(int $connectTimeout): self
    {
        $this->connectTimeout = $connectTimeout;

        return $this;
    }
}
