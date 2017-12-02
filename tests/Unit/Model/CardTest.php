<?php
namespace Tests\Unit\Model;

use Pressutto\Deck\Enum\Suit;
use Pressutto\Deck\Model\Card;
use Tests\TestCase;

class CardTest extends TestCase
{
    public function testToString()
    {
        $card = new Card([
            'value' => 10,
            'suit' => Suit::SPADES(),
        ]);

        $this->assertEquals('T♠︎', (string) $card);
    }

    public function testToStringNullCard()
    {
        $card = new Card();

        $this->assertEquals('', (string) $card);
    }

    public function testGetters()
    {
        $card = new Card([
            'value' => 2,
            'suit' => Suit::SPADES(),
        ]);

        $this->assertEquals(2, $card->getValue());
        $this->assertEquals(Suit::SPADES(), $card->getSuit());
    }

    public function testTranslatedValues()
    {
        $translations = [
            1 => 'A',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
            6 => '6',
            7 => '7',
            8 => '8',
            9 => '9',
            10 => 'T',
            11 => 'J',
            12 => 'Q',
            13 => 'K',
        ];
        foreach ($translations as $value => $translation) {
            $card = new Card([
                'value' => $value,
            ]);
            $this->assertEquals($translation, $card->getValue());
        }
    }

    public function testInvalidValue()
    {
        $this->expectException('InvalidArgumentException');
        new Card(['value' => 15]);
    }

    public function testInvalidSuit()
    {
        $this->expectException('InvalidArgumentException');
        new Card(['suit' => 'spades']);
    }
}
