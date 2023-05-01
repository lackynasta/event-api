<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=EventRepository::class)
 * @ApiResource(
 * itemOperations={
 *   "get",
 *   "delete",
 *   "put"
 *   })
 */
class Event
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $start_date;

    /**
     * @ORM\Column(type="datetime")
     */
    private $end_date;

    /**
     * @ORM\Column(type="integer")
     */
    private $limit_number;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $registered = 0;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    public function setStartDate(\DateTimeInterface $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->end_date;
    }

    public function setEndDate(\DateTimeInterface $end_date): self
    {
        $this->end_date = $end_date;

        return $this;
    }

    public function getLimitNumber(): ?int
    {
        return $this->limit_number;
    }

    public function setLimitNumber(int $limit_number): self
    {
        $this->limit_number = $limit_number;

        return $this;
    }

    public function getRegistered(): ?int
    {
        return $this->registered;
    }

    public function setRegistered(int $registered): self
    {
        $this->registered = $registered;

        return $this;
    }

    public function incrementRegistered(): void
    {
        $this->registered++ ;
    }

    public function isFull(): bool
    {
        return $this->getRegistered() + 1 > $this->getLimitNumber();
    }
}