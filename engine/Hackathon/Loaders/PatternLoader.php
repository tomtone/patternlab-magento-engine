<?php
/**
 * Created by PhpStorm.
 * User: tom
 * Date: 09.02.19
 * Time: 11:40
 */

namespace PatternEngine\Phtml\Loaders;

use PatternEngine\Phtml\Loaders\Phtml\PatterPartialLoader;
use PatternLab\Config;
use PatternLab\Dispatcher;
use \PatternLab\PatternEngine\Loader;

class PatternLoader extends Loader
{
    private $fileSystemLoaderPaths;

    /**
     * PatternLoader constructor.
     * @param array $options
     */
    public function __construct($options = array())
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
        $this->fileSystemLoaderPaths = $filesystemLoaderPaths;

        // set-up the loader list in order that they should be checked
        // 1. Patterns 2. Filesystem 3. String
        $loaders   = array();
        // 1. add Patterns
        $loaders[] = new PatterPartialLoader(Config::getOption("patternSourceDir"),array("patternPaths" => $options["patternPaths"]));

    }

    /**
     * Render a pattern
     * @param  {Array}        the options to be rendered by Twig
     *
     * @return {String}       the rendered result
     */
    public function render($options = array())
    {
        var_dump($options);
        $content = "";
        if(strlen($options['pattern'] > 0)) {
            ob_start();
            exec($options['pattern']);
            $content = ob_get_contents();
            ob_end_flush();
        }
        return $content;
    }
}