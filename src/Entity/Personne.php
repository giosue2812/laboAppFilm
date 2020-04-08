<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonneRepository")
 */
class Personne
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Serializer\Groups({"film_detail"})
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @Serializer\Groups({"film_detail"})
     * @ORM\Column(type="string", length=50)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $ad_rue;

    /**
     * @ORM\Column(type="bigint")
     */
    private $ad_code_postal;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $ad_ville;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdRue(): ?string
    {
        return $this->ad_rue;
    }

    public function setAdRue(string $ad_rue): self
    {
        $this->ad_rue = $ad_rue;

        return $this;
    }

    public function getAdCodePostal(): ?int
    {
        return $this->ad_code_postal;
    }

    public function setAdCodePostal(int $ad_code_postal): self
    {
        $this->ad_code_postal = $ad_code_postal;

        return $this;
    }

    public function getAdVille(): ?string
    {
        return $this->ad_ville;
    }

    public function setAdVille(string $ad_ville): self
    {
        $this->ad_ville = $ad_ville;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(?int $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

}
