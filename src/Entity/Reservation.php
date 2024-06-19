<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
#[ApiResource]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $guestList = [];

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $checkinDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $checkoutDate = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGuestList(): array
    {
        return $this->guestList;
    }

    public function setGuestList(array $guestList): static
    {
        $this->guestList = $guestList;

        return $this;
    }

    public function getCheckinDate(): ?\DateTimeInterface
    {
        return $this->checkinDate;
    }

    public function setCheckinDate(\DateTimeInterface $checkinDate): static
    {
        $this->checkinDate = $checkinDate;

        return $this;
    }

    public function getCheckoutDate(): ?\DateTimeInterface
    {
        return $this->checkoutDate;
    }

    public function setCheckoutDate(\DateTimeInterface $checkoutDate): static
    {
        $this->checkoutDate = $checkoutDate;

        return $this;
    }
}
