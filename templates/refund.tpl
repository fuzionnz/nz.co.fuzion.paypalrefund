<div style= "text-align:right;" id="processor_refund-div-label">{$form.processor_refund.label}</div>

<div id="processor_refund-div-html">{$form.processor_refund.html} <br/>
</div>
<script type="text/javascript">
{literal}
  CRM.$(function($) {
    $('#trxn_date').closest('tr').before('<tr id="processor_refund-tr"><td id="processor_refund_label"></td><td id="processor_refund_element"></td></tr>');
    $("#processor_refund-div-label").appendTo("#processor_refund_label");
    $("#processor_refund-div-html").appendTo("#processor_refund_element");
  });
{/literal}
</script>