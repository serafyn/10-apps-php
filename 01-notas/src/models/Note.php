<?php

namespace Vidamrr\Notas\models;

use PDO;
use Vidamrr\Notas\lib\Database;

class Note extends Database
{
    private string $uuid;
    private string $title;
    private string $content;

    public function __construct(string $title, string $content)
    {
        parent::__construct();
        $this->uuid = uniqid();
        $this->title = $title;
        $this->content = $content;
    }

    public function save()
    {
        $query = $this->connect()->prepare("INSERT INTO notas (uuid, title, content, updated) VALUES(:uuid, :title, :content, NOW()) ");
        $query->execute(['title' => $this->title, 'uuid' => $this->uuid, 'content' => $this->content]);
    }


    public function update()
    {
        $query = $this->connect()->prepare("UPDATE notas SET title=:title, content=:content, updated=NOW() WHERE uuid=:uuid");
        $query->execute(['title' => $this->title, 'uuid' => $this->uuid, 'content' => $this->content]);
    }

    public static function get($uuid)
    {
        $db = new Database();
        $query = $db->connect()->prepare("SELECT * FROM notas WHERE uuid = :uuid");
        $query->execute(['uuid' => $uuid]);
        $note = Note::createFromArray($query->fetch(PDO::FETCH_ASSOC));

        return $note;
    }

    public static function getAll()
    {
        $notes = [];
        $db = new Database();
        $query = $db->connect()->query("SELECT * FROM notas");
        //$r esta variable es de respuesta
        while ($r = $query->fetch(PDO::FETCH_ASSOC)) {
            $note = Note::createFromArray($r);
            array_push($notes, $note);
        }

        return $notes;
    }

    public static function createFromArray($arr): Note
    {
        $note = new Note($arr['title'], $arr['content']);
        $note->setUuid($arr['uuid']);
        return $note;
    }

    // Getter y Setter

    // public function getUpdatedAt(): string
    // {
    //     return $this->updatedAt;
    // }

    // public function setUpdatedAt()
    // {
    //     $this->updatedAt = date(DATE_RSS);
    // }



    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function setUuid($value)
    {
        $this->uuid = $value;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title 
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content 
     * @return self
     */
    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }
}
