<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;

class AjaxRequestController extends Controller
{
    public function index(Request $request){
        $responseJson = [];
       
        $x = $request->value1;
        $y = $request->value2;
        $op = $request->operation;

        try{
            switch ($op) {
                case 'add':
                    $responseJson['data'] = $x + $y;
                    break;
                case 'sub':
                    $responseJson['data'] = $x - $y;
                    break;
                case 'div':
                    $responseJson['data'] = $x / $y;
                    break;
                case 'mul':
                    $responseJson['data'] = $x * $y;
                    break;
                
                default:
                    $responseJson['error'] = 'not valid operator';
                    return response()->json($responseJson,400);
                    break;
            }
            
        $responseJson['success'] = 'OK'; 
        return response()->json($responseJson,200);

        }catch(Exception $e){
            $responseJson['error'] = 'there was a problem with data';
            $responseJson['data'] = $e->getMessage();
            return response()->json($responseJson,400);
        }
        
    }
}
