<?php
class FormBackend {

    public static function input($inputType, $idForm, $name, $value='', $class = 'form-control form-control-sm'){
        $xhtml = sprintf('<input type="%s" id="%s" name="%s" value="%s" class="%s">',
        $inputType, $idForm, $name, $value, $class);
        return $xhtml;
        
    }
    public static function select($name, $idForm, $options, $keySelected, $attr = '', $class = 'custom-select custom-select-sm'){

        $xhtmlOptions = '';
        foreach ($options as $key => $value) {
            $selected = $key == $keySelected ?'selected':'';
            $xhtmlOptions .= sprintf('<option value="%s"%s>%s</option>',$key ,$selected, $value);
        }
    
        $xhtml = sprintf('
        <select  id="%s" name="%s" class="%s" %s>
           %s
        </select>
        ',$idForm, $name, $class, $attr, $xhtmlOptions);
        return $xhtml;
    }
    public static function label($forId, $text, $required = true, $class = 'col-sm-2 col-form-label text-sm-right'){
        // $class = '';
        if($required == true)  $class .= ' required';

        $xhtml = sprintf('<label for="%s"class="%s">%s</label>', $forId, $class, $text);
        return $xhtml;
       
    }
    public static function row($label, $input, $class = 'form-group row', $error = ''){
        $xhtml = sprintf('<div class="%s">%s %s %s</div>',$class, $label, $input, $error);
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