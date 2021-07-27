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
 * Constructo elementor features section widget.
 *
 * @since 1.0
 */
class Constructo_Features extends Widget_Base {

	public function get_name() {
		return 'constructo-features';
	}

	public function get_title() {
		return __( 'Features', 'constructo-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'constructo-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  features content ------------------------------
		$this->start_controls_section(
			'features_content',
			[
				'label' => __( 'Features content', 'constructo-companion' ),
			]
        );

		$this->add_control(
            'features', [
                'label' => __( 'Create New', 'constructo-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ item_title }}}',
                'fields' => [
                    [
                        'name' => 'item_icon',
                        'label' => __( 'Select Icon', 'constructo-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::ICON,
                        'default' => 'flaticon-sketch',
                        'options' => constructo_themify_icon(),
                    ],
                    [
                        'name' => 'item_title',
                        'label' => __( 'Title', 'constructo-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default'     => __( 'Creative Plan & Design', 'constructo-companion' ),
                    ],
                    [
                        'name' => 'item_text',
                        'label' => __( 'Short Text', 'constructo-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default'     => __( 'There are many variations of passages of lorem Ipsum available, but the majority have suffered alteration.', 'constructo-companion' ),
                    ],
                ],
                'default'   => [
                    [ 
                        'item_icon'    => 'flaticon-sketch',
                        'item_title'    => __( 'Creative Plan & Design', 'constructo-companion' ),
                        'item_text'   => __( 'There are many variations of passages of lorem Ipsum available, but the majority have suffered alteration.', 'constructo-companion' ),
                    ],
                    [ 
                        'item_icon'    => 'flaticon-helmet',
                        'item_title'    => __( 'Talented Peoples', 'constructo-companion' ),
                        'item_text'   => __( 'There are many variations of passages of lorem Ipsum available, but the majority have suffered alteration.', 'constructo-companion' ),
                    ],
                    [ 
                        'item_icon'    => 'flaticon-support',
                        'item_title'    => __( 'Modern Tools', 'constructo-companion' ),
                        'item_text'   => __( 'There are many variations of passages of lorem Ipsum available, but the majority have suffered alteration.', 'constructo-companion' ),
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End features content

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
    $settings  = $this->get_settings();
    $features  = !empty( $settings['features'] ) ? $settings['features'] : '';
    ?>

    <!-- features_area_start -->
    <div class="features_area">
        <div class="container">
            <div class="row no-gutters">
                <?php 
                if( is_array( $features ) && count( $features ) > 0 ) {
                    foreach( $features as $item ) {
                        $item_icon = !empty( $item['item_icon'] ) ? $item['item_icon'] : '';
                        $item_title = ( !empty( $item['item_title'] ) ) ? $item['item_title'] : '';
                        $item_text = ( !empty( $item['item_text'] ) ) ? $item['item_text'] : '';
                        ?>
                        <div class="col-lg-4 col-md-4">
                            <div class="single_feature text-center">
                                <?php 
                                    if ( $item_icon ) { 
                                        echo '
                                        <div class="icon">
                                            <i class="'.esc_attr( $item_icon ).'"></i>
                                        </div>  
                                        ';
                                    }
                                    if ( $item_title ) { 
                                        echo '<h3>'.esc_html( $item_title ).'</h3>';
                                    }
                                    if ( $item_text ) { 
                                        echo '<p>'.wp_kses_post( $item_text ).'</p>';
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
    <?php
    }
}