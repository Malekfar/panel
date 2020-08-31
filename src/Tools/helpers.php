<?php
use Hekmatinasser\Verta\Verta;
require_once "jdf.php";

function tree($items)
{
    $html = "";
    $activeStatus = 0;
    foreach ($items as $item) {
        $activationState = "";
        $link = $item['child'] ? $link = '#' : $item['link'];
        if ($activeStatus == 0 && startsWith(url()->current(), url('/').$link)) {
            $activationState = "class='menu-active'";
            $activeStatus = 1;
        }
        if(auth()->user()->level != 0)
            if(!auth()->user()->hasPermissionTo("GET-".$item['link']) && !accessToChilds($item))
                continue;
        $html .= '<li>
                    <a href="'.$link.'" title="'.$item['label'].'" data-filter-tags="'.$item['label'].'" '.$activationState.' >
                        <i class="fal '.$item['icon'].'"></i>
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">'.$item['label'].'</span>
                    </a>';
        if($item['child']) {
            $html.='<ul>';
            $html.= tree($item['child']);
            $html.='</ul>';
        }
        $html.='</li>';
    }
    return $html;
}

function accessToChilds($baseItem)
{
    if($baseItem['child'])
        foreach ($baseItem['child'] as $item) {
            if($item['child'])
                return accessToChilds($item);
            if(auth()->user()->hasPermissionTo("GET-".$item['link']))
                return true;
        }
    if(auth()->user()->hasPermissionTo("GET-".$baseItem['link']))
        return true;
    return false;
}

function panelTree($items)
{
    $html = '<ol class="dd-list">';
    foreach ($items as $key => $item) {
        $html.='<li class="dd-item" data-id="'.$item['id'].'"><div class="dd-handle font-vazir"><i class="fal '.$item['icon'].' mr-2"></i><span class="label">'.$item['label'].'</span>
        <span class="badge badge-danger float-right cursor-pointer remove-menu" remove_id="'.$item['id'].'">حذف</span>
        <span class="badge badge-primary float-right cursor-pointer edit-menu mr-2" edit_id="'.$item['id'].'">ویرایش</span>
        </div>';
        if($item['child']) {
            $html .= panelTree($item['child']);
        }
        $html.='</li>';
    }
    $html.='</ol>';
    return $html;
}

function makePersionNumber ($string) {
    $string = str_replace(0,"۰",  $string);
    $string = str_replace(1,"۱",  $string);
    $string = str_replace(2,"۲",  $string);
    $string = str_replace(3,"۳",  $string);
    $string = str_replace(4,"۴",  $string);
    $string = str_replace(5,"۵",  $string);
    $string = str_replace(6,"۶",  $string);
    $string = str_replace(7,"۷",  $string);
    $string = str_replace(8,"۸",  $string);
    $string = str_replace(9,"۹",  $string);
    return $string;
}

function makeEnglishNumber ($string) {
    $string = str_replace("۰",0,  $string);
    $string = str_replace("۱",1,  $string);
    $string = str_replace("۲",2,  $string);
    $string = str_replace("۳",3,  $string);
    $string = str_replace("۴",4,  $string);
    $string = str_replace("۵",5,  $string);
    $string = str_replace("۶",6,  $string);
    $string = str_replace("۷",7,  $string);
    $string = str_replace("۸",8,  $string);
    $string = str_replace("۹",9,  $string);
    return $string;
}

function toPersianDate(&$date)
{
    $date = Verta::instance($date)->format('Y/m/d');
}

function toGeorgianDate(&$date)
{
    $date = makeEnglishNumber(explode('/', $date));
    $date = implode('-',
        Verta::getGregorian($date[0],$date[1],$date[2])
    );
}

function startsWith ($string, $startString)
{
    $len = strlen($startString);
    return (substr($string, 0, $len) === $startString);
}
