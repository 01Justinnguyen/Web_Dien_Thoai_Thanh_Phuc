<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use App\Http\Middleware\checkAdmin;
use App\Http\Requests\Admin\Auth\checkLogin;
use App\Http\Requests\Admin\Auth\loginRequest;
use App\Http\Requests\Admin\Auth\PasswordRequest;
use App\Http\Requests\Admin\Auth\RegisterRequest;
use App\Jobs\sendMailJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMail;
use Carbon\Carbon;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function viewLogin()
    {
        return view('admin.page.auth.login');
    }

    public function viewRegister()
    {
        return view('admin.page.auth.register');
    }

    public function viewForget()
    {
        $password = Admin::all();
        return view('admin.page.auth.forgot', compact('password'));
    }

    public function viewForget2()
    {
        return view('admin.page.auth.forgot2');
    }

    public function CheckForget(checkLogin $request)
    {
        // $data = $request->only('email', 'password');
        // // $taiKhoan   = Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password]);
        // $taiKhoan   = Auth::guard('admin')->attempt($data);
        // if($taiKhoan){
        //         return response()->json(['status' => true, 'message' => 'You need to confirm your account!!']);
        //     } else {
        //         return response()->json(['status' => false, 'message' => 'Logged in successfully!']);
        //     }
        $data = $request->all();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        $title_mail = "Lay lai mat khau".' '.$now;
        $user = Admin::where('email','=',$data['email_account'])->get();
        foreach ($user as $value) {
            $user_id = $value->id;
        }

    if($user){
        $count_user = $user->count();
        if($count_user==0){
            return redirect()->back()->with('error', 'Email chua duoc dang ky de khoi phuc mat khau');
        }else {
            $token_random = Str::random();
            $user = Admin::find($user_id);
            $user->token = $token_random;
            $user->save();

            $to_email = $data['email_account'];
            $link_reset_pass = url('/update-new-pass?email='.$to_email.'&token='.$token_random);

            $data = array('name'=>$title_mail,'body'=>$link_reset_pass,'email'=>$data['email_account']);

            // Mail::to($request->email)->send(new registerUser($data));
            Mail::send('mail.welcome',['data'=>$data], function($message) use ($title_mail,$data){
                $message->to($data['email'])->subject($title_mail);
                $message->from($data['email'],$title_mail);
            });
            return redirect()->back()->with('message', 'Gui mail thanh cong,vui long vao email de reset password');
        }
    }
    }



    public function register(RegisterRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $data['hash'] = Str::uuid();

        Admin::create($data);

        toastr()->success('Your admin account has been created successfully!');

        $dataMail['fullname'] = $request->fullname;
        // Mail::to($request->email)->send(new RegisterMail($dataMail));

        sendMailJob::dispatch($request->email, $dataMail);

        return redirect('/admin/login');
    }

    public function login(LoginRequest $request)
    {

        $data = $request->only('email', 'password');

        $admin = Auth::guard('admin')->attempt($data);

       if($admin){
            toastr()->success('Đăng nhập thành công');
            return redirect('/');
        } else {
            toastr()->error('Bạn nhập sai mât khẩu hoặc tài khoản');
            return redirect('/admin/login');
        }
    }

    public function Logout()
    {
        // $id = Auth::id();
        Auth::logout();
        return redirect('/admin/login');
    }


    public function newPass(PasswordRequest $request)
    {
        dd($request->toArray());
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
