/* green_title */
(function() {
  tinymce.create( 'tinymce.plugins.green_title_shortcode_button', {
    init: function( ed, url ) {
      ed.addButton( 'green_title', {
        title: 'green_title shortcode',
        icon: 'plus',
        image: '/wp/wp-content/themes/miraiku/images/icon/green-title.svg',
        cmd: 'green_title_cmd'
      });

      ed.addCommand( 'green_title_cmd', function() {
        var selected_text = ed.selection.getContent(),
            return_text = '[green-title]' + selected_text + '[/green-title]';
        ed.execCommand( 'mceInsertContent', 0, return_text );
      });
    },
    createControl : function( n, cm ) {
      return null;
    },
  });
  tinymce.PluginManager.add( 'green_title_shortcode_button_plugin', tinymce.plugins.green_title_shortcode_button );
})();