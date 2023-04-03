<?php

namespace PhpPackagist\WorkWeixinBot\Messages;

use PhpPackagist\WorkWeixinBot\Contracts\AbstractMessage;
use PhpPackagist\WorkWeixinBot\Messages\Notice\CardAction;
use PhpPackagist\WorkWeixinBot\Messages\Notice\EmphasisContent;
use PhpPackagist\WorkWeixinBot\Messages\Notice\MainTitle;
use PhpPackagist\WorkWeixinBot\Messages\Notice\QuoteArea;
use PhpPackagist\WorkWeixinBot\Messages\Notice\Source;
use PhpPackagist\WorkWeixinBot\Traits\Notice;

/**
 * Text Notice Message body
 */
class TextNotice extends AbstractMessage
{
    use Notice;

    /**
     * Critical Data Format
     * @var EmphasisContent
     */
    protected EmphasisContent $emphasisContent;

    /**
     * Subtitle Text
     * @var string
     */
    protected string $subTitleText;

    public function __construct(
        ?Source $source = null,
        ?MainTitle $mainTitle = null,
        ?EmphasisContent $emphasisContent = null,
        ?QuoteArea $quoteArea = null,
        string $subTitleText = '',
        array $horizontalContentList = [],
        array $jumpList = [],
        ?CardAction $cardAction = null
    ) {
        $this
            ->setSource($source)
            ->setMainTitle($mainTitle)
            ->setEmphasisContent($emphasisContent)
            ->setQuoteArea($quoteArea)
            ->setSubTitleText($subTitleText)
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
            'card_type' => 'text_notice',
        ];

        if ($this->getSource()) {
            $template_card['source'] = $this->getSource()->toArray();
        }
        if ($this->getMainTitle()) {
            $template_card['main_title'] = $this->getMainTitle()->toArray();
        }
        if ($this->getEmphasisContent()) {
            $template_card['emphasis_content'] = $this->getEmphasisContent()->toArray();
        }
        if ($this->getQuoteArea()) {
            $template_card['quote_area'] = $this->getQuoteArea()->toArray();
        }
        if ($this->getSubTitleText()) {
            $template_card['sub_title_text'] = $this->getSubTitleText();
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
     * @return EmphasisContent
     */
    public function getEmphasisContent(): EmphasisContent
    {
        return $this->emphasisContent;
    }

    /**
     * @param EmphasisContent $emphasisContent
     *
     * @return TextNotice
     */
    public function setEmphasisContent(EmphasisContent $emphasisContent): TextNotice
    {
        $this->emphasisContent = $emphasisContent;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubTitleText(): string
    {
        return $this->subTitleText;
    }

    /**
     * @param string $subTitleText
     *
     * @return TextNotice
     */
    public function setSubTitleText(string $subTitleText): TextNotice
    {
        $this->subTitleText = $subTitleText;
        return $this;
    }
}
