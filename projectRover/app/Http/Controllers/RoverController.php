<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Rover;

class RoverController extends Controller
{
    public function roverPosition (Request $request) {

        $data = $request->json()->all();

        // dd($data);

        $rover = new Rover(
            $data['square']['width'],
            $data['square']['height'],
            $data['rover']['initialPosition']['x'],
            $data['rover']['initialPosition']['y'],
            $data['rover']['initialOrientation'],
            $data['rover']['commands'],
        );

        if ($rover->commands) {

            if ($rover->validateCommands()) {
                foreach ($rover->commands as $comm) {
                    if ($comm == 'A') {
                        $rover->move($comm);
                    } else {
                        $rover->rotate($comm);
                    }
                }
            } else {
                $rover->commands = 'Invalid commands only A, L or R accepted';
            }

        }

        if ($rover->limitUp() and $rover->limitDown() and $rover->limitRight() and $rover->limitLeft()) {
            $onLimits = true;
        } else {
            $onLimits = false;
        }

        return response()->json(['rover' => $rover, 'onLimits' => $onLimits]);
        
    }

    

    public function relocateRover (Request $request) {

        $data = $request->json()->all();

        // if ($commands) {
        //     $commands = str_split($commands);
        // }

        $rover = new Rover(
            $data['square']['width'],
            $data['square']['height'],
            $data['rover']['initialPosition']['x'],
            $data['rover']['initialPosition']['y'],
            $data['rover']['initialOrientation'],
            $data['rover']['commands'],
        );

        // dd($rover->limitLeft());

        if ($rover->limitUp() and $rover->limitDown() and $rover->limitRight() and $rover->limitLeft()) {
            $onLimits = true;
        } else {
            $onLimits = false;
        }

        return response()->json(['rover' => $rover, 'orientation' => $rover->orientation, 'onLimits' => $onLimits]);
    }

    public function validateCommands (Request $request) {

        $data = $request->json()->all();

        // dd($data['rover']['commands']);

        if ($data['rover']['commands']) {
            $commands = str_split($data['rover']['commands']);
        }

        $rover = new Rover(
            $data['square']['width'],
            $data['square']['height'],
            $data['rover']['initialPosition']['x'],
            $data['rover']['initialPosition']['y'],
            $data['rover']['initialOrientation'],
            $commands,
        ); 

        if ($rover->commands) {

            return response()->json(['rover'=> $rover, 'commandsValid' => $rover->validateCommands()]);
        }

        dd($rover);
    
        return response()->json([ 'commandsValid' => $rover->commands]);

    }

    public function moveRover(Request $request) {
        $data = $request->json()->all();

        // dd($data);

        $rover = new Rover(
            $data['gridX'],
            $data['gridY'],
            $data['positionX'],
            $data['positionY'],
            $data['orientation'],
            $data['commands'],
        );

        foreach ($rover->commands as $comm) {
            if ($comm == 'A') {
                $rover->move($comm);
            } else {
                $rover->rotate($comm);
            }
        }

        if ($rover->limitUp() and $rover->limitDown() and $rover->limitRight() and $rover->limitLeft()) {
            $onLimits = true;
        } else {
            $onLimits = false;
        }

        return response()->json(['rover' => $rover, 'onLimits' => $onLimits]);
    }
}


        
