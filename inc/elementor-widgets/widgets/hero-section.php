<?php
namespace Constructoelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Constructo elementor hero section widget.
 *
 * @since 1.0
 */
class Constructo_Hero extends Widget_Base {

	public function get_name() {
		return 'constructo-hero';
	}

	public function get_title() {
		return __( 'Hero Section', 'constructo-companion' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'constructo-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Hero content ------------------------------
		$this->start_controls_section(
			'hero_content',
			[
				'label' => __( 'Hero section content', 'constructo-companion' ),
			]
        );
        
		$this->add_control(
            'slider_content', [
                'label' => __( 'Create New', 'constructo-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ _id }}}',
                'fields' => [
                    [
                        'name' => 'item_img',
                        'label' => __( 'Slide Image', 'constructo-companion' ),
                        'description' => __( 'Expected size is 1920x850', 'constructo-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default'     => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'sec_title',
                        'label' => __( 'Section Title', 'constructo-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default'     => __( 'We Build Your Home Secure and Safe', 'constructo-companion' ),
                    ],
                    [
                        'name' => 'sub_title',
                        'label' => __( 'Sub Title', 'constructo-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default'     => __( 'Build Your Home Secure and Safe with Professional Touch', 'constructo-companion' ),
                    ],
                    [
                        'name' => 'btn_title',
                        'label' => __( 'Button Text', 'constructo-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default'     => __( 'Our Services', 'constructo-companion' ),
                    ],
                    [
                        'name' => 'btn_url',
                        'label' => __( 'Button URL', 'constructo-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default'     => [
                            'url'        => '#',
                        ],
                    ],
                ],
                'default'   => [
                    [      
                        'item_img'  => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'sec_title' => __( 'We Build Your Home Secure and Safe', 'constructo-companion' ),
                        'sub_title' => __( 'Build Your Home Secure and Safe with Professional Touch', 'constructo-companion' ),
                        'btn_title' => __( 'Our Services', 'constructo-companion' ),
                        'btn_url'   => [
                            'url'   => '#',
                        ],
                    ],
                    [      
                        'item_img'  => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'sec_title' => __( 'We Build Your Home Secure and Safe', 'constructo-companion' ),
                        'sub_title' => __( 'Build Your Home Secure and Safe with Professional Touch', 'constructo-companion' ),
                        'btn_title' => __( 'Our Services', 'constructo-companion' ),
                        'btn_url'   => [
                            'url'   => '#',
                        ],
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
				'label' => __( 'Style Hero Section', 'constructo-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_col', [
				'label' => __( 'Title Color', 'constructo-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
	}
    
	protected function render() {
    // call load widget script
    $this->load_widget_script(); 
    $settings  = $this->get_settings();
    $slider_content = !empty( $settings['slider_content'] ) ? $settings['slider_content'] : '';
    ?>
    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="slider_active owl-carousel">
            <?php 
            if( is_array( $slider_content ) && count( $slider_content ) > 0 ) {
                foreach( $slider_content as $item ) {
                    $img_url = !empty( $item['item_img']['url'] ) ? $item['item_img']['url'] : '';
                    $sec_title = ( !empty( $item['sec_title'] ) ) ? $item['sec_title'] : '';
                    $sub_title = ( !empty( $item['sub_title'] ) ) ? $item['sub_title'] : '';
                    $btn_title = ( !empty( $item['btn_title'] ) ) ? $item['btn_title'] : '';
                    $btn_url = ( !empty( $item['btn_url']['url'] ) ) ? $item['btn_url']['url'] : '';
                    ?>
                    <div class="single_slider d-flex align-items-center overlay" <?php echo constructo_inline_bg_img( esc_url( $img_url ) ); ?>>
                        <div class="container">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-xl-9 col-md-9 col-md-12">
                                    <div class="slider_text text-center">
                                        <?php 
                                            if ( $sec_title ) { 
                                                echo '<h3>'.esc_html( $sec_title ).'</h3>';
                                            }
                                            if ( $sub_title ) { 
                                                echo '<p>'.esc_html( $sub_title ).'</p>';
                                            }
                                            if ( $btn_title ) { 
                                                echo '<a class="boxed-btn3" href="'.esc_url($btn_url).'">'.esc_html($btn_title).'</a>';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
    <!-- slider_area_end -->
    <?php
    } 

    
    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){     
            $('.slider_active').owlCarousel({
                loop:true,
                margin:0,
                items:1,
                autoplay:true,
                navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
                nav:true,
                dots:false,
                autoplayHoverPause: true,
                autoplaySpeed: 800,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                responsive:{
                    0:{
                        items:1,
                        nav:false,
                    },
                    767:{
                        items:1,
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
                    1600:{
                        items:1,
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