<?php

namespace PhpPackagist\WorkWeixinBot\Messages;

use PhpPackagist\WorkWeixinBot\Messages\Notice\CardAction;
use PhpPackagist\WorkWeixinBot\Messages\Notice\CardImage;
use PhpPackagist\WorkWeixinBot\Messages\Notice\Concerns\Notice;
use PhpPackagist\WorkWeixinBot\Messages\Notice\HorizontalContent;
use PhpPackagist\WorkWeixinBot\Messages\Notice\ImageTextArea;
use PhpPackagist\WorkWeixinBot\Messages\Notice\Jump;
use PhpPackagist\WorkWeixinBot\Messages\Notice\MainTitle;
use PhpPackagist\WorkWeixinBot\Messages\Notice\QuoteArea;
use PhpPackagist\WorkWeixinBot\Messages\Notice\Source;
use PhpPackagist\WorkWeixinBot\Messages\Notice\VerticalContent;

/**
 * News Notice Message body
 */
class NewsNotice extends AbstractMessage
{
    use Notice;

    /**
     * Image format
     *
     * @var CardImage
     */
    protected CardImage $cardImage;

    /**
     * Image on the Left, Text on the Right Format
     *
     * @var ImageTextArea
     */
    protected ImageTextArea $imageTextArea;

    /**
     * Secondary Vertical Content of the Card
     *
     * optional
     *
     * @var array
     */
    protected array $verticalContentList;

    /**
     * @param Source|null        $source
     * @param MainTitle|null     $mainTitle
     * @param CardImage|null     $cardImage
     * @param ImageTextArea|null $imageTextArea
     * @param QuoteArea|null     $quoteArea
     * @param  array{VerticalContent}    $verticalContentList
     * @param  array{HorizontalContent}  $horizontalContentList
     * @param  array{Jump}               $jumpList
     * @param CardAction|null $cardAction
     */
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
     * @return self
     */
    public function setCardImage(CardImage $cardImage): self
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
     * @return self
     */
    public function setImageTextArea(ImageTextArea $imageTextArea): self
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
     * @param array{VerticalContent} $verticalContentList
     *
     * @return self
     */
    public function setVerticalContentList(array $verticalContentList): self
    {
        $this->verticalContentList = $verticalContentList;

        return $this;
    }

    /**
     * @param VerticalContent $verticalContent
     *
     * @return self
     */
    public function addVerticalContent(VerticalContent $verticalContent): self
    {
        $this->verticalContentList[] = $verticalContent;

        return $this;
    }

    /**
     * format verticalContentList
     *
     * @return array
     */
    public function formatVerticalContentList(): array
    {
        $list = [];
        foreach ($this->verticalContentList as $item) {
            if (is_array($item)) {
                $list[] = $item;
            } elseif ($item instanceof VerticalContent) {
                $list[] = $item->toArray();
            } else {
                throw new \InvalidArgumentException('verticalContentList mast be VerticalContent Class.');
            }
        }
        return $list;
    }
}
