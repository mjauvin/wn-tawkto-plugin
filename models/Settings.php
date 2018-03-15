<?php namespace StudioAzura\TawkTo\Models;

use File;
use Model;

class Settings extends Model
{
    use \System\Traits\ViewMaker;

    public $implement = [
        'System.Behaviors.SettingsModel',
    ];

    // A unique code
    public $settingsCode = 'studioazura_tawkto_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';

    public function __construct()
    {
        parent::__construct();
        $this->bindEvent('model.afterSave', [$this, 'afterModelSave']);
    }

    public function afterModelSave()
    {
        parent::afterModelSave();
        $this->site_id = $this->get('site_id');
        $this->widget = $this->get('widget') ? $this->get('widget') : 'default';
        $chat_widget = $this->makePartial('chat');
        $path = __DIR__ . '/../assets/js/';
        File::makeDirectory($path, $mode = 0777, true, true);
        File::put( $path . 'chat.js', $chat_widget);

    }
}
