<?php
namespace Constructoelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Utils;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Constructo elementor about section widget.
 *
 * @since 1.0
 */
class Constructo_About_Section extends Widget_Base {

	public function get_name() {
		return 'constructo-about-us';
	}

	public function get_title() {
		return __( 'About Section', 'constructo-companion' );
	}

	public function get_icon() {
		return 'eicon-column';
	}

	public function get_categories() {
		return [ 'constructo-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  About Us content ------------------------------
        $this->start_controls_section(
            'about_content',
            [
                'label' => __( 'About Us Settings', 'constructo-companion' ),
            ]
        );

        $this->add_control(
            'bg_shape',
            [
                'label' => esc_html__( 'Left Top BG Shape', 'constructo-companion' ),
                'description' => esc_html__( 'Best size is 155x185', 'constructo-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'left_img',
            [
                'label' => esc_html__( 'Left Image', 'constructo-companion' ),
                'description' => esc_html__( 'Best size is 540x606', 'constructo-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'hr',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );

        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'constructo-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => 'We Serve all of your <br> Construction Services',
            ]
        );
        $this->add_control(
            'quote_text',
            [
                'label' => esc_html__( 'Quote Text', 'constructo-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => esc_html__( '“Construction is a full service construction company offering building solutions from start to finish. Our staff has been operating on NYC for ten years.', 'constructo-companion' ),
            ]
        );
        $this->add_control(
            'sec_text',
            [
                'label' => esc_html__( 'Section Text', 'constructo-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => esc_html__( 'There are many variations of passages of lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.', 'constructo-companion' ),
            ]
        );
        $this->add_control(
            'btn_title',
            [
                'label' => esc_html__( 'Specialty 2 Title', 'constructo-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'About Us', 'constructo-companion' ),
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label' => esc_html__( 'Button URL', 'constructo-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default'   => [
                    'url' => '#'
                ],
            ]
        );
        
        $this->end_controls_section(); // End left content

        //------------------------------ Style title ------------------------------
        
        // Top Section Styles
        $this->start_controls_section(
            'about_sec_style', [
                'label' => __( 'About Section Styles', 'constructo-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'constructo-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .welcome_constructo_area .welcome_constructo_info h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sec_title_col', [
                'label' => __( 'Sec Title Color', 'constructo-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .welcome_constructo_area .welcome_constructo_info h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sec_text_col', [
                'label' => __( 'Sec Text Color', 'constructo-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .welcome_constructo_area .welcome_constructo_info p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .welcome_constructo_area .welcome_constructo_info ul li' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'list_circle_col', [
                'label' => __( 'List Item Icon Color', 'constructo-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .welcome_constructo_area .welcome_constructo_info ul li::before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_styles_seperator',
            [
                'label' => esc_html__( 'Button Styles', 'constructo-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'btn_txt_col', [
                'label' => __( 'Button Text & Border Color', 'constructo-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .welcome_constructo_area .welcome_constructo_info .boxed-btn3-white-2' => 'color: {{VALUE}} !important; border-color: {{VALUE}}',
                    '{{WRAPPER}} .welcome_constructo_area .welcome_constructo_info .boxed-btn3-white-2:hover' => 'background: {{VALUE}} !important; border-color: transparent',
                ],
            ]
        );
        $this->add_control(
            'btn_hvr_col', [
                'label' => __( 'Button Hover Color', 'constructo-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .welcome_constructo_area .welcome_constructo_info .boxed-btn3-white-2:hover' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->end_controls_section();

    }

	protected function render() {
    $settings   = $this->get_settings();  
    $bg_shape    = !empty( $settings['bg_shape']['id'] ) ? wp_get_attachment_image( $settings['bg_shape']['id'], 'constructo_about_shape_155x185', '', array( 'alt' => constructo_image_alt( $settings['bg_shape']['url'] ) ) ) : '';
    $left_img    = !empty( $settings['left_img']['id'] ) ? wp_get_attachment_image( $settings['left_img']['id'], 'constructo_about_img_540x606', '', array( 'alt' => constructo_image_alt( $settings['left_img']['url'] ) ) ) : '';
    $sec_title  = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $quote_text  = !empty( $settings['quote_text'] ) ? $settings['quote_text'] : '';
    $sec_text  = !empty( $settings['sec_text'] ) ? $settings['sec_text'] : '';
    $btn_title  = !empty( $settings['btn_title'] ) ? $settings['btn_title'] : '';
    $btn_url  = !empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : '';
    ?>

    <!-- about_area_start  -->
    <div class="about_area">
        <div class="container">
            <div class="border_1px">
                <div class="row align-items-center">
                    <div class="col-xl-6  col-md-6">
                        <div class="about_thumb">
                            <?php 
                                if ( $left_img ) { 
                                    echo $left_img;
                                }
                                if ( $bg_shape ) { 
                                    echo '
                                        <div class="pattern_img d-none d-lg-block">
                                            '.$bg_shape.'
                                        </div>
                                    ';
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="about_info">
                            <?php 
                                if ( $sec_title ) { 
                                    echo '<h3>'.wp_kses_post($sec_title).'</h3>';
                                }
                                if ( $quote_text ) { 
                                    echo '<p class="first_para">'.wp_kses_post( $quote_text ).'</p>';
                                }
                                if ( $sec_text ) { 
                                    echo '<p>'.wp_kses_post( $sec_text ).'</p>';
                                }
                                if ( $btn_title ) { 
                                    echo '<a href="'.esc_url( $btn_url ).'" class="boxed-btn3">'.esc_html( $btn_title ).'</a>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- about_area_end  -->
    <?php
    }
}