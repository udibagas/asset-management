<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// akan menghapus token yang sudah expired dalam 24 jam terakhir
// script ini akan dijalankan setiap hari
Schedule::command('sanctum:prune-expired --hours=24')->daily();
