$('#newSale').on('shown.bs.modal', function () {
  $('.sku:first').focus();
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

$('table').on('blur', 'td > .quantity', function(e) {
	e.preventDefault();

	var row = $(this).closest('tr');
	var quantity = parseInt(row.find('.quantity').val());


	var price = parseFloat(row.find('.unit-price').val());
	var extended = parseFloat(Number(quantity)*Number(price)).toFixed(2);
	var pst = parseFloat((Number(quantity)*Number(price))*0.07).toFixed(2);
	var gst = parseFloat((Number(quantity)*Number(price))*0.05).toFixed(2);
	var skuTotal = parseFloat(Number(extended)+Number(pst)+Number(gst)).toFixed(2);

	row.find('.extended').val(extended);
	row.find('.pst').val(pst);
	row.find('.gst').val(gst);
	row.find('.sku-total').val(skuTotal);

	var total = 0;
	$('td > .sku-total').each(function( index ) {
  		total += parseFloat($(this).val());
	});
	$('.total > .price').text(total.toFixed(2));
	$('.sale-total').val(total.toFixed(2));

});

$('.new-sale-modal').on('click', '.add-line', function(e) {
	var index = $('tr:last > td > .discount').attr('tabindex');
	var nameIndex =  $('.sku').length;
	console.log(nameIndex);
	index = parseInt(index);
	$('.new-sale-table').append('<tr class="sale-row"><td><input class="form-control sku" tabindex="' + (index+1) + '" name="sku[' + nameIndex + ']" type="text"></td><td><input class="form-control description" readonly="readonly" name="description[' + nameIndex + ']" type="text"></td><td><input class="form-control quantity" tabindex="' + (index+2) + '" name="quantity[' + nameIndex + ']" type="text"></td><td><input class="form-control discount" tabindex="' + (index+3) + '" name="discount[' + nameIndex + ']" type="text"></td><td><input class="form-control unit-price" readonly="readonly" name="unit_price[' + nameIndex + ']" type="text"></td><td><input class="form-control extended" readonly="readonly" name="extended[' + nameIndex + ']" type="text"></td><td><input class="form-control pst" readonly="readonly" name="pst[' + nameIndex + ']" type="text"></td><td><input class="form-control gst" readonly="readonly" name="gst[' + nameIndex + ']" type="text"></td><td><input class="form-control sku-total" readonly="readonly" name="sku_total[' + nameIndex + ']" type="text"></td></tr>');

	$('.sku:last').focus();
});

$('body').on('change', '.customer-number', function(e) {
    e.preventDefault();
    	var url = 'customers/getCustomer/' + $('.customer-number').val();

       $.ajax({
          url: url,
          dataType: 'json',
          success: function(data) {
          	console.log(data);
          	$('.customer-id').val('Name: ' + data['id']);
            $('.customer-name').text('Name: ' + data['name']);
            $('.customer-address').text('Address: ' + data['address']);
            $('.customer-city').text('City: ' + data['city']);
            $('.customer-pc').text('PC: ' + data['postal_code']);
            $('.customer-primary-phone').text('Primary Phone: ' + data['primary_phone']);
          },
          error: function( data ) {
            alert( "Customer does not exist" );
          }
        });
});