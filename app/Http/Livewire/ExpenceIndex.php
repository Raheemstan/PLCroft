<?php

namespace App\Http\Livewire;

use App\Models\expenditure;
use Livewire\Component;
use Livewire\WithPagination;

class ExpenceIndex extends Component
{
 
    use WithPagination;   
    public $showExpenceModal = false;
    public $amount;
    public $expence_desc;
    public $trans_date;
    public $eId;
    public $user = "hi";


    public $expences = [];

    public function updateExpence(){
        $expence = expenditure::findOrFail($this->eId);
        $expence->update([            
            'amount' => $this->amount,
            'expence_desc' => $this->expence_desc,
            'trans_date' => $this->trans_date
        ]);
        $this->reset();
        $this ->expences = expenditure::all();
    }

    public function showEditModal($eId){
        $this->eId = $eId;
        $exp = expenditure::find($eId);
        $this->amount = $exp->amount;
        $this->trans_date = $exp->trans_date;
        $this->expence_desc = $exp->expence_desc;
        $this->showExpenceModal=true;
    }

    public function mount()
    {
        $this ->expences = expenditure::all();
    }

    public function deleteEntry($eId){
        $exp = expenditure::findOrFail($eId);
        $exp->delete([
            'id'=>$eId
        ]);
        $this->reset();
        $this ->expences = expenditure::all();
    }

    public function newExpence(){
        expenditure::create([
            'amount' => $this->amount,
            'expence_desc' => $this->expence_desc,
            'created_by' => $this->user,
            'trans_date' => $this->trans_date
        ]);
        $this->reset();
        $this ->expences = expenditure::all();
    }

    public function showCreateModal(){
        $this->showExpenceModal = true;
    }

    public function closeExpenceModal(){
        $this->showExpenceModal = false;;
    }

    public function render()
    {
        return view('livewire.expence-index', [
            'expences' => expenditure::paginate(5),
        ]);
    }
}