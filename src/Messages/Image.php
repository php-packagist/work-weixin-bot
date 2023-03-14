<?php

namespace PhpPackagist\WorkWeixinBot\Messages;

/**
 * Image Message body.
 */
class Image extends Message
{

    /**
     * file path or url
     * @var string
     * @example https://www.baidu.com/img/bd_logo1.png
     *          /Users/xxx/Downloads/bd_logo1.png
     *
     */
    protected string $file;

    /**
     * md5 of file
     * @var string
     */
    protected string $md5;

    /**
     * base64 of file
     * @var string
     */
    protected string $base64;

    public function __construct(string $file = '')
    {
        $this->file = $file;

        $this->initFile();
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

    // init file
    private function initFile()
    {
        if (filter_var($this->file, FILTER_VALIDATE_URL)) {
            $contextOptions = stream_context_create([
                "ssl" => [
                    "verify_peer"      => false,
                    "verify_peer_name" => false,
                ],
            ]);
            $fileContent = file_get_contents($this->file, false, $contextOptions);
        } else {
            $fileContent = file_get_contents($this->file);
        }

        $this->base64 = base64_encode($fileContent);
        $this->md5 = md5_file($this->file);
    }

    /**
     * @return string
     */
    public function getFile(): string
    {
        return $this->file;
    }

    /**
     * @param  string  $file
     *
     * @return Image
     */
    public function setFile(string $file): Image
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @return string
     */
    public function getMd5(): string
    {
        return $this->md5;
    }

    /**
     * @param  string  $md5
     *
     * @return Image
     */
    public function setMd5(string $md5): Image
    {
        $this->md5 = $md5;
        return $this;
    }

    /**
     * @return string
     */
    public function getBase64(): string
    {
        return $this->base64;
    }

    /**
     * @param  string  $base64
     *
     * @return Image
     */
    public function setBase64(string $base64): Image
    {
        $this->base64 = $base64;
        return $this;
    }


}
