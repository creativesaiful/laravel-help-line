<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
  
<!-- Header link -->



<!-- Footer Link -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>


<script type="text/javascript">
	
	$(document).ready(function () {
    $('#TableId').DataTable().destroy();
    $('#TableId').DataTable({ 'order': false });
    $('#TableId').addClass('bs-select');
});
</script>