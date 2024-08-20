<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoanDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('loan_details')->insert([
            'client_id' => '1001',
            'num_of_payment' => '12',
            'first_payment_date' => Carbon::create('2018', '06', '29'),
            'last_payment_date' => Carbon::create('2019', '05', '29'),
            'loan_amount' => 1550.00
        ]);
        DB::table('loan_details')->insert([
            'client_id' => '1005',
            'num_of_payment' => '7',
            'first_payment_date' => Carbon::create('2019', '02', '15'),
            'last_payment_date' => Carbon::create('2019', '08', '21'),
            'loan_amount' => 6851.94
        ]);
        DB::table('loan_details')->insert([
            'client_id' => '1005',
            'num_of_payment' => '17',
            'first_payment_date' => Carbon::create('2017', '02', '09'),
            'last_payment_date' => Carbon::create('2019', '03', '09'),
            'loan_amount' => 1800.01
        ]);
    }
}
