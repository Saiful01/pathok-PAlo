<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersImport implements FromCollection
{
    public function collection()
    {
        return User::all();
    }
}
