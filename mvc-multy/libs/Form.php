<?php
class Form {

    public static function input($input, $name, $value=''){
        $xhtml = sprintf('<input type="%s" class="form-control" name="%s" value="%s">',
        $input ,$name, $value);
        return $xhtml;
    }
    public static function select($name, $options, $keySelected){

        $xhtmlOptions = '';
        foreach ($options as $key => $value) {
            $selected = $key == $keySelected ?'selected':'';
            $xhtmlOptions .= sprintf('<option value="%s"%s>%s</option>',$key ,$selected, $value);
        }
    
        $xhtml = sprintf('
        <select class="custom-select" name="%s">
           %s
        </select>
        ',$name ,$xhtmlOptions);

        return $xhtml;
    }
    public static function label($text){
        $xhtml = sprintf('<label class="font-weight-bold">%s</label>',$text);
        return $xhtml;
    }
    public static function row($label, $input, $error = ''){
        $xhtml = sprintf('<div class="mb-3">%s %s %s</div>',$label, $input, $error);
        return $xhtml;
    }
    // public static function showElements($elements){
    //     $xhtml = '';
    //     foreach ($elements as $key => $value) {
    //         $xhtml .= Form::row($value['lable'], $value['element']);
    //     }
    //     return $xhtml;
    // }
}