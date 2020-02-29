<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;


class ExampleTest extends TestCase
{
    /** @test */
    public function it_hashes_a_provided_password()
    {
        $password = Hash::shouldReceive('make')->andReturn('mocked_pass');
        $response = $this->post('/password',[compact($password)]);
        $this->assertEquals($response->getContent(), 'mocked_pass');
    }
}
