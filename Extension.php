<?php namespace Pixels\OrderManager;

use Pixels\OrderManager\Classes\Manager;
use System\Classes\BaseExtension;

/**
 * AppCompanion Extension Information File
 */
class Extension extends BaseExtension
{
    /**
     * Register method, called when the extension is first registered.
     *
     * @return void
     */
    public function register()
    {
        try {
            Manager::instance()->syncWithAppServer();
        } catch (\Exception $e) {
            // log the error
            log_message('error', $e);
            throw $e;
        }
    }

    /**
     * Boot method, called right before the request route.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this extension.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [];
    }

    /**
     * Registers any admin permissions used by this extension.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [];
    }

    public function registerNavigation()
    {
        return [];
    }

    public function registerSettings()
    {
        return [];
    }
}
