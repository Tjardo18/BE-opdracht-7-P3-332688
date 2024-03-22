<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class AllergiesProcedureTest extends TestCase
{
    use DatabaseTransactions;

    /** @test it returns allergies for given product id */
    public function it_returns_allergies_for_given_product_id(): void
    {
        // Call the stored procedure
        $productId = 1;
        $results = DB::select('CALL getAllergien(?)', [$productId]);

        // Assert that the result is not empty
        $this->assertNotEmpty($results);

        // Assert that the expected columns are present in the result
        $this->assertArrayHasKey('ANaam', (array)$results[0]);
        $this->assertArrayHasKey('omschrijving', (array)$results[0]);
    }

    /** @test it returns empty array for invalid product id */
    public function it_returns_empty_array_for_invalid_product_id(): void
    {
        // Call the stored procedure
        $productId = 2; // This product doesn't have allergies
        $results = DB::select('CALL getAllergien(?)', [$productId]);

        // Assert that the result is empty
        $this->assertEmpty($results);
    }
}
