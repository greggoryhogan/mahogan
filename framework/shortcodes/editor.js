(function() {
  tinymce.create('tinymce.plugins.popup', {
    init : function(ed, url) {
       ed.addCommand('mcepopup', function() {
          tb_show("Shortcodes", url + '/popup.php?&width=600&height=600');
       });
      ed.addButton('cp_popup', { title : 'Shortcodes', cmd : 'mcepopup', image: url + '/icons/shortcode.png' });
      }
    });
  
  tinymce.PluginManager.add('cp_popupbutton', tinymce.plugins.popup);
})();