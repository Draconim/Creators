<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Event;
use App\Models\Event_User_Status;
use Nette\Utils\DateTime;

class eventDateChecker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'eventdatecheck:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set the status of outdated events to 3 automaticly in the event_users_status table, where the status_id is 1';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

                $getEvents = Event::where('check_in_time', '<', new DateTime('now'))->get();
                foreach ($getEvents as $event) {
                    $getKey = Event_User_Status::where('event_id', '=',$event->id)->where('status_id', '=', 1)->get();
                    foreach ($getKey as $key) {
                        $key->status_id = 3;
                        $key->save();
                    }
                }
            
    }    
}
