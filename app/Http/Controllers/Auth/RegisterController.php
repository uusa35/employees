<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Children;
use App\Models\EmployeeDegree;
use App\Models\Position;
use App\Models\SocialStatus;
use App\Models\Title;
use App\Models\Transportation;
use App\Models\UniversityService;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'employee_no' => 'required|string|max:255',
            'card_id' => 'required|numeric',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'employee_no' => $request->employee_no,
            'card_id' => $request->card_id,
            'hiring_date' => Carbon::now(),
            'employee_degree_id' => EmployeeDegree::all()->random()->id,
            'social_status_id' => SocialStatus::all()->random()->id,
            'title_id' => Title::all()->random()->id,
            'position_id' => Position::all()->random()->id,
            'certificate_id' => Certificate::all()->random()->id,
            'transportation_id' => Transportation::all()->random()->id,
            'university_service_id' => UniversityService::all()->random()->id,
            'children_id' => Children::all()->random()->id
        ]);
    }
}
