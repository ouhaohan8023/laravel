<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

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
        // $schedule->command('inspire')
        //          ->hourly();
        $schedule->call(function () {
            $data = DB::table('la_love_novel_ip')->where('l_done','=',0)->get();
            foreach($data as $k => $v){
                $addr = getCity($v->l_ip);
                //                $add['l_id'] = $v['l_id'];
                $add['l_c'] = $addr['country'];
                $add['l_p'] = $addr['region'];
                $add['l_city'] = $addr['city'];
                $add['l_done'] = 1;
                DB::table('la_love_novel_ip')->where('l_id','=',$v->l_id)->update($add);
            }
        })->daily();
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
