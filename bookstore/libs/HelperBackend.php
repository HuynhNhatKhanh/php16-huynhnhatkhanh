<?php
class HelperBackend
{
    public static function showItemStatus($id, $statusValue)
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
        $xhtml = '<a href="'.URL::createLink('backend','group','changeStatus',[ 'id' => $id, 'status' => $statusValue]).'" class="my-btn-state rounded-circle btn btn-sm btn-'.$class.'"><i class="fas fa-'.$icon.'"></i></a>';
        return $xhtml;
    }
    public static function showItemGroupAcp($id, $groupAcpValue)
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
        $xhtml = '<a href="'.URL::createLink('backend','group','changeGroupAcp', [ 'id' => $id, 'groupAcp' => $groupAcpValue]).'" class="my-btn-state rounded-circle btn btn-sm btn-'.$class.'"><i class="fas fa-'.$icon.'"></i></a>';
        return $xhtml;
    }
    public static function showAction($id , $action)
    {
        $class = '';
        $icon = '';
        if ($action == 'edit') {
            $link = URL::createLink('backend','group','form', [ 'id' => $id]);
            $class = 'info';
            $icon = 'pencil-alt';
            $title = 'Edit';
        } else if ($action == 'delete'){
            $link = URL::createLink('backend','group','delete', [ 'id' => $id]);
            $class = 'danger btn-delete';
            $icon = 'trash-alt';
            $title = 'Delete';
        }
        return sprintf(' <a href="%s" class="rounded-circle btn btn-sm btn-%s" title="%s">
        <i class="fas fa-%s"></i></a>', $link, $class, $title, $icon);
    }
    public static function showItemHistory($by, $time){
        $time = date('d/m/Y H:i:s', strtotime($time));
        $xhtml = 
        '
            <p class="mb-0 history-by"><i class="far fa-user"></i> '.$by.'</p>
            <p class="mb-0 history-time"><i class="far fa-clock"></i> '.$time.'</p>
        ';
        return $xhtml;
    }
    public static function highlight($searchValue, $link)
    {
       if(!empty($searchValue)){
        $link = str_replace($searchValue, "<mark>$searchValue</mark>",$link);
       }
       return $link;
    }
}