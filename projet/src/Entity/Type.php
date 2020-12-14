<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeRepository::class)
 */
class Type
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tcontrat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTcontrat(): ?string
    {
        return $this->tcontrat;
    }

    public function setTcontrat(string $tcontrat): self
    {
        $this->tcontrat = $tcontrat;

        return $this;
    }
}
