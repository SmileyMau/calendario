<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReminderEmail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SendReminderEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-reminder-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia correos de recordatorio a los usuarios cuando se cumple su fecha';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Obtener usuarios cuya fecha de recordatorio sea hoy
        $today = Carbon::today()->toDateString();
        $eventos = DB::table('eventos')
        ->join('users','eventos.id_user','users.id')
        ->select('eventos.*','users.name','users.last_name','users.email')     
        //->where('fecha_fin','<=',$today)
        ->where('eventos.id','=',1)
        ->get();
        //dd($eventos);

        foreach ($eventos as $evento) {
            Mail::to($evento->email)->send(new ReminderEmail($evento));
            $this->info('Correo enviado a: ' . $evento->email);
        }
 
        return Command::SUCCESS;
    }
}
