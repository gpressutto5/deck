<?php
namespace Pressutto\Deck\Models;

use Pressutto\Deck\Enum\Suit;

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

    /**
     * Returns the entire deck
     *
     * @return array
     */
    public function getAllCards(): array
    {
        return $this->deck;
    }
}
