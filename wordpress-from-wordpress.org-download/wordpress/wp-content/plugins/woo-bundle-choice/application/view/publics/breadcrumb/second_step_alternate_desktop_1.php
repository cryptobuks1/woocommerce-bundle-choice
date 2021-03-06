<?php

/*
*	Template to show breadcrumb second step for desktop
*/

?>
<div class="onclick_redirect step <?php echo ($step==$order)?'active ':' '; ?>" data-begin="<?php echo get_term_link(get_term_by('slug', $second_slug, 'product_cat')->term_id,'product_cat').'EO_WBC=1&BEGIN='.$second_slug.'&STEP=1'; ?>">            
    <div class="ui equal width grid" style="width: 100%;margin-top: -1em !important;">
        <div class="column">2</div>
        <div class="column" style="text-align: left;">

            <?php if(empty($second)):?>        
                <div class="description">Choose a</div>
                <div class="title"><?php _e($second_name); ?></div>
                <div>&nbsp;</div>
            <?php else:?>
                <?php 
                    $view_url = !empty(wbc()->sanitize->get('SECOND')) ? eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_view_url(wbc()->sanitize->get('SECOND'),$order):'#';
                    $remove_url = !empty(wbc()->sanitize->get('SECOND'))?eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_change_url($order,wbc()->sanitize->get('SECOND')):'#';

                    if(empty($remove_url) or $remove_url=='#'){
                        $remove_url = !empty(wbc()->sanitize->get('SECOND'))?eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_change_url($order,sanitize_text_field($second)):'#';
                    }                                            
                if(empty($view_url) or $view_url=='#'){
                    ?>
                        <div class="description">Choose a</div>
                        <div class="title"><?php _e($second_name) ?></div>
                        <div>&nbsp;</div>
                    <?php
                } else {
                ?>
                <div class="description"><?php _e($second_name); ?></div>
                <div><?php _e(get_woocommerce_currency().wc_price($second->get_price())); ?></div>
                
                <div><u><a href="<?php echo $view_url; ?>">View</a></u>&nbsp;|&nbsp;<u><a href="<?php echo $remove_url; ?>" data-remove-url="<?php echo $remove_url; ?>"><?php _e(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_change_action_text','Change',true,true)); ?></a></u></div>
            <?php } endif; ?>                    
        </div>                
        <div class="column">
            <?php if(!empty($second_icon)): ?>
                <img src="<?php echo $second_icon; ?>" style="margin: auto;" class="ui mini image">
            <?php endif;?>
        </div>
    </div>            
</div>