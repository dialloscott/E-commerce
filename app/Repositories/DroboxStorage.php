<?php

namespace App\Repositories;


use League\Flysystem\Filesystem;
use Spatie\Dropbox\Client;
use Spatie\FlysystemDropbox\DropboxAdapter;

class DroboxStorage {


    private $client;
    private $adapter;

    public function __construct()
    {
        $this->client = new Client('JuN_-tBtNRcAAAAAAAAHeHKlsyX3AhPKk926IatmhPOpTBy7xP7rUsSzww-X-XXa');
        $this->adapter = new DropboxAdapter($this->client);
    }

    public function getConnection():Filesystem
    {
        return new FileSystem($this->adapter);
    }

}
