<?php

namespace App\View\Components;

use Illuminate\View\Component;

class bookingForm extends Component
{

    // Properties that are passed through the component to display EDIT values

    public $rooms;
    
    public $route;

    public $type;

    public $name;

    public $email;

    public $phone;

    public $checkin;

    public $checkout;

    public $selectedRoom;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($rooms=[], $route='', $type='', $name='', $email='', $phone='', $checkin='', $checkout='', $selectedRoom='')
    {
        $this->rooms = $rooms;
        $this->route = $route;
        $this->type = $type;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->checkin = $checkin;
        $this->checkout = $checkout;
        $this->selectedRoom = $selectedRoom;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.booking-form');
    }
}
