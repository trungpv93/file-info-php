<?php

namespace Trungpv93\FileInfoPHP;

use Illuminate\Support\ServiceProvider;
use Trungpv93\FileInfoPHP\FileInfo;

class FileInfoPHPServiceProvider extends ServiceProvider
{
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(FileInfo::class, function()
        {
            return new FileInfo();
        });
    }
}
