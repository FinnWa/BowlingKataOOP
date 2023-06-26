<?php

declare(strict_types=1);

namespace Kata;

final class scoreCalculator
{

    public function calculate(FrameCollection $frameCollection): int
    {
        $score = 0;

        /** @var FrameInterface $frame */
        foreach ($frameCollection as $frame) {
            $score += $frame->getPinCount();

            if ($frame->isSpare()){
                $score += $frame->getPinCountNextThrow();
            }

            if ($frame->isStrike()){
                $score += $frame->getPinCountNextThrow();
                $score += $frame->getPinCountSecondNextThrow();
            }

        }
            return $score;
    }

}
