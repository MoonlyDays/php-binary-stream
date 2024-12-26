<?php

namespace MoonlyDays\BinaryStream;

abstract class BinaryStream
{
    /**
     * The resource we're doing
     *
     * @var resource
     */
    protected mixed $resource;

    protected string $mode = '';

    public function __construct(
        protected string $path,
    ) {
        $this->resource = fopen($this->path, $this->mode);
    }

    public function __destruct()
    {
        fclose($this->resource);
    }
}
