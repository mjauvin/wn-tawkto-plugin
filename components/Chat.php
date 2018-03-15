<?php namespace Studioazura\TawkTo\Components;

use Cms\Classes\ComponentBase;
use StudioAzura\TawkTo\Models\Settings;

class Chat extends ComponentBase
{
    public $is_active;
    public $site_id;
    public $widget;

    public function componentDetails()
    {
        return [
            'name'        => 'Chat',
            'description' => 'Display chat widget when active'
        ];
    }

    public function defineProperties()
    {
        $settings = new Settings;

        return [
            'siteId' => [
                'title'             => 'Site ID',
                'description'       => 'Site ID for Tawk.to chat widget',
                'type'              => 'string',
                'default'           => $settings::get('site_id'),
            ],
            'widget' => [
                'title'             => 'Widget Name',
                'description'       => 'Tawk.to Widget Name',
                'type'              => 'string',
                'default'           => $settings::get('widget'),
            ],
        ];
    }

    public function onRun()
    {
        $settings = new Settings;

        $this->is_active = $settings::get('is_active');
        $this->site_id = $this->property('siteId');
        $this->widget = $this->property('widget');

        $inject = ($this->widget == $settings::get('widget') && $this->site_id == $settings::get('site_id'));
        if ($this->is_active && $inject) {
            $this->addJs('assets/js/chat.js');
            $this->is_active = false; // do not show the widget partial in the page body
        }
    }
}
