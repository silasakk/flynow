<?
$meta = get_post_meta($post->ID,'_detail',true);

$content = $meta;
$editor_id = 'mycustomeditor';

wp_editor( $content, $editor_id , array(
		"textarea_name" => "mycustomeditor"

	));

?>