<?php

declare(strict_types=1);

namespace Kata;

interface FrameInterface
{
    public function addAnotherThrow(int $pinCount): void;

    public function isComplete(): bool;

    public function getPinCount(): int;

    public function isSpare(): bool;

    public function isStrike(): bool;

    public function getPinCountNextThrow();

    public function getPinCountSecondNextThrow();

    public function getFirstThrow();

    public function getSecondThrow();

    public function setNextFrame(FrameInterface $nextFrame): void;

}
