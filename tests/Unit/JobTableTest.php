<?php

use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

uses(TestCase::class);

it('checks if jobs table exists', function () {
    $this->assertTrue(Schema::hasTable('jobs'));
})->group('jobs');
