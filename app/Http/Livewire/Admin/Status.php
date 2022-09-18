<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Notification;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Status extends Component
{
    public $rowId;
    public $rowStatus;
    public $inTable;

    public function mount($rowId, $rowStatus, $inTable)
    {
        $this->rowId = $rowId;
        $this->rowStatus = $rowStatus;
        $this->inTable = $inTable;
    }

    public function changeStatus()
    {
        try {
            $this->rowStatus = ($this->rowStatus == 'active') ? 'inactive' : 'active';
            DB::table($this->inTable)
                ->where('id', $this->rowId)
                ->update(['status' => $this->rowStatus]);
            // toastr()->success('Thay đổi thành công!');
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Thay đổi thành công!']
            );
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => 'Thay đổi thất bại!']
            );
        }
    }

    public function render()
    {
        return view('livewire.status');
    }
}
