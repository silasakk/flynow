
	<? 
	$field1 = get_post_meta( $post->ID, '_short_desc', true );
	$field2 = get_post_meta( $post->ID, '_desc', true ); 

	?>
	<table class="form-table">
		<tr class="form-field">
			<td><label>Title Short text</label></td>
			<td><input name="short_desc" style="width: 100%" value="<? echo $field1 ?>" size="50" class="code field" placeholder="Your short description" type="text" ></td>
		</tr>
		<tr class="form-field">
			<td><label>Description</label></td>
			<td><textarea name="desc" style="width: 100%" placeholder="Your Description"class="code field" ><? echo $field2 ?></textarea></td>
		</tr>
	</table>



