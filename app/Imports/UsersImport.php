<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name'=>$row[0],
            'lastname'=>$row[1],
            'username'=>$row[2],
            'password'=>bcrypt($row[3]),
            'phonenumber'=>$row[4],
            'konkor_grade'=>Convertnumber2english($row[5]),

        ]);
    }
}
