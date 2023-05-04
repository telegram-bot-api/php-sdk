<?php

namespace Telegram\Bot\Traits;

use InvalidArgumentException;
use Telegram\Bot\Contracts\HttpClientInterface;
use Telegram\Bot\Exceptions\TelegramSDKException;
use Telegram\Bot\Http\TelegramClient;
use Telegram\Bot\Http\TelegramResponse;
use Telegram\Bot\Objects\ResponseObject;

/**
 * Http.
 *
 * @method self setHttpClientHandler(HttpClientInterface $httpClientHandler) Set Http Client Handler.
 * @method string getToken() Get the bot token.
 * @method self setToken(string $token) Set the bot token.
 * @method string getBaseApiUrl() Get the Base API URL.
 * @method self setBaseApiUrl(string $baseApiUrl) Set the Base API URL.
 * @method string getFileUrl(string $path = null) Get File URL.
 * @method bool isAsyncRequest() Check if this is an asynchronous request (non-blocking).
 * @method self setAsyncRequest(bool $isAsyncRequest) Make this request asynchronous (non-blocking).
 * @method TelegramResponse get(string $endpoint, array $params = []) Sends a GET request to Telegram Bot API and returns the result.
 * @method TelegramResponse post(string $endpoint, array $params = []) Sends a POST request to Telegram Bot API and returns the result.
 * @method TelegramResponse uploadFile(string $endpoint, array $params, array $jsonEncode = []) Sends a multipart/form-data request to Telegram Bot API and returns the result.
 * @method TelegramResponse|null getLastResponse() Returns the last response returned from API request.
 */
trait Http
{
    /** @var TelegramClient|null The Telegram client service. */
    protected ?TelegramClient $client = null;

    /**
     * Returns the TelegramClient service.
     */
    public function getClient(): TelegramClient
    {
        return $this->client ??= (new TelegramClient())->setToken($this->getToken());
    }

    public function getHttpClientConfig(): array
    {
        return $this->getClient()->getConfig();
    }

    public function setHttpClientConfig(array $config): self
    {
        $this->getClient()->setConfig($config);

        return $this;
    }

    /**
     * Download a file from Telegram server by fileID or getFile() Response.
     *
     *
     * @param string|ResponseObject $fileId File ID or ResponseObject from getFile()
     * @param string                $saveTo Absolute path to dir or filename to save as.
     *
     * @throws TelegramSDKException
     * @return string
     */
    public function downloadFile(string|ResponseObject $fileId, string $saveTo): string
    {
        $originalFilename = null;

        if (!$fileId instanceof ResponseObject) {
            $fileId = $this->getFile(['file_id' => $fileId]);
        }

        if (!$fileId->has('file_id')) {
            throw new InvalidArgumentException(
                'Invalid param provided. Please provide either a file id or a ResponseObject containing file_id'
            );
        }

        // No filename provided.
        if (pathinfo($saveTo, PATHINFO_EXTENSION) === '') {
            // Attempt to use the original file name if there is one or fallback to the file_path filename.
            $saveTo .= DIRECTORY_SEPARATOR . ($originalFilename ?: basename((string)$fileId->file_path));
        }

        return $this->getClient()->download($fileId->file_path, $saveTo);
    }
}
