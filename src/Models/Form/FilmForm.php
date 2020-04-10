<?php


namespace App\Models;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

class FilmForm
{
    /**
     * @var string $titre
     * @Assert\NotNull()
     * @Assert\NotBlank()
     */
    private $titre;
    /**
     * @var string $description
     */
    private $description;
    /**
     * @var \DateTime $dateSortie
     */
    private $date_sortie;
    /**
     * @var string $bandeAnnoce
     */
    private $bande_annoce;
    /**
     * @var string $image
     */
    private $image;

    /**
     * @return string
     */
    public function getTitre(): ?string
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return \DateTime
     */
    public function getDateSortie(): ?\DateTime
    {
        return $this->date_sortie;
    }

    /**
     * @param \DateTime $dateSortie
     */
    public function setDateSortie(\DateTime $dateSortie): void
    {
        $this->date_sortie = $dateSortie;
    }

    /**
     * @return string
     */
    public function getBandeAnnoce(): ?string
    {
        return $this->bande_annoce;
    }

    /**
     * @param string $bandeAnnoce
     */
    public function setBandeAnnoce(string $bandeAnnoce): void
    {
        $this->bande_annoce = $bandeAnnoce;
    }

    /**
     * @return string
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }
}
