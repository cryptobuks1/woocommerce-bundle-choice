<?php


/*
*	Woocommerc Category and Attribute Model.
*/

namespace eo\wbc\model\admin;

defined( 'ABSPATH' ) || exit;

class Eowbc_Setting_Status {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}


	public function get( $form_definition ) {
		wbc()->sanitize->clean($form_definition);
		//loop through form tabs and save 
	    foreach ($form_definition as $key => $tab) {
	    	foreach ($tab["form"] as $fk => $fv) {
			    //loop through form fields and read values from options and store in the form_definition 

	    		if( $fk == "send_error_log_subject" ) {
	    			$form_definition[$key]["form"][$fk]["value"] = \EOWBC_Error_Handler::get_subject();
	    			continue;
	    		}
	    		elseif( $fk == "eo_wbc_view_error" ) {
	    			$form_definition[$key]["form"][$fk]["value"] = \EOWBC_Error_Handler::get_logs();
	    			// wbc()->common->pr($form_definition[$key]["form"], false, false);
	    			continue;
	    		}

				$form_definition[$key]["form"][$fk]["value"] = wbc()->options->get_option('setting_status_'.$key,$fk, isset($form_definition[$key]["form"][$fk]["value"]) ? $form_definition[$key]["form"][$fk]["value"] : '');

    			if($fv["type"]=='checkbox' and isset($fv["grouped"]) and $fv["grouped"] and is_array($fv["options"]) and !empty($fv["options"])) {

    				/*$checbox_status = unserialize($form_definition[$key]["form"][$fk]["value"]);*/
    				$checbox_status = ($form_definition[$key]["form"][$fk]["value"]);
    				if(is_array($checbox_status)){
    					$form_definition[$key]["form"][$fk]["value"] = array_values($checbox_status);
    				}
		    	}
			}
	    }

	    return $form_definition;	

	}


	public function save( $form_definition ) {
		
		wbc()->sanitize->clean($form_definition);

		$res = array();
		$res["type"] = "success";

	    $res["msg"] = "Saved Sucessfully!";
		wbc()->load->model('admin\form-builder');

		$saved_tab_key = !empty($_POST["saved_tab_key"]) ? $_POST["saved_tab_key"] : ""; 

	    //loop through form tabs and save 
		if( $saved_tab_key != "setting_status_log" ) {

		    foreach ($form_definition as $key => $tab) {
		    	if( $key != $saved_tab_key ) {
		    		continue;
		    	}

		    	foreach ($tab["form"] as $fk => $fv) {
				    //loop through form fields, read from POST/GET and save
				    //may need to check field type here and read accordingly only
				    //only for those for which POST is set
				    if($fv["type"]=='checkbox' and is_array($fv["options"]) and !empty($fv["options"])) {

			    		$checkbox_keys= array_keys($fv["options"]);
			    		$checbox_status = array();
			    		foreach($checkbox_keys as $checkbox_key){
			    			if(empty($_POST[$checkbox_key])){
			    				$checbox_status[$checkbox_key]='';
			    			} else {
			    				$checbox_status[$checkbox_key]=$_POST[$checkbox_key];
			    			}
			    		}
			    		$_POST[$fk] = serialize($checbox_status);		    		
			    	}

				    if( in_array($fv["type"], \eo\wbc\model\admin\Form_Builder::savable_types()) && isset($_POST[$fk]) ) {
				    	
				    	wbc()->options->update_option('setting_status_'.$key,$fk,(empty($_POST[$fk])? $_POST[$fk]: sanitize_text_field( $_POST[$fk] ) ) );	
				    }
				}
		    }
		    
		    //this is a specific connected config to the pair_maker_status from feature option pair_maker 
		    if( $saved_tab_key == "setting_status_setting" ) {
		    	wbc()->options->update_option('configuration','pair_maker_status',(empty($_POST['pair_maker'])?'':sanitize_text_field($_POST['pair_maker'])));
		    }
		}
		else {
			\EOWBC_Error_Handler::eo_wbc_send_error_report();	
			$res["msg"] = "Thank you for sending error report, Sphere Plugins Support Team will soon get in touch with you. It generally takes 12 hours.";
		}	    
        return $res;
	}	
}
