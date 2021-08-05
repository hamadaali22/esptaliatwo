<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Doctor;
use App\Patient;
use App\Speciality;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $appointments=Appointment::all();

        foreach ($appointments as $item) {
            
            // $item->doctor= Doctor::where('id',$item->doctorId)->first('name')->name;
            // $item->doctorid= Doctor::where('id',$item->doctorId)->first('id')->id;
            $item->doctor= Doctor::where('id',$item->doctorId)->first();
            
            // $item->patient= Patient::where('id',$item->patientId)->first('name')->name;
            $item->patient= Patient::where('id',$item->patientId)->first();

            $item->category= Speciality::all();

        }
       // dd($appointments);
        return view('admin.appointment-list',compact('appointments'));
    }


    public function destroy(Appointment $appointment)
    {        
            $appointment->delete();                     
            return redirect('appointments')->with("message",'تم مسح العنصر بنجاح'); 
           //return back()->route('admin/specialities');
    } 


    public function updateStatus(Request $request)
    {
        $user = Appointment::findOrFail($request->appointmentId);
        $user->status = $request->status;
        
        $user->save();

        return redirect()->route('appointments.index')->with("message", 'تم التعديل بنجاح');
    }

    public function doctornotifaction()
    {
        $doctors= Doctor::all();
        return view('admin.sendnotification.doctors',compact('doctors'));
    }

     public function doctor_Notifaction(Request $request)
    {
        // dd($request->doctorId);
        // dd($request->message);
        
        
        $length = count($request->device_token);
        if($length > 0)
        {
            for($i=0; $i<$length; $i++)
            {
                $SERVER_API_KEY = 'AAAA12iRXek:APA91bHSmMEKt_Vi3RamfrBtk5R6p6hN5w0qsj5NotG5Xa5ttX1TudSPZLHBiUEXV4jKQ6CZBb1Cm_142nJroxyVU-3LRfQUYyz2ainfRFqIOdf1srFSU5RTsIgcI1LT1TtWPNf5TwXZ';
                $token_1 = $request->device_token[$i];
                $message = $request->message;
                // if(isset($request->lang)  && $request ->lang == 'en' ){
                //     $message= $request->message;
                // }else{
                //     $message= $request->message;
                // }
                
                $data = [
                    "registration_ids" => [
                        $token_1
                    ],
                    "notification" => [
                        "title" => 'Espitalia',
                        "body" =>  $message,
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
                    
            }                      
        }
        return redirect()->back()->with("success","تم الإرسال");       
    }
    public function patientnotifaction()
    {
        $patients= Patient::all();
        return view('admin.sendnotification.patient',compact('patients'));
    }

    public function patient_notifaction(Request $request)
    {
        $length = count($request->device_token);
        if($length > 0)
        {
            for($i=0; $i<$length; $i++)
            {
                $SERVER_API_KEY = 'AAAA12iRXek:APA91bHSmMEKt_Vi3RamfrBtk5R6p6hN5w0qsj5NotG5Xa5ttX1TudSPZLHBiUEXV4jKQ6CZBb1Cm_142nJroxyVU-3LRfQUYyz2ainfRFqIOdf1srFSU5RTsIgcI1LT1TtWPNf5TwXZ';
                $token_1 = $request->device_token[$i];
                $message = $request->message;
                // if(isset($request->lang)  && $request ->lang == 'en' ){
                //     $message= $request->message;
                // }else{
                //     $message= $request->message;
                // }
                
                $data = [
                    "registration_ids" => [
                        $token_1
                    ],
                    "notification" => [
                        "title" => 'Espitalia',
                        "body" =>  $message,
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
                    
            }                      
        }
        return redirect()->back()->with("success","تم الإرسال");       
    }
}
