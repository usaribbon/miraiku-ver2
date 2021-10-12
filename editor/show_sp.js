/* show_sp */
(function() {
  tinymce.create( 'tinymce.plugins.show_sp_shortcode_button', {
    init: function( ed, url ) {
      ed.addButton( 'show_sp', {
        title: 'show_sp shortcode',
        icon: 'plus',
        image: '/wp/wp-content/themes/miraiku/images/icon/br-show-sp.svg',
        cmd: 'show_sp_cmd'
      });

      ed.addCommand( 'show_sp_cmd', function() {
        var selected_text = ed.selection.getContent(),
            return_text = '[br-show-sp]';
        ed.execCommand( 'mceInsertContent', 0, return_text );
      });
    },
    createControl : function( n, cm ) {
      return null;
    },
  });
  tinymce.PluginManager.add( 'show_sp_shortcode_button_plugin', tinymce.plugins.show_sp_shortcode_button );
})();