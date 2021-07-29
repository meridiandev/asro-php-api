<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class SanctumApiAuthTest extends TestCase
{
    /**
     * @test
     */
    public function test_index()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function test_login()
    {
        $response = $this->get('/api/signin');

        $response->assertStatus(405);
    }

    /**
     * @test
     */
    public function test_logout()
    {
        $response = $this->get('/api/signout');

        $response->assertStatus(405);
    }
}
