<?php

namespace MoonlyDays\BinaryStream;

class BinaryWriter extends BinaryStream
{
    protected string $mode = 'wb';

    /**
     * Write a 32-bit integer.
     * @return $this
     */
    public function writeInt32(int $value): static
    {
        for ($i = 0; $i < 4; $i++) {
            $this->writeByte(($value >> ($i * 8)) & 0xFF);
        }

        return $this;
    }

    /**
     * Write a 16-bit integer.
     * @return $this
     */
    public function writeInt16(int $value): static
    {
        for ($i = 0; $i < 2; $i++) {
            $this->writeByte(($value >> ($i * 8)) & 0xFF);
        }

        return $this;
    }

    /**
     * Write a string value from the stream.
     * @return $this
     */
    public function writeString(string $string): static
    {
        $length = strlen($string);
        $this->writeInt32($length);

        for ($i = 0; $i < $length; $i++) {
            $this->writeByte(ord($string[$i]));
        }

        return $this;
    }

    /**
     * Write a single byte.
     * @return $this
     */
    public function writeByte(int $byte): static
    {
        fwrite($this->resource, chr($byte));

        return $this;
    }
}
