<?php

namespace App\Providers;

use App\Nova\AboutAthar;
use App\Nova\ContactUs;
use App\Nova\Fund;
use App\Nova\FundingEntity;
use App\Nova\HeroSection;
use App\Nova\HowItWork;
use App\Nova\HowItWorkItem;
use App\Nova\MainStatistic;
use App\Nova\Opportunity;
use App\Nova\PoliciesAndTerms;
use App\Nova\Sdj;
use App\Nova\SocialMedia;
use App\Nova\User;
use App\Nova\WhyAthar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        Nova::style('custom-fields-css', public_path('css/custom.css'));
        Nova::mainMenu(function (Request $request) {
            return [
                MenuSection::make(__('Home Page'), [
                    MenuItem::make('Hero Sections', '/resources/hero-sections/1'),
                    MenuItem::make('About Athar', '/resources/about-athars/1'),
                    MenuItem::make('Why Athar', '/resources/why-athars/1'),
                    MenuItem::resource(MainStatistic::class),
                    MenuItem::make('How It Works', '/resources/how-it-works/1'),
                    MenuItem::make('Contact Us', '/resources/contact-uses/1'),
                    MenuItem::resource(SocialMedia::class),
                    MenuItem::resource(PoliciesAndTerms::class),
                ])->icon('home')->collapsable(),

                MenuSection::make(__('Users'), [
                    MenuItem::resource(User::class),
                ])->icon('user')->collapsable(),

                MenuSection::make(__('Opportunities'), [
                    MenuItem::resource(Opportunity::class),
                    MenuItem::resource(Fund::class),
                    MenuItem::resource(Sdj::class),
                    MenuItem::resource(FundingEntity::class),
                ])->icon('chart-bar')->collapsable(),

            ];
        });
        Nova::footer(function ($request) {
            return Blade::render('
                @env(\'prod\')
                    This is production!
                @endenv
            ');
        });
        Nova::enableRTL();
    }
    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [];
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

    protected function resources()
    {
        Nova::resourcesIn(app_path('Nova'));
    }
}
