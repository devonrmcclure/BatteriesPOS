<!-- Modal -->
<div class="modal fade" id="newSale" tabindex="-1" role="dialog" aria-labelledby="newSaleLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New Sale</h4>
            </div>
            <div class="modal-body">
                <div class="customer-info pull-left">
                    <p><b>Name:</b> {{$customer->name}}</p>
                    <p><b>Address:</b> {{$customer->address}}</p>
                    <p><b>City:</b> {{$customer->city}}<span> <b>PC:</b> {{$customer->postal_code}}</span></p>
                    <p><b>Primary Phone:</b> {{$customer->primary_phone}}</p>
                </div>

                <div class="invoice-info pull-right">
                    <p><b>Date:</b> {{ Carbon\Carbon::now()->format('Y-m-d H:i') }}</p>
                    <p><b>Location:</b> {{ Auth::user()->name }}</p>
                    <p><b>Rep:</b> Devon</p>
                    <p><b>Invoice #:</b> {{$invoiceNumber}}</p>
                </div>

                <div class="table table-striped sale-items">
                    <table class="new-sale-table">
                        <tr>
                            <th>SKU</th>
                            <th>Description</th>
                            <th>QTY</th>
                            <th>Discount</th>
                            <th>Unit $</th>
                            <th>Extended</th>
                            <th>PST</th>
                            <th>GST</th>
                            <th>Total</th>
                        </tr>
                        {!! Form::open(array('url' => 'sales')) !!}
                            {!! Form::text('customer_id', $customer->id, ['class' => 'hidden']) !!}
                            {!! Form::text('invoice_number', $invoiceNumber, ['class' => 'hidden']) !!}
                            <tr class="sale-row">
                                <td>{!! Form::text('sku', '483', ['class' => 'form-control']) !!}</td>
                                <td>{!! Form::text('description', 'CR2032 3V Button Cell Battery', ['class' => 'form-control', 'readonly' => 'readonly']) !!}</td>
                                <td>{!! Form::text('quantity', '1', ['class' => 'form-control']) !!}</td>
                                <td>{!! Form::text('discount', '0.00', ['class' => 'form-control']) !!}</td>
                                <td>{!! Form::text('unit_price', '4.99', ['class' => 'form-control', 'readonly' => 'readonly']) !!}</td>
                                <td>{!! Form::text('extended', '4.99', ['class' => 'form-control', 'readonly' => 'readonly']) !!}</td>
                                <td>{!! Form::text('pst', '0.35', ['class' => 'form-control', 'readonly' => 'readonly']) !!}</td>
                                <td>{!! Form::text('gst', '0.25', ['class' => 'form-control', 'readonly' => 'readonly']) !!}</td>
                                <td>{!! Form::text('sku_total', '5.59', ['class' => 'form-control', 'readonly' => 'readonly']) !!}</td>

                            </tr>
                    </table>

                </div>
            </div>
            <div class="modal-footer">

                {!! Form::submit('', ['class' => 'btn btn-primary form']) !!}
            {!! Form::close() !!}
                <button type="button" class="btn btn-primary">Cash</button>
                <button type="button" class="btn btn-primary">Interac</button>
                <button type="button" class="btn btn-primary">Mastercard</button>
                <button type="button" class="btn btn-primary">Visa</button>
            </div>
        </div>
    </div>
</div>