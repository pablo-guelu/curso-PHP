<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Rover
{
    public $gridX;
    public $gridY;
    public $positionX;
    public $positionY;
    public $orientation;
    public $commands;
    
    const DIRECTIONS = array('N', 'E', 'S', 'W');

    function __construct($gridX, $gridY, $positionX, $positionY, $orientation, $commands)
    {
        $this->gridX = $gridX;
        $this->gridY = $gridY;
        $this->positionX = $positionX;
        $this->positionY = $positionY;
        $this->orientation = $orientation;
        $this->commands = $commands;
    }

    function validateCommands () {

        $this->commands = array_map('strtoupper', $this->commands);

        // dd($this->commands);

        foreach ($this->commands as $comm) {
            if ($comm == 'A' or $comm == 'R' or $comm == 'L') {
                continue;
            } else {
                return false;
            }
        }

        return true;

    }


    function rotate ($comm, $directions = self::DIRECTIONS) {

        $currentPosition = array_search($this->orientation, $directions);

        // Rotating to the right
        if ($comm == 'R' and $currentPosition + 1 < count($directions)) {
            $currentPosition += 1;
            $this->orientation = $directions[$currentPosition];
        } 
        
        elseif ($comm == 'R' and $currentPosition + 1 >= count($directions)) {
            $this->orientation = $directions[0];
        }

        //Rotating to the left
        if ($comm == 'L' and $currentPosition - 1 >= 0) {
            $currentPosition -= 1;
            $this->orientation = $directions[$currentPosition];
        } 
        
        elseif ($comm == 'L' and $currentPosition == 0) {
            $this->orientation = $directions[3];
        }

    }

    // Checking grid limits

    function limitUp () {
        return ($this->positionY <= $this->gridY);
    }

    function limitDown () {
        return ($this->positionY >= 0);
    }

    function limitRight () {
        return ($this->positionX <= $this->gridX);
    }

    function limitLeft () {
        return ($this->positionX >= 0);
    }


    function move ($comm) {

        //Moving North
        if ($this->orientation == 'N' and $comm == 'A' ) {
            $this->positionY += 1;
        }

        //Moving South
        if ($this->orientation == 'S' and $comm == 'A' ) {
           $this->positionY -= 1;
        }

        //Moving East
        if ($this->orientation == 'E' and $comm == 'A' ) {
            $this->positionX += 1;
        }

        //Moving West
        if ($this->orientation == 'W' and $comm == 'A' ) {
            $this->positionX -= 1;
        }
    }

}
