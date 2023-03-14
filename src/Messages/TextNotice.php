<?php

namespace PhpPackagist\WorkWeixinBot\Messages;

use PhpPackagist\WorkWeixinBot\Messages\Notice\Source;
use PhpPackagist\WorkWeixinBot\Messages\Notice\MainTitle;
use PhpPackagist\WorkWeixinBot\Messages\Notice\QuoteArea;
use PhpPackagist\WorkWeixinBot\Messages\Notice\CardAction;
use PhpPackagist\WorkWeixinBot\Messages\Notice\EmphasisContent;

class TextNotice extends Message
{

    protected Source $source;

    protected MainTitle $mainTitle;

    protected EmphasisContent $emphasisContent;

    protected QuoteArea $quoteArea;

    protected string $subTitleText;

    protected array $horizontalContentList;

    protected array $jumpList;

    protected CardAction $cardAction;

    public function __construct(
        ?MainTitle $mainTitle = null,
        string $subTitleText = '',
        ?CardAction $cardAction = null,
        ?Source $source = null,
        ?EmphasisContent $emphasisContent = null,
        ?QuoteArea $quoteArea = null,
        array $horizontalContentList = [],
        array $jumpList = []
    ) {
        $this->source = $source ?? new Source();
        $this->mainTitle = $mainTitle ?? new MainTitle();
        $this->emphasisContent = $emphasisContent ?? new EmphasisContent();
        $this->quoteArea = $quoteArea ?? new QuoteArea();
        $this->subTitleText = $subTitleText;
        $this->horizontalContentList = $horizontalContentList;
        $this->jumpList = $jumpList;
        $this->cardAction = $cardAction ?? new CardAction();
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'msgtype'       => 'template_card',
            'template_card' => [
                'card_type'               => 'text_notice',
                'source'                  => $this->source->toArray(),
                'main_title'              => $this->mainTitle->toArray(),
                'emphasis_content'        => $this->emphasisContent->toArray(),
                'quote_area'              => $this->quoteArea->toArray(),
                'sub_title'               => $this->subTitleText,
                'horizontal_content_list' => $this->horizontalContentList,
                'jump_list'               => $this->jumpList,
                'card_action'             => $this->cardAction->toArray(),
            ],
        ];
    }

    /**
     * @return Source
     */
    public function getSource(): Source
    {
        return $this->source;
    }

    /**
     * @param  Source  $source
     *
     * @return TextNotice
     */
    public function setSource(Source $source): TextNotice
    {
        $this->source = $source;
        return $this;
    }

    /**
     * @return MainTitle
     */
    public function getMainTitle(): MainTitle
    {
        return $this->mainTitle;
    }

    /**
     * @param  MainTitle  $mainTitle
     *
     * @return TextNotice
     */
    public function setMainTitle(MainTitle $mainTitle): TextNotice
    {
        $this->mainTitle = $mainTitle;
        return $this;
    }

    /**
     * @return EmphasisContent
     */
    public function getEmphasisContent(): EmphasisContent
    {
        return $this->emphasisContent;
    }

    /**
     * @param  EmphasisContent  $emphasisContent
     *
     * @return TextNotice
     */
    public function setEmphasisContent(EmphasisContent $emphasisContent): TextNotice
    {
        $this->emphasisContent = $emphasisContent;
        return $this;
    }

    /**
     * @return QuoteArea
     */
    public function getQuoteArea(): QuoteArea
    {
        return $this->quoteArea;
    }

    /**
     * @param  QuoteArea  $quoteArea
     *
     * @return TextNotice
     */
    public function setQuoteArea(QuoteArea $quoteArea): TextNotice
    {
        $this->quoteArea = $quoteArea;
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
     * @param  string  $subTitleText
     *
     * @return TextNotice
     */
    public function setSubTitleText(string $subTitleText): TextNotice
    {
        $this->subTitleText = $subTitleText;
        return $this;
    }

    /**
     * @return array
     */
    public function getHorizontalContentList(): array
    {
        return $this->horizontalContentList;
    }

    /**
     * @param  array  $horizontalContentList
     *
     * @return TextNotice
     */
    public function setHorizontalContentList(array $horizontalContentList): TextNotice
    {
        $this->horizontalContentList = $horizontalContentList;
        return $this;
    }

    /**
     * @return array
     */
    public function getJumpList(): array
    {
        return $this->jumpList;
    }

    /**
     * @param  array  $jumpList
     *
     * @return TextNotice
     */
    public function setJumpList(array $jumpList): TextNotice
    {
        $this->jumpList = $jumpList;
        return $this;
    }

    /**
     * @return CardAction
     */
    public function getCardAction(): CardAction
    {
        return $this->cardAction;
    }

    /**
     * @param  CardAction  $cardAction
     *
     * @return TextNotice
     */
    public function setCardAction(CardAction $cardAction): TextNotice
    {
        $this->cardAction = $cardAction;
        return $this;
    }
}
