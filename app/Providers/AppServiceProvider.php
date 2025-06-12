<?php

namespace App\Providers;

use App\Models\Service;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Vendor;
use App\Http\View\Composers\OrderComposer;
use App\Models\Contact;
use App\Models\Content;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        $blockedCount = Vendor::where('status', 0)->count();
        $holdCount = Vendor::where('status', 1)->count();
        $ContactCount = Contact::where('seen', 0)->count();
        View::composer('*', OrderComposer::class);
        View::share('blockedCount', $blockedCount);
        View::share('holdCount', $holdCount);
        View::share('ContactCount', $ContactCount);
        // $cms_content = null;
        // $cms_image = null;
        // if (Schema::hasTable(('contents'))) {
        //     $cms_content = Content::all();
        //     $cms_image = explode(',', $cms_content[0]['image']);
        // }
        // View::share('cms_content', $cms_content);
        // View::share('cms_image', $cms_image);
        $cms_content = collect();

        if (Schema::hasTable('contents')) {
            $cms_content = Content::all(); 
        }

        View::share('cms_content', $cms_content);
        View::composer('*', function ($view) {
            $headerServices = Service::where('status', 1)->get();
            $view->with('headerServices', $headerServices);
        });
    }
}
