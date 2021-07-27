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
 * Constructo Review Contents section widget.
 *
 * @since 1.0
 */
class Constructo_Review_Contents extends Widget_Base {

	public function get_name() {
		return 'constructo-review-contents';
	}

	public function get_title() {
		return __( 'Review Contents', 'constructo-companion' );
	}

	public function get_icon() {
		return 'eicon-testimonial-carousel';
	}

	public function get_categories() {
		return [ 'constructo-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Review contents  ------------------------------
		$this->start_controls_section(
			'reviews_content',
			[
				'label' => __( 'Review Contents', 'constructo-companion' ),
			]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'constructo-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Testimonials', 'constructo-companion' ),
            ]
        );

		$this->add_control(
            'reviews', [
                'label' => __( 'Create New', 'constructo-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ reviewer_name }}}',
                'fields' => [
                    [
                        'name' => 'client_img',
                        'label' => __( 'Client Image', 'constructo-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src()
                        ],
                        'description' => esc_html__( 'Best size is 68x68', 'constructo-companion' ),
                    ],
                    [
                        'name' => 'reviewer_name',
                        'label' => __( 'Client Name', 'constructo-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Jordan Adams', 'constructo-companion' ),
                    ],
                    [
                        'name' => 'reviewer_designation',
                        'label' => __( 'Client Designation', 'constructo-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Client', 'constructo-companion' ),
                    ],
                    [
                        'name' => 'review_txt',
                        'label' => __( 'Review Text', 'constructo-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => '“Our program is guided by the developmental milestones which embrace <br> the six most important learning domains in education”',
                    ],
                ],
                'default'   => [
                    [
                        'client_img'         => [
                            'url' => Utils::get_placeholder_image_src()
                        ],
                        'reviewer_name' => __( 'Jordan Adams', 'constructo-companion' ),
                        'reviewer_designation'  => __( 'Client', 'constructo-companion' ),
                        'review_txt' => '“Our program is guided by the developmental milestones which embrace <br> the six most important learning domains in education”',
                    ],
                    [
                        'client_img'         => [
                            'url' => Utils::get_placeholder_image_src()
                        ],
                        'reviewer_name' => __( 'Jordan Adams', 'constructo-companion' ),
                        'reviewer_designation'  => __( 'Client', 'constructo-companion' ),
                        'review_txt' => '“Our program is guided by the developmental milestones which embrace <br> the six most important learning domains in education”',
                    ],
                    [
                        'client_img'         => [
                            'url' => Utils::get_placeholder_image_src()
                        ],
                        'reviewer_name' => __( 'Jordan Adams', 'constructo-companion' ),
                        'reviewer_designation'  => __( 'Client', 'constructo-companion' ),
                        'review_txt' => '“Our program is guided by the developmental milestones which embrace <br> the six most important learning domains in education”',
                    ],
                ]
            ]
        );
        $this->end_controls_section(); // End Hero content

        /**
         * Style Tab
         * ------------------------------ Style Title ------------------------------
         *
         */
        $this->start_controls_section(
            'style_title', [
                'label' => __( 'Style Review Section', 'constructo-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sec_overlay_col', [
                'label' => __( 'Section Overlay Color', 'constructo-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-testmonial.overlay2::before' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'rev_text_col', [
                'label' => __( 'Review Text Color', 'constructo-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testmonial_area .testmonial_info p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'rev_name_col', [
                'label' => __( 'Reviewer Name Color', 'constructo-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testmonial_area .testmonial_info h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {

    // call load widget script
    $this->load_widget_script(); 
    $settings  = $this->get_settings();
    $sec_title   = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $reviews   = !empty( $settings['reviews'] ) ? $settings['reviews'] : '';
    ?>

    <!-- chose_us_area end -->
    <div class="testimonial_area ">
        <div class="container">
            <?php 
                if ( $sec_title ) { 
                    echo '
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="section_title text-center mb-55">
                                <h3>'.esc_html($sec_title).'</h3>
                            </div>
                        </div>
                    </div>
                    ';
                }
            ?>

            <div class="row">
                <div class="col-xl-12">
                    <div class="testmonial_active owl-carousel">
                        <?php
                        if( is_array( $reviews ) && count( $reviews ) > 0 ){
                            foreach ( $reviews as $review ) {
                                $review_txt    = !empty( $review['review_txt'] ) ? $review['review_txt'] : '';
                                $reviewer_name = !empty( $review['reviewer_name'] ) ? $review['reviewer_name'] : '';
                                $reviewer_designation = !empty( $review['reviewer_designation'] ) ? $review['reviewer_designation'] : '';
                                $client_img_url = !empty( $review['client_img']['url'] ) ? $review['client_img']['url'] : '';
                                $client_img = !empty( $review['client_img']['id'] ) ? wp_get_attachment_image( $review['client_img']['id'], 'constructo_widget_post_thumb', '', array( 'alt' => constructo_image_alt( $client_img_url ) ) ) : '';
                                ?>
                                <div class="single_carousel">
                                    <div class="single_testmonial text-center">
                                        <div class="testmonial_author">
                                            <?php 
                                                if ( $client_img ) { 
                                                    echo '
                                                    <div class="thumb">
                                                        '.$client_img.'
                                                    </div>
                                                    ';
                                                }
                                                if ( $reviewer_name ) { 
                                                    echo '<h4>'.esc_html( $reviewer_name ).'</h4>';
                                                }
                                                if ( $reviewer_designation ) { 
                                                    echo '<span>'.esc_html( $reviewer_designation ).'</span>';
                                                }
                                            ?>
                                        </div>
                                        <?php 
                                            if ( $review_txt ) { 
                                                echo '<p>'.wp_kses_post( $review_txt ).'</p>';
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
    <!-- testimonial_area  -->  
    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            // review-active
            $('.testmonial_active').owlCarousel({
            loop:true,
            margin:0,
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
                    dots:false,
                    nav:false,
                },
                767:{
                    items:1,
                    dots:false,
                    nav:false,
                },
                992:{
                    items:1,
                    nav:true
                },
                1200:{
                    items:1,
                    nav:true
                },
                1500:{
                    items:1
                }
            }
            });
        })(jQuery);
        </script>
        <?php 
        }
    }	
}
