<?php

namespace Psecio\Parse\Event;

use Mockery as m;

class MessageEventTest extends \PHPUnit\Framework\TestCase
{
    public function testGetMessage()
    {
        $this->assertSame(
            'my message',
            (new MessageEvent('my message'))->getMessage()
        );
    }
}
