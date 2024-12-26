<?php

namespace MoonlyDays\BinaryStream;

class BinaryReader extends BinaryStream
{
    protected string $mode = 'rb';

    /**
     * Read a 32-bit integer.
     */
    public function readInt32(): int
    {
        $value = 0;
        for ($i = 0; $i < 4; $i++) {
            $value |= $this->readByte() << $i * 8;
        }

        return $value;
    }

    /**
     * Read a 16-bit integer.
     */
    public function readInt16(): int
    {
        $value = 0;
        for ($i = 0; $i < 2; $i++) {
            $value |= $this->readByte() << $i * 8;
        }

        return $value;
    }

    /**
     * Read a string value from the stream.
     */
    public function readString(): string
    {
        $length = $this->readInt32();
        $chars = [];
        for ($i = 0; $i < $length; $i++) {
            $chars[] = $this->readByte();
        }

        return implode(array_map('chr', $chars));
    }

    /**
     * Read a single byte integer.
     */
    public function readByte(): int
    {
        return ord(fgets($this->resource, 2));
    }
}
