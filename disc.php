<?php
class Disc{

    public $author;
    public $title;
    public $quantity;
    public $prize_total;

    public function __construct($author,$title,$quantity,$prize)
    {
        $this ->author = $author;
        $this ->title = $title;
        $this ->quantity = $quantity;
        $this ->prize_total = $prize * $quantity;
    }

public function getAuthor(){
        return $this ->author;
}
public function getTitle(){
    return $this ->title;
}
public function getQuantity(){
    return $this ->quantity;
}
public function getPrize(){
    return $this ->prize_total;
}




}








?>