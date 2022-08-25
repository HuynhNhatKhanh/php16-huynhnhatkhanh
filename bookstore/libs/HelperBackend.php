<?php
class HelperBackend
{
    public static function showItemStatus($module, $controller, $id, $statusValue)
    {
        $class = '';
        $icon = '';
        if ($statusValue == 'active') {
            $class = 'success';
            $icon = 'check';
        } else {
            $class = 'danger';
            $icon = 'minus';
        }
        $xhtml = '';
        $xhtml = '<a href="'.URL::createLink($module, $controller,'changeStatus',[ 'id' => $id, 'status' => $statusValue]).'" class="my-btn-state rounded-circle btn btn-sm btn-'.$class.'"><i class="fas fa-'.$icon.'"></i></a>';
        return $xhtml;
    }
    public static function showItemGroupAcp($module, $controller, $id, $groupAcpValue)
    {
        $class = '';
        $icon = '';
        if ($groupAcpValue == 'yes') {
            $class = 'success';
            $icon = 'check';
        } else {
            $class = 'danger';
            $icon = 'minus';
        }
        $xhtml = '';
        $xhtml = '<a href="'.URL::createLink($module, $controller,'changeGroupAcp', [ 'id' => $id, 'groupAcp' => $groupAcpValue]).'" class="my-btn-state rounded-circle btn btn-sm btn-'.$class.'"><i class="fas fa-'.$icon.'"></i></a>';
        return $xhtml;
    }
    public static function showAction($module, $controller, $id , $action)
    {
        $class = '';
        $icon = '';
        if ($action == 'edit') {
            $link = URL::createLink($module, $controller,'form', [ 'id' => $id]);
            $class = 'info';
            $icon = 'pencil-alt';
            $title = 'Edit';
        } else if ($action == 'delete'){
            $link = URL::createLink($module, $controller,'delete', [ 'id' => $id]);
            $class = 'danger btn-delete';
            $icon = 'trash-alt';
            $title = 'Delete';
        }else if ($action == 'changePassword'){
            $link = URL::createLink($module, $controller,'changePassword', [ 'id' => $id]);
            $class = 'secondary';
            $icon = 'key';
            $title = 'Change Password';
            
        }
        return sprintf(' <a href="%s" class="rounded-circle btn btn-sm btn-%s" title="%s">
        <i class="fas fa-%s"></i></a>', $link, $class, $title, $icon);
    }
    public static function showItemHistory($by, $time = null){
        $xhtml = '';
        if(isset($time)){
            $time = date('d/m/Y H:i:s', strtotime($time));
            $xhtml = 
            '
                <p class="mb-0 history-by"><i class="far fa-user"></i> '.$by.'</p>
                <p class="mb-0 history-time"><i class="far fa-clock"></i> '.$time.'</p>
            ';
        }
        return $xhtml;
    }
    public static function highlight($searchValue, $link)
    {
       if(!empty($searchValue)){
        $link = str_replace($searchValue, "<mark>$searchValue</mark>",$link);
       }
       return $link;
    }
    public static function showNotice()
    {
        $message= '';
        if(Session::get('message')){
            $message .= sprintf(
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    %s
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>', Session::get('message'));
                Session::delete('message');
        }
        return $message;
        
    }
    public static function checkbox($id){
        $xhtml = '';
        $xhtml .= sprintf(' 
        <div class="custom-control custom-checkbox">
            <input class="custom-control-input cb-element" type="checkbox" id="checkbox-%s" name="ckid[]" value="%s">
            <label for="checkbox-%s" class="custom-control-label"></label>
        </div>', $id, $id, $id);
        return $xhtml;
    }
    public static function buttonSelect($options, $keySelected){
        $xhtmlOptions = '';
        foreach ($options as $key => $value) {
            $selected = $key == $keySelected ?'selected':'';
            $xhtmlOptions .= sprintf('<option value="%s"%s>%s</option>',$key ,$selected, $value);
        }
        
        return $xhtmlOptions;
    }
}