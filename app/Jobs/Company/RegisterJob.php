<?php

namespace App\Jobs\Company;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class RegisterJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $file;
    public $filePath;

    public function __construct($file, $filePath)
    {
        $this->file = $file;
        $this->filePath = $filePath;
    }


    public function handle(): void
    {

        // Storage::disk('dropbox')->put($this->filePath, file_get_contents($this->file));

        // // Optional: Create a shareable link
        // $dropboxClient = new Client(config('filesystems.disks.dropbox.authorization_token'));
        // $sharedLink = $dropboxClient->createSharedLinkWithSettings("/{$this->filePath}")['url'];


        // $link = $this->uploadLogo();

        // info($link);

        // return response()->json(['path' => $link]);
    }
}


    // protected function uploadLogo()
    // {

    //     $file = Storage::disk('local')->get($this->logo);
    //     $file_name = time() . '_' . rand(111111, 999999);

    //     // $file = $this->data['logo'];


    //     // $imageName = 'uploads/' . trim($file->getClientOriginalName());
    //     $imageName = 'uploads/' . trim($file_name);


    //     $path = Storage::disk('dropbox-backup')->putFile('/images', $file);


    //     $adapter = Storage::disk('dropbox-backup')->getAdapter();

    //     $client = $adapter->getClient();

    //     $link = $client->createSharedLinkWithSettings($path);

    //     return $link;
    // }
// }

