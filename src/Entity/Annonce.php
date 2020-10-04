<?php

namespace App\Entity;

use App\Entity\Image;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\AnnonceRepository;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=AnnonceRepository::class)
 */
class Annonce
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
    private $titre;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

/**
 * @Gedmo\Slug(fields={"titre"})
 * @ORM\Column(type="string", length=255)
 */
    private $slug;

    /**
     * @ORM\Column(type="boolean")
     */
    private $negociable;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $archived;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $seen;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $valide;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $validerpar;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="annonces")
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity=Image::class, cascade={"persist"})
     */
    private $image1;

    // /**
    //  * @ORM\OneToOne(targetEntity=Image::class, cascade={"persist"})
    //  */
    // private $image2;
    //  /**
    //  * @ORM\OneToOne(targetEntity=Image::class, cascade={"persist"})
    //  */
    // private $image3;

    public function __toString()
    {
        return (string) $this->getUser();
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getNegociable(): ?bool
    {
        return $this->negociable;
    }

    public function setNegociable(bool $negociable): self
    {
        $this->negociable = $negociable;

        return $this;
    }
   
    public function getImage1(): ?Image
    {
        return $this->image1;
    }

    public function setImage1(?Image $image1): self
    {
        $this->image1 = $image1;

        return $this;
    }
    // public function getImage2(): ?Image
    // {
    //     return $this->image2;
    // }

    // public function setImage2(?Image $image2): self
    // {
    //     $this->image2 = $image2;

    //     return $this;
    // }

    // public function getImage3(): ?Image
    // {
    //     return $this->image3;
    // }

    // public function setImage3(?Image $image3): self
    // {
    //     $this->image3 = $image3;

    //     return $this;
    // }
    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

   

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

   

    public function getArchived(): ?bool
    {
        return $this->archived;
    }

    public function setArchived(bool $archived): self
    {
        $this->archived = $archived;

        return $this;
    }

    public function getSeen(): ?int
    {
        return $this->seen;
    }

    public function setSeen(int $seen): self
    {
        $this->seen = $seen;

        return $this;
    }

    public function getValide(): ?bool
    {
        return $this->valide;
    }

    public function setValide(bool $valide): self
    {
        $this->valide = $valide;

        return $this;
    }

    public function getValiderpar(): ?string
    {
        return $this->validerpar;
    }

    public function setValiderpar(?string $validerpar): self
    {
        $this->validerpar = $validerpar;

        return $this;
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
   
}
