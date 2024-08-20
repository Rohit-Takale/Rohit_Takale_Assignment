<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loan_details extends Model
{
    use HasFactory;

    protected $fillables = ['client_id', 'num_of_payment', 'first_payment_date', 'last_payment_date', 'loan_amount'];
}
