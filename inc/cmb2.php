<?php 
add_action( 'cmb2_init', 'cmb2_add_photographer_info_metabox' );
function cmb2_add_photographer_info_metabox() {

	$prefix = '_rigel_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'photographer_information',
		'title'        => __( 'Photographer Information', 'rigel' ),
		'object_types' => array( 'post' ),
		'context'      => 'normal',
		'priority'     => 'default',
	) );

	$cmb->add_field( array(
		'name' => __( 'Photographer Name', 'rigel' ),
		'id' => $prefix . 'photographer_name',
		'type' => 'text',
	) );

	$cmb->add_field( array(
		'name' => __( 'Did he have an assistant?', 'rigel' ),
		'id' => $prefix . 'have_an_assistant',
		'type' => 'checkbox',
	) );

	$cmb->add_field( array(
		'name' => __( 'Assistant\'s Name', 'rigel' ),
		'id' => $prefix . 'assistant_s_name',
		'type' => 'text',
        'attributes' => array(
			'data-conditional-id' => $prefix . 'have_an_assistant',
		),
	) );

}
?>
