$(function() {
  $("select").each(function() {
    $(this).select2({
      theme: 'classic',
      width: 'style',
      placeholder: $(this).attr("placeholder"),
      allowClear: Boolean($(this).data("allow-clear"))
    });
  });
});
