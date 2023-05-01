<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=EventRepository::class)
 * @ApiResource(normalizationContext={"groups" = {"read"}},
 *     denormalizationContext={"groups" = {"write"}},
 * itemOperations={
 *   "get",
 *   "delete",
 *   "put",
 *   "patch"
 *   })
 */
class Event
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Groups({"read", "write"})
     */
    private $name;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"write"})
     */
    private $startDate;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"read", "write"})
     */
    private $endDate;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"read", "write"})
     */
    private $limitNumber;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"read"})
     */
    private $registered = 0;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Registration", mappedBy="event", orphanRemoval=true, cascade={"remove"})
     *
     */
    private $registrations;

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
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getLimitNumber(): ?int
    {
        return $this->limitNumber;
    }

    public function setLimitNumber(int $limitNumber): self
    {
        $this->limitNumber = $limitNumber;

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

    /**
     * @Groups({"read"})
     */
    public function isFull(): bool
    {
        return $this->getRegistered() + 1 > $this->getLimitNumber();
    }
}