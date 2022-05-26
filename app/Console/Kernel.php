<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
         Commands\QueueUpdate::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->command('quote_queue:update')->everyMinute();
		 $schedule->command('send_rfi_start_alerts:send')->everyMinute();
		 $schedule->command('send_rfi_end_alerts:send')->everyMinute();
		 $schedule->command('send_rfq_end_alerts:send')->everyMinute();
		 $schedule->command('send_rfq_start_alerts:send')->everyMinute();
		 $schedule->command('rfi_alert:send')->dailyAt('14:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
