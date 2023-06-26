<?php

use Kata\InputParser;

require_once __DIR__.'/../vendor/autoload.php';

$inputParser = new InputParser();

$frames = $inputParser->parse('10,10,10,10,10,10,10,10,10,10,10,10');

$score = new \Kata\scoreCalculator();

var_dump($score->calculate($frames));
