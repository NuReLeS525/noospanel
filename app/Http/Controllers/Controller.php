<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterRequest;
use App\Models\Currency;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __invoke(FilterRequest $request) {
        $data = $request->validated();

        $query = Currency::query();

        if (isset($data['from_currency'])) {
            $query->where('from_currency', 'like', "%{$data['from_currency']}%");
        }

        if (isset($data['to_currency'])) {
            $query->where('to_currency', 'like', "%{$data['to_currency']}%");
        }

        $posts = $query->get();
    }

}
