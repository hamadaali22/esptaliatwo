<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
class expiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'expire users every 5 minute ';

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
     * @return int
     */
    public function handle()
    {
        $users = User::where('expire',0)->get();
        foreach ($users as $user) {

            $SERVER_API_KEY = 'AAAA12iRXek:APA91bHSmMEKt_Vi3RamfrBtk5R6p6hN5w0qsj5NotG5Xa5ttX1TudSPZLHBiUEXV4jKQ6CZBb1Cm_142nJroxyVU-3LRfQUYyz2ainfRFqIOdf1srFSU5RTsIgcI1LT1TtWPNf5TwXZ';
            $doctors= Doctor::selection()->where('id',$request->doctorId)->first();
            $patients= Patient::selection()->where('id',$request->patientId)->first();
            // dd($patients);
            $token_1 = $patients->device_token;
            $name = $doctors->first_name;
            $message='' ;
            if(isset($request->lang)  && $request -> lang == 'en' ){
                $message= 'You have an appointment in three hours';
            }else{
                $message='لديك موعد بعد ثلاث سعات';
            }
            
            $data = [
                "registration_ids" => [
                    $token_1
                ],
                "notification" => [
                    "title" => 'Espitalia',
                    "body" => $message,
                    "sound"=> "default" // required for sound on ios
                ],
            ];

            $dataString = json_encode($data);
            $headers = [
                'Authorization: key=' . $SERVER_API_KEY,
                'Content-Type: application/json',
            ];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
            $response = curl_exec($ch);
            
            $user->update(['expire'=>1]);
        }
    }
}
