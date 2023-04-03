<?php

namespace PhpPackagist\WorkWeixinBot\Messages;

use PhpPackagist\WorkWeixinBot\Contracts\AbstractMessage;

/**
 * Image Message body.
 */
class Image extends AbstractMessage
{
    /**
     * file path or url
     *
     * @var string
     *
     * @example https://www.baidu.com/img/bd_logo1.png
     *          /Users/xxx/Downloads/bd_logo1.png
     */
    protected string $file;

    /**
     * md5 of file
     *
     * @var string
     */
    protected string $md5;

    /**
     * base64 of file
     *
     * @var string
     */
    protected string $base64;

    public function __construct(string $base64 = '', string $md5 = '')
    {
        $this->base64 = $base64;
        $this->md5    = $md5;
    }

    public function toArray(): array
    {
        return [
            'msgtype' => 'image',
            'image'   => [
                'base64' => $this->base64,
                'md5'    => $this->md5,
            ],
        ];
    }

    /**
     * fast create image message
     *
     * @param string $file
     *
     * @return static
     */
    public static function file(string $file = ''): self
    {
        if (filter_var($file, FILTER_VALIDATE_URL)) {
            $contextOptions = stream_context_create([
                'ssl' => [
                    'verify_peer'      => false,
                    'verify_peer_name' => false,
                ],
            ]);
            $fileContent = file_get_contents($file, false, $contextOptions);
        } else {
            $fileContent = file_get_contents($file);
        }

        return new static(base64_encode($fileContent), md5_file($file));
    }

    /**
     * @return string
     */
    public function getMd5(): string
    {
        return $this->md5;
    }

    /**
     * @return string
     */
    public function getBase64(): string
    {
        return $this->base64;
    }
}
