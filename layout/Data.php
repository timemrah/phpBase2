<?php


class Data
{

    public Head $head;
    public Body $body;

    public function __construct()
    {
        $this->head = new Head();
        $this->body = new Body();
    }


}