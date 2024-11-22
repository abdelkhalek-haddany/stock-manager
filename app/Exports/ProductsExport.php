<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    /**
     * Get the data to export.
     */
    public function collection()
    {
        return Product::all(['id', 'name', 'quantity', 'minimum_stock']);
    }

    /**
     * Set the headings for the Excel file.
     */
    public function headings(): array
    {
        return ['ID', 'Name', 'Quantity', 'Minimum Stock'];
    }
}
