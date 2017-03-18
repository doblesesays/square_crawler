<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Show the list.
     *
     * @return \Illuminate\Http\Response
     */
    public function inventory()
    {
    	$inventory = [
         'Daenerys Targaryen' => 'Emilia Clarke',
         'Jon Snow'           => 'Kit Harington',
         'Arya Stark'         => 'Maisie Williams',
         'Melisandre'         => 'Carice van Houten',
         'Khal Drogo'         => 'Jason Momoa',
         'Tyrion Lannister'   => 'Peter Dinklage',
         'Ramsay Bolton'      => 'Iwan Rheon',
         'Petyr Baelish'      => 'Aidan Gillen',
         'Brienne of Tarth'   => 'Gwendoline Christie',
         'Lord Varys'         => 'Conleth Hill'
       ];

        return view('main')->withInventory($inventory);
       //return View::make('main', $characters);
    }
}
