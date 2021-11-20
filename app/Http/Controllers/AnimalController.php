<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public $animals = ['Kucing' , 'Ayam' , 'Ikan'];

    function index()
    {
        foreach ($this->animals as $animal){
            echo "$animal ";
        }
        
    }
    function store(Request $request)
    {
        echo "Menambahkan hewan baru - ";
        array_push($this->animals, $request->nama);
        $this->index();
    }
    function update(Request $request , $id)
    {
        echo "Mengupdate data animals - id : $id ";
        $this->animals[$id] = $request->nama;
        $this->index();
    }
    function destroy($id)
    {
        echo "Menghapus data animals - id $id ";
        unset($this->animals[$id]);
        $this->index();
    }
}
