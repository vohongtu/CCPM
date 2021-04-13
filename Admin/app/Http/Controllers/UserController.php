<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\User;
use Socialite;
class UserController extends Controller
{
    public function getLogin(){
        return view ('login');
    }
    public function Login(Request $request)
    {
        $email=$request->input('Username');
        $password=$request->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])){

            $user=User::where('email', $email)->first();
            $name=$user->name;
         //   $level=$user->level;
            Session::put('id_user',$user->id);
            Session::put('name_admin',$name);
            Session::put('name_user',$name);
            if (Auth::user()->level==1) {
               
                return redirect()->route('doctor');
              }else{
                return view('index');
              }
           
        //    Session::put('level',$level);
          
        
            
           
            
          }else{
            $error="Sai Email Hoặc Mật Khẩu";
            return view('login',compact('error'));
  
          }

    }
    public function doctor(){
        
        $list = DB::table('booking') ->join('calendar', 'booking.id_calendar', '=', 'calendar.id')
        ->join('users', 'calendar.id_doctor', '=', 'users.id')
        ->where('id_doctor',Session::get('id_user'))
       ->select('calendar.Time','calendar.Date','calendar.Time','calendar.Notes','users.name', 'booking.*')
       ->get();
        
        
        return view ('doctor',compact('list'));
    }

    public function Booking(){
        $booking = DB::table('booking')->join('calendar', 'booking.id_calendar', '=', 'calendar.id')
         ->join('users', 'calendar.id_doctor', '=', 'users.id')
        ->select('calendar.Time','calendar.Date','calendar.Time','calendar.Notes','users.name', 'booking.*')
        ->get();
        
        return view('booking',compact('booking'));
    }
    public function Calendar(){
        $dr = DB::table('users')->where('level', 1)->get();
        $drr = DB::table('calendar')->join('users', 'calendar.id_doctor', '=', 'users.id')
        ->select('calendar.*', 'users.name')
        ->get();
        return view('Calendar',compact('dr','drr'));
    }


    public function AddCalendar(Request $request){
       $id_dr = $request->doctor;
       $Date = $request->Date;
       $Time = $request->Time;
       $note =  $request->Note;
       $today = date("Y-m-d");
        
        if (strtotime($today) > strtotime($Date)) {
        echo "Yesterday";
        } else {
       //   // DB::table('calendar')->insert(['id_doctor'=>$id_dr,'Date'=>$Date,'Time'=>$Time,'Notes'=>$note]);
        $check = DB::table('calendar')->where('Date',$Date)->where('Time',$Time)->where('id_doctor',$id_dr)->first();
        //  echo $check->Date;
        if($check)
        {    
            echo "failed";
        }else{
            echo "oke";
            DB::table('calendar')->insert(['id_doctor'=>$id_dr,'Date'=>$Date,'Time'=>$Time,'Notes'=>$note]);
        
            //return view ('ajax_calendar');
        }
        }
    
       
    // return view('index');
        
        
    }

    
}
