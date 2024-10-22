<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\User;

class SearchableController extends Controller
{
    public $paginate = 5;

    public function __invoke(Request $request)
    {
        $data = null;
        $users = User::get();

        $search = $request->get('query');

        $data = $this->handleArticlesSearch($request);

        // $tags_array = [];
        // $tags = (array) $data['hits'][0]['_formatted']['tags'];

        // foreach ($tags as $tag) {
        //     $tags_array[] = $tag;
        // }

        // return $tags_array;


        // dd($data);

        return view('search', compact('data'));
    }



    protected function handleArticlesSearch($request)
    {
        $search = $request->get('query');

        if ($search) {
            $articles = Article::search($search, function ($meiliSearch, $query, $options) use ($request) {
                if ($request->has('user_id')) {
                    $options['filters'] = 'user_id=' . $request->user_id;
                }

                $options['attributesToHighlight'] = ['title', 'teaser'];

                return $meiliSearch->search($query, $options);
            })
                ->paginateRaw($this->paginate);
        }

        return isset($articles) ? $articles : null;
    }


    // protected function handleTagsSearch($request)
    // {
    //     $search = $request->get('query');

    //     if ($search) {
    //         $tags = Tag::search($search, function ($meiliSearch, $query, $options) use ($request) {

    //             $options['attributesToHighlight'] = ['name'];

    //             return $meiliSearch->search($query, $options);
    //         })
    //             ->paginateRaw($this->paginate);
    //     }

    //     return isset($tags) ? $tags : null;
    // }



}









// return view('search', compact('jobs'));
// $jobs = [
//     (object) [
//         'title' => 'Senior Backend Developer (PHP)',
//         'company_logo' => '/images/company-logo-1.png',
//         'company_name' => 'Cuez by TinkerList',
//         'location' => 'Remote / Belgium',
//         'posted_at' => '1w',
//         'employment_type' => 'Full Time',
//         'tags' => ['AWS', 'Laravel', 'PHP', 'Senior'],
//     ],
//     (object) [
//         'title' => 'eCommerce developer for CMS',
//         'company_logo' => '/images/company-logo-2.png',
//         'company_name' => 'CMS Max',
//         'location' => 'Remote',
//         'posted_at' => '1w',
//         'employment_type' => 'Contractor',
//         'tags' => [],
//     ],
//     (object) [
//         'title' => 'Staff Software Engineer',
//         'company_logo' => '/images/company-logo-3.png',
//         'company_name' => 'DocuPet',
//         'location' => 'Remote / Canada (EST/EDT)',
//         'posted_at' => '2w',
//         'employment_type' => 'Full Time',
//         'tags' => ['Fullstack', 'Senior', 'Symfony', 'VueJS'],
//     ],
//     // Add more jobs as needed
// ];
