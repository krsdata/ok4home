<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;
use Session;
use Modules\Countries\Entities\Countrylangs;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Carbon\Carbon::setLocale(config('app.locale'));

        $subdomain = url('/');

        $defaultUrl = env('BASE_URL');

      //  dd(Session::flush());//

        $subdomain = str_replace(array('http://','https://','https://www.','http://www.',".".$defaultUrl), "", $subdomain);

        switch ($subdomain) {
            case 'india':
                \Carbon\Carbon::setLocale(config('app.locale'));
                \App::setLocale('en');

                break;
            case 'thailand':
                \Carbon\Carbon::setLocale(config('app.locale'));
                 \App::setLocale('th');
            default:
                \Carbon\Carbon::setLocale(config('app.locale'));
                \App::setLocale('en');
                break;
        }
       
       // $countryLanguage = Countrylangs::with('languages')->where('created_country_id',1)->where(array('is_active'=>'1','isDefault'=>1))->first();

        // dd($countryLanguage);

        // $CountryArr=array();
   
        // $CountryArr['id']=$userCountry->id;
        // $CountryArr['name']=$userCountry->name;
        // $CountryArr['flag']=$userCountry->flag;
        // $CountryArr['code']=$userCountry->code;
        // $CountryArr['callingCodes']=$userCountry->callingCodes;
        // $CountryArr['created_country_id']=$userCountry['countries']->id;
        // $CountryArr['symbol']=$userCountry->symbol;

        // Session::put('fcountry',$CountryArr); 

        // Session::put('locale',App::getLocale());

        
       \View::share('lang',App::getLocale());


    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
