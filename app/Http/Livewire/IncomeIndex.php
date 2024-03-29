<?php

namespace App\Http\Livewire;

use App\Models\income;
use App\Models\tag;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class IncomeIndex extends Component
{
    public $showIncomeModal = false;
    public $amount;
    public $income_desc;
    public $trans_date;
    public $income_id;
   // public $user = 


    public $incomes = [];

    public function mount()
    {
        $this->incomes= income::all();
    }


    public function updateIncome(){
        $income_desc = income::findOrFail($this->income_id)
        ->update([            
            'amount' => $this->amount,
            'income_desc' => $this->income_desc,
            'trans_date' => $this->trans_date
        ]);
        $this->income_desc = income::all();
        $this->showIncomeModal=false;
    }

    public function deleteEntry($incomeid){
        $income_desc = income::findOrFail($incomeid)
        ->delete()->fresh();
        $this->reset();
        $this->income_desc = income::all();
        $this->showIncomeModal=false;
    }

    public function showEditModal($incomeid){
        $income_det = income::find($incomeid);
        $this->amount = $income_det->amount;
        $this->income_desc = $income_det->income_desc;
        $this->trans_date = $income_det->trans_date;
        $this->showIncomeModal = true;
    }
    
    public function newIncome(){
        income::create([
            'amount' => $this->amount,
            'income_desc' => $this->income_desc,
            'trans_date' => $this->trans_date,
            'created_by' => Auth::user()->id
        ])->refresh();
        $this->showIncomeModal=false;
        $this->mount();
    }

    public function showCreateModal(){
        $this->showIncomeModal = true;
    }
    public function closeIncomeModal(){
        $this->showIncomeModal = false;;
    }
    public function render()
    {
        return view('livewire.income-index');
    }
}
