<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = [
            (object)[
                'title' => 'Senior Backend Developer (PHP)',
                'company_logo' => '/images/company-logo-1.png',
                'company_name' => 'Cuez by TinkerList',
                'location' => 'Remote / Belgium',
                'posted_at' => '1w',
                'employment_type' => 'Full Time',
                'tags' => ['AWS', 'Laravel', 'PHP', 'Senior'],
            ],
            (object)[
                'title' => 'eCommerce developer for CMS',
                'company_logo' => '/images/company-logo-2.png',
                'company_name' => 'CMS Max',
                'location' => 'Remote',
                'posted_at' => '1w',
                'employment_type' => 'Contractor',
                'tags' => [],
            ],
            (object)[
                'title' => 'Staff Software Engineer',
                'company_logo' => '/images/company-logo-3.png',
                'company_name' => 'DocuPet',
                'location' => 'Remote / Canada (EST/EDT)',
                'posted_at' => '2w',
                'employment_type' => 'Full Time',
                'tags' => ['Fullstack', 'Senior', 'Symfony', 'VueJS'],
            ],
            // Add more jobs as needed
        ];

        return view('jobs.index', compact('jobs'));
    }
}
