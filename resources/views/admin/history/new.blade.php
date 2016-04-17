<!-- Modal -->
<div class="modal fade" id="newPurchase" tabindex="-`1" role="dialog" aria-labelledby="newPurchaseLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New Purchase</h4>
            </div>
            <div class="modal-body new-purchase-modal">
                <div class="vendor-info pull-left">
                    <p class="vendor-name"><b>Vendor:</b> Fake Vendor</p>
                    {!! Form::label('vendor-number', 'Quick Search', ['class' => 'form-label'])!!}
                    {!! Form::text('vendor-number', null, ['class' => 'form-control vendor-number', 'placeholder' => 'Search vendor']) !!}
                </div>

                <div class="invoice-info pull-right">
                    <p><b>Date:</b> {{ Carbon\Carbon::now()->format('Y-m-d H:i') }}</p>
                    <p><b>Location:</b> {{ Auth::user()->name }}</p>
                    <p><b>Rep:</b> Devon</p>
                    <p><b>Invoice #:</b></p>
                </div>

                <div class="table table-striped purchase-items">
                    {!! Form::open(array('url' => 'admin/purchase/history')) !!}
                    <td>{!! Form::text('vendor_invoice', null, ['class' => 'form-control vendor-invoice', 'placeholder' => 'Vendor Invoice Number']) !!}</td>
                    <table class="new-purchase-table">
                        <tr>
                            <th>SKU</th>
                            <th>Description</th>
                            <th>QTY</th>
                            <th>Unit $</th>
                            <th>Extended</th>
                            <th>Total</th>
                        </tr>

                            {!! Form::text('vendor_id', null, ['class' => 'hidden vendor_id']) !!}
                            {!! Form::text('invoice_number', null, ['class' => 'hidden']) !!}
                            {!! Form::text('purchase_total', null, ['class' => 'hidden purchase-total']) !!}
                            <tr class="purchase-row">
                                <td>{!! Form::text('sku[0]', null, ['class' => 'form-control sku', 'tabindex' => '1']) !!}</td>
                                <td>{!! Form::text('description[0]', null, ['class' => 'form-control description', 'readonly' => 'readonly']) !!}</td>
                                <td>{!! Form::text('quantity[0]', null, ['class' => 'form-control quantity', 'tabindex' => '2']) !!}</td>
                                <td>{!! Form::text('unit_price[0]', null, ['class' => 'form-control unit-price', 'readonly' => 'readonly']) !!}</td>
                                <td>{!! Form::text('extended[0]', null, ['class' => 'form-control extended', 'readonly' => 'readonly']) !!}</td>
                                <td>{!! Form::text('sku_total[0]', null, ['class' => 'form-control sku-total', 'readonly' => 'readonly']) !!}</td>
                                <td>{!! Form::text('original-price[0]', null, ['class' => 'form-control original-price hidden']) !!}</td>
                            </tr>

                    </table>
                    {{ Form::textarea('comments', null, ['size' => '30x5', 'class' => 'form-control']) }}
                    {!! Form::submit('', ['class' => 'btn btn-primary form']) !!}
                    {!! Form::close() !!}
                </div>
                <h4 class="total">Total: $<span class="price"></span></h4>
                <button type="button" class="btn btn-primary add-line">+</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Cash</button>
                <button type="button" class="btn btn-primary">Interac</button>
                <button type="button" class="btn btn-primary">Mastercard</button>
                <button type="button" class="btn btn-primary">Visa</button>
            </div>
        </div>
    </div>
</div>