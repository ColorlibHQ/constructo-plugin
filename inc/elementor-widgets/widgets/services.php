<?php
namespace Constructoelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Constructo elementor service section widget.
 *
 * @since 1.0
 */
class Constructo_Services extends Widget_Base {

	public function get_name() {
		return 'constructo-service';
	}

	public function get_title() {
		return __( 'Services', 'constructo-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'constructo-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Services content ------------------------------
		$this->start_controls_section(
			'service_content',
			[
				'label' => __( 'Services content', 'constructo-companion' ),
			]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'constructo-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Our Services', 'constructo-companion' ),
            ]
        );
        $this->add_control(
            'bg_shape',
            [
                'label' => esc_html__( 'Right Top BG Shape', 'constructo-companion' ),
                'description' => esc_html__( 'Best size is 155x185', 'constructo-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
		$this->add_control(
            'services', [
                'label' => __( 'Create New', 'constructo-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ item_title }}}',
                'fields' => [                    
                    [
                        'name' => 'item_img',
                        'label' => __( 'Item Image', 'constructo-companion' ),
                        'description' => __( 'Best size is 362x270', 'constructo-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src()
                        ],
                    ],
                    [
                        'name' => 'item_title',
                        'label' => __( 'Item Title', 'constructo-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'maintenance & Repair', 'constructo-companion' ),
                    ],
                    [
                        'name' => 'item_text',
                        'label' => __( 'Item Text', 'constructo-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( 'There are many variations of passages of lorem Ipsum available.', 'constructo-companion' ),
                    ],
                    [
                        'name' => 'anchor_txt',
                        'label' => __( 'Anchor Text', 'constructo-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'More', 'constructo-companion' ),
                    ],
                    [
                        'name' => 'anchor_url',
                        'label' => __( 'Service Page URL', 'constructo-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' =>'#'
                        ],
                    ],
                ],
                'default'   => [
                    [
                        'item_img'   => [
                            'url' => Utils::get_placeholder_image_src()
                        ],
                        'item_title' => __( 'Planing', 'constructo-companion' ),
                        'item_text'  => __( 'There are many variations of passages of lorem Ipsum available.', 'constructo-companion' ),
                        'anchor_txt' => __( 'More', 'constructo-companion' ),
                        'anchor_url' => [
                            'url' => '#'
                        ],
                    ],
                    [
                        'item_img'   => [
                            'url' => Utils::get_placeholder_image_src()
                        ],
                        'item_title' => __( 'Building Construction', 'constructo-companion' ),
                        'item_text'  => __( 'There are many variations of passages of lorem Ipsum available.', 'constructo-companion' ),
                        'anchor_txt' => __( 'More', 'constructo-companion' ),
                        'anchor_url' => [
                            'url' => '#'
                        ],
                    ],
                    [
                        'item_img'   => [
                            'url' => Utils::get_placeholder_image_src()
                        ],
                        'item_title' => __( 'Bridge & Road Construction', 'constructo-companion' ),
                        'item_text'  => __( 'There are many variations of passages of lorem Ipsum available.', 'constructo-companion' ),
                        'anchor_txt' => __( 'More', 'constructo-companion' ),
                        'anchor_url' => [
                            'url' => '#'
                        ],
                    ],
                ]
            ]
        );
		$this->end_controls_section(); // End service content

    /**
     * Style Tab
     * ------------------------------ Style Section Heading ------------------------------
     *
     */

        $this->start_controls_section(
            'style_room_section', [
                'label' => __( 'Style Service Section', 'constructo-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'big_title_col', [
                'label' => __( 'Section Title Color', 'constructo-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .expert_doctors_area .doctors_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'single_item_styles_seperator',
            [
                'label' => esc_html__( 'Single Item Styles', 'constructo-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'member_name_col', [
                'label' => __( 'Member Name Color', 'constructo-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .expert_doctors_area .single_expert .experts_name h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'member_desig_color', [
                'label' => __( 'Member Designation Color', 'constructo-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .expert_doctors_area .single_expert .experts_name span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'single_item_bg_styles_seperator',
            [
                'label' => esc_html__( 'Single Item Bg Styles', 'constructo-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'member_bg_color', [
                'label' => __( 'Bg Color', 'constructo-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .expert_doctors_area .single_expert .experts_name' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'hover_member_bg_color', [
                'label' => __( 'Item Hover Bg Color', 'constructo-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .expert_doctors_area .single_expert:hover .experts_name' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
    // call load widget script
    $this->load_widget_script(); 
    $settings  = $this->get_settings();
    $sec_title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $bg_shape = !empty( $settings['bg_shape']['id'] ) ? wp_get_attachment_image( $settings['bg_shape']['id'], 'constructo_about_shape_155x185', '', array( 'alt' => constructo_image_alt( $settings['bg_shape']['url'] ) ) ) : '';
    $services = !empty( $settings['services'] ) ? $settings['services'] : '';
    ?>

    <!-- service_area_start  -->
    <div class="service_area">
        <div class="container">
            <?php 
                if ( $sec_title ) { 
                    echo '
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="section_title text-center mb-50">
                                <h3>'.esc_html( $sec_title ).'</h3>
                            </div>
                        </div>
                    </div>
                    ';
                }
            ?>

            <div class="border_bottom_1px position-relative">
                <?php 
                    if ( $bg_shape ) { 
                        echo '
                        <div class="pattern_img d-none d-xl-block">
                            '.$bg_shape.'
                        </div>
                        ';
                    }
                ?>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="service_active owl-carousel">
                            <?php
                            if( is_array( $services ) && count( $services ) > 0 ){
                                foreach ( $services as $service ) {
                                    $item_img = !empty( $service['item_img']['id'] ) ? wp_get_attachment_image( $service['item_img']['id'], 'constructo_service_thumb_362x270', '', array( 'alt' => constructo_image_alt( $service['item_img']['url'] ) ) ) : '';
                                    $item_title = !empty( $service['item_title'] ) ? $service['item_title'] : '';
                                    $item_text = !empty( $service['item_text'] ) ? $service['item_text'] : '';
                                    $anchor_txt = !empty( $service['anchor_txt'] ) ? $service['anchor_txt'] : '';
                                    $anchor_url = !empty( $service['anchor_url']['url'] ) ? $service['anchor_url']['url'] : '';
                                    ?>
                                    <div class="single_service">
                                        <?php 
                                            if ( $item_img ) { 
                                                echo '
                                                <div class="thumb">
                                                    '.wp_kses_post( $item_img ).'
                                                </div>
                                                ';
                                            }
                                        ?>

                                        <div class="service_info">
                                            <?php 
                                                if ( $item_title ) { 
                                                    echo '<a href="'.esc_url( $anchor_url ).'"><h3>'.esc_html( $item_title ).'</h3></a>';
                                                }
                                                if ( $item_text ) { 
                                                    echo '<p>'.wp_kses_post( $item_text ).'</p>';
                                                }
                                                if ( $anchor_txt ) { 
                                                    echo '<a class="d-flex align-items-center" href="'.esc_url( $anchor_url ).'">'.esc_html( $anchor_txt ).' <i class="ti-angle-right"></i>
                                                    </a>';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service_area_end  -->
    <?php
    }

        
    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){     
            // review-active
            $('.service_active').owlCarousel({
                loop:true,
                margin:30,
            items:1,
            autoplay:true,
            navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
                nav:true,
            dots:false,
            autoplayHoverPause: true,
            autoplaySpeed: 800,
            
                responsive:{
                    0:{
                        items:1,
                        nav:false
                    },
                    767:{
                        items:2,
                    },
                    992:{
                        items:3,
                        nav:false
                    },
                    1200:{
                        items:3,
                    },
                    1500:{
                        items:3,
                        nav:true
                    }
                }
            });
        })(jQuery);
        </script>
        <?php 
        }
    }	
}