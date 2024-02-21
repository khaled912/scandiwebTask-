<?php

namespace Helper;

class RenderView
{
    public static function render($parameters, $viewName)
    {
        foreach ($parameters as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include dirname(__DIR__) . "/View/$viewName.php";
        $content = ob_get_clean();
        include dirname(__DIR__) . "/View/baseTemplate.php";
    }

}
