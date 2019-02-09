<?php

namespace PatternEngine\Phtml;

use PatternLab\PatternEngine\Rule;

/**
 *
 */
class PatternEngineRule extends Rule
{
    public function __construct()
    {
        parent::__construct();
        $this->engineProp = "phtml";
        $this->basePath = "\PatternEngine\Phtml";
    }
}