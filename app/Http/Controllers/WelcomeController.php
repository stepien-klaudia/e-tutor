<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\AnnouncementCategory;
use App\Models\AnnouncementLevel;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View|JsonResponse
     */
    public function index(Request $request)
    {
        $filters = $request->query('filter');
        $paginate = $request->query('paginate') ?? 5;
        $query = Announcement::query();
        $query->paginate($paginate);
        if(!is_null($filters)){
            if(array_key_exists('categories',$filters))
            {
               $query = $query->whereIn('category_id',$filters['categories']); 
            }
            
            if(array_key_exists('levels',$filters))
            {
                $query = $query->whereIn('level_id',$filters['levels']);
            }
            

            if(!is_null($filters['place'])){
            $query = $query->where('place',$filters['place']);
            }

            if(!is_null($filters['price_min'])){
            $query = $query->where('price','>=',$filters['price_min']);
            }

            if(!is_null($filters['price_max'])){
            $query = $query->where('price','<=',$filters['price_max']);
            }

            return response()->json([
                'data' => $query->get()
            ]);
        };



        return view('welcome',
                    ['announcements'=> $query-> get(),
                'categories'=>AnnouncementCategory::orderBy('name','ASC')->get(),
            'levels'=>AnnouncementLevel::orderBy('name','ASC')->get()]);
    }
}
