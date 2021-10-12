/* pink_title */
(function() {
  tinymce.create( 'tinymce.plugins.pink_title_shortcode_button', {
    init: function( ed, url ) {
      ed.addButton( 'pink_title', {
        title: 'pink_title shortcode',
        icon: 'plus',
        image: '/wp/wp-content/themes/miraiku/images/icon/pink-title.svg',
        cmd: 'pink_title_cmd'
      });

      ed.addCommand( 'pink_title_cmd', function() {
        var selected_text = ed.selection.getContent(),
            return_text = '[pink-title]' + selected_text + '[/pink-title]';
        ed.execCommand( 'mceInsertContent', 0, return_text );
      });
    },
    createControl : function( n, cm ) {
      return null;
    },
  });
  tinymce.PluginManager.add( 'pink_title_shortcode_button_plugin', tinymce.plugins.pink_title_shortcode_button );
})();