<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('openings:deactivate-expired', function () {
    $count = \App\Models\Opening::deactivateExpired();
    $this->info("Deactivated {$count} expired opening(s).");
})->purpose('Mark job openings past their closes_at date as inactive');

Schedule::command('openings:deactivate-expired')->hourly();
