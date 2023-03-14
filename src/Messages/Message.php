<?php

namespace PhpPackagist\WorkWeixinBot\Messages;

use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Support\Arrayable;

abstract class Message implements Arrayable, Jsonable, \JsonSerializable
{
    public function toJson($options = JSON_UNESCAPED_UNICODE): string
    {
        return json_encode($this->jsonSerialize(), $options);
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
