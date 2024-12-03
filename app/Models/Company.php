<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /** @use HasFactory<\Database\Factories\CompanyFactory> */
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    public function employees() {
        return $this->hasMany(Employee::class);
    }

    public function employeeCount($id) {
        $company = Company::find($id);
        $employeeCount = $company->employees()->count();

        return $employeeCount;
    }
}

