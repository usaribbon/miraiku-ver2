/* show_pc */
(function() {
  tinymce.create( 'tinymce.plugins.show_pc_shortcode_button', {
    init: function( ed, url ) {
      ed.addButton( 'show_pc', {
        title: 'show_pc shortcode',
        icon: 'plus',
        image: '/wp/wp-content/themes/miraiku/images/icon/br-show-pc.svg',
        cmd: 'show_pc_cmd'
      });

      ed.addCommand( 'show_pc_cmd', function() {
        var selected_text = ed.selection.getContent(),
            return_text = '[br-show-pc]';
        ed.execCommand( 'mceInsertContent', 0, return_text );
      });
    },
    createControl : function( n, cm ) {
      return null;
    },
  });
  tinymce.PluginManager.add( 'show_pc_shortcode_button_plugin', tinymce.plugins.show_pc_shortcode_button );
})();