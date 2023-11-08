<?php
 
namespace App\Http\Controllers;
 
use Carbon\Carbon;
use App\Models\User;
use App\Models\Cafes;
use App\Models\Images;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function create(Request $request)
    {
        $cafeid = ($request->input('cafe_id') ?? NULL);
        $mark = ($request->input('mark') ?? []);
        $review = ($request->input('review') ?? NULL);
        $employeeid = ($request->input('employee_id') ?? NULL);

        $user = User::registerEmployee($employeeid);

        $today = Carbon::now()->toDateString();

        $isTodayRate = Rating::whereDate('created_at', $today)
                        ->where('user_id', $user->id)
                        ->where('cafe_id', $cafeid)
                        ->exists();

        if (!$isTodayRate) {
            foreach ($mark as $ratingmark) {
                Rating::create([
                    'user_id' => $user->id,
                    'cafe_id' => $cafeid,
                    'review' => $review,
                    'rating' => $ratingmark
                ]);
            }

            return response()->json(['message' => 'Thank you for your cafe rating submission. Your feedback has been successfully received.'], 200);
        }
        
        return response()->json(['message' => 'You have reached the daily submission limit for this session. You can submit again after the next session starts.'], 208);
    }
}