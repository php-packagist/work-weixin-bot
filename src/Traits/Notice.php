<?php

namespace PhpPackagist\WorkWeixinBot\Traits;

use PhpPackagist\WorkWeixinBot\Messages\Notice\CardAction;
use PhpPackagist\WorkWeixinBot\Messages\Notice\HorizontalContent;
use PhpPackagist\WorkWeixinBot\Messages\Notice\Jump;
use PhpPackagist\WorkWeixinBot\Messages\Notice\MainTitle;
use PhpPackagist\WorkWeixinBot\Messages\Notice\QuoteArea;
use PhpPackagist\WorkWeixinBot\Messages\Notice\Source;

trait Notice
{
    protected Source $source;

    protected MainTitle $mainTitle;

    protected array $horizontalContentList;

    protected QuoteArea $quoteArea;

    protected array $jumpList;

    protected CardAction $cardAction;

    public function formatJumpList(): array
    {
        $list = [];
        foreach ($this->jumpList as $item) {
            if ($item instanceof Jump) {
                $list[] = $item->toArray();
            } else {
                throw new \InvalidArgumentException('jumpList mast be Jump Class.');
            }
        }
        return $list;
    }

    public function formatHorizontalContentList(): array
    {
        $list = [];
        foreach ($this->horizontalContentList as $item) {
            if ($item instanceof HorizontalContent) {
                $list[] = $item->toArray();
            } else {
                throw new \InvalidArgumentException('horizontalContentList mast be HorizontalContent Class.');
            }
        }
        return $list;
    }

    /**
     * @return Source
     */
    public function getSource(): Source
    {
        return $this->source;
    }

    /**
     * @param Source $source
     *
     * @return self
     */
    public function setSource(Source $source): self
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
     * @param MainTitle $mainTitle
     *
     * @return self
     */
    public function setMainTitle(MainTitle $mainTitle): self
    {
        $this->mainTitle = $mainTitle;
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
     * @param array $horizontalContentList
     *
     * @return self
     */
    public function setHorizontalContentList(array $horizontalContentList): self
    {
        $this->horizontalContentList = $horizontalContentList;
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
     * @param QuoteArea $quoteArea
     *
     * @return self
     */
    public function setQuoteArea(QuoteArea $quoteArea): self
    {
        $this->quoteArea = $quoteArea;
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
     * @param array $jumpList
     *
     * @return self
     */
    public function setJumpList(array $jumpList): self
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
     * @param CardAction $cardAction
     *
     * @return self
     */
    public function setCardAction(CardAction $cardAction): self
    {
        $this->cardAction = $cardAction;
        return $this;
    }
}
