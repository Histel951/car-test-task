<?php

namespace app\Mapper\Response;

class ListResponseMapper
{
    public function toArray(array $data, int $page, int $limit, int $total): array
    {
        return [
            'data' => $data,
            'meta' => [
                'page' => $page,
                'total' => $total,
                'limit' => $limit,
                'pages' => (int)ceil($total / $limit),
            ]
        ];
    }
}
