<?php

namespace App\Http\Controllers;

use App\Models\ItemFeedback;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FeedbackController extends Controller
{
    public function index(){
        return response()->json(ItemFeedback::all());
    }

    public function store(Request $request){
        try {
            $data = $request->validate([
                'header' => ['string', 'required'],
                'body' => ['string', 'required'],
                'score' => ['integer', 'required', 'between:1,5'],
                'item_id' => ['integer', 'required']
            ]);

            $feedback = ItemFeedback::create($data);
            return response()->json($feedback, 201);
        } catch (QueryException $e) {
            Log::error('Database error: ' . $e->getMessage());
            return response()->json(['error' => 'Database error'], 500);
        } catch (\Exception $e) {
            Log::error('General error: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }
}
