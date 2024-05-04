<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Loans;

class LoanControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_update_a_loan()
    {
        $loan = Loans::factory()->create([
            'amount' => 10000,
            'duration' => 12,
            'inter_rate' => 5,
        ]);

        $data = [
            'amount' => 12000,
            'duration' => 18,
            'inter_rate' => 6,
        ];

        $response = $this->put("/api/loans/{$loan->id}", $data);

        $response->assertStatus(200);

        $loan->refresh();

        $this->assertEquals($data['amount'], $loan->amount);
        $this->assertEquals($data['duration'], $loan->duration);
        $this->assertEquals($data['inter_rate'], $loan->inter_rate);
    }
}
