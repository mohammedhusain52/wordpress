<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $width
 * @var $css
 * @var $offset
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column_Inner
 */
$el_class = $width = $css = $offset = $nt_landium_vc_column_inner_responsive = '';
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$width = wpb_translateColumnWidthToSpan( $width );
$width = vc_column_offset_class_merge( $offset, $width );

$css_classes = array(
	$this->getExtraClass( $el_class ),
	'wpb_column',
	'vc_column_container',
	$width,
);

if ( vc_shortcode_custom_css_has_property( $css, array(
	'border',
	'background',
) ) ) {
	$css_classes[] = 'vc_col-has-fill';
}

$wrapper_attributes = array();

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';


// custom code start

if( $nt_landium_vc_colinner_992 != '' || $nt_landium_vc_colinner_768 != '' || $nt_landium_vc_colinner_480 != '' ) {

	$nt_landium_col_inner_992=preg_replace('/.vc_custom_[0-9]*/',esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) ),$nt_landium_vc_colinner_992);
	$nt_landium_col_inner_768=preg_replace('/.vc_custom_[0-9]*/',esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) ),$nt_landium_vc_colinner_768);
	$nt_landium_col_inner_480=preg_replace('/.vc_custom_[0-9]*/',esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) ),$nt_landium_vc_colinner_480);

	$output .= '<style>';
		if( $nt_landium_vc_colinner_992 != '' ) {$output .= ' @media only screen and (max-width: 992px) { .'.esc_attr($nt_landium_col_inner_992).' }'; }
		if( $nt_landium_vc_colinner_768 != '' ) {$output .= ' @media only screen and (max-width: 768px) { .'.esc_attr($nt_landium_col_inner_768).' }'; }
		if( $nt_landium_vc_colinner_480 != '' ) {$output .= ' @media only screen and (max-width: 480px) { .'.esc_attr($nt_landium_col_inner_480).' }'; }
	$output .= '</style>';
}

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';
$output .= '<div class="vc_column-inner ' . esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) ) . '">';
$output .= '<div class="wpb_wrapper">';
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';

echo nt_landium_vc_sanitize_data($output);
