// document.getElementById("supplierAuto").onclick = supplierFill();

// function supplierFill() {
//   document.getElementById("supplierName").innerHTML = document.getElementById("supplierAuto").innerHTML;
// }

$("document").ready(function() {
	$(".supplierAuto").on('click', function() {
		$("#supplierName").val($(this).html());
	});
	function loadMore(data) {
		
	}
});