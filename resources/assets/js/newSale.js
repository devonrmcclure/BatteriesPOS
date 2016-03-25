$('#newSale').on('shown.bs.modal', function () {
  $('.selected > td > .sku').focus()
})

$('.selected > td > .sku').focusout(function(e) {
	e.preventDefault();
	var url = 'sales/getProduct/' + $('.sku').val();

   $.getJSON(url, function(data) {
   		$('.selected > td > .description').val(data['description']);
   		$('.selected > td > .unit-price').val(data['unit_price']);
    });
});

$( '.quantity' ).focusout(function(e) {
	e.preventDefault();

	var quantity = parseInt($('.selected > td > .quantity').val());
	var price = parseFloat($('.selected > td > .unit-price').val());
	var extended = parseFloat(Number(quantity)*Number(price)).toFixed(2);
	var pst = parseFloat((Number(quantity)*Number(price))*0.07).toFixed(2);
	var gst = parseFloat((Number(quantity)*Number(price))*0.05).toFixed(2);
	var total = parseFloat(Number(extended)+Number(pst)+Number(gst)).toFixed(2);

	$('.selected > td > .extended').val(extended);
	$('.selected > td > .pst').val(pst);
	$('.selected > td > .gst').val(gst);
	$('.selected > td > .sku-total').val(total);

});