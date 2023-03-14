<?php

namespace PhpPackagist\WorkWeixinBot\Messages;

use PhpPackagist\WorkWeixinBot\Messages\News\Articles;

/**
 * News Message body
 */
class News extends Message
{
    /**
     * Articles Class array.
     *
     * @var array
     */
    protected array $articles;

    /**
     * articles item mast be PhpPackagist\WorkWeixinBot\Messages\News\Articles Class.
     *
     * @param  array  $articles
     */
    public function __construct(array $articles = [])
    {
        $this->articles = $articles;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'msgtype' => 'news',
            'news'    => [
                'articles' => $this->formatArticles(),
            ],
        ];
    }

    // format articles
    protected function formatArticles(): array
    {
        $articles = [];
        foreach ($this->articles as $article) {
            if (!$article instanceof Articles) {
                throw new \InvalidArgumentException('articles mast be Articles Class.');
            }
            $articles[] = $article->toArray();
        }
        return $articles;
    }

    /**
     * add articles item
     *
     * @param  Articles  $articles
     *
     * @return News
     */
    public function addArticles(Articles $articles): News
    {
        $this->articles[] = $articles;
        return $this;
    }

    /**
     * @return array
     */
    public function getArticles(): array
    {
        return $this->articles;
    }

    /**
     * @param  array  $articles
     *
     * @return News
     */
    public function setArticles(array $articles): News
    {
        $this->articles = $articles;
        return $this;
    }
}
