<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SearchController extends Controller
{
    /**
     * Поиск ОО по краткому или полному названию
     * @param  Request  $request
     * @return Response
     */
    public function searchSchool(Request $request): Response
    {
        $search  = $request->search;
        $page    = $request->page;

        $skip    = ($page - 1) * 25;
        $query = School::query()
            ->where('short_name', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%');
        $count   = $query->count();
        $schools = $query
            ->select('id', 'name as text')
            ->take(25)
            ->skip($skip);

        $schools = $schools->get();

        return response(
            [
                'items' => $schools,
                'count' => $count,
            ]
        );
    }

    /**
     * Получение информации об ОО по ид
     * @param  School  $school
     * @return Response
     */
    public function getInfoById(School $school): Response
    {
        return response(
            [
                'id' => $school->id,
                'name' => $school->name,
                'area'        => $school->area->name,
                'mrsd'        => $school->mrsd,
                'short_name' => $school->short_name,
            ]
        );
    }
}
