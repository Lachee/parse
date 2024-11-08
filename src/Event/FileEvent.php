<?php

namespace Psecio\Parse\Event;

use Psecio\Parse\File;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Event containing a File object
 */
class FileEvent extends Event
{
    /**
     * @var File The File object this event conserns
     */
    private $file;

    /**
     * Set File object
     *
     * @param File $file
     */
    public function __construct(File $file)
    {
        $this->file = $file;
    }

    /**
     * Get File object this event conserns
     *
     * @return File
     */
    public function getFile()
    {
        return $this->file;
    }
}
