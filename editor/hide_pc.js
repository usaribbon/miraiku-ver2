/* hide_pc */
(function() {
  tinymce.create( 'tinymce.plugins.hide_pc_shortcode_button', {
    init: function( ed, url ) {
      ed.addButton( 'hide_pc', {
        title: 'hide_pc shortcode',
        icon: 'plus',
        cmd: 'hide_pc_cmd'
      });

      ed.addCommand( 'hide_pc_cmd', function() {
        var selected_text = ed.selection.getContent(),
            return_text = '[br-hide-pc]';
        ed.execCommand( 'mceInsertContent', 0, return_text );
      });
    },
    createControl : function( n, cm ) {
      return null;
    },
  });
  tinymce.PluginManager.add( 'hide_pc_shortcode_button_plugin', tinymce.plugins.hide_pc_shortcode_button );
})();