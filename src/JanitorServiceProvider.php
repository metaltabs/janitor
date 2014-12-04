<?php
namespace Janitor;

use Illuminate\Support\ServiceProvider;
use Janitor\Entities\Codebase;

class JanitorServiceProvider extends ServiceProvider
{
	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->config->package('anahkiasen/janitor', __DIR__.'/../config');

		// Define codebase
		$this->app->singleton('Janitor\Entities\Codebase', function ($app) {
			return new Codebase($app['path'], $app['config']->get('janitor::ignored'));
		});

		$this->commands(array(
			'Janitor\Commands\CleanViews',
		));
	}
}