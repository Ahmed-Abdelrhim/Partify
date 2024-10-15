<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Company\RegisterRequest;
use App\Http\Requests\Api\LoginRequest;
use App\Jobs\RegisterJob;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;


class AuthController extends Controller
{

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $company = $this->handleStoreCompany(Arr::except($data, $data['logo']));

        if ($request->hasFile('logo')) {

            $tempFilePath = $request->file('logo')->store('temp');

            RegisterJob::dispatch($tempFilePath, $company);
        }

        return response()->json(['message' => 'Well Played!.', 'data' => $company], 201);
    }


    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        $company = Company::where('email', $data['email'])->first();

        if (!$company || !Hash::check($data['password'], $company->password)) {
            return response()->json(['message' => 'Invalid Credentials'], 401);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Logged in successfully',
            'token' => $company->createToken("API TOKEN")->plainTextToken,
            'data' => $company,
        ]);
    }

    protected function handleStoreCompany($data)
    {
        return Company::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone' => isset($data['phone']) ? $data['phone'] : null,
            'bio' => isset($data['bio']) ? $data['bio'] : null,
            'about' => isset($data['about']) ? $data['about'] : null,
            'location' => isset($data['location']) ? $data['location'] : null,
            'website' => isset($data['website']) ? $data['website'] : null
        ]);
    }
}




// if ($request->hasFile('logo')) {
//     $file = $request->file('logo');

//     $imageName = 'uploads/' . trim($file->getClientOriginalName());

//     $path = Storage::disk('dropbox-backup')->putFile('/images', $request->file('logo'));


//     $adapter = Storage::disk('dropbox-backup')->getAdapter();

//     $client = $adapter->getClient();
//     $link = $client->createSharedLinkWithSettings($path);

//     return response()->json(['path' => $link['url']]);
// }
