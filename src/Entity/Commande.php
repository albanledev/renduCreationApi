<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
#[ApiResource()]
#[ApiFilter(SearchFilter::class, properties: ['id' => 'exact', 'status' => 'exact'])]



class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdDate = null;

    /**
     * @var Collection<int, Boisson>
     */
    #[ORM\ManyToMany(targetEntity: Boisson::class, inversedBy: 'commandes')]
    private Collection $listeBoissons;

    #[ORM\Column]
    private ?int $numeroTable = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    private ?User $serveur = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    private ?User $barman = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    public function __construct()
    {
        $this->listeBoissons = new ArrayCollection();
        $this->createdDate = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedDate(): ?\DateTimeInterface
    {
        return $this->createdDate;
    }

    public function setCreatedDate(\DateTimeInterface $createdDate): static
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    /**
     * @return Collection<int, Boisson>
     */
    public function getListeBoissons(): Collection
    {
        return $this->listeBoissons;
    }

    public function addListeBoisson(Boisson $listeBoisson): static
    {
        if (!$this->listeBoissons->contains($listeBoisson)) {
            $this->listeBoissons->add($listeBoisson);
        }

        return $this;
    }

    public function removeListeBoisson(Boisson $listeBoisson): static
    {
        $this->listeBoissons->removeElement($listeBoisson);

        return $this;
    }

    public function getNumeroTable(): ?int
    {
        return $this->numeroTable;
    }

    public function setNumeroTable(int $numeroTable): static
    {
        $this->numeroTable = $numeroTable;

        return $this;
    }

    public function getServeur(): ?User
    {
        return $this->serveur;
    }

    public function setServeur(?User $serveur): static
    {
        $this->serveur = $serveur;

        return $this;
    }

    public function getBarman(): ?User
    {
        return $this->barman;
    }

    public function setBarman(?User $barman): static
    {
        $this->barman = $barman;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }
}
