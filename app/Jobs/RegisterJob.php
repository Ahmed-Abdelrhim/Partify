<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Spatie\Dropbox\Client;

class RegisterJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $tempFilePath;
    protected $company;


    public function __construct($tempFilePath, $company)
    {
        $this->tempFilePath = $tempFilePath;
        $this->company = $company;
    }


    public function handle()
    {
        $image_full_link = $this->handleUploadComapnyLogo();

        $this->company->update([
            'logo' => $image_full_link,
        ]);

        info($image_full_link);
    }



    protected function handleUploadComapnyLogo()
    {
        $fileFullPath = storage_path('app/' . $this->tempFilePath);

        if (!file_exists($fileFullPath)) {
            \Log::error("File not found at: " . $fileFullPath);
            return 'no link found';
        }

        $path = Storage::disk('dropbox-backup')->putFile('/images', $fileFullPath);

        $adapter = Storage::disk('dropbox-backup')->getAdapter();
        $client = $adapter->getClient();
        $link = $client->createSharedLinkWithSettings($path);
        Storage::disk('local')->delete($fileFullPath);

        return $link['url'];
    }
}
