<?php
function belumlogin()
{
    $check = get_instance();
    if (!$check->session->userdata('Id_User')) {
        redirect("admin/Login");
    }
}

function belumLoginUser(){
    $check = get_instance();
    if (!$check->session->userdata('Id_User')) {
        redirect('Auth');
    }
}
