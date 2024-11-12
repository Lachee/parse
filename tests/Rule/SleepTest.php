<?php

namespace Psecio\Parse\Rule;

class SleepTest extends RuleTestCase
{
    public function parseSampleProvider()
    {
        return [
            ['SLEEP();',                    false],
            ['sleep();',                    false],
            ['sleep(1);',                   false],
            ['USLEEP();',                   false],
            ['usleep(244);',                false],
            ['time_nanosleep(1,200);',      false],
            ['time_sleep_until(560.5);',    false],
            ['my_sleep();',                 true],
        ];
    }

    protected function buildTest()
    {
        return new Sleep();
    }
}
