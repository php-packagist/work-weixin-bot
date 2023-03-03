<?php

namespace PhpPackagist\WorkWeixinBot\Laravel\Messages;

class Image extends Message
{

    protected string $file;

    public function __construct(string $file = '')
    {
        $this->file = $file;
    }

    public function toArray(): array
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

        return [
            'msgtype' => 'image',
            'image'   => [
                'base64' => base64_encode($fileContent),
                'md5'    => md5_file($this->file),
            ],
        ];
    }
}
