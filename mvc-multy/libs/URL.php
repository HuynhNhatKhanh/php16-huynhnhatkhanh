<?php
class URL{
    public static function redirect($link){
        header('location:' . $link);
    }
    public static function createLink($module, $controller, $action, $id = null){
        $xhtml = sprintf('index.php?module=%s&controller=%s&action=%s', $module, $controller, $action);
        if(!empty($id)){
            $xhtml .= "&id=$id";
        };
        return $xhtml;
    }
}