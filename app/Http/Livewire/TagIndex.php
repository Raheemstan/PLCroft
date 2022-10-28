<?php

namespace App\Http\Livewire;

use App\Models\tag;
use Livewire\Component;

class TagIndex extends Component
{
    
    public $showsalesmodal = false;
    public $showstockmodal = false;
    public $sell_price;
    public $cost_price;
    public $product_desc;
    public $trans_date;
    public $quantity;



    public $products = [];


    public function mount()
    {
        $this ->products = tag::all();
    }

    public function newInvoice(){
        tag::create([
            'sell_price' => $this->sell_price,
            'product_desc' => $this->product_desc,
            'trans_date' => $this->trans_date,
            'quantity' => $this->quantity
        ]);
        $this->reset();
    }

    public function newstock(){
        tag::create([
            'quantity' => $this->quantity,
            'cost_price' => $this->cost_price,
            'sell_price' => $this->sell_price,
            'product_desc' => $this->product_desc,
            'trans_date' => $this->trans_date
        ]);
        $this->reset();
    }

    public function showCreateModal(){
        $this->showstockmodal = true;
    }
    
    public function closeModal(){
        $this->showsalesmodal = false;
        $this->showstockmodal = false;
    }
    
    public function showCartModal(){
        $this->showsalesmodal = true;
    }

    public function render()
    {
        return view('livewire.tag-index');
    }
}
