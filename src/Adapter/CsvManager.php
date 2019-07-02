<?php

namespace App\Adapter;

use League\Csv\Reader;

class CsvManager
{
    protected $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function getAll()
    {
        $csv = Reader::createFromPath($this->path, 'r');
        $csv->setHeaderOffset(0);

        $content = $csv->getIterator();

        return $content;
    }
}