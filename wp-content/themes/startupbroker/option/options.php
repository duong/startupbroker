<?php
       if ( ! class_exists( 'D_Theme_Options' ) ) {
 
                /* class D_Theme_Options sẽ chứa toàn bộ code tạo options trong theme từ Redux Framework */
	      	class D_Theme_Options {
	      		public $args = array();
				public $sections = array();
				public $theme;
				public $ReduxFramework;

								/* Load Redux Framework */
				 public function __construct() {
				 
				     if ( ! class_exists( 'ReduxFramework' ) ) {
				         return;
				     }
				 
				     // This is needed. Bah WordPress bugs.  <img src="http://smartfix.com/wp-includes/images/smilies/icon_wink.gif" alt=";)" class="wp-smiley">
				     if ( true == Redux_Helpers::isTheme( __FILE__ ) ) {
				         $this->initSettings();
				     } else {
				         add_action( 'plugins_loaded', array( $this, 'initSettings' ), 10 );
				     }
				 
				 }

				 /**
					*Thiết lập các method muốn sử dụng
                     *   Method nào được khai báo trong này thì cũng phải được sử dụng
                    **/
				public function initSettings() {
				 
				    // Set the default arguments
				    $this->setArguments();
				 
				    // Set a few help tabs so you can see how it's done
				    $this->setHelpTabs();
				 
				    // Create the sections and fields
				    $this->setSections();
				 
				    if ( ! isset( $this->args['opt_name'] ) ) { // No errors please
				        return;
				    }
				 
				    $this->ReduxFramework = new ReduxFramework( $this->sections, $this->args );
				}

				/**
				*Thiết lập cho method setAgruments
				*Method này sẽ chứa các thiết lập cơ bản cho trang Options Framework như tên menu chẳng hạn
				**/
				public function setArguments() {
				    $theme = wp_get_theme(); // Lưu các đối tượng trả về bởi hàm wp_get_theme() vào biến $theme để làm một số việc tùy thích.
				    $this->args = array(
				            // Các thiết lập cho trang Options
				            'opt_name'  => 'tp_options', // Tên biến trả dữ liệu của từng options, ví dụ: tp_options['field_1']
				            'display_name' => $theme->get( 'Name' ), // Thiết lập tên theme hiển thị trong Theme Options
				            'menu_type'          => 'menu',
				        'allow_sub_menu'     => true,
				        'menu_title'         => __( 'Theme Options', 'startupbroker' ),
				        'page_title'         => __( 'Theme Options', 'startupbroker' ),
				        'dev_mode' => false,
				        'customizer' => true,
				        'menu_icon' => '', // Đường dẫn icon của menu option
				        // Chức năng Hint tạo dấu chấm hỏi ở mỗi option để hướng dẫn người dùng */
				        'hints'              => array(
				            'icon'          => 'icon-question-sign',
				            'icon_position' => 'right',
				            'icon_color'    => 'lightgray',
				            'icon_size'     => 'normal',
				            'tip_style'     => array(
				                'color'   => 'light',
				                'shadow'  => true,
				                'rounded' => false,
				                'style'   => '',
				            ),
				            'tip_position'  => array(
				                'my' => 'top left',
				                'at' => 'bottom right',
				            ),
				            'tip_effect'    => array(
				                'show' => array(
				                    'effect'   => 'slide',
				                    'duration' => '500',
				                    'event'    => 'mouseover',
				                ),
				                'hide' => array(
				                    'effect'   => 'slide',
				                    'duration' => '500',
				                    'event'    => 'click mouseleave',
				                ),
				            ),
				        ) // end Hints
				    );
				}

				/**
				*Thiết lập khu vực Help để hướng dẫn người dùng
				**/
				public function setHelpTabs() {
				 
				    // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
				    $this->args['help_tabs'][] = array(
				        'id'      => 'redux-help-tab-1',
				        'title'   => __( 'Theme Information 1', 'smartfix' ),
				        'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'smartfix' )
				    );
				 
				    $this->args['help_tabs'][] = array(
				        'id'      => 'redux-help-tab-2',
				        'title'   => __( 'Theme Information 2', 'smartfix' ),
				        'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'smartfix' )
				    );
				 
				    // Set the help sidebar
				    $this->args['help_sidebar'] = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'smartfix' );
				}

				/**
				*Thiết lập từng phần trong khu vực Theme Options
				*mỗi section được xem như là một phân vùng các tùy chọn
				*Trong mỗi section có thể sẽ chứa nhiều field
				**/
				public function setSections() {
				 
				 
				    // Home Section
				    $this->sections[] = array(
				        'title'  => __( 'Header', 'smartfix' ),
				        'desc'   => __( 'All of settings for header on this theme.', 'smartfix' ),
				        'icon'   => '',
				        'fields' => array(
						    // Mỗi array là một field
						    array(
						        'id'       => 'logo-on',
						        'type'     => 'switch',
						        'title'    => __( 'Enable Image Logo', 'smartfix' ),
						        'compiler' => 'bool', // Trả về giá trị kiểu true/false (boolean)
						        'desc'     => __( 'Do you want to use image as a logo?', 'smartfix' ),
						        'on' => __( 'Enabled', 'smartfix' ),
						        'off' => __('Disabled')
						    ),
						 
						    array(
						        'id'       => 'logo-image',
						        'type'     => 'media',
						        'title'    => __( 'Logo Image', 'smartfix' ),
						        'desc'     => __( 'Image that you want to use as logo', 'smartfix' ),
						    ),
						    array(
						        'id'       => 'left-banner',
						        'type'     => 'media',
						        'title'    => __( 'Left Banner', 'smartfix' ),
						        'desc'     => __( 'Image that you want to use as banner on the left slide bar', 'smartfix' ),
						    ),
						    array(
							   'id'               => 'introduction',
							    'type'             => 'editor',
							    'title'            => __('Introduction', 'redux-framework-demo'), 
							    'subtitle'         => __('Describe your site here.', 'redux-framework-demo'),
							    'default'          => 'Smart Fix',
							    'args'   => array(
							        'teeny'            => true,
							        'textarea_rows'    => 10
							    )
							 )
						    )
						
				    ); // end section

					// Contact Section
				    $this->sections[] = array(
				        'title'  => __( 'Contact', 'contact' ),
				        'desc'   => __( 'All of settings for contact on this theme.', 'desc' ),
				        'icon'   => '',
				        'fields' => array(
						    // Mỗi array là một field
						    array(
						        'id'       => 'contact-logo-on',
						        'type'     => 'switch',
						        'title'    => __( 'Enable Contact Image Logo', 'contact-logo' ),
						        'compiler' => 'bool', // Trả về giá trị kiểu true/false (boolean)
						        'desc'     => __( 'Do you want to use image as a contact logo?', 'contact-logo' ),
						        'on' => __( 'Enabled', 'contact-image-logo' ),
						        'off' => __('Disabled')
						    ),
						 	array(
						 		'id' => 'contact-address1',
						 		'type' => 'text',
						 		'title' => 'Address1',
						 		'desc' => 'Contact address1'
						 	),
						 	array(
						 		'id' => 'contact-address2',
						 		'type' => 'text',
						 		'title' => 'Address2',
						 		'desc' => 'Contact address2'
						 	),
						 	array(
						 		'id' => 'contact-address3',
						 		'type' => 'text',
						 		'title' => 'Address3',
						 		'desc' => 'Contact address3'
						 	),
						 	array(
						 		'id' => 'contact-phone-number',
						 		'type' => 'text',
						 		'title' => 'Phone number',
						 		'desc' => 'Contact Phone number'
						 	),
						 	array(
						 		'id' => 'contact-fax',
						 		'type' => 'text',
						 		'title' => 'Fax number',
						 		'desc' => 'Contact fax number'
						 	),
						 	array(
						 		'id' => 'contact-email',
						 		'type' => 'text',
						 		'title' => 'Email',
						 		'desc' => 'Contact Email'
						 	),
						    // array(
						    //     'id'       => 'contact-logo',
						    //     'type'     => 'media',
						    //     'title'    => __( 'Contact Logo', 'contact-logo' ),
						    //     'desc'     => __( 'Image that you want to use as logo', 'contact-logo' ),
						    // ),
						    array(
							   'id'               => 'contact-intro',
							    'type'             => 'editor',
							    'title'            => __('Contact detail', 'contact-intro'), 
							    'subtitle'         => __('Describe your contact here.', 'contact-intro'),
							    'default'          => 'Smart Fix',
							    'args'   => array(
							        'teeny'            => true,
							        'textarea_rows'    => 10
							    )
							 ),
						  //   array(
							 //   'id'               => 'mail-in-repair',
							 //    'type'             => 'editor',
							 //    'title'            => __('Mail In Repair', 'mail-in-repair'), 
							 //    'subtitle'         => __('Describe your contact here.', 'mail-in-repair'),
							 //    'default'          => 'We are happy to offer Mail-In Repair services. ',
							 //    'args'   => array(
							 //        'teeny'            => true,
							 //        'textarea_rows'    => 10
							 //    )
							 // )
						 )
						
				    ); // end section

				 
				 // 	// Button Section
				 //    $this->sections[] = array(
				 //        'title'  => __( 'Button', 'button' ),
				 //        'desc'   => __( 'All of settings for Button on this theme.', 'button' ),
				 //        'icon'   => '',
				 //        'fields' => array(
					 
					// 	    array(
					// 	        'id'       => 'button-icon-faq-up',
					// 	        'type'     => 'media',
					// 	        'title'    => __( 'FAQ icons up', 'button-icon-faq-title' ),
					// 	        'desc'     => __( 'Image that you want to use as logo', 'button-icon-faq-desc' ),
					// 	    ),
					// 	     array(
					// 	        'id'       => 'button-icon-faq-down',
					// 	        'type'     => 'media',
					// 	        'title'    => __( 'FAQ icons down', 'button-icon-faq-title' ),
					// 	        'desc'     => __( 'Image that you want to use as logo', 'button-icon-faq-desc' ),
					// 	    ),
					// 	      array(
					// 	        'id'       => 'button-icon-click-here',
					// 	        'type'     => 'media',
					// 	        'title'    => __( 'Click here to learn more', 'button-icon-faq-click-here-title' ),
					// 	        'desc'     => __( 'Image that you want to use as Click here to learn more', 'button-icon-faq-click-here-desc' ),
					// 	    ),
					// 	      array(
					// 	        'id'       => 'button-icon-back',
					// 	        'type'     => 'media',
					// 	        'title'    => __( 'Back button', 'button-button-title' ),
					// 	        'desc'     => __( 'Image that you want to use as Back button', 'button-back-button-desc' ),
					// 	    ),
					// 	 )
						
				 //    ); // end section

					// // Background Section
					// $fields[] = array(
					//     'id'       => 'background-header',
					//     'type'     => 'background',
					//     'title'    => __('Menu Background', 'redux-framework-demo'),
					//     'subtitle' => __('Menu background with color.', 'redux-framework-demo'),
					//     'desc'     => __('Color that you want to use as Menu background', 'redux-framework-demo'),
					//     'default'  => array(
					//         'background-color' => '#d8d8d8',
					//     )
					// );
					// $fields[] = array(
					//     'id'       => 'background-header2',
					//     'type'     => 'background',
					//     'title'    => __('Header Background', 'redux-framework-demo'),
					//     'subtitle' => __('Header background with color.', 'redux-framework-demo'),
					//     'desc'     => __('Color that you want to use as Header background', 'redux-framework-demo'),
					//     'default'  => array(
					//         'background-color' => '#ffffff',
					//     )
					// );
					// $fields[] = array(
					//     'id'       => 'background-body',
					//     'type'     => 'background',
					//     'title'    => __('Body Background', 'redux-framework-demo'),
					//     'subtitle' => __('Body background with color.', 'redux-framework-demo'),
					//     'desc'     => __('Color that you want to use as Body background', 'redux-framework-demo'),
					//     'default'  => array(
					//         'background-color' => '#ffffff',
					//     )
					// );
					// $fields[] = array(
					//     'id'       => 'background-brands-area',
					//     'type'     => 'background',
					//     'title'    => __('Brands Area Background', 'redux-framework-demo'),
					//     'subtitle' => __('Brands Area background with color.', 'redux-framework-demo'),
					//     'desc'     => __('Color that you want to use as Brands Area background', 'redux-framework-demo'),
					//     'default'  => array(
					//         'background-color' => '#0c9eef',
					//     )
					// );
					// $fields[] = array(
					//     'id'       => 'background-faq',
					//     'type'     => 'background',
					//     'title'    => __('FAQ Background', 'redux-framework-demo'),
					//     'subtitle' => __('FAQ background with color.', 'redux-framework-demo'),
					//     'desc'     => __('Color that you want to use as FAQ Area background', 'redux-framework-demo'),
					//     'default'  => array(
					//         'background-color' => '#F2F2F2',
					//     )
					// );
					// $fields[] = array(
					//     'id'       => 'background-contact',
					//     'type'     => 'background',
					//     'title'    => __('Contact Background', 'redux-framework-demo'),
					//     'subtitle' => __('Contact background with color.', 'redux-framework-demo'),
					//     'desc'     => __('Color that you want to use as Contact background', 'redux-framework-demo'),
					//     'default'  => array(
					//         'background-color' => '#414042',
					//     )
					// );
					// $fields[] = array(
					//     'id'       => 'background-mail-repair-header',
					//     'type'     => 'background',
					//     'title'    => __('Mail Repair Header Background', 'redux-framework-demo'),
					//     'subtitle' => __('Mail Repair Header Background color.', 'redux-framework-demo'),
					//     'desc'     => __('Color that you want to use as Mail Repair Header Background', 'redux-framework-demo'),
					//     'default'  => array(
					//         'background-color' => '#414042',
					//     )
					// );
				 //    $this->sections[] = array(
				 //        'title'  => __( 'Background', 'Background' ),
				 //        'desc'   => __( 'All of settings for Background on this theme.', 'button' ),
				 //        'icon'   => 'el-icon-bg',
				 //        'fields' => $fields
						
				 //    ); // end section

				 //    // Social Section
				 //    $this->sections[] = array(
				 //        'title'  => __( 'Social', 'social' ),
				 //        'desc'   => __( 'All of settings for Social network on this theme.', 'social' ),
				 //        'icon'   => '',
				 //        'fields' => array(
					 
					// 	    array(
					// 	        'id'       => 'social-fa',
					// 	        'type'     => 'text',
					// 	        'title'    => __( 'Facebook link:', 'social-fa-title' ),
					// 	        'desc'     => __( 'URL that you want to use as facebook url', 'social-fa-desc' ),
					// 	    ),
					// 	    array(
					// 		    'id'       => 'background-fa',
					// 		    'type'     => 'background',
					// 		    'title'    => __('Background of Facebook icon', 'redux-framework-demo'),
					// 		    'desc'     => __('Color that you want to use as Facebook icon background', 'redux-framework-demo'),
					// 		    'default'  => array(
					// 		        'background-color' => '#003366',
					// 	    	),
					// 	    ),
					// 	     array(
					// 	        'id'       => 'social-tw',
					// 	        'type'     => 'text',
					// 	        'title'    => __( 'Twitter link:', 'social-tw-title' ),
					// 	        'desc'     => __( 'URL that you want to use as Twitter url', 'social-tw-desc' ),
					// 	    ),
					// 	     array(
					// 		    'id'       => 'background-tw',
					// 		    'type'     => 'background',
					// 		    'title'    => __('Background of Twitter icon', 'redux-framework-demo'),
					// 		    'desc'     => __('Color that you want to use as Facebook icon background', 'redux-framework-demo'),
					// 		    'default'  => array(
					// 		        'background-color' => '#0066FF',
					// 	    	)
					// 	 	)
						
				 //    )); // end section

				 //    // Mail Repair Section
				 //    $this->sections[] = array(
				 //        'title'  => __( 'Mail Repair', 'mail-repair' ),
				 //        'desc'   => __( 'All of settings for Mail Repair on this theme.', 'mail-repair' ),
				 //        'icon'   => '',
				 //        'fields' => array(
					 
					// 	    array(
					// 	        'id'       => 'mail-repair-header',
					// 	        'type'     => 'editor',
					// 	        'title'    => __( 'MAIL-IN REPAIR:', 'mail-repair-header-title' ),
					// 	        'desc'     => __( 'Text that you want to use as MAIL-IN REPAIR', 'mail-repair-header-desc' ),
					// 	        'args'   => array(
					// 		        'teeny'            => true,
					// 		        'textarea_rows'    => 10
					// 		    )
					// 	    ),
					// 	     array(
					// 	        'id'       => 'mail-repair-estimate',
					// 	        'type'     => 'editor',
					// 	        'title'    => __( 'FREE ESTIMATES:', 'mail-repair-estimate-title' ),
					// 	        'desc'     => __( 'Text that you want to use as FREE ESTIMATES', 'mail-repair-estimate-desc' ),
					// 	    ),
					// 	     array(
					// 	        'id'       => 'mail-repair-footer',
					// 	        'type'     => 'editor',
					// 	        'title'    => __( 'MAIL-IN REPAIR Footer:', 'mail-repair-footer-title' ),
					// 	        'desc'     => __( 'Text that you want to use as Part of Footer', 'mail-repair-footer-desc' ),
					// 	    ),
					// 	 )
						
				 //    ); // end section
				}



	 
	      	}
                  /* Kích hoạt class D_Theme_Options vào Redux Framework */
        	global $reduxConfig;
        	$reduxConfig = new D_Theme_Options();
      }