<?php
namespace App\Models;
class Comment extends \App\Core\Model
{
    public function __construct(
        public int $id = 0,
        public ?string $text = null,
        public int $post_id = 0
    )
    {
    }

    static public function setDbColumns()
    {
        return ['id','post_id','text'];
    }

    static public function setTableName()
    {
        return "comments";
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
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string|null $text
     */
    public function setText(?string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return int
     */
    public function getPostId(): int
    {
        return $this->post_id;
    }

    /**
     * @param int $post_id
     */
    public function setPostId(int $post_id): void
    {
        $this->post_id = $post_id;
    }

}