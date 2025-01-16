<?php
namespace App\Exports;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReportInvoicePDF implements FromView
{
    private $_order;

    /**
     * Create a new exporter instance.
     *
     * @param mixed $order order data
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->_order = $order;
    }

    /**
     * Load the view for the PDF export.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function view(): View
    {
        return view('frontend.invoice', [
            'order' => $this->_order
        ]);
    }

    /**
     * Export the view as PDF.
     *
     * @return \Illuminate\Http\Response
     */
    public function exportAsPDF()
    {
        $pdf = PDF::loadView('frontend.orders.invoice', ['order' => $this->_order]);

        return $pdf->download('Invoice-' . $this->_order->code . '.pdf');
    }
}
