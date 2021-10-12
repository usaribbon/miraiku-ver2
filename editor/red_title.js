/* red_title */
(function() {
  tinymce.create( 'tinymce.plugins.red_title_shortcode_button', {
    init: function( ed, url ) {
      ed.addButton( 'red_title', {
        title: 'red_title shortcode',
        icon: 'plus',
        image: '/wp/wp-content/themes/miraiku/images/icon/red-title.svg',
        cmd: 'red_title_cmd'
      });

      ed.addCommand( 'red_title_cmd', function() {
        var selected_text = ed.selection.getContent(),
            return_text = '[red-title]' + selected_text + '[/red-title]';
        ed.execCommand( 'mceInsertContent', 0, return_text );
      });
    },
    createControl : function( n, cm ) {
      return null;
    },
  });
  tinymce.PluginManager.add( 'red_title_shortcode_button_plugin', tinymce.plugins.red_title_shortcode_button );
})();