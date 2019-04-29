<?php
require_once('./../vendor/autoload.php');
require('./train-002-moleculeParse.php');

use PHPUnit\Framework\TestCase;

final class AhorcadoTest extends TestCase
{
    public function testDescriptionExamples() {
        $this->assertEquals(['H' => 2, 'O' => 1], parse_molecule('H2O'), 'Your function should correctly parse a molecule of water');
        $this->assertEquals(['Mg' => 1, 'O' => 2, 'H' => 2], parse_molecule('Mg(OH)2'), 'Your function should correctly parse magnesium hydroxide');
        $this->assertEquals(['K' => 4, 'O' => 14, 'N' => 2, 'S' => 4], parse_molecule('K4[ON(SO3)2]2'), 'Your function should work for Fremy\'s salt');
    }
}