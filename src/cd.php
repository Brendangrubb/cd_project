<?php
class Cd
{
    private $title;

    function __construct($title)
    {
        $this->title = $title;
    }

    function setTitle() {
        $this->title = $new_title;
    }

    function getTitle() {
        return $this->title;
    }

    static function getAll() {
        return $_SESSION['list_of_cds'];
    }

    function save() {
        array_push($_SESSION['list_of_cds'], $this);
    }

    static function deleteAll() {
        $_SESSION['list_of_cds'] = array();
    }

}

?>
