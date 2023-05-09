<?php

namespace PhpPackagist\WorkWeixinBot\Messages;

use PhpPackagist\WorkWeixinBot\Messages\News\Article;

/**
 * News Message body
 */
class News extends AbstractMessage
{
    /**
     * Article Class array.
     *
     * @var array
     */
    protected array $articles;

    /**
     * articles item mast be PhpPackagist\WorkWeixinBot\Messages\News\Article Class.
     *
     * @param array{Article} $articles
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

    /**
     * format articles
     *
     * @return array
     */
    protected function formatArticles(): array
    {
        $articles = [];

        foreach ($this->articles as $article) {
            if (is_array($article)) {
                $articles[] = $article;
            } elseif ($article instanceof Article) {
                $articles[] = $article->toArray();
            } else {
                throw new \InvalidArgumentException('Article mast be Article Class.');
            }
        }

        return $articles;
    }

    /**
     * add articles item
     *
     * @param Article $articles
     *
     * @return self
     */
    public function addArticle(Article $articles): self
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
}
