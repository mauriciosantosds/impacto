<?php
function load_js($js){
    if(!is_array($js)){
        return false;
    }
    
    $return = '';
    foreach($js as $j){
        $return .= '<script type="text/javascript" src="' . base_url() . 'assets/js/' . $j . '"></script>' . "\n";
    }
    return $return;
}
