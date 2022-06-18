<?php
define('ATTACHMENTS_SETTINGS_SCREEN', false); // disable the Settings screen
add_filter('attachments_default_instance', '__return_false'); // disable the default instance

function alpha_attachments($attachments)
{
  $fields         = array(
    array(
      'name'      => 'title',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __('Title', 'alpha'),    // label to display
      'default'   => 'title',                         // default value upon selection
    ),
  );

  $args = array(

    // title of the meta box (string)
    'label'         => 'My Attachments',

    // all post types to utilize (string|array)
    'post_type'     => array('post'),

    // meta box position (string) (normal, side or advanced)
    // 'position'      => 'normal',

    // meta box priority (string) (high, default, low, core)
    // 'priority'      => 'high',

    // allowed file type(s) (array) (image|video|text|audio|application)
    'filetype'      => array("image"),  // no filetype limit

    // include a note within the meta box (string)
    'note'          => 'Attach files here!',

    // by default new Attachments will be appended to the list
    // but you can have then prepend if you set this to false
    // 'append'        => true,

    // text for 'Attach' button in meta box (string)
    'button_text'   => __('Attach Files', 'alpha'),

    // text for modal 'Attach' button (string)
    // 'modal_text'    => __( 'Attach', 'attachments' ),

    // which tab should be the default in the modal (string) (browse|upload)
    // 'router'        => 'browse',

    // whether Attachments should set 'Uploaded to' (if not already set)
    // 'post_parent'   => false,

    // fields array
    'fields'        => $fields,

  );

  $attachments->register('slider', $args); // unique instance name
}

add_action('attachments_register', 'alpha_attachments');

function alpha_employee_info_attachments($attachments)
{
  $fields         = array(
    array(
      'name'      => 'name',
      'type'      => 'text',
      'label'     => __('name', 'alpha'),
      'default'   => 'mane',
    ),
    array(
      'name'      => 'position',
      'type'      => 'text',
      'label'     => __('position', 'alpha'),
      'default'   => 'position',
    ),
    array(
      'name'      => 'company',
      'type'      => 'text',
      'label'     => __('company', 'alpha'),
      'default'   => 'company',
    ),
    array(
      'name'      => 'testimonial',
      'type'      => 'textarea',
      'label'     => __('testimonial', 'alpha'),
      'default'   => 'testimonial',
    ),

  );

  $args = array(
    'label'         => 'Testimonials',
    'post_type'     => array('page'),
    'filetype'      => array("image"),
    'note'          => 'Attach files here!',
    'button_text'   => __('Attach Files', 'alpha'),
    'fields'        => $fields,

  );

  $attachments->register('testimonial', $args); // unique instance name
}

add_action('attachments_register', 'alpha_employee_info_attachments');


function alpha_team_profile_attachments($attachments)
{
  $fields         = array(
    array(
      'name'      => 'name',
      'type'      => 'text',
      'label'     => __('name', 'alpha'),
      'default'   => 'mane',
    ),
    array(
      'name'      => 'position',
      'type'      => 'text',
      'label'     => __('position', 'alpha'),
      'default'   => 'position',
    ),
    array(
      'name'      => 'company',
      'type'      => 'text',
      'label'     => __('company', 'alpha'),
      'default'   => 'company',
    ),
    array(
      'name'      => 'details',
      'type'      => 'textarea',
      'label'     => __('details', 'alpha'),
      'default'   => 'details',
    ),
    array(
      'name'      => 'email',
      'type'      => 'text',
      'label'     => __('email', 'alpha'),
      'default'   => 'email',
    ),

  );

  $args = array(
    'label'         => 'team_profile',
    'post_type'     => array('page'),
    'filetype'      => array("image"),
    'note'          => 'Team Profile here!',
    'button_text'   => __('Attach Files', 'alpha'),
    'fields'        => $fields,

  );

  $attachments->register('team_profile', $args); // unique instance name
}

add_action('attachments_register', 'alpha_team_profile_attachments');
