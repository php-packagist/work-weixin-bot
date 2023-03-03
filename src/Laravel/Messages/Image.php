<?php

namespace PhpPackagist\WorkWeixinBot\Laravel\Messages;

class Image extends Message
{

    protected string $file;

    protected string $md5;

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
}
