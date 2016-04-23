<?php

namespace App\Http\Api\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;

use App\Customer;
use App\Invoice;
use App\Sale;

use App\Http\Api\Transformers\StatsTransformer;


class DailyStatsController extends ApiController
{	
	//Declare the model we are working on
	protected $invoices = '\App\Invoice';

	function __construct()
	{
	}

	public function index(Request $request)
	{
     
        $totalSales = 0;
        $itemsPerInvoice = 0;
        $salesPerInvoice = 0;
        $parameters = $request->all();

        $invoices = $this->getResults($this->invoices, $parameters);

        $itemsSold = $this->getItemsSold($invoices);
        $totalSales = $this->getTotalSales($invoices);
        $totalInvoices = $this->getTotalInvoices($invoices);
        $itemsPerInvoice = $this->getItemsPerInvoice($invoices);
        $salesPerInvoice = $this->getSalesPerInvoice($invoices);
        
        return $this->respond([
            'data' => [
                'location'          => $parameters['location'],
                'items_sold'        => (int) $itemsSold,
                'total_sales'       => (float) $totalSales,
                'total_invoices'    => (int) $totalInvoices,
                'items_per_invoice' => (float) $itemsPerInvoice,
                'sales_per_invoice' => (float) $salesPerInvoice,
            ],
            'user' => \Auth::guard('api')->user()
        ]);
	}

    protected function getTotalInvoices($invoices) {
        return count($invoices);
    }

	protected function getItemsSold($invoices) {
        $total = 0;
        foreach($invoices as $invoice)
        {
            for($i = 0; $i < count($invoice->sale); $i++)
            {
                $total += $invoice->sale[$i]->quantity;
            }
        }

        return $total;
    }

    protected function getTotalSales($invoices) {
        $total = 0;

        foreach($invoices as $invoice)
        {
            $total += $invoice->total;
        }

        return number_format($total, 2);
    }

    protected function getItemsPerInvoice($invoices) {
        $total = 0;

        if(! $this->getTotalInvoices($invoices))
        {
            return $total;
        }
        
        $total = ($this->getItemsSold($invoices) / $this->getTotalInvoices($invoices));        

        return number_format($total, 2);
    }

    protected function getSalesPerInvoice($invoices) {
        $total = 0;

        if(! $this->getTotalInvoices($invoices))
        {
            return $total;
        }

        $total = ($this->getTotalSales($invoices) / $this->getTotalInvoices($invoices));

        return number_format($total, 2);
    }
}
