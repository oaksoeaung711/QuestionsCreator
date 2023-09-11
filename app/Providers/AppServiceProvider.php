<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*',function($view){
            $ls1 = ["I","II","III","IV","V","VI","VII","VIII","X","X","XI","XII","XIII","XIV","XV","XVI","XVII","XVIII","XIX","XX"];
            $ls2 = ["i","ii","iii","iv","v","vi","vii","viii","ix","x","xi","xii","xiii","xiv","xv","xvi","xvii","xviii","xix","xx"];
            $ls3 = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t"];
            $ls4 = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T"];
            $ls5 = ["က","ခ","ဂ","ဃ","င","စ","ဆ","ဇ","ဈ","ည","ဋ","ဥ","ဍ","ဎ","ဏ","တ","ထ","ဒ","ဓ","န"];
            $ls6 = ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20"];
            $ls7 = ["၁","၂","၃","၄","၅","၆","၇","၈","၉","၁၀","၁၁","၁၂","၁၃","၁၄","၁၅","၁၆","၁၇","၁၈","၁၉","၂၀"];

            $view->with('ls1',$ls1)
                ->with('ls2',$ls2)
                ->with('ls3',$ls3)
                ->with('ls4',$ls4)
                ->with('ls5',$ls5)
                ->with('ls6',$ls6)
                ->with('ls7',$ls7);
        });
    }
}
