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
 * Constructo elementor call to action section section widget.
 *
 * @since 1.0
 */
class Constructo_Call_To_Action extends Widget_Base {

	public function get_name() {
		return 'constructo-call-to-action';
	}

	public function get_title() {
		return __( 'Call To Action', 'constructo-companion' );
	}

	public function get_icon() {
		return 'eicon-play-o';
	}

	public function get_categories() {
		return [ 'constructo-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Call To Action Section ------------------------------
        $this->start_controls_section(
            'call_to_action_content',
            [
                'label' => __( 'Call To Action Section', 'constructo-companion' ),
            ]
        );
        $this->add_control(
            'bg_img',
            [
                'label' => esc_html__( 'BG Image', 'constructo-companion' ),
                'description' => esc_html__( 'Best size is 1920x700', 'constructo-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );      
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Sec Title', 'constructo-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Why Choose Us?', 'constructo-companion' ),
            ]
        );  
        $this->add_control(
            'quote_txt',
            [
                'label' => esc_html__( 'Quote Text', 'constructo-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => esc_html__( '“Construction is a full service construction company offering building solutions from start to finish. Our staff has been operating on NYC for ten years.', 'constructo-companion' ),
            ]
        );
        $this->add_control(
            'sec_txt',
            [
                'label' => esc_html__( 'Section Text', 'constructo-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => esc_html__( 'There are many variations of passages of lorem Ipsum available, but the majority have suffered alteration in some form, by injected.', 'constructo-companion' ),
            ]
        );
        $this->add_control(
            'video_url',
            [
                'label' => esc_html__( 'Popup Video URL', 'constructo-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
                    'url' => 'https://www.youtube.com/watch?v=2qEX4KCEXeI'
                ]
            ]
        );
        
        $this->end_controls_section(); // End emergency_contact_section

        //------------------------------ Style title ------------------------------
        
        // Top Section Styles
        $this->start_controls_section(
            'left_sec_style', [
                'label' => __( 'Top Section Styles', 'constructo-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
			'text_col', [
				'label' => __( 'Text Color', 'constructo-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .Emergency_contact .single_emergency .info h3' => 'color: {{VALUE}};',
					'{{WRAPPER}} .Emergency_contact .single_emergency .info p' => 'color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
			'button_col', [
				'label' => __( 'Button Text & Border Color', 'constructo-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .Emergency_contact .single_emergency .info_button .boxed-btn3-white' => 'color: {{VALUE}} !important; border-color: {{VALUE}};',
					'{{WRAPPER}} .Emergency_contact .single_emergency .info_button .boxed-btn3-white:hover' => 'color: {{VALUE}} !important; border-color: transparent;',
				],
			]
        );

        $this->add_control(
            'button_styles_seperator',
            [
                'label' => esc_html__( 'Button Styles', 'constructo-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
			'button_hover_col', [
				'label' => __( 'Button Hover Bg Color', 'constructo-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .Emergency_contact .single_emergency .info_button .boxed-btn3-white:hover' => 'background: {{VALUE}};',
				],
			]
        );

        $this->add_control(
            'overlay_color_styles_seperator',
            [
                'label' => esc_html__( 'Overlay Color Styles', 'constructo-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
			'sec_title_col', [
				'label' => __( 'Bg Overlay Color', 'constructo-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .Emergency_contact .single_emergency.overlay_skyblue::before' => 'background: {{VALUE}};',
				],
			]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings  = $this->get_settings();
    $bg_img    = !empty( $settings['bg_img']['url'] ) ? $settings['bg_img']['url'] : '';
    $sec_title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $quote_txt = !empty( $settings['quote_txt'] ) ? $settings['quote_txt'] : '';
    $sec_txt = !empty( $settings['sec_txt'] ) ? $settings['sec_txt'] : '';
    $video_url   = !empty( $settings['video_url']['url'] ) ? $settings['video_url']['url'] : '';
    ?>

    <!-- chose_us_area start -->
    <div class="chose_us_area" <?php echo constructo_inline_bg_img( esc_url( $bg_img ) ); ?>>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-6 col-md-8">
                    <div class="chose_info">
                        <?php 
                            if ( $sec_title ) { 
                                echo '<h3>'.esc_html($sec_title).'</h3>';
                            }
                            if ( $quote_txt ) { 
                                echo '<p class="lasrge_text">'.wp_kses_post($quote_txt).'</p>';
                            }
                            if ( $sec_txt ) { 
                                echo '<p>'.wp_kses_post($sec_txt).'</p>';
                            }
                            if ( $video_url ) { 
                                echo '
                                <div class="icon_video">
                                    <a class="popup-video" href="'.esc_url($video_url).'">
                                        <i class="fa fa-caret-right"></i>
                                    </a>
                                </div>
                                ';
                            }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- chose_us_area end -->
    <?php

    }
}
