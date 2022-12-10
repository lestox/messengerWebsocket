<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessageRepository::class)]
class Message
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_message = null;

    /*#[ORM\Column]
    #[ORM\ManyToOne(targetEntity: "Conversation", inversedBy: "messages")]
    private ?int id_channel = null;*/

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: "messages_sent")]
    private ?User $user;

    #[ORM\Column(length: 300, nullable: false)]
    private string $content;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeImmutable $created_at;

    #[ORM\Column(nullable: true)]
    private ?int $ghost_time = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $ghost_deleted_at = null;

    public function __construct()
    {
        $this->created_at = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id_message;
    }

    /**
     * @param int|null $id_message
     */
    public function setIdMessage(?int $id_message): void
    {
        $this->id_message = $id_message;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getGhostTime(): ?int
    {
        return $this->ghost_time;
    }

    public function setGhostTime(?int $ghost_time): self
    {
        $this->ghost_time = $ghost_time;

        return $this;
    }

    public function getGhostDeletedAt(): ?\DateTimeInterface
    {
        return $this->ghost_deleted_at;
    }

    public function setGhostDeletedAt(?\DateTimeInterface $ghost_deleted_at): self
    {
        $this->ghost_deleted_at = $ghost_deleted_at;

        return $this;
    }

}
