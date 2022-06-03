
<?php

use App\Helpers\HelperComponent;




function sideBarMenu(){
    return HelperComponent::sideBar();
}


function setSingleLink($title,$icon,$v_can=null,$v_route=null){
    return [
        "title"=>$title,
        "icon"=>$icon,
        "can"=>$v_can,
        "route"=>$v_route,
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
function setSubMenu($title,$icon,$v_can=null,$v_route=null){
    return [
        "title"=>$title,
        "icon"=>$icon,
        "can"=>$v_can,
        "route"=>$v_route,
    ];
 }
