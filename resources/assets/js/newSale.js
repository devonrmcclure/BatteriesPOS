$('#newSale').on('shown.bs.modal', function () {
  $('.sku:first').focus()
});

$('table').on('focus', 'td > .sku', function(e) {
	e.preventDefault();
	$('.selected').removeClass('selected');

	$(this).parent().parent().addClass('selected');
});

$('table').on('blur', '.selected > td > .sku', function(e) {
    e.preventDefault();
    	var url = 'sales/getProduct/' + $('.selected > td > .sku').val();

       $.getJSON(url, function(data) {
       		$('.selected > td > .description').val(data['description']);
       		$('.selected > td > .unit-price').val(data['unit_price']);
        });
});

$('table').on('blur', '.selected > td > .quantity', function(e) {
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

$('.new-sale-modal').on('click', '.add-line', function(e) {
	var n = $('tr:last > td > .discount').attr('tabindex');
	var n = parseInt(n);
	$('.new-sale-table').append('<tr class="sale-row"><td><input class="form-control sku" tabindex="' + (n+1) + '" name="sku" type="text"></td><td><input class="form-control description" readonly="readonly" name="description" type="text"></td><td><input class="form-control quantity" tabindex="' + (n+2) + '" name="quantity" type="text"></td><td><input class="form-control discount" tabindex="' + (n+3) + '" name="discount" type="text"></td><td><input class="form-control unit-price" readonly="readonly" name="unit_price" type="text"></td><td><input class="form-control extended" readonly="readonly" name="extended" type="text"></td><td><input class="form-control pst" readonly="readonly" name="pst" type="text"></td><td><input class="form-control gst" readonly="readonly" name="gst" type="text"></td><td><input class="form-control sku-total" readonly="readonly" name="sku_total" type="text"></td></tr>');

	$('.sku:last').focus()
});