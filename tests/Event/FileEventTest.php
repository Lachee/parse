<?php

namespace Psecio\Parse\Event;

use Mockery as m;

class FileEventTest extends \PHPUnit\Framework\TestCase
{
    public function testGetFile()
    {
        $file = m::mock('\Psecio\Parse\File');
        $this->assertSame(
            $file,
            (new FileEvent($file))->getFile()
        );
    }
}
