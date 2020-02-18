<?php
namespace App\Traits;
use DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\FilterBuilders\FilterBuilderManagement;
use App\Traits\InitModel;
use Illuminate\Support\Facades\Log;
trait ApiMotbit {
    use InitModel;

    protected function buildQueryParams($request)
    {
        $retval = [
            'metric' => 'get',
            'pagination' => [
                'page_size' => 50,
                'page_id' => 0,
            ],
            'sorts' => [],
            'fields' => [],
            'embeds' => [],
            'filters' => [],
            'groups' => [],
        ];
        // pagination
        if ($request->has('page_id')) {
            $retval['pagination']['page_id'] = $request->input('page_id');
        }
        if ($request->has('page_size')) {
            $retval['pagination']['page_size'] = $request->input('page_size');
        }
        // fields
        if ($request->has('fields')) {
            $fields = explode(',', $request->input('fields'));
            foreach ($fields as $field) {
                if ($field != null) {
                    $retval['fields'][] = $field;
                }
            }
        }
        // embeds
        if ($request->has('embeds')) {
            $embeds = explode(',', $request->input('embeds'));
            foreach ($embeds as $embed) {
                if ($embed != null) {
                    $retval['embeds'][] = $embed;
                }
            }
        }
        // groups
        if ($request->has('groups')) {
            $groups = explode(',', $request->input('groups'));
            foreach ($groups as $group) {
                if ($group != null) {
                    $retval['groups'][] = $group;
                }
            }
        }
        // metric
        if ($request->has('metric')) {
            $retval['metric'] = $request->input('metric');
        }
        // sorts
        if ($request->has('sorts')) {
            $sorts = explode(',', $request->input('sorts'));
            foreach ($sorts as $sort) {
                if ($sort != null) {
                    if ($sort[0] === '-') {
                        $retval['sorts'][substr($sort, 1, strlen($sort) - 1)] = 'desc';
                    } else {
                        $retval['sorts'][$sort] = 'asc';
                    }
                }
            }
        }
        // filters
        $retval['filters'] = FilterBuilderManagement::getInstance()->buildQueryParams($request);
        return $retval;
    }

    public function fetchData($query, $params = [])
    {
        if ($params['metric'] == 'count') {
            return $query->count();
        } else if ($params['metric'] == 'first') {
            return $query->first();
        } else if ($params['metric'] == 'increment'
            || $params['metric'] == 'decrement') {
            if (count($params['fields']) > 0) {
                $query = $query->$params['metric']($params['fields'][0]);
            }
            return $query;
        } else {
            if (array_key_exists('page_size', $params['pagination'])
                && array_key_exists('page_id', $params['pagination'])
                && $params['pagination']['page_size'] != -1
                && $params['pagination']['page_id'] != -1) {
                $query = $query->forPage(($params['pagination']['page_id'] + 1), $params['pagination']['page_size']);
            }
            return $query->get();
        }
    }

    public function fetchMetaData($query, $params = [])
    {
        $params['metric'] = 'count';
        $count = $this->fetchData($query, $params);
        $pageSize = -1;
        $pageId = -1;
        $pageCount = 1;
        $hasNext = true;
        $offSet = 0;
        if ($params['pagination']['page_size'] >= 0
            && $params['pagination']['page_id'] >= 0) {
            $pageSize = $params['pagination']['page_size'];
            $pageId = $params['pagination']['page_id'];
            $pageCount = ceil($count / $pageSize);
            $hasNext = true;
            if ($pageId + 1 >= $pageCount) {
                $hasNext = false;
            }
            $offSet = ($pageId) * $pageSize;
        }
        return [
            'has_next' => $hasNext,
            'total_count' => $count,
            'page_count' => $pageCount,
            'page_size' => (int) $pageSize,
            'page_id' => (int) $pageId,
            'off_set' => $offSet,
        ];
    }

    protected function buildSortQuery($query, $sorts)
    {
        $tableAlias = $query->getModel()->getTable();
        foreach ($sorts as $column => $type) {
            if (str_contains($column, '.')) {
                $query = $query->orderBy($this->standardizedQueryAlias($query, $column), $type == 'desc' ? 'desc' : 'asc');
            } else {
                $query = $query->orderBy(($tableAlias ? $tableAlias . '.' : '') . $column, $type == 'desc' ? 'desc' : 'asc');
            }
        }
        return $query;
    }

    protected function buildFilterQuery($query, $filters)
    {
        $ft = [];
        for ($i = 0; $i < count($filters); $i++) {
            $item = $filters[$i];
            $item['field'] = $this->standardizedQueryAlias($query, $item['field']);
            $ft[] = $item;
        }
        return FilterBuilderManagement::getInstance()->buildQuery($query, $ft);
    }

    protected function buildSelectionQuery($query, $selections)
    {
        $tableAlias = $query->getModel()->getTable();
        if ($selections != null && count($selections) > 0) {
            foreach ($selections as $selection) {
                if (preg_match("/^count/", $selection)
                    || preg_match("/^sum/", $selection)
                    || preg_match("/^max/", $selection)
                    || preg_match("/^min/", $selection)
                    || preg_match("/^avg/", $selection)) {
                    $query = $query->addSelect(DB::raw($selection));
                } else {
                    if (str_contains($selection, '.')) {
                        $query = $query->addSelect($this->standardizedQueryAlias($query, $selection));
                    } else {
                        $query = $query->addSelect(($tableAlias ? $tableAlias . '.' : '') . $selection);
                    }
                }
            }
        } else {
            $query = $query->select(array($tableAlias ? $tableAlias . '.*' : '*'));
        }
        return $query;
    }

    protected function buildGroupQuery($query, $groups)
    {
        $tableAlias = $query->getModel()->getTable();
        if ($groups != null && count($groups) > 0) {
            foreach ($groups as $group) {
                if (str_contains($group, '.')) {
                    $query = $query->groupBy($this->standardizedQueryAlias($query, $group));
                } else {
                    $query = $query->groupBy(($tableAlias ? $tableAlias . '.' : '') . $group);
                }
            }
        }
        return $query;
    }

    protected function buildEmbedQuery($query, $embeds)
    {
        if ($embeds != null && count($embeds) > 0) {
            $query = $query->with($embeds);
        }
        return $query;
    }

    protected function standardizedQueryAlias($query, $selection)
    {
        $retval = $selection;
        $fields = explode('.', $selection);
        if (count($fields) >= 2 && $fields[0] == $query->getModel()->entity) {
            $retval = $query->getModel()->getTable();
            for ($idx = 1; $idx < count($fields); $idx++) {
                $retval .= '.' . $fields[$idx];
            }
        }
        return $retval;
    }

    public function resultOne($request, $data) {
        return $data;
    }
    public function resultCollection($request, $data) {
        return $data;
    }
    public function processAfterSave($request, $data) {

    }

    public function additionQuery($model) {
        return $model;
    }

    public function get( Request $request)
    {
        $response = [];
        $model = $this->getModel();
        $queryParams = $this->buildQueryParams($request);
        if(method_exists($this, 'customParams')) {
          $queryParams = $this->customParams($request, $queryParams);
        }
        $model = $this->buildSelectionQuery($model, $queryParams['fields']);
        $model = $this->buildEmbedQuery($model, $queryParams['embeds']);
        $model = $this->buildSortQuery($model, $queryParams['sorts']);
        $model = $this->buildFilterQuery($model, $queryParams['filters']);
        $model = $this->buildGroupQuery($model, $queryParams['groups']);
        if(method_exists($this, 'additionQuery')) {
          $model = $this->additionQuery($model);
        }
        if ($queryParams['metric'] == 'count'
            || $queryParams['metric'] == 'first'
            || $queryParams['metric'] == 'increment'
            || $queryParams['metric'] == 'decrement') {
            $response['result'] = $this->fetchData($model, $queryParams);
        } else {
            $response['meta'] = $this->fetchMetaData($model, $queryParams);
            $response['result'] = $this->fetchData($model, $queryParams);
        }
        return $response;
    }

    public function list(Request $request) {
        $model = $this->getModel();
        $model = $this->additionQuery($model);
        $data = $model->orderBy('created_at', 'DESC')->get();
        return $this->resultCollection($request, $data);
    }

    public function show($id, Request $request)
    {
        $model = $this->getModel();
        $data = $model->findOrFail($id);
        return $this->resultOne($request, $data);
    }

    public function store(Request $request)
    {
        if(env('APP_DEBUG',false) == true) {
            Log::info('ApiMotbit->store->request:');
            Log::info($request);
        }
        $model = $this->getModel();
        $attributes = $this->processInputs($request);
        $data = $model->create($attributes);
        $this->processAfterSave($request, $data);
        return $this->resultOne($request, $data);
    }

    public function update( $id, Request $request)
    {
        $model = $this->getModel();
        $attributes = $this->processInputs($request);
        $obj = $model->findOrFail($id);
        $obj->update($attributes);
        $this->processAfterSave($request, $obj);
    }

    public function patch($id, Request $request)
    {
        if(env('APP_DEBUG', false) == true) {
            Log::info('ApiMotbit->path->id:'.$id);
        }
        $model = $this->getModel();
        $attributes = $this->processInputs($request);
        $obj = $model->findOrFail($id);
        $obj->fill($attributes);
        $obj->save();
        $this->processAfterSave($request, $obj);
        return $this->resultOne($request, $obj);
    }

    public function destroy($id, Request $request)
    {
        $model = $this->getModel();
        $obj = $model->findOrFail($id);
        $result = $obj->delete();
        return [
            'result' => $result,
        ];
    }

    public function proccesRelationWithRequest(Relation $relation, array $items)
    {
        $relation->getResults()->each(function($model) use ($items) {
            foreach ($items as $item) {
                if ($model->id === ($item['id'] ?? null)) {
                    $model->fill($item)->save();
                    return;
                }
            }

            return $model->delete();
        });
        foreach ($items as $item) {
            if (!isset($item['id']))
                $relation->create($item);
        };
    }
}
