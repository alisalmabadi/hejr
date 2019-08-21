<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        $core_id = $row['core_id'] != null ? Convertnumber2english($row['core_id']) : 7;
        return new User([
            'name'=>$row['name'],
            'lastname'=>$row['lastname'],
            'username'=>$row['username'],
            'password'=>bcrypt($row['password']),
            'phonenumber'=>Convertnumber2english($row['phonenumber']),
            'konkor_grade'=>Convertnumber2english($row['konkor_grade']),
            'father_name'=>Convertnumber2english($row['father_name']),
            'birthday'=>Convertnumber2english($row['birthday']),
            'address'=>$row['address'],
            'nationcode'=>Convertnumber2english($row['nationcode']),
            'postalcode'=>Convertnumber2english($row['postalcode']),
            'home_number'=>Convertnumber2english($row['home_number']),
            'core_id'=>$core_id
        ]);
    }
}
