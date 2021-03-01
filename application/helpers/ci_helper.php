<?php

function is_logged()
{
    $ci = get_instance();
    if (!$ci->session->userdata['email']) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata['role_id'];
        $menu = $ci->uri->segment(1);

        //cari id_menu untuk di cocokan role_id ditable acces_menu
        $data_menu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $data_menu['id'];
        //proses pemcocokan apakah ada kesamaan
        $cocok = $ci->db->get_where('user_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id])->num_rows();
        if ($cocok < 1) {
            redirect('auth/forbidden');
        }
    }
}
//fungsi ini di hunakan untuk melakukan check list pada role acces
function checked_access($id_role, $id_menu)
{
    $ci = get_instance();
    $acces = $ci->db->get_where('user_access_menu', ['menu_id' => $id_menu, 'role_id' => $id_role]);
    if ($acces->num_rows() > 0) {
        return "checked='checked'";
    }
}
