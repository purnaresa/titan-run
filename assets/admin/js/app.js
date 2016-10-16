function isNumber(evt) {
    evt = (evt)
        ? evt
        : window.event;
    var charCode = (evt.which)
        ? evt.which
        : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

$(document).ready(function(){
  if ($('.datepicker').length) {
    $('.datepicker').datepicker({
      dateFormat: "dd/mm/yy",
      maxDate: new Date
    });
  }
});
