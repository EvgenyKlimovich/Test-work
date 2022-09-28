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

(function() {
    tinymce.create('tinymce.plugins.wp_tooltip', {
        init : function(ed, url) {
        	ed.addCommand('wp_tooltip_cmd', function() {
				ed.windowManager.open({
					file : url + '/button-tooltip.php',
					width : 220 + parseInt(ed.getLang('button.delta_width', 0)),
					height : 270 + parseInt(ed.getLang('button.delta_height', 0)),
					inline : 1
					}, {
					plugin_url : url
				});
			});
    
            ed.addButton('wp_tooltip', {
                title : 'Добавить подсказку',
                image : url + '/button-tooltip.png',
                cmd: 'wp_tooltip_cmd',
            });
        },

    });
    tinymce.PluginManager.add('wp_tooltip', tinymce.plugins.wp_tooltip);
})();