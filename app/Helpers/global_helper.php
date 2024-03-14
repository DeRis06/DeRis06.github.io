<?php

use App\Models\metadata;
function get_meta_value($meta_key)
{
    $data = metadata::where('meta_key',$meta_key)->first();
    if($data){
        return $data->meta_value;
    }
}

function set_list_workflow($isi)
{
    $isi = str_replace("<ul>", '<ul class="fa-ul mb-0', $isi);
    $isi = str_replace("<li>", '<li><span class="fa-li"><i class="fa fa-check"></i></span>', $isi);
    return $isi;
}
?>