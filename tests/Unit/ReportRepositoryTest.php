<?php

namespace Tests\Unit;

use App\Entities\Report;
use App\Repositories\ReportRepository;
use Tests\TestCase;

class ReportRepositoryTest extends TestCase
{
    private $repository;

    public function setUp(): void
    {
        parent::setUp();
        $this->repository = new ReportRepository();
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

    public function testSave()
    {
        $this->repository->Save('test');
        $result = Report::where('hacker_id', 'test')->get();
        $this->assertCount(1, $result);
    }

    public function testFetch()
    {
        $result = $this->repository->Fetch();
        $this->assertCount(3, $result);
        $this->assertEquals(5, $result->get('hacker_1')->get('count'));
        $this->assertEquals(3, $result->get('hacker_2')->get('count'));
        $this->assertEquals(1, $result->get('hacker_3')->get('count'));
    }
}
