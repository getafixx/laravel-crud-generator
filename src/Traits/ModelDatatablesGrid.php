<?php

namespace CrudGenerator\Traits;

trait ModelDatatablesGrid
{
    /**
     * The query for the datatables grid for one table
     * @param array $data
     * @return array
     */
    public function datatablesGrid(array $data)
    {

        $len = (int) $data['length'];
        $start = (int) $data['start'];

        $orderCol = (int) $data['order'][0]['column'];
        $dir = $data['order'][0]['dir'];

        // sanitize this
        $searchValue = $data['search']['value'];

        $order = $this->model->datatableFieldName($orderCol);
        
        $like = "%" . $data['search']['value'] . "%";

        $query = $this->model::where('id', 'like', $like);
        foreach ($this->model->getDatatableFields() as $fieldName) {
            $query->orWhere($fieldName, 'like', $like);
        }
        
        $collection = $query->orderBy($order, $dir)
            ->take($len)
            ->skip($start)->get();
        
        $new = [];
        
        if ($collection) {
            foreach ($collection->toArray() as $key => $item) {
                $new[$key] = array_values($item);
            }
        }

        return $new;
    }

}
