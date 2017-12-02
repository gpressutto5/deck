<?php
namespace Tests\Unit\Models;

use Pressutto\Deck\Models\Deck;
use Tests\TestCase;

class DeckTest extends TestCase
{
    public function testDeckHas52UniqueCards()
    {
        $deck = new Deck();
        $allCards = $deck->getAllCards();
        $uniqueCards = array_unique($allCards);

        $this->assertEquals(52, count($uniqueCards));
    }
}
