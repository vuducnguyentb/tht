<?php
namespace App\FilterBuilders\Impl;

use App\FilterBuilders\FilterBuilder;

class NlikeBuilder extends FilterBuilder
{
    const regex = '/(^[a-zA-Z0-9\.\_\-]+)\!\~(.*)/';
    protected $level = 5;
    public function buildQueryParam($filterParam)
    {
        preg_match(self::regex, $filterParam, $matches);
        if (count($matches) == 3) {
            return [
                "field" => $matches[1],
                "value" => $matches[2],
            ];
        } else {
            return false;
        }
    }
    public function buildQuery($query, $filter)
    {
        return $query->where($filter['field'], 'NOT LIKE', '%' . $filter['value'] . '%');
    }
}
