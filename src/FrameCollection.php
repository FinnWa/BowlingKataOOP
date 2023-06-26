<?php

declare(strict_types=1);

namespace Kata;

use Traversable;

final class FrameCollection implements \IteratorAggregate
{
    /** @var array<FrameInterface> */
    private array $frames = [];

    public function add(FrameInterface $frame): void
    {
        if($this->frames !== []){
        $lastFrame = $this->frames[array_key_last($this->frames)];
        $lastFrame->setNextFrame($frame);
        }

        $this->frames[] = $frame;

    }

    public function nextIsLastFrame(): bool
    {
        return count($this->frames) === 9;
    }

    public function frames(): array
    {
        return $this->frames;
    }

    public function getIterator(): Traversable
    {
        return new \ArrayIterator($this->frames);
    }
}
