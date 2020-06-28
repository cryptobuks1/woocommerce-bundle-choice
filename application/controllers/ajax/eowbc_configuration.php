<?php
/**
*	Ajax handler to handle ajax save request for eowbc_configuration form.	
*
*/

$res = array( "type"=>"success", "msg"=>"Updated successfully!" );

if(wp_verify_nonce(sanitize_text_field($_POST['_wpnonce']),'eowbc_configuration')){
	
	/*wbc()->options->update_option('configuration','business_type',sanitize_text_field($_POST['config_business_type']));*/
	
	wbc()->load->model('category-attribute');

	if(wbc()->options->get_option('configuration','config_alternate_breadcrumb') !== $_POST['config_alternate_breadcrumb']) {
		
		if($_POST['config_alternate_breadcrumb'] =='template_1'){
			wbc()->options->update_option('appearance_filter','header_font','Avenir');
			wbc()->options->update_option('appearance_breadcrumb','breadcrumb_backcolor_active','#dde5ed');
			wbc()->options->update_option('appearance_breadcrumb','breadcrumb_backcolor_inactive','#ffffff');

		} elseif ($_POST['config_alternate_breadcrumb'] =='template_2') {
			wbc()->options->update_option('appearance_filter','header_font','ZapfHumanist601BT-Roman');
			wbc()->options->update_option('appearance_breadcrumb','breadcrumb_backcolor_active','#f7f7f7');	
			wbc()->options->update_option('appearance_breadcrumb','breadcrumb_backcolor_inactive','#ffffff');
		}
		
	}

	wbc()->options->update_option('configuration','config_alternate_breadcrumb',sanitize_text_field($_POST['config_alternate_breadcrumb']));

	wbc()->options->update_option('configuration','buttons_page',sanitize_text_field($_POST['config_buttons_page']));
	
	wbc()->options->update_option('configuration','enable_make_pair',(empty($_POST['config_enable_make_pair'])?'':sanitize_text_field($_POST['config_enable_make_pair'])));	
	
	wbc()->options->update_option('configuration','label_make_pair',sanitize_text_field($_POST['config_label_make_pair']));
	if(!empty($_POST['config_first_name'])){
		wbc()->options->update_option('configuration','first_name',sanitize_text_field($_POST['config_first_name']));

		wbc()->options->update_option('configuration','first_slug',@\eo\wbc\model\Category_Attribute::instance()->get_single_category((int)sanitize_text_field($_POST['config_first_name']))->slug );				
	} else {
		echo json_encode(array( "type"=>"error", "msg"=>"First category is required!" ));
		die();		
	}

	if(!empty($_POST['config_first_icon'])){
		wbc()->options->update_option('configuration','first_icon',sanitize_text_field($_POST['config_first_icon']));
	}	
	
	
	if(!empty($_POST['config_second_name'])){
		wbc()->options->update_option('configuration','second_name',sanitize_text_field($_POST['config_second_name']));

		wbc()->options->update_option('configuration','second_slug',@\eo\wbc\model\Category_Attribute::instance()->get_single_category(sanitize_text_field($_POST['config_second_name']))->slug);
	} else {
		echo json_encode(array( "type"=>"error", "msg"=>"Second category is required!" ));
		die();			
	}
	
	if(!empty($_POST['config_second_icon'])){
		wbc()->options->update_option('configuration','second_icon',sanitize_text_field($_POST['config_second_icon']));
	}
	
	if(!empty($_POST['config_preview_name'])){
		wbc()->options->update_option('configuration','preview_name',sanitize_text_field($_POST['config_preview_name']));	
	} else {
		echo json_encode(array( "type"=>"error", "msg"=>"Preview step name is required!" ));
		die();			
	}
	
	if(!empty($_POST['config_preview_icon'])){
		wbc()->options->update_option('configuration','preview_icon',sanitize_text_field($_POST['config_preview_icon']));	
	}	
	
	/*wbc()->options->update_option('configuration','filter_status',(empty($_POST['config_filter_status'])?'':sanitize_text_field($_POST['config_filter_status'])));*/

	wbc()->options->update_option('configuration','pair_maker_status',(empty($_POST['config_pair_maker_status'])?'':sanitize_text_field($_POST['config_pair_maker_status'])));

	wbc()->options->update_option('configuration','pair_maker_upper_card',(empty($_POST['config_pair_maker_upper_card'])?'':sanitize_text_field($_POST['config_pair_maker_upper_card'])));
		
	// TODO here it is better if we set it to 1 only if both category are set and otherwise set to 0 if user removes any categories 
	wbc()->options->update_option('configuration','config_category',1);

	//$res['msg'] = "Updated successfully!";
}
else {
	$res["type"] = "error";
	$res["msg"] = "Nonce validation failed";
}

 
echo json_encode($res);
