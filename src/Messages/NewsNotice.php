<?php

namespace PhpPackagist\WorkWeixinBot\Messages;

use PhpPackagist\WorkWeixinBot\Contracts\AbstractMessage;
use PhpPackagist\WorkWeixinBot\Messages\Notice\CardAction;
use PhpPackagist\WorkWeixinBot\Messages\Notice\CardImage;
use PhpPackagist\WorkWeixinBot\Messages\Notice\ImageTextArea;
use PhpPackagist\WorkWeixinBot\Messages\Notice\MainTitle;
use PhpPackagist\WorkWeixinBot\Messages\Notice\QuoteArea;
use PhpPackagist\WorkWeixinBot\Messages\Notice\Source;
use PhpPackagist\WorkWeixinBot\Messages\Notice\VerticalContent;
use PhpPackagist\WorkWeixinBot\Traits\Notice;

class NewsNotice extends AbstractMessage
{
    use Notice;

    protected CardImage $cardImage;
    protected ImageTextArea $imageTextArea;

    protected array $verticalContentList;

    public function __construct(
        ?Source $source = null,
        ?MainTitle $mainTitle = null,
        ?CardImage $cardImage = null,
        ?ImageTextArea $imageTextArea = null,
        ?QuoteArea $quoteArea = null,
        array $verticalContentList = [],
        array $horizontalContentList = [],
        array $jumpList = [],
        ?CardAction $cardAction = null
    ) {
        $this
            ->setSource($source)
            ->setMainTitle($mainTitle)
            ->setCardImage($cardImage)
            ->setImageTextArea($imageTextArea)
            ->setQuoteArea($quoteArea)
            ->setVerticalContentList($verticalContentList)
            ->setHorizontalContentList($horizontalContentList)
            ->setJumpList($jumpList)
            ->setCardAction($cardAction);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $template_card = [
            'card_type' => 'news_notice',
        ];

        if ($this->getSource()) {
            $template_card['source'] = $this->getSource()->toArray();
        }
        if ($this->getMainTitle()) {
            $template_card['main_title'] = $this->getMainTitle()->toArray();
        }
        if ($this->getCardImage()) {
            $template_card['card_image'] = $this->getCardImage()->toArray();
        }
        if ($this->getImageTextArea()) {
            $template_card['image_text_area'] = $this->getImageTextArea()->toArray();
        }
        if ($this->getQuoteArea()) {
            $template_card['quote_area'] = $this->getQuoteArea()->toArray();
        }
        if ($this->getVerticalContentList()) {
            $template_card['vertical_content_list'] = $this->formatVerticalContentList();
        }
        if ($this->getHorizontalContentList()) {
            $template_card['horizontal_content_list'] = $this->formatHorizontalContentList();
        }
        if ($this->getJumpList()) {
            $template_card['jump_list'] = $this->formatJumpList();
        }
        if ($this->getCardAction()) {
            $template_card['card_action'] = $this->getCardAction()->toArray();
        }
        return [
            'msgtype'       => 'template_card',
            'template_card' => $template_card,
        ];
    }

    /**
     * @return CardImage
     */
    public function getCardImage(): CardImage
    {
        return $this->cardImage;
    }

    /**
     * @param CardImage $cardImage
     *
     * @return NewsNotice
     */
    public function setCardImage(CardImage $cardImage): NewsNotice
    {
        $this->cardImage = $cardImage;
        return $this;
    }

    /**
     * @return ImageTextArea
     */
    public function getImageTextArea(): ImageTextArea
    {
        return $this->imageTextArea;
    }

    /**
     * @param ImageTextArea $imageTextArea
     *
     * @return NewsNotice
     */
    public function setImageTextArea(ImageTextArea $imageTextArea): NewsNotice
    {
        $this->imageTextArea = $imageTextArea;
        return $this;
    }

    /**
     * @return array
     */
    public function getVerticalContentList(): array
    {
        return $this->verticalContentList;
    }

    /**
     * @param array $verticalContentList
     *
     * @return NewsNotice
     */
    public function setVerticalContentList(array $verticalContentList): NewsNotice
    {
        $this->verticalContentList = $verticalContentList;
        return $this;
    }

    public function formatVerticalContentList(): array
    {
        $list = [];
        foreach ($this->verticalContentList as $item) {
            if ($item instanceof VerticalContent) {
                $list[] = $item->toArray();
            } else {
                throw new \InvalidArgumentException('verticalContentList mast be VerticalContent Class.');
            }
        }
        return $list;
    }
}
