<?php
/**
 * Created by PhpStorm.
 * User: tom
 * Date: 09.02.19
 * Time: 11:40
 */

namespace PatternEngine\Phtml\Loaders;

use PatternLab\Config;
use PatternLab\Dispatcher;
use \PatternLab\PatternEngine\Loader;

class PatternLoader extends Loader
{
    public function __construct()
    {
        parent::__construct();
        // add source/_patterns subdirectories for Drupal theme template compatibility
        $patternSourceDir = Config::getOption("sourceDir") . DIRECTORY_SEPARATOR . "_patterns";
        $patternObjects = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($patternSourceDir), \RecursiveIteratorIterator::SELF_FIRST);
        $patternObjects->setFlags(\FilesystemIterator::SKIP_DOTS);

        // sort the returned objects
        $patternObjects = iterator_to_array($patternObjects);
        ksort($patternObjects);

        foreach ($patternObjects as $name => $object) {
            if ($object->isDir()) {
                $filesystemLoaderPaths[] = $object->getPathname();
            }
        }

        // set-up the loader list in order that they should be checked
        // 1. Patterns 2. Filesystem 3. String
        $loaders = array();

        $dispatcherInstance = Dispatcher::getInstance();
        $dispatcherInstance->dispatch("phtmlLoaderPreInit.customize");
    }

    /**
     * Render a pattern
     * @param  {Array}        the options to be rendered by Twig
     *
     * @return {String}       the rendered result
     */
    public function render($options = array())
    {
        return "";
    }
}