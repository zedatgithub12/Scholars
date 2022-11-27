<?php

namespace Elementor;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Widget_Base;
use Elementor\Group_Control_Base;
use ElementorPro\Classes\Utils;
use ElementorPro\Modules\QueryControl\Module;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Blogmentor_Blog_Posts_Widget extends Widget_Base {

    public function get_name() {
        return 'blogmentor_blog_posts';
    }

    public function get_title() {
        return __('Blog Posts', BM_DOMAIN);
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
    }

    public function get_categories() {
        return ['blogmentor'];
    }

    /*
     * Adding the controls fields for the Blog Layout
     */
    protected function register_controls() {
        $this->start_controls_section(
            'section_layout', array(
				'label' => __('Blog Layout', BM_DOMAIN),
            )
        );

        $this->add_control(
            'bm_blog_layout',
			[
				'label'    	   => __('Layouts Type', BM_DOMAIN),
				'type'     	   => Controls_Manager::SELECT,
				'options'  	   => [
					'grid' 	   => __('Grid', BM_DOMAIN),
					'masonry'  => __('Masonry', BM_DOMAIN),
					'metro'    => __('Metro', BM_DOMAIN),
					],
				'default' 	   => 'grid',
            ]
        );

        $this->add_control(
            'bm_blog_style', [
				'label'  		   => __('Style', BM_DOMAIN),
				'type'			   => Controls_Manager::SELECT,
				'options'		   => [
					'bm_blog_style_1' => __('Style 1', BM_DOMAIN),
					'bm_blog_style_2' => __('Style 2', BM_DOMAIN),
				],
				'default' 		=> 'bm_blog_style_1',
				'condition' 	=> ['bm_blog_layout' => ['grid', 'masonry']],
			]
        );

		$this->add_responsive_control(
            'bm_grid_columns', [
				'label'	 	=> __('Grid Columns', BM_DOMAIN),
				'type' 		=> Controls_Manager::SELECT,
				'default'	=> '3',
				'tablet_default' => '2',
				'mobile_default' => '1',
				'options' => [
					'2' => '2',
					'3' => '3',
					'4' => '4',
				],
				'prefix_class' => 'elementor-grid%s-',
				'frontend_available' => true,
				'selectors' => [
					'.elementor-msie {{WRAPPER}} .elementor-post-item' => 'width: calc( 100% / {{SIZE}} )',
				],
				'condition' => [
					'bm_blog_layout' => 'grid',
				],
            ]
        );


        $this->add_control(
            'bm_number_of_posts', [
				'label'    		=> __('Number of Posts', BM_DOMAIN),
				'type' 	   		=> Controls_Manager::NUMBER,
				'description'   => __('Set number of posts to display.', BM_DOMAIN),
				'default'  		=> 6,
				'min' 	   		=> 3,
				'max' 	   		=> 50,
				'step' 	   		=> 1,
            ]
        );

		$this->add_control(
			'bm_post_image_size',
			[
				'label'			=> __( 'Image Size', BM_DOMAIN ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'bm-post-thumb',
				'options'       => bm_blog_layout_image_size(),
				'label_block'	=> false,
			]
		);

        $this->add_control(
            'show_image_effect', [
				'label' 	=> __('Show Image Effect', BM_DOMAIN),
				'type' 		=> Controls_Manager::SWITCHER,
				'default'   => 'yes',
				'label_off' => __('Off', BM_DOMAIN),
				'label_on'  => __('On', BM_DOMAIN),
            ]
        );

        $this->add_control(
            'image_hover_effect', [
				'label'   => __('Image Hover Effect', BM_DOMAIN),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'blur'	     => __( 'Blur', BM_DOMAIN ),
					'flashing'   => __( 'Flashing', BM_DOMAIN ),
					'gray-scale' => __( 'Gray Scale', BM_DOMAIN ),
					'opacity' 	 => __( 'Opacity', BM_DOMAIN ),
					'shine'		 => __( 'Shine', BM_DOMAIN ),
				],
				'default' => 'blur',
				'condition' => [
					'show_image_effect' => 'yes',
				],
            ]
        );

        $this->add_control(
            'show_title', [
				'label' => __('Show Title', BM_DOMAIN),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_off' => __('Off', BM_DOMAIN),
				'label_on' => __('On', BM_DOMAIN),
				'separator' => 'before',
            ]
        );

        $this->add_control(
            'show_title_link', [
				'label'		 => __('Show Title Link', BM_DOMAIN),
				'type'	 	 => Controls_Manager::SWITCHER,
				'default'    => 'yes',
				'label_off'  => __('Off', BM_DOMAIN),
				'label_on'   => __('On', BM_DOMAIN),
				'condition'  => [
					'show_title' 	 => 'yes',
				],
            ]
        );

        $this->add_control(
            'title_tag', [
				'label' => __('Title HTML Tag', BM_DOMAIN),
				'type'  => Controls_Manager::SELECT,
				'options'  => [
					'h1'   => 'H1',
					'h2'   => 'H2',
					'h3'   => 'H3',
					'h4'   => 'H4',
					'h5'   => 'H5',
					'h6'   => 'H6',
					'div'  => 'div',
					'span' => 'span',
					'p'    => 'p',
				],
				'default'   => 'h4',
				'condition' => [
					'show_title'     => 'yes',
					'bm_blog_layout' => ['grid', 'masonry']
				],
            ]
        );

        $this->add_control(
            'show_article_feed', [
				'label' => __('Post Content Feed', BM_DOMAIN),
				'type'  => Controls_Manager::SELECT,
					'options'  => [
						'summary'    => 'Summary',
						'full_text'  => 'Full Text'
					],
				'default'   => 'summary',
				'separator' => 'before',
				'condition' => ['bm_blog_layout' => ['grid', 'masonry']
				],
            ]
        );

        $this->add_control(
            'show_excerpt', [
				'label' => __('Excerpt', BM_DOMAIN),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('Show', BM_DOMAIN),
				'label_off' => __('Hide', BM_DOMAIN),
				'default' => 'yes',
				'condition' => ['show_article_feed' => 'summary',
								'bm_blog_layout' => ['grid', 'masonry']
				],
			]
        );

        $this->add_control(
            'excerpt_from', [
				'label' => __('Excerpt From', BM_DOMAIN),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'content' => __( 'Content', BM_DOMAIN ),
					'excerpt' => __( 'Excerpt', BM_DOMAIN ),
				],
				'default' => 'content',
				'condition' => [ 
					'show_article_feed' => 'summary',
					'show_excerpt' => 'yes',
					'bm_blog_layout' => ['grid', 'masonry'],
				],
            ]
        );

        $this->add_control(
            'excerpt_length', [
				'label' => __('Excerpt Length', BM_DOMAIN),
				'type' => Controls_Manager::NUMBER,
				'default' => apply_filters('excerpt_length', 25),
				'condition' => [
					'show_excerpt' => 'yes',
					'show_article_feed' => 'summary',
					'bm_blog_layout' => ['grid', 'masonry']
				],
            ]
        );

        $this->add_control(
            'show_read_more', [
				'label' => __('Read More', BM_DOMAIN),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('Show', BM_DOMAIN),
				'label_off' => __('Hide', BM_DOMAIN),
				'default' => 'yes',
				'separator' => 'before',
				'condition' => ['show_excerpt' => 'yes',
								'show_article_feed' => 'summary',
								'bm_blog_layout' => ['grid', 'masonry']
				],
			]
        );

        $this->add_control(
            'read_more_text', [
				'label' 	=> __('Read More Text', BM_DOMAIN),
				'type'      => Controls_Manager::TEXT,
				'default'   => __('Read More »', BM_DOMAIN),
				'condition' => ['show_read_more' => 'yes',
								'show_excerpt' => 'yes',
								'show_article_feed' => 'summary',
								'bm_blog_layout' => ['grid', 'masonry']
				],
            ]
        );

        $this->add_control(
            'show_metro_excerpt', [
				'label' => __('Excerpt', BM_DOMAIN),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('Show', BM_DOMAIN),
				'label_off' => __('Hide', BM_DOMAIN),
				'default' => 'yes',
				'separator' => 'before',
				'condition' => ['bm_blog_layout' => 'metro'],
			]
        );

        $this->add_control(
            'show_meta_data', [
				'label' 	=> __('Show Meta Data', BM_DOMAIN),
				'type' 		=> Controls_Manager::SWITCHER,
				'label_on'  => __('Show', BM_DOMAIN),
				'label_off' => __('Hide', BM_DOMAIN),
				'default'   => 'yes',
				'separator' => 'before',
            ]
        );

        $this->add_control(
            'meta_data', [
				'label'		   => __('Meta Data', BM_DOMAIN),
				'label_block'  => true,
				'type' 		   => Controls_Manager::SELECT2,
				'default'      => ['author', 'date', 'comments', 'tags', 'category'],
				'multiple'     => true,
				'condition'    => ['show_meta_data' => 'yes', 'bm_blog_layout' => ['grid', 'masonry']],
				'options'      => [
					'author'   => __('Author', BM_DOMAIN),
					'date'     => __('Date', BM_DOMAIN),
					'comments' => __('Comments', BM_DOMAIN),
					'tags' 	   => __('Tags', BM_DOMAIN),
					'category' => __('Category', BM_DOMAIN),
				],
            ]
        );
		
		$this->add_control(
            'date_format', [
				'label'   => __('Date Format', BM_DOMAIN),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'MDY'  => __('Month Date, Year', BM_DOMAIN),
					'ymd'  => __('YYYY-MM-DD', BM_DOMAIN),
					'mdy'  => __('MM/DD/YYYY', BM_DOMAIN),
					'dmy'  => __('DD/MM/YYYY', BM_DOMAIN),
				],
				'default'   => 'MDY',
				'separator' => 'before',
            ]
        );
		
		
        $this->add_control(
            'pagination_type', [
				'label'   => __('Pagination Type', BM_DOMAIN),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'no_pagination'  => __('No Pagination', BM_DOMAIN),
					'paged' 		 => __('Paged', BM_DOMAIN),
				],
				'default'   => 'no_pagination',
				'separator' => 'before',
            ]
        );

        $this->add_control(
            'pagination_style', [
				'label' => __('Pagination Style', BM_DOMAIN),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'pagination_style_1' => __('Style 1', BM_DOMAIN),
					'pagination_style_2' => __('Style 2', BM_DOMAIN),
				],
				'default' => 'pagination_style_1',
				'condition' => [
					'pagination_type' => 'paged',
				],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_post_query', array(
				'label' => __('Query', BM_DOMAIN),
            )
        );

        $this->add_control(
            'blog_categories', [
				'label'	      => __('Categories', BM_DOMAIN),
				'type' 		  => Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple'    => true,
				'description' => __('Select the categories you want to show', BM_DOMAIN),
				'options' => bm_blog_elements_post_categories(),
            ]
        );

        $this->add_control(
            'blog_tag', [
				'label'	 	  => __('Tags', BM_DOMAIN),
				'type' 		  => Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple'    => true,
				'description' => __('Select the tags you want to show', BM_DOMAIN),
				'options'     => bm_blog_elements_post_tags(),
            ]
        );

        $this->add_control(
            'post_author', [
				'label' 	  => __('Authors', BM_DOMAIN),
				'type' 	 	  => Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' 	  => true,
				'description' => __('Select the authors you want to show', BM_DOMAIN),
				'options' 	  => bm_blog_elements_post_author(),
            ]
        );

        $this->add_control(
            'advanced', [
				'label' => __('Advanced', BM_DOMAIN),
				'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'post_order_by', [
				'label'   => __('Order By', BM_DOMAIN),
				'type'    => Controls_Manager::SELECT,
				'default' => 'post_date',
				'options' => [
					'post_date' 	=> __('Publish Date', BM_DOMAIN),
					'ID' 			=> __('ID', BM_DOMAIN),
					'post_title' 	=> __('Title', BM_DOMAIN),
					'post_author' 	=> __('Author', BM_DOMAIN),
					'rand' 			=> __('Random', BM_DOMAIN),
				],
            ]
        );

        $this->add_control(
            'post_sort_order', [
				'label'    => __('Sort By', BM_DOMAIN),
				'type'     => Controls_Manager::SELECT,
				'default'  => 'desc',
				'options'  => [
					'desc' => __('DESC', BM_DOMAIN),
					'asc'  => __('ASC', BM_DOMAIN),
				],
            ]
        );

        $this->end_controls_section();
        /*
         * End Blog Layouts control
         */

        /*
         * Start control style tab for Blog Layouts
         * Start name control style
         */
        $this->start_controls_section(
            'section_design_layout', [
				'label' => __('Layout', BM_DOMAIN),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'bm_blog_layout' => 'grid',
				],
            ]
        );

        $this->add_control(
            'post_card_grid_gap', [
				'label'    => __('Grid Gap', BM_DOMAIN),
				'type'     => Controls_Manager::SLIDER,
				'default'  => [
					'size' => 10,
				],
				'range'  => [
					'px' => [
						'min' => 10,
						'max' => 100,
					],
				],
				'frontend_available' => true,
				'selectors' => [
					'{{WRAPPER}} .bm_layout, {{WRAPPER}} .grid-style-2' => 'padding-left: {{SIZE}}{{UNIT}}; padding-right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'bm_blog_layout' => 'grid',
				],
            ]
        );

        $this->add_control(
            'post_card_row_gap', [
				'label'    => __('Rows Gap', BM_DOMAIN),
				'type'     => Controls_Manager::SLIDER,
				'default'  => [
					'size' => 35,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'frontend_available' => true,
				'selectors' => [
					'{{WRAPPER}} .blog-layout-container, {{WRAPPER}} .grid-style-2,
					 {{WRAPPER}} .bm_layout' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'bm_blog_layout' => 'grid',
				],
            ]
        );

        $this->add_control(
            'alignment', [
				'label' => __('Alignment', BM_DOMAIN),
				'type'  => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options'  => [
					'left'	    => [
						'title' => __('Left', BM_DOMAIN),
						'icon'  => 'eicon-text-align-left',
					],
					'center' 	=> [
						'title' => __('Center', BM_DOMAIN),
						'icon'  => 'eicon-text-align-center',
					],
					'right' 	=> [
						'title' => __('Right', BM_DOMAIN),
						'icon'  => 'eicon-text-align-right',
					],
					'justify'   => [
						'title' => __('Justify', BM_DOMAIN),
						'icon'  => 'eicon-text-align-justify',
					],
				],
				'default' 		=> 'left',
				'prefix_class'  => 'elementor-posts--align-',
				'selectors' 	=> [
					'{{WRAPPER}} .blog-layout-alignment,
					 {{WRAPPER}} .card_align,
					 {{WRAPPER}} .card-category,
					 {{WRAPPER}} .bm_content_box' => 'text-align: {{VALUE}};',
				],
				'condition' => [
					'bm_blog_layout' => 'grid',
				],
            ]
        );

        $this->end_controls_section();

		/*Post Featured Image*/
        $this->start_controls_section(
            'section_design_image_layout', [
				'label' 	=> __('Image', BM_DOMAIN),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition' => [
					'bm_blog_style' => ['bm_blog_style_1', 'bm_blog_style_2'],
				],
            ]
        );

        $this->add_control(
            'img_border_radius', [
				'label'      => __('Border Radius', BM_DOMAIN),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .blog-layout-item_img, {{WRAPPER}} .wp-post-image, {{WRAPPER}} .bm-hover-effect' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
            ]
        );
		/*Post Featured Image*/

        $this->end_controls_section();

        $this->start_controls_section(
                'section_design_content_bg', [
            'label' => __('Background Color', BM_DOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'bm_blog_style' => ['bm_blog_style_1', 'bm_blog_style_2'],
            ],
                ]
        );

	    $this->add_control(
                'content_box_bg_color', [
            'label' => __('Content Box Color', BM_DOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bm_content_box,
				 {{WRAPPER}} .blog-layout-content-bg-box' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_design_content', [
				'label' => __('Content', BM_DOMAIN),
				'tab' => Controls_Manager::TAB_STYLE,
				/*'condition' => [
					'show_article_feed' => 'full_text',
					'show_title'        => 'yes',
					'show_excerpt'      => 'yes',
					'show_read_more'    => 'yes',
					'show_meta_data'    => 'yes',
				],*/
            ]
        );

        $this->add_control(
            'heading_title_style', [
				'label' => __('Title', BM_DOMAIN),
				'type' => Controls_Manager::HEADING,
				'condition' => ['show_title' => 'yes'],
            ]
        );

        $this->add_control(
                'title_color', [
            'label' => __('Color', BM_DOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bm_title,
                {{WRAPPER}} .bm_title a' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'show_title' => 'yes'
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'title_typography',
            'selector' => '{{WRAPPER}} .bm_title, .bm_title a',
            'condition' => [
                'show_title' => 'yes'
            ],
                ]
        );

        $this->add_control(
                'title_spacing', [
            'label' => __('Spacing', BM_DOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .bm_title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'show_title' => 'yes'
            ],
                ]
        );

        $this->add_control(
                'heading_excerpt_style', [
            'label' => __('Excerpt', BM_DOMAIN),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
            'condition' => [
                'show_excerpt' => 'yes',
                'show_metro_excerpt' => 'yes'
            ],
                ]
        );

        $this->add_control(
                'excerpt_color', [
            'label' => __('Color', BM_DOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bm_content' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'show_excerpt' => 'yes',
                'show_metro_excerpt' => 'yes'
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'excerpt_typography',
            'selector' => '{{WRAPPER}} .bm_content',
            'condition' => [
                'show_excerpt' => 'yes',
                'show_metro_excerpt' => 'yes'
            ],
                ]
        );

        $this->add_control(
                'excerpt_spacing', [
            'label' => __('Spacing', BM_DOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .bm_content' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'show_excerpt' => 'yes',
                'show_metro_excerpt' => 'yes'
            ],
                ]
        );

        $this->add_control(
                'heading_readmore_style', [
            'label' => __('Read More', BM_DOMAIN),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
			'condition' => ['show_read_more' => 'yes', 'show_excerpt' => 'yes', 'show_article_feed' => 'summary'],
                ]
        );

        $this->add_control(
                'read_more_color', [
            'label' => __('Color', BM_DOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .entry-read-more' => 'color: {{VALUE}};',
            ],
			'condition' => ['show_read_more' => 'yes', 'show_excerpt' => 'yes', 'show_article_feed' => 'summary'],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'read_more_typography',
            'selector' => '{{WRAPPER}} .entry-read-more',
			'condition' => ['show_read_more' => 'yes', 'show_excerpt' => 'yes', 'show_article_feed' => 'summary'],
                ]
        );

        $this->add_control(
            'heading_metro_readmore_style', [
				'label' => __('Read More', BM_DOMAIN),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => ['show_metro_read_more' => 'yes', 'metro_excerpt_from' => 'yes'],
            ]
        );

        $this->add_control(
            'metro_read_more_color', [
				'label' => __('Color', BM_DOMAIN),
				'type' => Controls_Manager::COLOR,				
				'selectors' => [
					'{{WRAPPER}} .entry-read-more' => 'color: {{VALUE}};',
				],
				'condition' => ['show_metro_read_more' => 'yes', 'metro_excerpt_from' => 'yes'],
            ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'metro_read_more_typography',
            'selector' => '{{WRAPPER}} .entry-read-more',
			'condition' => ['show_metro_read_more' => 'yes', 'metro_excerpt_from' => 'yes'],
                ]
        );

        $this->add_control(
            'heading_meta_style', [
				'label' => __('Meta', BM_DOMAIN),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => ['show_meta_data' => 'yes'],
            ]
        );

        $this->add_control(
            'meta_color', [
				'label' => __('Icon Color', BM_DOMAIN),
				'type'  => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bm_meta span .fas,
					{{WRAPPER}} .bm_meta span .fa,
					{{WRAPPER}} .fa-tags:before,
					{{WRAPPER}} .fa-comments:before,
					{{WRAPPER}} .fa-clock:before,
					{{WRAPPER}} .fa-user:before,
					{{WRAPPER}} .fa-list-alt:before' => 'color: {{VALUE}};',
				],
				'condition' => ['show_meta_data' => 'yes', 'bm_blog_layout' => 'grid'],
            ]
        );

        $this->add_control(
            'meta_separator_color', [
				'label'		=> __('Text Color', BM_DOMAIN),
				'type' 	    => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .comments-link,
					{{WRAPPER}} .bm_meta,
					{{WRAPPER}} .bm_meta span,
					{{WRAPPER}} .bm_meta a' => 'color: {{VALUE}};',
				],
				'condition' => ['show_meta_data' => 'yes'],
            ]
        );

        $this->add_control(
            'meta_hover_color', [
				'label' => __('Hover Color', BM_DOMAIN),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bm_meta a:hover' => 'color: {{VALUE}};',
				],
				'condition' => ['show_meta_data' => 'yes', 'bm_blog_layout' => 'grid'],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
				'name'     => 'meta_typography',
				'selector' => '{{WRAPPER}} .comments-link, {{WRAPPER}} .bm_meta, {{WRAPPER}} .bm_meta span, {{WRAPPER}} .bm_meta a',
				'condition' => ['show_meta_data' => 'yes'],
            ]
        );

        $this->add_control(
            'meta_spacing', [
				'label'   => __('Spacing', BM_DOMAIN),
				'type'    => Controls_Manager::SLIDER,
				'range'   => [
                'px' 	  => [
                    'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bm_meta' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => ['show_meta_data' => 'yes'],
            ]
        );

        $this->end_controls_section();
        /*
         * End control style tab for Blog Layouts
         */
    }

    /**
     * Render Blogmentor widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
		$card_style = $settings['bm_blog_style'];
		$column;
		if (!empty($settings['bm_blog_layout']) && $settings['bm_blog_layout'] == 'grid') {
			if ($settings['bm_grid_columns'] == "2") {
				$column = "elementor-grid-2";
			} else if ($settings['bm_grid_columns'] == "3") {
				$column = "elementor-grid-3";
			} else if ($settings['bm_grid_columns'] == "4") {
				$column = "elementor-grid-4";
			}
		} else if (!empty($settings['bm_blog_layout']) && $settings['bm_blog_layout'] == 'masonry') {
			$column = "elementor-grid-3";
		} else {
			$column = '';
		}

		$this->add_render_attribute( 'blog-posts-wrapper', 'class', 'bm-blog-posts-wrapper' );

		/* Blog Post Display Type */
		$this->add_render_attribute( 'blog-posts-inner-wrapper', 'class', 'bm-blog-posts' );
		$this->add_render_attribute( 'blog-posts-inner-wrapper', 'class', 'bm-display-grid elementor-grid' );
		$this->add_render_attribute( 'blog-posts-inner-wrapper', 'class', $column  );

		$this->add_render_attribute( 'post-image-wrapper', 'class', 'bm-post-image clearfix' );
		$this->add_render_attribute( 'post-image-wrapper', 'class', 'bm-hover-effect' );
		if ( isset($settings['image_hover_effect']) && $settings['image_hover_effect'] != '' ) {
			$this->add_render_attribute( 'post-image-wrapper', 'class', 'bm-hover-effect-' . $settings['image_hover_effect'] );

			/* Zoom Hover Effect Set */
			if ( $settings['image_hover_effect'] == 'zoom-in' || $settings['image_hover_effect'] == 'zoom-out' ) {
				$this->add_render_attribute( 'post-image-wrapper', 'class', 'bm-' . $settings['image_zoom_effect'] );
			}

			/* Slider Hover Effect Set */
			if ( $settings['image_hover_effect'] == 'slide' ) {
				$this->add_render_attribute( 'post-image-wrapper', 'class', 'bm-' . $settings['image_slider_effect'] );
			}

			/* rotate Hover Effect Set */
			if ( $settings['image_hover_effect'] == 'rotate' ) {
				$this->add_render_attribute( 'post-image-wrapper', 'class', 'bm-' . $settings['image_rotate_effect'] );
			}

		}
		
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type' 	 => 'post',
            'posts_per_page' => $settings['bm_number_of_posts'],
            'post_status' 	 => 'publish',
            'orderby'		 => $settings['post_order_by'],
            'order' 		 => $settings['post_sort_order'],
			'author__in' 	 => $settings['post_author'],
			'paged'          => $paged,
        );
        if (isset($settings['blog_categories']) && !empty($settings['blog_categories'])) {
            $args['tax_query'][] = array(
                'taxonomy' => 'category',
                'field' => 'ID',
                'terms' => $settings['blog_categories'],
            );
        }
        if (isset($settings['blog_tag']) && !empty($settings['blog_tag'])) {
            $args['tax_query'][] = array(
                'taxonomy' => 'post_tag',
                'field' => 'ID',
                'terms' => $settings['blog_tag'],
            );
        }
        $blog_posts = new \WP_Query($args);
		$total_pages = $blog_posts->max_num_pages;
		$settings['args'] = $blog_posts;
		$settings['total_pages'] = $total_pages;

		if ( $blog_posts->have_posts() ) : ?>
		
				<?php
				if (!empty($settings['bm_blog_layout']) && $settings['bm_blog_layout'] == 'grid') {
				?>
				<div <?php echo $this->get_render_attribute_string( 'blog-posts-wrapper' ); ?> >
							<div <?php echo $this->get_render_attribute_string( 'blog-posts-inner-wrapper' ); ?> >
				<?php
					switch ($settings['bm_blog_style']) {
						case 'bm_blog_style_1':
							include BM_PATH . 'includes/layouts/grid/grid-style-1.php';
							break;
						case 'bm_blog_style_2':
							include BM_PATH . 'includes/layouts/grid/grid-style-2.php';
							break;
						default:
							include BM_PATH . 'includes/layouts/grid/grid-style-1.php';
							break;
					}
				?>
				</div></div>
				<?php
				} else if (!empty($settings['bm_blog_layout']) && $settings['bm_blog_layout'] == 'masonry') {
					
					switch ($settings['bm_blog_style']) {
						case 'bm_blog_style_1':
							include BM_PATH . 'includes/layouts/masonry/masonry-style-1.php';
							break;
						case 'bm_blog_style_2':
							include BM_PATH . 'includes/layouts/masonry/masonry-style-2.php';
							break;
						default:
							include BM_PATH . 'includes/layouts/masonry/masonry-style-1.php';
							break;
					}

				} elseif (!empty($settings['bm_blog_layout']) && $settings['bm_blog_layout'] == 'metro') {

					include BM_PATH . 'includes/layouts/metro/metro-style-1.php';
				}
		if (isset($settings['pagination_type']) && $settings['pagination_type'] == 'paged' ) {
		?>
			<div class="bm-pagination <?php echo $settings['pagination_style']; ?>">
				<?php echo bm_post_pagination( $settings['total_pages'] ); ?>
			</div>
		<?php
		}
        endif;
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Blogmentor_Blog_Posts_Widget());
