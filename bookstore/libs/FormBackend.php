<?php
class FormBackend {

    public static function input($inputType, $idForm, $name, $value=''){
        $xhtml = sprintf('<input type="%s" id="%s" name="%s" value="%s" class="form-control form-control-sm">',
        $inputType, $idForm, $name, $value);
        return $xhtml;
        
    }
    public static function select($name, $idForm, $options, $keySelected){

        $xhtmlOptions = '';
        foreach ($options as $key => $value) {
            $selected = $key == $keySelected ?'selected':'';
            $xhtmlOptions .= sprintf('<option value="%s"%s>%s</option>',$key ,$selected, $value);
        }
    
        $xhtml = sprintf('
        <select  id="%s" name="%s" class="custom-select custom-select-sm">
           %s
        </select>
        ',$idForm, $name ,$xhtmlOptions);
        return $xhtml;
    }
    public static function label($forId, $text, $required = false){
        $class = 'col-sm-2 col-form-label text-sm-right';
        if($required == true)  $class = 'col-sm-2 col-form-label text-sm-right required';

        $xhtml = sprintf('<label for="%s"class="%s">%s</label>', $forId, $class, $text);
        return $xhtml;
       
    }
    public static function row($label, $input, $error = ''){
        $xhtml = sprintf('<div class="form-group row">%s %s %s</div>',$label, $input, $error);
        return $xhtml;
    }
    public static function wrap($select = '', $input = '', $error = ''){
        $xhtml = sprintf('
        <div class="col-xs-12 col-sm-8">
            %s
            %s
            %s
        </div>', $input, $select, $error);
        return $xhtml;
    }

}