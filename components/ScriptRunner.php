<?php namespace NSRosenqvist\ScriptRunner\Components;

class ScriptRunner extends \Cms\Classes\ComponentBase
{
    protected static $filesIncluded = false;

    public function componentDetails()
    {
        return [
            'name' => 'Script Runner',
            'description' => 'A simple solution to manage and run scripts in a theme.'
        ];
    }

    public function onRun()
    {
        if ( ! self::$filesIncluded)
            $this->addJs('/plugins/nsrosenqvist/scriptrunner/assets/js/ScriptRunner.js');

        self::$filesIncluded = true;
    }

    public function classes()
    {
        $classes = "";

        // Static Page
        if (isset($this->page->apiBag['staticPage']))
        {
            $classes .= " ".str_replace('-', '_', pathinfo($this->page->apiBag['staticPage']->fileName)['filename']);
            $classes .= " static_page";
        }
        // Regular Page
        else
        {
            if (isset($this->page->fileName))
            {
                $classes .= " ".str_replace('-', '_', pathinfo($this->page->fileName)['filename']);
                $classes .= " page";
            }
        }

        // Layout
        if (isset($this->page->layout->fileName))
        {
            $classes .= " layout_".str_replace('-', '_', pathinfo($this->page->layout->fileName)['filename']);
        }

        // Blog
        if (isset($this->page->components['blogPost']))
            $classes .= " blog_post";
        if (isset($this->page->components['blogPosts']))
            $classes .= " blog_posts";

        return trim($classes, ' ');
    }
}
