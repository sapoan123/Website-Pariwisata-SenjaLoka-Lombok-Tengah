<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'package_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'people' => 'required|integer|min:1',
            'booking_date' => 'required|date',
            'notes' => 'nullable|string|max:1000',
        ]);

        if (Auth::check()) {
            $data['user_id'] = Auth::id();
        }

        Booking::create($data);

        return response()->json(['success' => true, 'message' => 'Pemesanan berhasil! Kami akan menghubungi Anda segera.']);
    }
}
