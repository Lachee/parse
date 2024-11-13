<?php

namespace Psecio\Parse\Rule;

use Psecio\Parse\RuleInterface;
use PhpParser\Node;
use PhpParser\Node\Scalar\LNumber;
use PhpParser\Node\Expr\BinaryOp\Concat;

/**
 * Avoid using sleep() and its variants as it can cause self-inflicted performance issues
 * 
 * The use of the sleep() function in PHP is generally discouraged for several reasons:
 * 1. **Blocking Behavior**: The sleep() function causes the script to pause execution for a specified number of seconds. This blocking behavior can lead to performance issues, especially in web applications where multiple users may be accessing the server simultaneously. Each call to sleep() ties up a server thread, potentially leading to resource exhaustion and degraded performance.
 * 2. **Poor User Experience**: In a web context, using sleep() can result in poor user experience. For example, if sleep() is used to simulate a delay, users may experience unnecessary waiting times, leading to frustration and a perception of a slow or unresponsive application.
 * 3. **Debugging Difficulties**: Introducing sleep() into your code can make debugging more challenging. The artificial delays can obscure the root cause of issues and make it harder to reproduce and diagnose problems.
 * 4. **Inefficient Resource Utilization**: While the script is sleeping, it is not performing any useful work. This can be particularly problematic in environments where efficient resource utilization is critical, such as high-traffic web servers or resource-constrained systems.
 * 5. **Alternative Solutions**: There are often better alternatives to using sleep(). For example, if you need to wait for a condition to be met, consider using event-driven programming, asynchronous processing, or other non-blocking techniques. These approaches can help you achieve the desired behavior without the downsides associated with sleep().
 * In summary, while sleep() may seem like a simple solution for introducing delays, it is generally best to avoid its use in favor of more efficient and non-blocking alternatives.
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
