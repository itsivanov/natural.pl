<?php
function bert_widgets_init() {

		$array_widgets = array(
													 array('name' => 'Logo', 'id' => 'logo'),
													 array('name' => 'Footer (left)', 'id' => 'footer_left'),
													 array('name' => 'Footer (center top)', 'id' => 'footer_center_top'),
													 array('name' => 'Footer (center bottom)', 'id' => 'footer_center_bottom'),
													 array('name' => 'Footer (right)', 'id' => 'footer_right'),
													 array('name' => 'Tags', 'id' => 'tags'),
													 array('name' => 'Text (Under footer)', 'id' => 'text_under_footer'),
													 array('name' => 'Text (Home)', 'id' => 'text_home'),
													 array('name' => 'Text (Home, in front of a picture)', 'id' => 'text_home_front')
												  );

		for($i = 0; $i < count($array_widgets); $i++)
		{
				if ( function_exists('register_sidebar') )
				register_sidebar(array(
						'name' => $array_widgets[$i]['name'],
						'id'            => $array_widgets[$i]['id'],
						'description' => '',
						'before_widget' => '',
						'after_widget' => '',
						'before_title' => '<p style="display: none">',
						'after_title' => '</p>',
				));
		}

}
add_action( 'widgets_init', 'bert_widgets_init' );
