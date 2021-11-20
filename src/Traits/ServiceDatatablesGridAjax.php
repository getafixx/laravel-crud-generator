<?php

namespace CrudGenerator\Traits;

trait ServiceDatatablesGridAjax
{
    /**
       * The query for the datatables grid for one table
       * @param array $data
       * @param $orderCol
       * @param $dir
       * @return array
       */
    public function datatablesGridAjaxQuery(array $data)
    {
        $collection = $this->modelRepository->datatablesGrid($data);
    
        $count = count($collection);
    
        $ret=[];
        $ret['data'] = $collection;
        $ret['recordsTotal'] = $count;
        $ret['iTotalDisplayRecords'] = $count;
        $ret['recordsFiltered'] = $count;
        $ret['draw'] = $data['draw'];
    
        return $ret;
    }
}
