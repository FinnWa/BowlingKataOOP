<?php

declare(strict_types=1);

namespace Kata;

use http\Exception\RuntimeException;

class Frame implements FrameInterface
{
    private ?int $secondThrow = null;
    private ?FrameInterface $nextFrame = null;


    public function __construct(private readonly int $firstThrow)
    {
        if ($this->firstThrow < 0 || $this->firstThrow > 10) {
            throw new \RuntimeException('invalid first throw');
        }
    }

    public function addAnotherThrow(int $pinCount): void
    {
        if ($pinCount + $this->firstThrow > 10 || $pinCount < 0) {
            throw new \RuntimeException('invalid second throw');
        }

        $this->secondThrow = $pinCount;
    }

    public function isComplete(): bool
    {
        return $this->firstThrow === 10 || $this->secondThrow !== null;
    }

    public function getPinCount(): int
    {
        return $this->firstThrow + $this->secondThrow;
    }

    public function isSpare(): bool
    {
        return $this->firstThrow + $this->secondThrow === 10;
    }

    public function isStrike(): bool
    {
        return $this->firstThrow === 10;
    }

    public function getFirstThrow(): int
    {
        return $this->firstThrow;
    }

    public function getSecondThrow(): int
    {
        return $this->secondThrow;
    }


    public function getPinCountNextThrow(): int
    {
        if ($this->nextFrame === null){
            return 0;
        }

        return $this->nextFrame->getFirstThrow();
    }

    public function getPinCountSecondNextThrow():int
    {
        if (!$this->nextFrame->isStrike()){
            return $this->nextFrame->getSecondThrow();
        }

        return $this->nextFrame->getPinCountNextThrow();
    }

    public function setNextFrame(FrameInterface $nextFrame): void
    {
        $this->nextFrame = $nextFrame;
    }
}
