<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use NodeTrait;
    protected $guarded = [];
    protected $table               = 'categories';
    protected $folderUpload        = 'category';
    protected $fieldSearchAccepted = ['id', 'name'];
    protected $crudNotAccepted     = ['_token', 'parent_id'];

    public function listItems($params = null, $options = null)
    {
        if ($options['task'] == 'admin-list') {
            $result = null;
            $query = $this->select('id', 'name', 'status', '_lft', '_rgt', 'parent_id')->withDepth()->defaultOrder()
                ->having('depth', '>', 0);
            if ($params['filter']['status'] !== "all") {
                $query->where('status', '=', $params['filter']['status']);
            }

            if ($params['search']['value'] !== "") {
                if ($params['search']['field'] == "all") {
                    $query->where(function ($query) use ($params) {
                        foreach ($this->fieldSearchAccepted as $column) {
                            $query->orWhere($column, 'LIKE',  "%{$params['search']['value']}%");
                        }
                    });
                } else if (in_array($params['search']['field'], $this->fieldSearchAccepted)) {
                    $query->where($params['search']['field'], 'LIKE',  "%{$params['search']['value']}%");
                }
            }

            if ($params['search']['filter'] !== "") {
                if ($params['search']['filter'] == "all") {
                } else if (array_key_exists($params['search']['filter'], $this->getSpecial)) {
                    $query->where('special', '=',  $params['search']['filter']);
                }
            }

            $result = $query->get();
        }
        // dd($result);
        return $result;
    }

    public function countItems($params = null, $options  = null)
    {

        $result = null;
        if ($options['task'] == 'admin-count-items-group-by-status') {
            $query = $this::groupBy('status')
                ->select(DB::raw('status , COUNT(id) as count'))->where('id', '!=', 1);
            if ($params['search']['value'] !== "") {
                if ($params['search']['field'] == "all") {
                    $query->where(function ($query) use ($params) {
                        foreach ($this->fieldSearchAccepted as $column) {
                            $query->orWhere($column, 'LIKE',  "%{$params['search']['value']}%");
                        }
                    });
                } else if (in_array($params['search']['field'], $this->fieldSearchAccepted)) {
                    $query->where($params['search']['field'], 'LIKE',  "%{$params['search']['value']}%");
                }
            }
            if ($params['search']['filter'] !== "") {
                if ($params['search']['filter'] == "all") {
                } else if (array_key_exists($params['search']['filter'], $this->getSpecial)) {
                    $query->where('special', '=',  $params['search']['filter']);
                }
            }
            $result = $query->get()->toArray();
        }

        return $result;
    }

    public function changeOrdering($params = null)
    {
        $node = $this->find($params['id']);
        if ($params['currentOrdering'] == 'up') {
            $node->up();
        } elseif ($params['currentOrdering'] == 'down') {
            $node->down();
        }
    }
}
