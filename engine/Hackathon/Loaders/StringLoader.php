<?php
/**
 * Created by PhpStorm.
 * User: tom
 * Date: 09.02.19
 * Time: 11:37
 */

namespace PatternEngine\Phtml\Loaders;


use \PatternLab\PatternEngine\Loader;

class StringLoader extends Loader
{

    /**
     * Render a string
     * @param  {Array}        the options to be rendered by Twig
     *
     * @return {String}       the rendered result
     */
    public function render($options = array())
    {
        ob_start();
       // @ToDo what needs to be done here?
        $content = ob_get_contents();
        ob_end_flush();
        return $content;
    }
}