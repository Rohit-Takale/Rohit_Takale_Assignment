<?php

namespace App\Http\Controllers;

use App\Models\loan_details;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoanController extends Controller
{
    //
    public function index()
    {

        $data = loan_details::get();
        return view('home')->with(['data' => $data]);


        // return response()->json(['msg' => 'We got the records']);
    }

    public function emiData()
    {
        $minDate = DB::table('loan_details')->min('first_payment_date');
        $maxDate = DB::table('loan_details')->max('last_payment_date');

        $start = new \DateTime($minDate);
        $end = new \DateTime($maxDate);
        $end->modify('first day of next month');

        $interval = \DateInterval::createFromDateString('1 month');
        $period = new \DatePeriod($start, $interval, $end);

        $monthColumns = [];

        foreach ($period as $dt) {
            $monthColumns[] = $dt->format("Y_M");
        }
        DB::statement('DROP TABLE IF EXISTS emi_details');

        $createTableQuery = 'CREATE TABLE emi_details (client_id INT NOT NULL';

        foreach ($monthColumns as $month) {
            $createTableQuery .= ', `' . $month . '` DECIMAL(10, 2) DEFAULT 0.00';
        }

        $createTableQuery .= ')';

        DB::statement($createTableQuery);

        $loans = DB::table('loan_details')->get();

        $allClientsData = [];

        foreach ($loans as $loan) {
            $numPayments = $loan->num_of_payment;
            $emi = round($loan->loan_amount / $numPayments, 2);

            $startPaymentDate = new \DateTime($loan->first_payment_date);
            $paymentPeriode = new \DatePeriod($startPaymentDate, $interval, $numPayments);


            $insertData = [
                'client_id' => $loan->client_id
            ];

            foreach ($paymentPeriode as $dt) {
                $monthCol = $dt->format("Y_M");
                if (in_array($monthCol, $monthColumns)) {
                    if ($numPayments > 1) {
                        $insertData[$monthCol] = $emi;
                        $numPayments--;
                    } else {
                        $adjustedEmi = $loan->loan_amount - array_sum(array_slice($insertData, 1));
                        $insertData[$monthCol] = round($adjustedEmi, 2);
                    }
                }
            }
            DB::table('emi_details')->insert($insertData);
            $allClientsData[] = $insertData;
        }


        return redirect()->back()->with('success', 'EMI data processed and inserted successfully');
    }


    public function showEmiDetails()
    {
        $emiDetails = DB::table('emi_details')->get();

        return view('emi_details', compact('emiDetails'));
    }
}
