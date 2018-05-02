// $.extend(alerts, {
//     '<?php echo $this->security->get_csrf_token_name(); ?>' :
//     '<?php echo $this->security->get_csrf_hash(); ?>' });

$.ajaxSetup({
    beforeSend: function(xhr, settings) {
      if (settings.data.indexOf('kthdv') === -1) {
        settings.data += '&kthdv=' + encodeURIComponent(Cookies.get('kthdv_form'));
      }
    }
  });