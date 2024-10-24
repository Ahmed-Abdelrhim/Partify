<?php

namespace App\Providers;

// use Illuminate\Support\ServiceProvider;
// use Spatie\Dropbox\Client;
// use Spatie\FlysystemDropbox\DropboxAdapter;
// use League\Flysystem\FilesystemAdapter;
// use League\Flysystem\Flysystem;
// use League\Flysystem\Filesystem;

// use League\Flysystem\Filesystem;
// use Spatie\Dropbox\Client;
// use Spatie\FlysystemDropbox\DropboxAdapter;
// use Storage;

use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;
use Spatie\Dropbox\Client;
use Spatie\FlysystemDropbox\DropboxAdapter;


class DropboxServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Storage::extend('dropbox', function ($app, $config) {
            $adapter = new DropboxAdapter(new Client(
                $config['authorization_token']
            ));

            return new FilesystemAdapter(
                new Filesystem($adapter, $config),
                $adapter,
                $config
            );
        });
    }

    public function register()
    {
        //
    }

}
