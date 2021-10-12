/* sickchild_preschool_title */
(function() {
  tinymce.create( 'tinymce.plugins.sickchild_preschool_title_shortcode_button', {
    init: function( ed, url ) {
      ed.addButton( 'sickchild_preschool_title', {
        title: 'sickchild_preschool_title shortcode',
        icon: 'plus',
        cmd: 'sickchild_preschool_title_cmd'
      });

      ed.addCommand( 'sickchild_preschool_title_cmd', function() {
        var selected_text = ed.selection.getContent(),
            return_text = '[sickchild-preschool-title]' + selected_text + '[/sickchild-preschool-title]';
        ed.execCommand( 'mceInsertContent', 0, return_text );
      });
    },
    createControl : function( n, cm ) {
      return null;
    },
  });
  tinymce.PluginManager.add( 'sickchild_preschool_title_shortcode_button_plugin', tinymce.plugins.sickchild_preschool_title_shortcode_button );
})();