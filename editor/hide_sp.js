/* hide_sp */
(function() {
  tinymce.create( 'tinymce.plugins.hide_sp_shortcode_button', {
    init: function( ed, url ) {
      ed.addButton( 'hide_sp', {
        title: 'hide_sp shortcode',
        icon: 'plus',
        cmd: 'hide_sp_cmd'
      });

      ed.addCommand( 'hide_sp_cmd', function() {
        var selected_text = ed.selection.getContent(),
            return_text = '[br-hide-sp]';
        ed.execCommand( 'mceInsertContent', 0, return_text );
      });
    },
    createControl : function( n, cm ) {
      return null;
    },
  });
  tinymce.PluginManager.add( 'hide_sp_shortcode_button_plugin', tinymce.plugins.hide_sp_shortcode_button );
})();