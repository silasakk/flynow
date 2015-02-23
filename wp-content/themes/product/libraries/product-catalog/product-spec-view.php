
<table cellspacing="2" cellpadding="5" style="width: 100%;" id="tb-product-spec" class="form-table">
    <tbody>
        <tr class="form-field">
            <td style="text-align: center" scope="row">
                <label><?php _e('Field', 'product_spec')?></label>
            </td>
            <td style="text-align: center" scope="row">
                <label><?php _e('Value', 'product_spec')?></label>
            </td>
            <td>
                <input type="button" style="float: right" value="<?php _e('Add Spec', 'product_spec')?>" id="add-spec" class="button-primary" name="add-spec">
            </td>
            
        </tr>
        <?
        $field = get_post_meta( $post->ID, 'spec', false );
        
       
        foreach($field as $key => $val): $f = unserialize($val)?>
        <tr class="form-field">
            <td>
                <input  name="field[]" type="text" style="width: 100%" value="<? echo $f['field'] ?>"
                       size="50" class="code field" placeholder="<?php _e('Your Field', 'product_spec')?>" >
            </th>
            <td>
                <input  name="value[]" type="text" style="width: 100%" value="<? echo $f['value'] ?>"
                       size="50" class="code value" placeholder="<?php _e('Your Value', 'product_spec')?>" >
            </td>
            <td>
                <input class="del-spec" type="button" value="Delete" />
            </td>
        </tr>
        <?endforeach;?>
        <? if(count($field) == 0): ?>
        <tr class="form-field">
            <td>
                <input  name="field[]" type="text" style="width: 100%" value=""
                       size="50" class="code field" placeholder="<?php _e('Your Field', 'product_spec')?>" >
            </td>
            <td>
                <input  name="value[]" type="text" style="width: 100%" value=""
                       size="50" class="code value" placeholder="<?php _e('Your Value', 'product_spec')?>" >
            </td>
            <td>
                <input class="del-spec" type="button" value="Delete" />
            </td>
        </tr>
    <? endif; ?>

    </tbody>
</table>
