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
        $type = ($request->input('comment') ?? NULL);
        $mark = ($request->input('mark') ?? NULL);
        $session = ($request->input('session') ?? NULL);
        $employee = ($request->input('employee') ?? NULL);

        return $mark;
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