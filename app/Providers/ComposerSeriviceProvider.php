<?php

namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\SearchWordsComposer;

class ComposerSeriviceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composers([
          SearchWordsComposer::class => [
              '*'
          ]
      ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
