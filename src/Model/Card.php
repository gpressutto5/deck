<?php

namespace Pressutto\Deck\Model;

use Pressutto\Deck\Enum\Suit;

class Card extends BaseModel
{
    /**
     * Must be between 1 and 13 (inclusive)
     * 1 = Ace
     * 11 = Jack
     * 12 = Queen
     * 13 = King
     *
     * @var int
     */
    protected $value;

    /**
     * @var Suit
     */
    protected $suit;

    public function __toString(): string
    {
        return $this->getTranslatedValue($this->value) . $this->suit;
    }

    public function getValue(): string
    {
        return $this->getTranslatedValue($this->value);
    }

    public function getSuit(): Suit
    {
        return $this->suit;
    }

    /**
     * Value must be between 1 and 13 (inclusive)
     *
     * @param int $value
     * @return bool
     */
    protected function validateValue(int $value): bool
    {
        return $value >= 1 && $value <= 13;
    }

    /**
     * Suit must be an instace of enum Suit
     *
     * @param $suit
     * @return bool
     */
    protected function validateSuit($suit): bool
    {
        return $suit instanceof Suit;
    }

    private function getTranslatedValue(?int $value): string
    {
        switch ($value) {
            case 1:
                return 'A';
            case 10:
                return 'T';
            case 11:
                return 'J';
            case 12:
                return 'Q';
            case 13:
                return 'K';
            default:
                return (string) $value;
        }
    }
}
