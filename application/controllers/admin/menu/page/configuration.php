<?php
namespace eo\wbc\controllers\admin\menu\page;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Configuration' ) ) {
	class Configuration {

		private static $_instance;
		public static function instance() {
		if ( ! isset( self::$_instance ) ) {
				self::$_instance = new self;
			}

			return self::$_instance;
		}

		private function __construct() {
			// no implementation.
		}

		public static function get_form_definition( $is_add_sample_values = false ) {
			
			wbc()->load->model('admin/form-builder');
			wbc()->load->model('category-attribute');

			$form_definition = 	
					array(
						'config_automation'=>array(
							
								'label'=>'Sample Data',
								'form'=>array(
											'config_automation_visible_info'=>array(
												'label'=>eowbc_lang('This section will help you add sample data and configurations automatically so that you can preview how it would like after complete setup.'),
												'type'=>'visible_info',
												'class'=>array('fluid', 'medium'),
												'size_class'=>array('sixteen','wide'),
												'inline'=>false,
											),		
											'config_automation_link'=>array(
												'label'=>'Click here for automated configuration and setup',
												'type'=>'link',
												'attr'=>array("href='".admin_url('admin.php?page=eowbc&eo_wbc_view_auto_jewel=1')."'"),
												'class'=>array('secondary')	
											),
											/*'config_save_automation'=>array(
												'label'=>'Save',
												'type'=>'button',				
												'class'=>array('primary'),
												'attr'=>array("data-action='save'")
											)*/
										)							
							),
						'config_buttons_conf'=>array(
								'label'=>'Buttons',
								'form'=>array(
									'config_buttons_page'=>array(
											'label'=>'Choice button position',
											'type'=>'select',
											'value'=>wbc()->options->get_option('configuration','buttons_page'),
											'sanitize'=>'sanitize_text_field',
											'options'=>array(
													'0'=>'Custom landing page',
													'1'=>'Home page only',
													'2'=>'Shortcode only',
													'3'=>'Home page and Shortcode'
												),
											'class'=>array('fluid'),
											'size_class'=>array('eight','wide','required'),
											'inline'=>true,
										),
									'visible_info'=>array( 'label'=>'Choose where you want to display the Two Start with Action buttons. If you choose custom landing page a sample landing page will be provided.',
											'type'=>'visible_info',
											'class'=>array('fluid', 'small'),
											'size_class'=>array('sixteen','wide'),
										),
									'config_buttons_position'=>array(
											'label'=>'Choose where you want to display buttons on home page',
											'type'=>'link',
											'attr'=>array("href='".admin_url('customize.php?autofocus[control]=btn_position_setting_selector_btn')."'"),
											'class'=>array('secondary'/*,'hidden'*/)	
										),
									'config_view_custom_landing_link'=>array(
											'label'=>'View how landing page will look like',
											'type'=>'link',
											'attr'=>array("href='".get_permalink(get_page_by_path('design-your-own-ring'))."'"),
											'class'=>array('secondary'/*,'hidden'*/)	
										),
									'config_devider_make_pair'=>array(
											'label'=>'Make Pair Button',
											'type'=>'devider',
										),
									'config_enable_make_pair'=>array(
											'label'=>'Enabled?',
											'type'=>'checkbox',
											'value'=>array(wbc()->options->get_option('configuration','enable_make_pair')),
											'sanitize'=>'sanitize_text_field',
											'options'=>array('config_enable_make_pair'=>'Make pair button status.'),
											'class'=>array()
										),
									'config_label_make_pair'=>array(
											'label'=>'Button label',
											'type'=>'text',
											'value'=>wbc()->options->get_option('configuration','label_make_pair'),
											'class'=>array(),
											'size_class'=>array('eight','wide','required'),
											'inline'=>true,
										),
									'config_buttons_conf_save_btn'=>array(
												'label'=>'Save',
												'type'=>'button',		
												'class'=>array('primary'),
												'attr'=>array("data-action='save'")	
											)
									)
							),
						'config_navigation_conf'=>array(
								'label'=>'Navigations Steps( Breadcrumb )',
								'form'=>array(
									'devider_first_cat'=>array(
											'label'=>'First Category',
											'type'=>'devider',
										),
									'config_first_name'=>array(
											'label'=>'Name',
											'type'=>'select',
											'value'=>wbc()->options->get_option('configuration','first_name'),
											'sanitize'=>'sanitize_text_field',
											'options'=>\eo\wbc\model\Category_Attribute::instance()->get_category(),
											'class'=>array('fluid'),
											'size_class'=>array('eight','wide','required'),
											'inline'=>true,
										),
									'config_first_icon'=>array(
											'label'=>'Icon',
											'type'=>'icon',
											'value'=>wbc()->options->get_option('configuration','first_icon'),
											'sanitize'=>'sanitize_text_field',
											'class'=>array(),
											'size_class'=>array('eight','wide','required'),
											'inline'=>true,
										),
									'config_devider_second_cat'=>array(
											'label'=>'Second Category',
											'type'=>'devider',
										),
									'config_second_name'=>array(
											'label'=>'Name',
											'type'=>'select',
											'value'=>wbc()->options->get_option('configuration','second_name'),
											'sanitize'=>'sanitize_text_field',
											'options'=>\eo\wbc\model\Category_Attribute::instance()->get_category(),
											'class'=>array('fluid'),
											'size_class'=>array('eight','wide','required'),
											'inline'=>true,
										),
									'config_second_icon'=>array(
											'label'=>'Icon',
											'type'=>'icon',
											'value'=>wbc()->options->get_option('configuration','second_icon'),
											'sanitize'=>'sanitize_text_field',
											'class'=>array(),
											'size_class'=>array('eight','wide','required'),
											'inline'=>true,
										),
									'config_devider_preview'=>array(
											'label'=>'Preview',
											'type'=>'devider',
										),
									'config_preview_name'=>array(
											'label'=>'Name',
											'type'=>'text',
											'value'=>wbc()->options->get_option('configuration','preview_name'),
											'sanitize'=>'sanitize_text_field',
											'class'=>array('fluid'),
											'size_class'=>array('eight','wide','required'),
											'inline'=>true,
										),
									'config_preview_icon'=>array(
											'label'=>'Icon',
											'type'=>'icon',
											'value'=>wbc()->options->get_option('configuration','preview_icon'),	
											'sanitize'=>'sanitize_text_field',
											'class'=>array(),
											'size_class'=>array('eight','wide','required'),
											'inline'=>true,

										),
									'devider_alternate_breadcrumb'=>array(
											'label'=>' ',
											'type'=>'devider',
										),	
									'config_alternate_breadcrumb'=>array(
										'label'=>'Alternate Breadcrumb',
										'type'=>'radio',
										'value'=>wbc()->options->get_option('configuration','config_alternate_breadcrumb','default'),
										'sanitize'=>'sanitize_text_field',
										'options'=>array('default'=>'Default','template_1'=>'Template 1','template_2'=>'Template 2'),
										'class'=>array(),
										'size_class'=>array('required'),
										'visible_info'=>array( 'label'=>'( Switch to other look of breadcrumb. )',
											'type'=>'visible_info',
											'class'=>array('fluid', 'small'),
											'size_class'=>array('sixteen','wide'),
										),	
									),								
									'config_navigation_conf_save_btn'=>array(
												'label'=>'Save',
												'type'=>'button',		
												'class'=>array('primary'),
												'attr'=>array("data-action='save'")	
											)
									)
							),						
					);
					
			$features = unserialize(wbc()->options->get_option('setting_status_setting_status_setting','features',serialize(array())));
					
			if(!empty($features['pair_maker'])) {
				$form_definition['config_extra_conf'] = array(
							'label'=>'Extra',
							'form'=>array(									
								
								'config_devider_pair_maker'=>array(
										'label'=>'Pair Maker Configuration',
										'type'=>'devider',
									),
								/*'config_pair_maker_status'=>array(
										'label'=>'Pair Maker Status',
										'type'=>'checkbox',
										'value'=>array(wbc()->options->get_option('configuration','pair_maker_status')),
										'options'=>array('config_pair_maker_status'=>' Check here to enable pair maker view at second step of category page.'),
										'class'=>array(),
										'size_class'=>array('eight','wide'),
										'inline'=>true,
									),*/
								'config_pair_maker_upper_card'=>array(
										'label'=>'Icon',
										'type'=>'radio',
										'value'=>wbc()->options->get_option('configuration','pair_maker_upper_card'),
										'sanitize'=>'sanitize_text_field',
										'options'=>array('first'=>'First Category','second'=>'Second Category'),
										'class'=>array(),
										'size_class'=>array('eight','wide'),
										'inline'=>true,
									),								
								'config_extra_conf_save_btn'=>array(
											'label'=>'Save',
											'type'=>'button',		
											'class'=>array('primary'),
											'attr'=>array("data-action='save'")
										)
								)
						);
			}

			if($is_add_sample_values) {
				//loop through form tabs and set (random) sample values for each field  
				foreach ($form_definition as $key => $tab) {
			    	foreach ($tab["form"] as $fk => $fv) {
					    //here we can override any particular field which needs specific sample values 
					    if( $fv["type"] == "text" || $fv["type"] == "hidden" || $fv["type"] == "textarea" ) {	//non numeric 
							$form_definition[$key]["form"][$fk]["sample_values"] = array( "abc", "xyz", "def", "uvw" );
					    } 
					    else if( $fv["type"] == "color" ) {	
							$form_definition[$key]["form"][$fk]["sample_values"] = array( "red", "white", "green", "black" );
					    } 
					    
					    //no need to set for select/radio/checkboxes as we can use sample from its available options 
						
					}
			    }
			}

			return $form_definition;

		}

	}
}		