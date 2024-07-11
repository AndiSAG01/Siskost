<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected function redirectTo()
    {
        if (auth()->user()->isAdmin == 1){
            
            toast('Anda Berhasil Login','success');
            return route('dashboard');
        }

        toast('Anda Berhasil Login','success');
        return'/';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:13'],
            'gender' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif, min:2024'],
        ]);
    }
    
    protected function create(array $data)
    {
        try {
            // Validate the data
            $this->validator($data)->validate();
        } catch (ValidationException $e) {
            // If validation fails, redirect back with errors and input data
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    
        // Create the user
        $user = User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'isAdmin' => 0,
            'image' => $data['image'] ?? null, // Ensure null if no image provided
        ]);
    
        // Store the image using Laravel Media Library
        if (isset($data['image'])) {
            $user->addMediaFromRequest('image')->toMediaCollection('image');
        }

        return $user;
    }
}
