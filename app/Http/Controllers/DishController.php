<?php

namespace App\Http\Controllers;

use App\Models\PostTranslation;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use App\Models\Post;
use App\Models\Dish;
use DB;
use PHPUnit\Framework\Constraint\IsEmpty;

class DishController extends Controller
{
    public function index(Post $post) {

        $dishes = array();

        $per_page = request('per_page');
        $lang = request('lang');
        $with = request('with');

        $arrayWith = explode(',', $with);


        if (count($arrayWith) == 1) {

            foreach (Post::all() as $posts) {

                $dishes[] = $posts->translations->map->only(['id', 'locale', 'title', 'post_id', $arrayWith[0], 'status'])
                    ->where('locale', $lang)
                    ->where('status', 'created');

            }

        }
        else if (count($arrayWith) == 2) {

            foreach (Post::all() as $posts) {

                $dishes[] = $posts->translations->map->only(['id', 'locale', 'title', 'post_id', $arrayWith[0], $arrayWith[1], 'status'])
                    ->where('locale', $lang)
                    ->where('status', 'created');

            }

        }
        else if (count($arrayWith) == 3) {

            foreach (Post::all() as $posts) {

                $dishes[] = $posts->translations->map->only(['id', 'locale', 'title', 'post_id', $arrayWith[0], $arrayWith[1], $arrayWith[2], 'status'])
                    ->where('locale', $lang)
                    ->where('status', 'created');
          
            }  

        }

        foreach (array_keys($dishes, '[]') as $key) {

            unset($dishes[$key]);

        }

        if (empty($dishes)) {

            echo 'Nema spremljenih jela';

        }
        else {

            return response()->json([

                array_slice($dishes, 0, $per_page)
    
            ]);

        } 
        
    }

    public function show(Post $post) {
        return response()->json([
            'data' => $post
        ]);
    }

}
