<?php

namespace PhpPackagist\WorkWeixinBot\Messages;

/**
 * Image Message body.
 */
class Image extends AbstractMessage
{
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

    /*
     * @param string $base64
     * @param string $md5
     */
    public function __construct(string $base64 = '', string $md5 = '')
    {
        $this->base64 = $base64;
        $this->md5    = $md5;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'msgtype' => 'image',
            'image'   => [
                'base64' => $this->getBase64(),
                'md5'    => $this->getMd5(),
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
            $options = stream_context_create([
                'ssl' => [
                    'verify_peer'      => false,
                    'verify_peer_name' => false,
                ],
            ]);

            $content = file_get_contents($file, false, $options);
        } else {
            $content = file_get_contents($file);
        }

        return new static(
            base64_encode($content), md5_file($file)
        );
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
