
<table cellspacing="2" cellpadding="5" style="width: 100%;" id="tb-product-hl" class="form-table tb-product-hl">
    <tbody>
        <tr class="form-field">
            <th style="text-align: center" scope="row">
                <label><?php _e('Title / Content', 'product_content')?></label>
            </th>
            <th style="text-align: center" scope="row">
                <label><?php _e('Image', 'product_content')?></label>
            </th>
            <th>
                <input type="button"  value="<?php _e('Add', 'product_content')?>" id="add_hl" class="add_hl button-primary">
            </th>
            
        </tr>
        <?
        $gpm = get_post_meta($post->ID,"heightlight");
        $gpm = unserialize($gpm[0]);
       if(isset($gpm["hl_title"])):
        foreach($gpm["hl_title"] as $key => $val): ?>
        <tr class="form-field" style="border-bottom: 1px solid #cccccc">
            <td>
                <input  name="hl_title[]" type="text" style="width: 100%" value="<? echo $gpm["hl_title"][$key] ?>"
                       size="50" class="code field" placeholder="<?php _e('Your Title', 'product_content')?>" >
                <br>
                <br>
                <textarea name="hl_content[]" placeholder="Your Description" style="width:100%;height: 100px" ><? echo $gpm["hl_content"][$key] ?></textarea>
                
            </td>
            <td>
                <a class="button set-imgage-hl" >Browse File</a>
                <br>
                <br>
                 size recomend 80 * 80
                <br>
                <br>
                <? if($gpm["product_hl_src"][$key]) :?>
                    <img style="height:70px;" src="<? echo $gpm["product_hl_src"][$key]  ?>">
                    <input type="hidden" name="product_hl_src[]" value="<? echo $gpm["product_hl_src"][$key]  ?>" />
                    <input type="hidden" name="product_hl_alt[]" value="<? echo $gpm["product_hl_alt"][$key]  ?>" />
                    <input type="hidden" name="product_hl_title[]" value="<? echo $gpm["product_hl_title"][$key]  ?>" />
                <? else: ?>
                    <img style="height:70px;" src="<? echo plugin_dir_url( __FILE__ )  ?>img/default.png">
                <? endif; ?>

                
            </td>
            <td style="vertical-align: middle">
                <a class="del-hl button" href="javascript:;" type="button" >delete</a>
            </td>
        </tr>
        <?endforeach;endif?>
        <? if(!isset($gpm["hl_title"])): ?>
        <tr class="form-field">
            <td>
                <input  name="hl_title[]" type="text" style="width: 100%" value=""
                       size="50" class="code field" placeholder="<?php _e('Your Title', 'product_content')?>" >
            	<br>
            	<br>
            	<textarea name="hl_content[]" placeholder="Your Description" style="width:100%;height: 100px" ></textarea>
            	
            </td>
            <td>
                <a class="button set-imgage-hl" >Browse File</a>
                <br>
                <br>
                 size recomend 80*80
                <br>
                <br>
                <img style="height:70px;" src="<? echo plugin_dir_url( __FILE__ )  ?>img/default.png">
            </td>
            <td style="vertical-align: middle">
                <a class="del-hl button" href="javascript:;" type="button" >delete</a>
            </td>
        </tr>
    <? endif; ?>

    </tbody>
</table>
