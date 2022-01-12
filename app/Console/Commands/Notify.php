<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyEmail;
use App\User;


class Notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email notify for all users every day';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //$users = User::select('email')->get();///collection 
        $emails = User::pluck('email')->toArray();//array of emails
        foreach($emails as $email){
            // how to send emails in laravel
            //here method that make me send email
            /// to users//here it is event
            $data =['title'=>'programming','body'=>'php'];
            Mail::To($email)->send(new NotifyEmail($data));
        }
    }
}
