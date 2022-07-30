<?php
class Helper
{
    public static function showItemStatus($id, $statusValue)
    {
        //$linkStatus = URL::createLink('backend', 'rss', 'changeStatus', $id);
        
        $class = '';
        $icon = '';
        if ($statusValue == 'active') {
            $class = 'success';
            $icon = 'check';
        } else {
            $class = 'danger';
            $icon = 'minus';
        }
        return sprintf('<a href="index.php?module=backend&controller=rss&action=changeStatus&id=%s&status=%s" 
        class="btn btn-sm btn-%s"><i class="fas fa-%s"></i></a>', $id, $statusValue, $class, $icon);
    }
    public static function highlight($searchValue, $link)
    {
       if(!empty($searchValue)){
        $link = str_replace($searchValue, "<mark>$searchValue</mark>",$link);
       }
       return $link;
    }
}