// document.getElementById("supplierAuto").onclick = supplierFill();

// function supplierFill() {
//   document.getElementById("supplierName").innerHTML = document.getElementById("supplierAuto").innerHTML;
// }

$("document").ready(function() {
	$(".supplierAuto").on('click', function() {
		$("#supplierName").val($(this).html());
	});
	function search() {
		var val = $("#search").val();
		if(val == null || val.isEmpty())
			return;
		var records = $("td");
		for(var i = 0; i < records.length; i++) {
			if(!records[i].includes(val))
				$("td")[i].hide();
			else
				$("td")[i].show();
		}
	}
});