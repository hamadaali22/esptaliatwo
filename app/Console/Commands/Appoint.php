<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Appointment;
use Carbon\Carbon;
use DateTime;
class Appoint extends Command
{
    
    protected $signature = 'appoint:expire';

    protected $description = 'expire users every 5 minute ';

    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        $appointments = Appointment::where('expire',0)->get();

        foreach ($appointments as $item) {
            $patients= Patient::where('id',$item->patientId)->first();

            $time = new DateTime();
            $time->modify('+2 hours');

            $t1  = strtotime($item->time);
            $t2  = strtotime("3:00");
            $val = gmdate('H:i',  $t1 + $t2) ;
            if ($time->format("H:i") == $val) {
                 $SERVER_API_KEY = 'AAAA12iRXek:APA91bHSmMEKt_Vi3RamfrBtk5R6p6hN5w0qsj5NotG5Xa5ttX1TudSPZLHBiUEXV4jKQ6CZBb1Cm_142nJroxyVU-3LRfQUYyz2ainfRFqIOdf1srFSU5RTsIgcI1LT1TtWPNf5TwXZ';
                
                $token_1 = $patients->device_token;
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
                $item->update(['expire'=>1]);
            }else{
                $item->update(['expire'=>1]);
                // dd('nono');
                // $item->update(['expire'=>1]);
            }
            
        }    
    }
    
}
