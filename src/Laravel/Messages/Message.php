<?php

namespace PhpPackagist\WorkWeixinBot\Laravel\Messages;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

abstract class Message implements Arrayable, Jsonable, \JsonSerializable
{
    public function toJson($options = JSON_UNESCAPED_UNICODE): bool|string
    {
        return json_encode($this->jsonSerialize(), $options);
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
