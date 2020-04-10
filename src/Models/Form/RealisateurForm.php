<?php


namespace App\Models;


class RealisateurForm
{
    /**
     * @var string $realisateur
     */
    private $realisateur;

    /**
     * @return string
     */
    public function getRealisateur(): string
    {
        return $this->realisateur;
    }

    /**
     * @param string $realisateur
     * @return RealisateurForm
     */
    public function setRealisateur(string $realisateur): RealisateurForm
    {
        $this->realisateur = $realisateur;
        return $this;
    }


}
