<?php

namespace App\Http\Controllers\Auth;

use App\Jobs\TenantDatabase;
use App\Services\TenantManager;
use App\Tenant;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;

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
    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = route('login');
        $this->middleware('guest');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->redirectTo = 'http://'.$this->seo_friendly_subdomain($request['company_name']).'.'.config('custom.TENANT_DOMAIN').'?success=true';

        $this->validator($request->all())->validate();

        event(new Registered($tenant = $this->create($request->all())));

        TenantDatabase::dispatch($tenant, app(TenantManager::class), $request->all());

        return $this->registered($request, $tenant)
            ?: redirect($this->redirectPath())->with('company_name',$request['company_name']);
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
            'company_name' => ['required', 'string', 'max:30',  Rule::unique('tenants')->where(function ($query) use ($data) {
                return $query->where('slug', $this->seo_friendly_subdomain($data['company_name']));
            })],
            'fullname'=>'required|string',
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'],
            'g-recaptcha-response' => 'required|captcha'
        ],[
            'password.min'=>'Password must contain at least 6 character contains numbers, uppercase, lowercase and unicode symbols',
            'password.regex'=>'Password must contain at least 6 character contains numbers, uppercase, lowercase and unicode symbols'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Tenant
     */
    protected function create(array $data)
    {
        return Tenant::create([
            'company_name' => $data['company_name'],
            'slug' => $this->seo_friendly_subdomain($data['company_name']),
        ]);
    }

    private function seo_friendly_subdomain($string){
        $string = str_replace(array('[\', \']'), '', $string);
        $string = preg_replace('/\[.*\]/U', '', $string);
        $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
        $string = htmlentities($string, ENT_COMPAT, 'utf-8');
        $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
        $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
        return strtolower(trim($string, '-'));
    }
}
