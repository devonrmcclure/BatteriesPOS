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
    protected $sales    = '\App\Sale';

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

        if($invoices->isEmpty())
        {
            return $this->respondNotFound('No sales today');
        }
        $totalInvoices = $this->getTotalInvoices($invoices);
        $itemsSold = $this->getItemsSold($invoices);
        $totalSales = $this->getTotalSales($invoices);
        $itemsPerInvoice = $this->getItemsPerInvoice($invoices);
        $salesPerInvoice = $this->getSalesPerInvoice($invoices);
        
        return $this->respond([
            'data' => [
                'location'          => $parameters['location'],
                'total_invoices' => (int) $totalInvoices,
                'items_sold'     => (int) $itemsSold,
                'total_sales'    => (float) $totalSales,
                'items_per_invoice' => (float) $itemsPerInvoice,
                'sales_per_invoice' => (float) $salesPerInvoice,
            ],
            'user' => \Auth::guard('api')->user()
        ]);
        die;
		$saleProducts = $this->getResults($this->sales, $request->all());

		if($saleProducts->isEmpty())
		{
			return $this->respondNotFound('Sale does not exist');
		}

		return $this->respond([
			'data' => $stats,
			'user' => \Auth::guard('api')->user()
		]);
	}

    public function getTotalInvoices($invoices) {
        return count($invoices);
    }

	public function getItemsSold($invoices) {
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

    public function getTotalSales($invoices) {
        $total = 0;

        foreach($invoices as $invoice)
        {
            $total += $invoice->total;
        }

        return number_format($total, 2);
    }

    public function getItemsPerInvoice($invoices) {
        $total = 0;

        $total = ($this->getItemsSold($invoices) / $this->getTotalInvoices($invoices));

        return number_format($total, 2);
    }

    public function getSalesPerInvoice($invoices) {
        $total = 0;

        $total = ($this->getTotalSales($invoices) / $this->getTotalInvoices($invoices));

        return number_format($total, 2);
    }
}
