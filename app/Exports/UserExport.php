<?php

namespace App\Exports;

use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UserExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $users;

    public function __construct($users)
    {
        $this->users = $users;
    }

    public function view(): View
    {
        return view('exports.UserExport',[
            'users'=>$this->users
        ]);
    }
}
