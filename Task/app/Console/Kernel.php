<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;
use App\Mail\WeeklyCompaniesUpdate;
use App\Company;
use Carbon\Carbon;


class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $schedule->call(function () {

            //find in db records created between now and 7 days ago
            $now = Carbon::now();
            $to = $now->toDateTimeString();
            $from = $now->subWeek()->toDateTimeString();

            $newCompanies = Company::whereBetween(
                'created_at',
                [$from, $to]
            )
            ->get();

            Mail::to(env('MAIL_TO'))
                ->send(new WeeklyCompaniesUpdate($newCompanies));
        })->weekly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
