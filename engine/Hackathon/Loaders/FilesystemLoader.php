<?php

namespace PatternEngine\Phtml\Loaders;

use PatternLab\Config;
use \PatternLab\PatternEngine\Loader;
use \PatternLab\PatternEngine\Twig\TwigUtil;

class FilesystemLoader extends Loader
{
    private $fileSystemPaths;

    /**
     * Load a new Twig instance that uses the File System Loader
     */
    public function __construct($options = array())
    {
        parent::__construct();
        // set-up the paths to be searched for templates
        $filesystemLoaderPaths   = array();
        $filesystemLoaderPaths[] = $options["templatePath"];
        $filesystemLoaderPaths[] = $options["partialsPath"];

        $this->fileSystemPaths = $filesystemLoaderPaths;
    }

    /**
     * Render a template
     * @param  {Array}        the options to be rendered by Twig
     *
     * @return {String}       the rendered result
     */
    public function render($options = array())
    {
        ob_start();
        foreach ($this->fileSystemPaths as $path){
            if(file_exists($path . '/' . $options['template'] . '.' . Config::getOption("patternExtension"))){
                require $path . '/' . $options['template'] . '.' . Config::getOption("patternExtension");
            }
        }
        $content = ob_get_contents();
        ob_end_clean();
        return $content;

    }

}