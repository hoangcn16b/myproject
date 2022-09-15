<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Main as MainModel;
use Illuminate\Support\Facades\DB;

class Slider extends MainModel
{
    use HasFactory;

    public $table = 'sliders';
    public $folderUpload = 'sliders';
    public $fieldSearchAccepted = ['name', 'content'];
    public $crudNotAccepted = ['_token', 'thumb_current'];

    public function listItems($data = null)
    {
        $result = null;
        $result = $this->select('*')->get();
        return $result;
    }
}
