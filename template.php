<?php

/*
 * HTML
 */

  function restweek_preprocess_html(&$vars) {

    // Optionally, drop the site slogan from the page <title>
    if(drupal_is_front_page()) {
      // $vars['head_title'] = $vars['head_title_array']['name'];
    }
  }

  function restweek_process_html(&$vars) {
    global $base_path;
    global $theme_path;
    
    // Constructing some resources for the <head>
    $html5head  = '<meta charset="utf-8">'.PHP_EOL;
    $html5head .= '<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">'.PHP_EOL;
    $html5head .= '<meta name="viewport" content="width=device-width, initial-scale=1" />'.PHP_EOL;
    $html5head .= '<link rel="author" href="'.$base_path.$theme_path.'/humans.txt" />'.PHP_EOL;
    // Add $html5head to $head since other modules use this (i.e. Meta Tags)
    $vars['head'] .= $html5head;
  }
  
/*
 * Page
 */
  
  function restweek_preprocess_page(&$vars) {
    global $theme_path;

    // If tabs exist, add some classes to use in templating
    if( !empty($vars['tabs']['#primary']) || !empty($vars['tabs']['#secondary']) ) {
      $vars['tabs_classes'] = 'tabs--container';
    } else {
      $vars['tabs_classes'] = null;
    }
    
  }

/*
 * Regions
 */
  
  function restweek_preprocess_region(&$vars) {

    /* Getting the human-readable name of a region for use in templates */
    $regions_list = system_region_list('restweek', $show = REGIONS_ALL);
    $vars['region_name'] = $regions_list[$vars['region']];

  }

/*
 * Views
 */


/*
 * Blocks
 */
  
  function restweek_preprocess_block(&$vars, $hook) {

    switch($vars['block_html_id']) {
      case 'block-system-main':
        // Use a bare template for the page's main content.
        $vars['theme_hook_suggestions'][] = 'block__bare';
        break;
    }

    $vars['title_attributes_array']['class'][] = 'block__title';
    $vars['content_attributes_array']['class'][] = 'block__content';

    if($vars['block']->subject != '') {
      // Drupal 7 should use a $title variable instead of $block->subject.
      $vars['title'] = $vars['block']->subject;
    } else {
      $vars['title'] = 'Untitled Section';
      $vars['title_attributes_array']['class'][] = 'element-invisible';
    }

  }

/*
 * Nodes
 */

  function restweek_preprocess_node(&$vars) {
    global $theme_path;
    $node_type = $vars['type'];

    $vars['theme_hook_suggestions'][] = 'node__' . $vars['type'] . '__' . $vars['view_mode'];

    $vars['classes_array'] = array();
    $vars['classes_array'][] = 'node';
    $vars['classes_array'][] = str_replace('_', '-', $vars['type']);
    $vars['classes_array'][] = str_replace('_', '-', $vars['type']) . '--' . str_replace('_', '-', $vars['view_mode']);

    // Formatting submitted dates in a more user-friendly manner
    // i.e. Monday, Jan 15th, 2012
    $vars['submitted'] = t('@date', array('@date' => date("l, M jS, Y", $vars['created']) ) );


    /* Variants */
    switch ($vars['type']) {
      case 'menu':
        restweek_preprocess_menu_node($vars);
        break;
    }
  }


  function restweek_preprocess_menu_node(&$vars) {
    $emw = entity_metadata_wrapper('node', $vars['node']);

    // dpm($emw->value());

    $vars['menu'] = array(
      'restaurant' => array(
        'name' => null,
        'phone' => null,
        'map' => null
      ),
      'appetizer' => null,
      'entree' => null,
      'dessert' => null,
    );

    $restaurant = $emw->field_menu_owner->value();
    $appetizer = $emw->field_menu_appetizer->value();
    $entree = $emw->field_menu_entree->value();
    $dessert = $emw->field_menu_dessert->value();

    if( !empty($restaurant) ) {
      $vars['menu']['restaurant']['name'] = $restaurant->title;

      if ( !empty($restaurant->field_phone_number)) {
        $vars['menu']['restaurant']['phone'] = $restaurant->field_phone_number[LANGUAGE_NONE][0]['value'];
      }

      if ( !empty($restaurant->field_location_link)) {
        $vars['menu']['restaurant']['map'] = $restaurant->field_location_link[LANGUAGE_NONE][0]['url'];
      }
    }

    if( !empty($appetizer) ) {
      $vars['menu']['appetizer'] = $appetizer;
    }

    if( !empty($entree) ) {
      $vars['menu']['entree'] = $entree;
    }

    if( !empty($dessert) ) {
      $vars['menu']['dessert'] = $dessert;
    }

    //dpm($vars['menu']);
  }

/*
 * Terms
 */


/*
 * Forms
 */


/*
 * Menus
 */

  function restweek_menu_tree__main_menu(&$vars) {
    return '<ul class="nav">' . $vars['tree'] . '</ul>';
  }

  function restweek_menu_link($vars) {
    $element = $vars['element'];

    $sub_menu = $element['#below'] ? drupal_render($element['#below']) : '';
    $output = l($element['#title'], $element['#href'], $element['#localized_options']);

    return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . '</li>';
  }

/* 
 * Links
 */