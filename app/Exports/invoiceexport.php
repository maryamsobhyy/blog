<?php

namespace App\Exports;

use App\Models\blog;
use App\Models\invoices;
use Maatwebsite\Excel\Concerns\FromCollection;

class invoiceexport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return blog::all();
    }
}
