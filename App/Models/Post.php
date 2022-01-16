<?php
namespace App\Models;
class Post extends \App\Core\Model
{

    public function __construct(
        public int $id = 0,
        public ?string $image = null,
        public int $likes = 0,
        public ?string $text = null,
        public ?string $country = null,


    )
    {
    }

    static public function setDbColumns()
    {
        return ['id','image','likes','text','country'];
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param string|null $country
     */
    public function setCountry(?string $country): void
    {
        $this->country = $country;
    }

    /**
     * @param string|null $text
     */
    public function setText(?string $text): void
    {
        $this->text = $text;
    }

    static public function setTableName()
    {
        return "posts";
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
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string|null $image
     */
    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return int
     */
    public function getLikes(): int
    {
        return $this->likes;
    }

    /**
     * @param int $likes
     */
    public function setLikes(int $likes): void
    {
        $this->likes = $likes;
    }

    public function addLike()
    {
        $this->likes++;
        $this->save();
    }
}