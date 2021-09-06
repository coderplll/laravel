<?php

namespace App\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider implements DeferrableProvider
{
  /**
   * Register services.
   *
   * @return void
   */
  public function register()
  {
    $this->app->bind('Food', 'Apple');
    $this->app->when('Apple')->needs('$weight')->give('100');
  }

  /**
   * Bootstrap services.
   *
   * @return void
   */
  public function boot()
  {
    //
  }

  public function provides()
  {
    return [Food::class];
  }
}
