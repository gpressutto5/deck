<?php
namespace Tests\Unit\Models;

use Tests\TestCase;
use Pressutto\Deck\Models\BaseModel;

class BaseModelTest extends TestCase
{
    public function testConstructor()
    {
        $testData = [
            'foo' => 'bar',
            'baz' => 'qux'
        ];
        $subModel = new BaseModelImplementation($testData);

        $this->assertObjectHasAttribute('foo', $subModel);
        $this->assertEquals('bar', $subModel->foo);
        $this->assertObjectNotHasAttribute('baz', $subModel);
    }

    public function testInvalidValue()
    {
        $this->expectException('InvalidArgumentException');
        $testData = [
            'foo' => 'invalid foo',
        ];
        new BaseModelImplementation($testData);
    }
}

class BaseModelImplementation extends BaseModel
{
    public $foo;

    protected function validateFoo($foo): bool
    {
        return $foo !== 'invalid foo';
    }
}
