<?php
namespace PatternEngine\Phtml\Loaders;

use \PatternLab\PatternEngine\Loader;
use \PatternLab\PatternEngine\Twig\TwigUtil;

class FilesystemLoader extends Loader {

    /**
     * Load a new Twig instance that uses the File System Loader
     */
    public function __construct($options = array())
    {
        parent::__construct();
    }

    /**
     * Render a template
     * @param  {Array}        the options to be rendered by Twig
     *
     * @return {String}       the rendered result
     */
    public function render($options = array()) {

        ob_start();
        print "bar";      // This IS printed, but just not right here.
        ob_end_flush();
        $content = ob_get_contents();
        return $content;

    }

}