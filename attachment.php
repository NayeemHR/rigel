<?php
define('ATTACHMENT_SETTINGS_SCREEN', false);
add_filter('attachments_default_instance','__return_false');

function rigel_attachments($attachments){
    $fields = array(
        array(
            'name' => 'title',
            'type' => 'text',
            'label'=> __('Title', 'rigel')
        )
        );
    $args = array(
        'label' => 'Featured Slider',
        'post_type' => array('post'),
        'filetype' => array('image'),
        'note' => 'add slider image',
        'button_text' => __('Attach Files', 'rigel'),
        'fields' => $fields
    );
    $attachments->register('slider', $args);
}
add_action('attachments_register', 'rigel_attachments');

function rigel_testimonial_attachments($attachments){
    $fields = array(
        array(
            'name' => 'name',
            'type' => 'text',
            'label'=> __('Name', 'rigel')
        ),
        array(
            'name' => 'positon',
            'type' => 'text',
            'label'=> __('Position', 'rigel')
        ),
        array(
            'name' => 'company',
            'type' => 'text',
            'label'=> __('Company', 'rigel')
        ),
        array(
            'name' => 'testimonial',
            'type' => 'textarea',
            'label'=> __('Testimonial', 'rigel')
        )
        );
    $args = array(
        'label' => 'Testimonials',
        'post_type' => array('page'),
        'filetype' => array('image'),
        'note' => 'Add Testimonial',
        'button_text' => __('Attach Files', 'rigel'),
        'fields' => $fields
    );
    $attachments->register('testimonials', $args);
}
add_action('attachments_register', 'rigel_testimonial_attachments');


?>