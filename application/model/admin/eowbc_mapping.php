<?php


/*
*	Woocommerc Category and Attribute Model.
*/

namespace eo\wbc\model\admin;

defined( 'ABSPATH' ) || exit;

class Eowbc_Mapping {

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
		
		//loop through form tabs and save 
	    foreach ($form_definition as $key => $tab) {
	    	//loop through form fields and read values from options and store in the form_definition 
			foreach ($tab["form"] as $fk => $fv) {
				if( $fv["type"] == "table" ) {
					// wbc()->options->update_option_group( 'mapping_'.$key, serialize(array()) );
					$mapping_data = unserialize(wbc()->options->get_option_group('mapping_'.$key,"a:0:{}"));
					// wbc()->common->pr($mapping_data, false, false);

					$body = array();
					foreach ($mapping_data as $rk => $rv) {
						$row = array();

						//
						$row[] =array(
								'is_header' => 0, 
								'val' => '',
								'is_checkbox' => true, 
								'checkbox'=> array('id'=>$rv["id"],'value'=>array(),'options'=>array($rv["id"]=>''),'class'=>'','where'=>'in_table')
							);

						foreach ($rv as $rvk => $rvv) {
							//skip the id and other applicable fields 
							if( $rvk == "id" || $rvk == "range_first" || $rvk == "range_second" || $rvk == "eo_wbc_first_category_range" || $rvk == "eo_wbc_second_category_range" ) {
								continue;
							}

							if( $rvk == "eo_wbc_first_category" ) {
								if( wbc()->common->nonZeroEmpty($rv["eo_wbc_first_category_range"]) || wbc()->common->nonZeroEmpty($rv["range_first"]) ) {
									$val = wbc()->common->dropdownSelectedvalueText($tab["form"][$rvk], $rvv);
									$row[] = array( 'val' => !is_array($val)?$val:$val["label"] );	
								}
								else {
									$val = wbc()->common->dropdownSelectedvalueText($tab["form"][$rvk], $rvv);
									$val1 = wbc()->common->dropdownSelectedvalueText($tab["form"]["eo_wbc_first_category_range"], $rv["eo_wbc_first_category_range"]);
									$row[] = array( 'val' =>  "Range from <strong>".(!is_array($val)?$val:$val["label"])."</strong> to <strong>".(!is_array($val1)?$val1:$val1["label"])."</strong>" );
								}	
							}
							else if( $rvk == "eo_wbc_second_category" ) {
								if( wbc()->common->nonZeroEmpty($rv["eo_wbc_second_category_range"]) || wbc()->common->nonZeroEmpty($rv["range_second"]) ) {
									$val = wbc()->common->dropdownSelectedvalueText($tab["form"][$rvk], $rvv);
									$row[] = array( 'val' => !is_array($val)?$val:$val["label"] );
								}
								else {
									$val = wbc()->common->dropdownSelectedvalueText($tab["form"][$rvk], $rvv);
									$val1 = wbc()->common->dropdownSelectedvalueText($tab["form"]["eo_wbc_second_category_range"], $rv["eo_wbc_second_category_range"]);
									$row[] = array( 'val' => "Range from <strong>".(!is_array($val)?$val:$val["label"])."</strong> to <strong>".(!is_array($val1)?$val1:$val1["label"])."</strong>" );
								}	
							}
							else {
								$row[] = array( 'val' => $rvv );	
							}
						}

						$body[] = $row;
					}
					
					$form_definition[$key]["form"][$fk]["body"]= $body;
				}
				else {
					$form_definition[$key]["form"][$fk]["value"] = wbc()->options->get_option('mapping_'.$key,$fk, isset($form_definition[$key]["form"][$fk]["value"]) ? $form_definition[$key]["form"][$fk]["value"] : '');	
				}
			    
			}
	    }

	    return $form_definition;
	}

	public function save( $form_definition ) {
		
		$res = array();
		$res["type"] = "success";
	    $res["msg"] = "";
	    
		wbc()->load->model('admin\form-builder');

		$saved_tab_key = !empty($_POST["saved_tab_key"]) ? $_POST["saved_tab_key"] : ""; 
		$skip_fileds = array('saved_tab_key');
		
	    //loop through form tabs and save 
	    foreach ($form_definition as $key => $tab) {
	    	if( $key != $saved_tab_key ) {
	    		continue;
	    	}

			$is_table_save = $key != "prod_mapping_pref" ? true : false;
			$table_data = array();
			$tab_specific_skip_fileds = $is_table_save ? array('eowbc_price_control_methods_list_bulk') : array();

	    	foreach ($tab["form"] as $fk => $fv) {

			    //loop through form fields, read from POST/GET and save
			    //may need to check field type here and read accordingly only
			    //only for those for which POST is set
			    if( in_array($fv["type"], \eo\wbc\model\admin\Form_Builder::savable_types()) && isset($_POST[$fk]) ) {
			    	//skip fields where applicable
					if( in_array($fk, $skip_fileds) ) {
		    			continue;
		    		}

		    		if( in_array($fk, $tab_specific_skip_fileds) ) {
		    			continue;
		    		}

		    		//save
			    	if( $is_table_save ) {
			    		$table_data[$fk] = (empty($_POST[$fk])? $_POST[$fk]: sanitize_text_field( $_POST[$fk] ) ); 
			    	}
			    	else {
			    		wbc()->options->update_option('mapping_'.$key,$fk,(empty($_POST[$fk])? $_POST[$fk]: sanitize_text_field( $_POST[$fk] ) ) );
			    	}
			    }
			}

			if( $is_table_save ) {

				// global $wpdb;        
		  //       $eo_wbc_first_category=$_POST['eo_wbc_first_category'];
		  //       $eo_wbc_second_category=$_POST['eo_wbc_second_category'];

		  //       if(!empty($_POST['range_first'])) {
		  //           $eo_wbc_first_category=$eo_wbc_first_category.','.$_POST['eo_wbc_first_category_range'];
		  //       }    
		        
		  //       if(!empty($_POST['range_second'])) {
		  //           $eo_wbc_second_category=$eo_wbc_second_category.','.$_POST['eo_wbc_second_category_range'];
		  //       }

		  //       $eo_wbc_add_discount=$_POST['eo_wbc_add_discount']?$_POST['eo_wbc_add_discount']:0;

				$mapping_data = unserialize(wbc()->options->get_option_group('mapping_'.$key,"a:0:{}"));
		        
		        foreach ($mapping_data as $fdkey=>$value) {
		            
		            $match_found = false;
		            // foreach ($item as $key=>$value) {    

		                if(($value["eo_wbc_first_category"]==$table_data["eo_wbc_first_category"] and $value["eo_wbc_first_category_range"]==$table_data["eo_wbc_first_category_range"]) and ($value["eo_wbc_second_category"]==$table_data["eo_wbc_second_category"] and $value["eo_wbc_second_category_range"]==$table_data["eo_wbc_second_category_range"])) {                 
		                    $match_found = true;
		                    break;
		                } elseif(($value["eo_wbc_second_category"]==$table_data["eo_wbc_first_category"] and $value["eo_wbc_second_category_range"]==$table_data["eo_wbc_first_category_range"]) and ($value["eo_wbc_first_category"]==$table_data["eo_wbc_second_category"] and $value["eo_wbc_first_category_range"]==$table_data["eo_wbc_second_category_range"])) {
		                    $match_found = true;
		                    break;
		                }
		            // }

		            if ($match_found) { 
		                $res["type"] = "error";
		    			$res["msg"] = eowbc_lang('Mapping Already Exists');
		                return $res;
		            }
		        }

				$table_data["id"] = wbc()->common->createUniqueId();
		        $mapping_data[] = $table_data;

		        wbc()->options->update_option_group( 'mapping_'.$key, serialize($mapping_data) );

		        // TODO here it is better if we set it to 1 only if length of mapping_data is greater than zero and otherwise set to 0 if user removes maps and so on 
				wbc()->options->update_option('configuration','config_map',1);

		        $res["msg"] = eowbc_lang('New Mapping Added Successfully'); 
			}

	    }

        return $res;
	}

	public function delete( $ids, $saved_tab_key ) {
		
		$res = array();
		$res["type"] = "success";
	    $res["msg"] = "";
	    
    	$key = $saved_tab_key;

		$mapping_data = unserialize(wbc()->options->get_option_group('mapping_'.$key,"a:0:{}"));
		$mapping_data_updated = array();
        
        $delete_cnt = 0;
        foreach ($mapping_data as $fdkey=>$item) {
            
            if ( !in_array($item["id"], $ids) ) { 
                $mapping_data_updated[] = $item; 
            }
            else {
            	$delete_cnt++;
            }
        }

        wbc()->options->update_option_group( 'mapping_'.$key, serialize($mapping_data_updated) );
        $res["msg"] = $delete_cnt . " " . eowbc_lang('record(s) deleted'); 

        return $res;
	}

}
