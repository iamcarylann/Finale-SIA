<?php

namespace App\Imports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OrdersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Order([
            'customer_name' => $row['customer_name'],
            'customer_email' => $row['customer_email'],
            'product_id' => $row['product_id'],
            'total' => $row['total'],
        ]);
    }
}
