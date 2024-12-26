<?php

use MoonlyDays\BinaryStream\BinaryReader;
use MoonlyDays\BinaryStream\BinaryWriter;

it('writes and reads correctly', function () {

    $path = __DIR__.'/test.bin';

    (new BinaryWriter($path))
        ->writeByte(0x40)
        ->writeInt16(0x051A)
        ->writeInt32(0xDEADBEEF)
        ->writeString('HELLO WORLD!');

    $reader = new BinaryReader($path);
    expect($reader->readByte())->toBe(0x40)
        ->and($reader->readInt16())->toBe(0x051A)
        ->and($reader->readInt32())->toBe(0xDEADBEEF)
        ->and($reader->readString())->toBe('HELLO WORLD!');
});
