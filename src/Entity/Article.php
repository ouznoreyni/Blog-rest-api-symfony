<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ArticleRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"article:read"}},
 *      denormalizationContext={"groups"={"article:write"}}
 * )
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * 
     * @Groups("article:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"article:read", "article:write"})
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups("article:read")
     */
    private $slug;

    /**
     * @ORM\Column(type="text", nullable=true)
     * 
     *@Groups({"article:read", "article:write"})
     */
    private $content;

    /**
     * @ORM\Column(type="blob", nullable=true)
     * 
     * @Groups({"article:read", "article:write"})
     */
    private $picture;

    /**
     * @ORM\Column(type="boolean")
     * 
     * @Groups("article:read")
     */
    private $isPublised;

    /**
     * @ORM\Column(type="datetime")
     * 
     * @Groups("article:read")
     */
    private $publishedAt;

    /**
     * @ORM\Column(type="datetime",  nullable=true)
     * 
     * @Groups("article:read")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="datetime")
     *
     * @Groups("article:read")
     */
    private $createdAt;


    public function __construct()
    {
        $this->isPublished = false;
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getIsPublised(): ?bool
    {
        return $this->isPublised;
    }

    public function setIsPublised(bool $isPublised): self
    {
        $this->isPublised = $isPublised;

        return $this;
    }

    public function getPublishedAt(): ?\DateTimeInterface
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(\DateTimeInterface $publishedAt): self
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
