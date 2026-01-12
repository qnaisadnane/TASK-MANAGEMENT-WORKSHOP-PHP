<?php

interface Commentable{

  public function hasComment():bool;

  public function addComment(string $comment):void;

  public function getComment():string;
    

}