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
        return view('admin.page.auth.forgot');
    }

    public function CheckForget(Request $request)
    {
        $data['email'] = $request->email;
        // $taiKhoan   = Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password]);
        // $taiKhoan   = Auth::guard('user')->attempt($mangLogin);
        if(Auth::guard('admin')->attempt($data) == Auth::user()){
                return response()->json(['status' => true, 'message' => 'You need to confirm your account!!']);
            } else {
                return response()->json(['status' => false, 'message' => 'Logged in successfully!']);
        // } else {
        //     return response()->json(['status' => false, 'message' => 'You entered the wrong password or account!']);
        }
        // $data = $request->all();
        // if(Auth::guard('admin')->check())
        // {
        //         return response()->json(['status' => true, 'message' => 'You need to confirm your account!!']);
        // } else {
        //         return response()->json(['status' => false, 'message' => 'NONE!!']);
        // }
    }

    public function viewForget2()
    {
        return view('admin.page.auth.forgot2');
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
