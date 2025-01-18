<?php

namespace App\Http\Controllers;

use App\Models\user;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard(Request $request)
    {
        return view('dashboard');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function users(Request $request)
    {
        $users = User::get();
        return view('users', compact('users'));
    }

    public function printPdf()
    {
        $users = User::get();
        $data = [
            'title' => 'Welcome To fti.uniska-bjm.ac.id',
            'date' => date('m/d/Y'),
            'users' => $users
        ];
        $pdf = PDF::loadview('mypdf', $data);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('Data User.pdf', array("attachment" => false));
    }

    public function printExcel()
    {
        $users = User::get();
        $data = [
            'title' => 'Welcome To fti.uniska-bjm.ac.id',
            'date' => date('m/d/Y'),
            'users' => $users
        ];
        return view('userexcel', $data);
    }
}
