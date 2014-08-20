<?php namespace Jonathansudhakar\Botdetector;

use Illuminate\Support\ServiceProvider;

class BotdetectorServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('jonathansudhakar/botdetector');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['botdetector'] = $this->app->share(function($app)
	  {
	    return new Botdetector;
	  });

		$this->app->booting(function()
		{
		  $loader = \Illuminate\Foundation\AliasLoader::getInstance();
		  $loader->alias('Botdetector', 'Jonathansudhakar\Botdetector\Facades\Botdetector');
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('botdetector');
	}

}
