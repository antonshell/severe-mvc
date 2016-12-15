<?php

class News extends CoreModel{
    public $id;
    public $title;
    public $content;
    public $created;

    public function getTable()
    {
        return 'news';
    }
}