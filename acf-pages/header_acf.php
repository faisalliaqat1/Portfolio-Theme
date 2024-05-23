<?php
if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        //'page_title'    => 'Theme Setting',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-settings',
        'capability'    => 'edit_posts',
        'redirect'      => true
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Home Page',
        'menu_title'    => 'Home Page',
        'parent_slug'   => 'theme-settings',
    ));
    // acf_add_options_sub_page(array(
    //     'page_title'    => 'Menu',
    //     'menu_title'    => 'Menu ',
    //     'parent_slug'   => 'theme-settings',
    // ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Contact Us',
        'menu_title'    => 'Contact Us',
        'parent_slug'   => 'theme-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title'    => 'About',
        'menu_title'    => 'About',
        'parent_slug'   => 'theme-settings',
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title'    => 'Resume',
        'menu_title'    => 'Resume',
        'parent_slug'   => 'theme-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title'    => 'Services',
        'menu_title'    => 'Services',
        'parent_slug'   => 'theme-settings',
    ));
    
}
    