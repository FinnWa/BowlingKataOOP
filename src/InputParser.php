<?php

declare(strict_types=1);

namespace Kata;


final class InputParser
{
    public function parse(string $input): FrameCollection
    {
        $frames = new FrameCollection();

        $pinCounts = explode(',', $input);

        $frame = null;

        foreach ($pinCounts as $pinCount) {
            $pinCount = (int)$pinCount;

            if ($frame === null || $frame->isComplete()) {
                $frame = $frames->nextIsLastFrame() ? new LastFrame($pinCount) : new Frame($pinCount);
            } else {
                $frame->addAnotherThrow($pinCount);
            }

            if ($frame->isComplete()) {
                $frames->add($frame);
            }
        }


        return $frames;
    }
}
