<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Mail\RegisterUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    // public function viewRegister()
    // {
    //     return view('client.auth.register');
    // }

    public function register(RegisterRequest $request){
        $data = $request->all();
        $data['hash'] = Str::uuid();
        $data['password'] = bcrypt($request->password);
        User::create($data);

        $dataMail['name']    = $request->name;
        $dataMail['hash']        = $data['hash'];


        // sendMailJob::dispatch($request->email, $dataMailX);

        Mail::to($request->email)->send(new RegisterUser($dataMail));
        // for($i = 0; $i < 4; $i++)
        //     Mail::to('quoclong.sv@gmail.com')->send(new registerMail($dataMailX));

        return response()->json(['data' => true]);

    }
    // public function viewLogin()
    // {
    //     return view('client.auth.login');
    // }
    public function Login(LoginRequest $request)
    {
        $data = $request->only('email', 'password');

        if(Auth::attempt($data)){
            $taiKhoan = Auth::user();
            if($taiKhoan['type'] == -1){
                return response()->json(['status' => 1, 'message' => 'Your account has not been vetified yet!']);
            } else {
                return response()->json(['status' => 2, 'message' => 'Login successfully']);
            }
        } else {
            return response()->json(['status' => 0, 'message' => 'Your email or pass is wrong']);
        }
    }
    public function Active($xxx)
    {
        $taiKhoan = User::where('hash', $xxx)->first();
        if($taiKhoan){
            if($taiKhoan->type == 0){
            toastr()->warning('Your account verified!!!');
            return redirect('/loginRegister');
        }else {
            $taiKhoan->type = 0;
            $taiKhoan->save();
            toastr()->success('Your account has just been verified!!');
            return redirect('/loginRegister');
            }
        } else {
            toastr()->error('Verify code is not right');
        }
    }
    public function viewForget()
    {
        return view('client.auth.forget');
    }
    public function forget(Request $request)
    {

    $data = $request->all();
    $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
    $title_mail = "Lay lai mat khau".' '.$now;
    $user = User::where('email','=',$data['email_account'])->get();
    foreach ($user as $value) {
        $user_id = $value->id;
    }

    if($user){
        $count_user = $user->count();
        if($count_user==0){
            toastr()->warning('Email chua duoc dang ky de khoi phuc mat khau!!');
            return redirect()->back();

        }else {
            $token_random = Str::random();
            $user = User::find($user_id);
            $user->token = $token_random;
            $user->save();

            $to_email = $data['email_account'];
            $link_reset_pass = url('/update-new-pass?email='.$to_email.'&token='.$token_random);

            $data = array('name'=>$title_mail,'body'=>$link_reset_pass,'email'=>$data['email_account']);

            // Mail::to($request->email)->send(new registerUser($data));
            Mail::send('mail.resetMail',['data'=>$data], function($message) use ($title_mail,$data){
                $message->to($data['email'])->subject($title_mail);
                $message->from($data['email'],$title_mail);
            });
            toastr()->success('Gui mail thanh cong,vui long vao email de reset password!!');
            return redirect()->back();
        }
    }
    }


    public function updateNewPass(Request $request)
    {
        $meta_desc = "Quen mat khau";
        $meta_keywords = "Ques Mat Khau";
        $meta_title = "Quen Mat Khau";
        $url_canonical = $request->url();
        return view('client.auth.repass',compact('meta_desc','meta_keywords','meta_title','url_canonical'));
    }
    public function ResetPass(Repass $request)
    {
       $data = $request->all();
       $token_random = Str::random();
       $user = User::where('email','=',$data['email'])->where('token','=',$data['token'])->get();
       $count = $user->count();
       foreach ($user as $value) {
        $user_id = $value->id;
    }
       if($count>0){

           $reset = User::find($user_id);
           $reset->password = bcrypt($data['password']);
           $reset->token = $token_random;
           $reset->save();
           toastr()->success('Mat khau da cap nhat moi. quay lai trang dang nhap!!');
           return redirect('/login');

       }else{
           toastr()->error('vui long nhap lai email vi link nay da qua han!!');
           return redirect('client.auth.forget');

       }
    }
    public function viewChange()
    {
        return view('client.auth.change');
    }
    public function changePass(ChangePass $request)
    {
        $data = $request->only('email', 'password');
        $user = $request->all();
        if(Auth::attempt($data)){
            $taiKhoan = Auth::user();
            $taiKhoan->password = bcrypt($user['newPass']);
            $taiKhoan->save();
            toastr()->success('Mat khau da cap nhat moi. quay lai trang dang nhap!!');
            return redirect('/login');

        } else {
            return response()->json(['status' => 0, 'message' => 'Your email or pass is wrong']);
        }




    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function reset()
    {
        return view('client.auth.reset');
    }

}









