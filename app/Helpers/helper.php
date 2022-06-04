
<?php

use App\Helpers\HelperComponent;




function sideBarMenu(){
    return HelperComponent::sideBar();
}


function setSingleLink($title,$icon,$v_can=null,$v_route=null, $prefix="/portal"){
    return [
        "title"=>$title,
        'type'=> 'single_link',
        "icon"=>$icon,
        "can"=>$v_can,
        "route"=>$prefix.$v_route,
    ];
}
function singleImgUpload($request, $path)
{
    if ($request->hasfile('thumbnail')) {
        $name = Str::slug($request->name, '-')  . "-" . time() . '.' . $request->thumbnail->extension();
        $request->thumbnail->move(public_path($path), $name);
    } else
        $name = "";
    return $name;
}
function setSubMenu($title,$icon,$v_can=null,$v_route=null,$prefix="/portal"){
    return [
        "title"=>$title,
        "icon"=>$icon,
        "can"=>$v_can,
        "route"=>$prefix.$v_route,
    ];
 }
