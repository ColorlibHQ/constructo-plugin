<?php
function constructo_page_metabox( $meta_boxes ) {

	$constructo_prefix = '_constructo_';
	$meta_boxes[] = array(
		'id'        => 'constructo_metaboxes',
		'title'     => esc_html__( 'Additional Options', 'constructo-companion' ),
		'post_types'=> array( 'project' ),
		'priority'  => 'high',
		'autosave'  => 'false',
		'fields'    => array(
			array(
				'id'    => $constructo_prefix . 'project_excerpt_txt',
				'type'  => 'textarea',
				'name'  => esc_html__( 'Project Excerpt Text', 'constructo-companion' ),
			),
			array(
				'id'    => $constructo_prefix . 'project_date',
				'type'  => 'date',
				'js_options' => array(
					'dateFormat'      => 'dd-M-yy',
					'showButtonPanel' => false,
				),
				'name'  => esc_html__( 'Project Date', 'constructo-companion' ),
			),
			array(
				'id'    => $constructo_prefix . 'project_location',
				'type'  => 'text',
				'name'  => esc_html__( 'Project Location', 'constructo-companion' ),
			),
			array(
				'id'    => $constructo_prefix . 'project_imgs',
				'type'  => 'image_advanced',
				'multiple'  => true,
				'name'  => esc_html__( 'Project Images', 'constructo-companion' ),
				'description' => esc_html__( 'Best size is 1146x680', 'constructo-companion' ),
			),
			array(
				'id'    => $constructo_prefix . 'project_quote_txt',
				'type'  => 'textarea',
				'name'  => esc_html__( 'Project Quote Box', 'constructo-companion' ),
			),
			array(
				'id'    => $constructo_prefix . 'project_left_txt',
				'type'  => 'textarea',
				'name'  => esc_html__( 'Project Left Box', 'constructo-companion' ),
				'desc'  => esc_html__( 'If the "Project Right Box" is empty then the "Project Left Box" will take the full width.', 'constructo-companion' ),
			),
			array(
				'id'    => $constructo_prefix . 'project_right_txt',
				'type'  => 'textarea',
				'name'  => esc_html__( 'Project Right Box', 'constructo-companion' ),
			),
		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'constructo_page_metabox' );
