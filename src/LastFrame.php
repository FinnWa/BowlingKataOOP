<?php

declare(strict_types=1);

namespace Kata;

final class LastFrame implements FrameInterface
{

    private ?int $thirdThrow = null;
    private ?int $secondThrow = null;

    public function __construct(private readonly int $firstThrow)
    {
        if ($this->firstThrow < 0 || $this->firstThrow > 10) {
            throw new \RuntimeException('invalid first throw');
        }

        if ($this->secondThrow < 0 || $this->secondThrow > 10) {
            throw new \RuntimeException('invalid first throw');
        }
    }


    public function addAnotherThrow(int $pinCount): void
    {
        if ($pinCount > 10 || $pinCount < 0) {
            if ($this->secondThrow !== null) {
                throw new \RuntimeException('invalid second throw');
            }

            throw new \RuntimeException('invalid third throw');
        }

        if ($this->secondThrow === null) {
            $this->secondThrow = $pinCount;
        } else {
            $this->thirdThrow = $pinCount;
        }
    }


    public function isComplete(): bool
    {
        if ($this->firstThrow === null || $this->secondThrow === null){
            return false;
        }

        return ($this->firstThrow + $this->secondThrow) < 10 || $this->thirdThrow !== null;
    }

    public function getPinCount(): int
    {
        return ($this->firstThrow + $this->secondThrow + $this->thirdThrow);
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

    public function getThirdThrow(): int
    {
        return $this->thirdThrow;
    }

    public function getPinCountNextThrow(): int
    {
        return 0;
    }

    public function getPinCountSecondNextThrow(): int
    {
        return 0;
    }

    public function setNextFrame(FrameInterface $nextFrame): void
    {
    }
}
