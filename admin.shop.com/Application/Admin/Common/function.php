<?php
function get_error(\Think\Model $model){
    $errors=$model->getError();
    if(!is_array($errors)){
        $errors=["$errors"];
    }
    $html = '<ol>';
    foreach($errors as $error){
        $html .= '<li>' . $error . '</li>';
    }
    $html .= '</ol>';
    return $html;
}