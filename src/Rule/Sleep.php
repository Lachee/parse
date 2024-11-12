<?php

namespace Psecio\Parse\Rule;

use Psecio\Parse\RuleInterface;
use PhpParser\Node;
use PhpParser\Node\Scalar\LNumber;
use PhpParser\Node\Expr\BinaryOp\Concat;

/**
 * Avoid the use of `exit` or `die` with strings as it could lead to injection issues (direct output)
 *
 * Long description missing...
 *
 * @todo Add long description to docblock
 */
class Sleep implements RuleInterface
{
    use Helper\NameTrait, Helper\DocblockDescriptionTrait;
    use Helper\IsFunctionCallTrait;

    public function isValid(Node $node)
    {
        // If it's an exit, see if there's any concatenation happening
        if ($this->isFunctionCall($node, ['sleep', 'usleep', 'time_nanosleep', 'time_sleep_until'])) {
            return false;
        }

        return true;
    }
}
