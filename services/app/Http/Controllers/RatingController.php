<?php
 
namespace App\Http\Controllers;
 
use Carbon\Carbon;
use App\Models\Cafes;
use App\Models\Images;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function list(Request $request)
    {   
        return 'done';
    }

    public function create(Request $request)
    {
        return $request;
        // $type = ($request->input('type') ?? NULL);
        // $code = ($request->input('code') ?? NULL);
        // $amount = ($request->input('amount') ?? NULL);
        // $quantity = ($request->input('quantity') ?? NULL);
        // $valid = ($request->input('valid') ?? NULL);

        // $until_date = Carbon::parse($valid[1]);
        // $from_date = Carbon::parse($valid[0]);

        // return Voucher::create([
        //     'amount' => $amount,
        //     'promocode' => $code,
        //     'until_date' => $until_date,
        //     'is_active' => 1,
        //     'is_default' => 0,
        //     'voucher_type' => $type,
        //     'from_date' => $from_date,
        //     'quantity' => $quantity
        // ]);
    }
}