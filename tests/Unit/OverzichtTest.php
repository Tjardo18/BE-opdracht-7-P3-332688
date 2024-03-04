<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Tests\TagParser;

class OverzichtTest extends TestCase
{
    public function test_it_parses_a_tag()
    {
        $parser = new TagParser;

        $result = $parser->parse('Jamin');
        $expected = ['Jamin'];
        $this->assertSame($expected, $result);
    }

    public function test_it_parses_a_comma_seperated_list_of_tags()
    {
        $parser = new TagParser;

        $result = $parser->parse('Jamin, Leverancier, Magazijn');
        $expected = ['Jamin', 'Leverancier', 'Magazijn'];
        $this->assertSame($expected, $result);
    }
}
