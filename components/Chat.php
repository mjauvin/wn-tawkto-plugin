<?php namespace Studioazura\TawkTo\Components;

use Cms\Classes\ComponentBase;
use StudioAzura\TawkTo\Models\Settings;

class Chat extends ComponentBase
{
    public $active;
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
            'site_id' => [
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

        $this->active = $settings::get('active');
        $this->site_id = $this->property('site_id');
        $this->widget = $this->property('widget');

        $inject = ($this->widget == $settings::get('widget') && $this->site_id == $settings::get('site_id'));
        if ($this->active && $inject) {
            $this->addJs('assets/js/chat.js');
            $this->active = false; // do not show the widget partial in the page body
        }
    }
}
