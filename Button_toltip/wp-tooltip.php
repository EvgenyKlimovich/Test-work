<?php
/**
 *@package Tooltip
 * @version 0.0.1
/*
Plugin Name: Tooltip_button
Plugin URI: http://wordpress.org/plugins/Tooltip/
Description:
Author: Evgeny Klimovich
Version: 0.0.2
Author URI: http://testsite.ru
 */



class WPTooltip {

	protected $pluginPath;
	protected $pluginUrl;
	
	public function __construct()
	{
		$this->pluginPath = dirname(__FILE__);

		$this->pluginUrl = plugins_url('', __FILE__);
		
		add_action('init', array($this, 'init'));
		add_shortcode('tooltip', array($this, 'shortcode'));
	}
	
	public function init()
	{
		wp_enqueue_script('jquery.tipTip', $this->pluginUrl . '/js/jquery.tipTip.minified.js', array('jquery'), '1.3');
		wp_enqueue_script('Button_toltip', $this->pluginUrl . '/js/Button_toltip.js', array('jquery'), '1.0.0');

		wp_enqueue_style('jquery.tipTip', $this->pluginUrl . '/js/tipTip.css', '', '1.3');
		wp_enqueue_style('Button_toltip', $this->pluginUrl . '/Button_toltip.css', '', '1.0.0');
		
		add_filter('mce_buttons_3', array($this, 'mce_buttons'));
		add_filter('mce_external_plugins', array($this, 'mce_plugins'));
	}
	
	public function mce_buttons($mce_buttons)
	{
		array_push($mce_buttons, 'wp_tooltip');
		return $mce_buttons;
	}
	
	public function mce_plugins($mce_plugins)
	{
		$mce_plugins['wp_tooltip'] = $this->pluginUrl . '/js/shortcode.js';
		return $mce_plugins;
	}

	public function shortcode($atts, $content = null)
	{

		$html="";

			$html .= '<span class="Button_toltip" title="' . $atts['content'] . '">';
			$html .= $content;
			$html .= '</span>';
//			var_dump(111);
//
//		var_dump($html);

		return $html;
	}

}

$wpt = new WPTooltip();