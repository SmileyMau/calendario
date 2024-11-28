<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Registrar comandos de consola.
     */
    protected $commands = [
        // Registra aquí tus comandos personalizados, ejemplo:
        // \App\Console\Commands\SendReminderEmails::class,
    ];

    /**
     * Define el programador de tareas.
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('enviarCorreos');
    }

    /**
     * Registra los comandos para la aplicación.
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
