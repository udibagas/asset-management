<?php

namespace App\Jobs;

use App\Models\Asset;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class UpdateAssetNotifJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $assets = Asset::all();

        foreach ($assets as $asset) {
            $user = User::first();
            Mail::to($user)->queue(new \App\Mail\UpdateAssetMail($asset));
        }
    }
}
