<div class="wrap" ng-app="app">
    <div class="icon32 icon32-posts-post" id="icon-edit"><br></div>
    <h2>
        <?php _e('Request Demo', 'request_demo')?> 
        <a class="add-new-h2" href="<?php echo get_admin_url(get_current_blog_id(), 'admin.php?page=request_demos');?>">
            <?php _e('back to list', 'request_demo')?>
        </a>
    </h2>

    <?php if (!empty($notice)): ?>
    <div id="notice" class="error"><p><?php echo $notice ?></p></div>
    <?php endif;?>
    <?php if (!empty($message)): ?>
    <div id="message" class="updated"><p><?php echo $message ?></p></div>
    <?php endif;?>

    <form id="form" method="POST" action="">
        <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('request_demo')?>"/>
        <?php /* NOTICE: here we storing id to determine will be item added or updated */ ?>
        <input type="hidden" name="id" value="<?php echo $item['id'] ?>"/>

        <div class="metabox-holder" id="poststuff">
            <div id="post-body">
                <div id="post-body-content" ng-controller="main" ng-init="defind_val(<?php echo ($item['category_id'])? $item['category_id'] : 0 ?>,<?php echo ($item['product_id'])?$item['product_id'] : 0?>,<?php echo ($item['series_id'])?$item['series_id']:0?>)">
                    <?php /* And here we call our custom meta box */ ?>
                    <?php do_meta_boxes('add_form', 'normal', $item); ?>
                    <input type="submit" value="<?php _e('Save', 'request_demo')?>" id="submit" class="button-primary" name="submit">
                </div>
            </div>
        </div>
    </form>
</div>