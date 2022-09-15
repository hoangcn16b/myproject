<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class Main extends Model
{
    use HasFactory;

    protected $table            = '';
    protected $folderUpload     = '';
    protected $fieldSearchAccepted   = [
        'id',
        'name'
    ];

    protected $crudNotAccepted = [
        '_token',
        'thumb_current',
    ];

    public function uploadThumb($thumbObj)
    {
        $thumbName        = Str::random(10) . '.' . $thumbObj->clientExtension();
        $thumbObj->storeAs($this->folderUpload, $thumbName, 'zvn_storage_image');
        return $thumbName;
    }

    public function uploadMultiThumb($thumbObj)
    {
        $thumbName        = Str::random(10) . '.' . $thumbObj->clientExtension();
        $thumbObj->storeAs($this->folderUpload, $thumbName, 'zvn_storage_image');
        return $thumbName;
    }
    public function uploadLogo($thumbObj)
    {
        // dd($thumbObj);
        $nameLogo = pathinfo($thumbObj->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = pathinfo($thumbObj->getClientOriginalName(), PATHINFO_EXTENSION);
        $thumbName        = $nameLogo . '.' . $extension;
        // $thumbName        = Str::random(10) . '.' . $thumbObj->clientExtension();
        // $thumbName        = $thumbObj;
        if (!empty($thumbObj)) {
            $thumbObj->storeAs($this->folderUpload, $thumbName, 'zvn_storage_image');
        }
        return $thumbName;
    }

    public function deleteThumb($thumbName)
    {
        Storage::disk('zvn_storage_image')->delete($this->folderUpload . '/' . $thumbName);
    }

    public function deleteLogo($thumbName)
    {
        if ($thumbName) {
            Storage::disk('zvn_storage_image')->delete($this->folderUpload . '/' . $thumbName);
        }
    }

    public function prepareParams($params)
    {
        return array_diff_key($params, array_flip($this->crudNotAccepted));
    }
}
