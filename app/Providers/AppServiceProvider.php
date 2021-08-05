<?php

namespace App\Providers;
use App\ContactInfo;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Notification;
use App\Patient;
use App\User;
use App\Doctor;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // View::composer(['*'], function($view){
        //      $cont = ContactInfo::first();
        //     $view->with('contact',$cont);
        //     dd($cont);
        // });

        $count=0;
        $not=Notification::get(); 
        foreach ($not as $item) {
            if($item->read_at ==''){
                $count +=1;
            }else{
                $count +=0;
            }
        } 
        view()->share('count', $count);

        $notifications= Doctor::with(array('unreadnotifications'=>function($query){
                                    $query;
                                }))->get();
        $patient_notifications= Patient::with(array('unreadnotifications'=>function($query){
                                    $query;
                                }))->get();                         

        view()->share('notifications', $notifications);
        view()->share('patient_notifications', $patient_notifications);
        
        $cont = ContactInfo::first();
        view()->share('contact', $cont);

    }
}
 