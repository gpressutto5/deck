<?php
namespace Pressutto\Deck;

use Pressutto\Deck\Enum\Suit;
use Pressutto\Deck\Model\Card;

class Deck
{
    /**
     * @var array
     */
    private $deck;

    public function __construct()
    {
        $suits = Suit::values();
        foreach ($suits as $suit) {
            foreach (range(1, 13) as $value) {
                $this->deck[] = new Card([
                    'value' => $value,
                    'suit' => $suit,
                ]);
            }
        }
    }

    public function getAllCards(): array
    {
        return $this->deck;
    }
}