<?php

namespace App\Imports;

use App\customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomerImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new customer([
            //
            'ID_CUSTOMER' => $row['id_customer'],
            'NAMA' => $row['nama'], 
            'ALAMAT' => $row['alamat'],
            'ID_KELURAHAN' => $row['id_kelurahan'],
        ]);
    }
}
