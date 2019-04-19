<?php
namespace App\Models\traits;

trait Query {
    // 查询
    public function search($request,$qname) {
        $kw = $request->get('kw', '');
        $datemin = !empty($request->get('datemin')) ? $request->get('datemin') : '2018-12-22';
        $datemax = !empty($request->get('datemax')) ? $request->get('datemax') : date('Y-m-d');
        $datemin .= ' 00:00:00';
        $datemax .= ' 23:59:59';

        // 得到了排序的字段序号和排序的规则
        $order = $request->get('order')[0];
        // 以序号为数组的字段
        $dir = $request->get('columns')[$order['column']]['data'];

        $start = $request->get('start');
        $limit = $request->get('length');

        $map = [];
        if ($kw) {
            $map[] = [$qname, 'like', "%{$kw}%"];
        }
        // 查询对象
        $query = $this->whereBetween('created_at', [$datemin, $datemax])->where($map);

        return [
            'draw' => $request->get('draw'),
            'recordsTotal' => $query->count(),
            'recordsFiltered' => $query->count(),
            'data' => $query->orderBy($dir,$order['dir'])->offset($start)->limit($limit)->withTrashed()->get(),
        ];
    }
}