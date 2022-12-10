<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Console\Command;

class UsersImport implements ToModel, WithStartRow, SkipsOnError, WithHeadingRow
{
    use Importable, SkipsErrors;
    
    public function rules(): array
    {
        return [
            'ten' => ['required', Rule::unique(
                'string',)
            ],
            'email' => ['required', Rule::unique(
                'string',)
            ],
        ];
    }

    public function startRow(): int
    {
        return 2;
    }
    //số lượng record thêm trong 1 lần 
    public function batchSize(): int
    {
        return 1000;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new User([
           'ten'     => $row['ten'],
           'email'    => $row['email'], 
           'password' => Hash::make($row['mssv']),
           'ngaysinh' => Date::excelToDateTimeObject($row['ngaysinh']),
           'gioitinh' => $row['gioitinh'],
        ]);
    }
}
