<?php

namespace App\Http\Livewire;

use App\Models\Hari;
use App\Models\JadwalPelajaran;
use Livewire\Component;

class Welcome extends Component
{
    // state
    public $header;
    public $editMode = false;
    public $inputMode = false;
    public $indexing;

    public $id_jadwal, $hari_id, $pelajaran;

    public function render()
    {
        $haris = Hari::get();
        return view('livewire.welcome', [
            'haris' => $haris
        ]);
    }

    public function rules(){

        return [
            'pelajaran' => 'required',
        ];
    
    }

    public function tambah($hari_id)
    {
        $this->reset();
        $this->hari_id = $hari_id;
        $this->indexing = $hari_id;
        $this->inputMode = true;
    }

    public function close()
    {
        $this->reset();
    }

    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function store()
    {
	    $this->validate();

        try {
            
            // insert in database

	    	$this->reset();
    		$this->emit('success', 'data berhasil di simpan!');
    	} catch (\Exception $e) {
    		$this->emit('error', $e->getMessage());
    	}
    }

    public function edit($id, $hari_id)
    {
    	try {
            $this->reset();
            $this->indexing = $hari_id;
            $this->inputMode = true;
            $this->editMode = true;

            // parsing value in state

    	} catch (\Exception $e) {
            $this->emit('error', $e->getMessage());
    	}
    }

    public function update()
    {
        
        $this->validate();
        
        try {
            
            // update value in database

            $this->reset();
            $this->emit('success', 'data berhasil di update!');

    	} catch (\Exception $e) {
    		$this->emit('error', $e->getMessage());
    	}
    }
    
    public function destroy($id)
    {
        try {
          
            // delete row 

    		$this->emit('success', 'data berhasil di hapus!');
    	}catch(\Exception $e) {
    		$this->emit('error', $e->getMessage());
    	}
    }


}
