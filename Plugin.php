<?php namespace NSRosenqvist\ScriptRunner;

class Plugin extends \System\Classes\PluginBase
{
    public function pluginDetails()
    {
        return [
            'name' => 'Script Runner',
            'description' => 'A simple solution to manage and run scripts in a theme.',
            'author' => 'Niklas Rosenqvist',
            'icon' => 'icon-leaf',
            'homepage' => 'https://www.nsrosenqvist.com/'
        ];
    }

    public function registerComponents()
    {
        return [
            'NSRosenqvist\ScriptRunner\Components\ScriptRunner' => 'scriptRunner'
        ];
    }
}
