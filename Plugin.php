<?php namespace StudioAzura\TawkTo;

use Backend;
use System\Classes\PluginBase;

/**
 * TawkTo Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'TawkTo',
            'description' => 'studioazura.tawkto::lang.plugin.description',
            'author'      => 'Studio Azura',
            'icon'        => 'icon-comments-o',
            'homepage'    => 'https://studioazura.com',
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'StudioAzura\TawkTo\Components\Chat' => 'chat',
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'studioazura.tawkto::lang.settings.label',
                'description' => 'studioazura.tawkto::lang.settings.description',
                'icon'        => 'icon-comments-o',
                'class'       => 'StudioAzura\TawkTo\Models\Settings',
                'keywords'    => 'tawkto chat settings config',
                'order'       => 500,
                'permissions' => ['studioazura.tawkto.manage_settings'],
              ],
        ];
    }
    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'studioazura.tawkto.manage_settings' => [
                'label' => 'Manage TawkTo Chat Settings',
                'tab' => 'TawkTo Chat',
            ]
        ];
    }
}
