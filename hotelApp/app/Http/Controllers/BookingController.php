<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth; 

class BookingController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Booking::class, 'booking');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $bookings = Booking::all();
            return view('bookings.index', ['bookings' => $bookings]);
        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('bookings.create', ['allRooms' => Room::all()]);
        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {

        // dd($request);

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'checkin' => 'required',
            'checkout' => 'required',
            'room' => 'required|integer|numeric|min:0|not_in:0'
        ]);

        try {

            $booking = Booking::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'checkin' => $request->input('checkin'),
                'checkout' => $request->input('checkout'),
                'user_id' => Auth::user()->id,
            ]);

            // since we have an independent model (table) for rooms we need to manually link the booking to it
            $room = Room::where('number', $request->input('room'));
            $room -> update(['booking_id' => $booking -> id]);

            return redirect('bookings');

        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        try {
            return view('bookings.show', ['booking' => $booking]);
        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        try {
            return view('bookings.edit', ['allRooms' => Room::all(), 'booking' => $booking]);
        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'checkin' => 'required',
            'checkout' => 'required',
            'room' => 'required|integer|numeric|min:0|not_in:0'
        ]);

        try {

            // when updating we have to erase the booking_id from the room previously selected, if not will have a constrain error
            $previousRoom = Room::where('number', $booking -> room -> number); 
            $previousRoom -> update(['booking_id' => null]);

            $booking 
            -> update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'checkin' => $request->input('checkin'),
                'checkout' => $request->input('checkout'),
                'room' => $request->input('room'),
                'user_id' => Auth::user()->id,
            ]);

            
            // since we have an independent model (table) for rooms we need to manually link the booking to it
            $room = Room::where('number', $request->input('room'));
            $room -> update(['booking_id' => $booking -> id]);

            return redirect('bookings');

        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        try {
            $booking->delete();

            return redirect('/bookings');

        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }
    }
}
