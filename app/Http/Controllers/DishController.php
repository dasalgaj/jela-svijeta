<?php

namespace App\Http\Controllers;

use App\Models\PostTranslation;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use App\Models\Post;
use App\Models\Dish;
use DB;

class DishController extends Controller
{
    public function index() {

        $per_page = request('per_page');
        $lang = request('lang');
        $with = request('with');

        $arrayWith = explode(',', $with);

        if (Post::where('deleted_at')->exists()) {

            if (count($arrayWith) == 1) {

                $dishes = PostTranslation::select('id', 'locale', 'title', 'post_id', $arrayWith[0], 'status')->where('locale', $lang)
                ->where('status', 'created')
                ->take($per_page)
                ->get();

                dd(json_decode($dishes));

                return view('dishes', [
                    'dishes' => $dishes,
                ]);

            }
            else if (count($arrayWith) == 2) {

                $dishes = PostTranslation::select('id', 'locale', 'title', 'post_id', $arrayWith[0], $arrayWith[1], 'status')->where('locale', $lang)
                ->where('status', 'created')
                ->take($per_page)
                ->get();

                dd(json_decode($dishes));

                return view('dishes', [
                    'dishes' => $dishes,
                ]);

            }
            else if (count($arrayWith) == 3) {

                $dishes = PostTranslation::select('id', 'locale', 'title', 'post_id', $arrayWith[0], $arrayWith[1], $arrayWith[2], 'status')->where('locale', $lang,)
                ->where('status', 'created')
                ->take($per_page)
                ->get();

                dd(json_decode($dishes));

                return view('dishes', [
                    'dishes' => $dishes,
                ]);

            }
            

        }
        else {
            echo 'Nema spremljenih jela';
        }


        return view('dishes');
        
    }

    public function store(Request $request) {
    
        //$post = Post::first()->translate('en');

        switch($request->action) {
            
            case 'save':
                $faker = Faker::create();
                $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));
                $faker->seed(1235);
        
                
                $post = Post::create([
                    'author' => 'Dario',
                    'en' => [
                        'title' => $faker->foodName(),
                        'ingredients' => $faker->meatName(),
                        'category' => $faker->vegetableName(),
                        'tags' => $faker->sauceName(),
                        'status' => 'created'
                    ],
                    'hr' => [
                        'title' => 'Pizza sa sirom',
                        'ingredients' => 'Pileća prsa',
                        'category' => 'Jam',
                        'tags' => 'Cili umak',
                        'status' => 'created'
                    ],
                ]);
        
                $faker->seed(1237);
        
                
                $post = Post::create([
                    'author' => 'Dario',
                    'en' => [
                        'title' => $faker->foodName(),
                        'ingredients' => $faker->meatName(),
                        'category' => $faker->vegetableName(),
                        'tags' => $faker->sauceName(),
                        'status' => 'created'
                    ],
                    'hr' => [
                        'title' => 'Cheeseburger sa slaninom',
                        'ingredients' => 'Kobasica',
                        'category' => 'Krastavac',
                        'tags' => 'Cili umak',
                        'status' => 'created'
                    ],
                ]);
            break;

            case 'delete':
                Post::query()->delete();
                PostTranslation::query()->update(['status'=>'deleted']);
            break;

        }

       
        

        return redirect('/');
    }

}
