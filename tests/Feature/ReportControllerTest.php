<?php

namespace Tests\Feature;

use Tests\TestCase;

class ReportControllerTest extends TestCase
{
    public function testReport()
    {
        $response = $this->get('/api/report');
        $response->assertStatus(200);
    }
}
