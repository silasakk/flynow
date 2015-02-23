<p class="hide-if-no-js">
    
    <a title="Set Product Gallery Image" href="javascript:;" id="set-product-gallery-image">Set product gallery image</a>
</p>

<ul id="product-gallery-image-container" data-post-id="<? echo $post->ID ?>" class="hidden">
    
    <?
    $src = get_post_meta( $post->ID, 'product_gallery_src', false );
    $alt = get_post_meta( $post->ID, 'product_gallery_alt', false );
    $title = get_post_meta( $post->ID, 'product_gallery_title', false );
    foreach($src as $key => $val):?>
        <li>
            <a href="javascript:;" class="rm-thumbnail">Delete</a>
            <img src="<? echo $src[$key] ?>" alt="<? echo $alt[$key] ?>" title="<? echo $title[$key] ?>" />
            <input type="hidden" value="<? echo $src[$key] ?>" name="product_gallery_src[]" type="text">
            <input type="hidden" value="<? echo $alt[$key] ?>" name="product_gallery_alt[]" type="text">
            <input type="hidden" value="<? echo $title[$key] ?>" name="product_gallery_title[]" type="text">
        </li>

    <?endforeach;?>
   
</ul>




