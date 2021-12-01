<?php

namespace App\Models;

class Users extends \App\Core\Model
{

    public function __construct(
        public int $id = 0,
        public ?string $mail= null,
        public ?string $password = null
    )
    {
    }
    static public function setDbColumns()
    {
        return ['id','mail','password'];
    }

    static public function setTableName()
    {
        return "users";
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getMail(): ?string
    {
        return $this->mail;
    }

    /**
     * @param string|null $mail
     */
    public function setMail(?string $mail): void
    {
        $this->mail = $mail;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

}