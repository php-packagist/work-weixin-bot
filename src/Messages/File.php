<?php

namespace PhpPackagist\WorkWeixinBot\Messages;

/**
 * File Message body
 */
class File extends AbstractMessage
{
    /**
     * file id from upload file.
     *
     * @var string
     */
    protected string $mediaId;

    /**
     * @param string $mediaId
     */
    public function __construct(string $mediaId = '')
    {
        $this->setMediaId($mediaId);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'msgtype' => 'file',
            'file'    => [
                'media_id' => $this->getMediaId(),
            ],
        ];
    }

    /**
     * @return string
     */
    public function getMediaId(): string
    {
        return $this->mediaId;
    }

    /**
     * @param string $mediaId
     *
     * @return File
     */
    public function setMediaId(string $mediaId): self
    {
        $this->mediaId = $mediaId;

        return $this;
    }
}
