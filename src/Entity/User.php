<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $pseudo;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @ORM\Column(type="string")
     */
    private $nom;
    /**
     * @ORM\Column(type="string")
     */
    private $prenom;
    /**
     * @ORM\Column(type="string")
     */
    private $ad_rue;
    /**
     * @ORM\Column(type="bigint")
     */
    private $ad_code_postal;
    /**
     * @ORM\Column(type="string")
     */
    private $ad_ville;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Role",inversedBy="user")
     */
    private $id_role;

    private function __construct()
    {
        $this->id_role = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
    }

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commentaire", mappedBy="id_utilsateur")
     */
    private $commentaires;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->pseudo;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdRue()
    {
        return $this->ad_rue;
    }

    /**
     * @param mixed $ad_rue
     * @return User
     */
    public function setAdRue($ad_rue)
    {
        $this->ad_rue = $ad_rue;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdCodePostal()
    {
        return $this->ad_code_postal;
    }

    /**
     * @param mixed $ad_code_postal
     * @return User
     */
    public function setAdCodePostal($ad_code_postal)
    {
        $this->ad_code_postal = $ad_code_postal;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdVille()
    {
        return $this->ad_ville;
    }

    /**
     * @param mixed $ad_ville
     * @return User
     */
    public function setAdVille($ad_ville)
    {
        $this->ad_ville = $ad_ville;
        return $this;
    }

    /**
     * @return Collection|Role[]
     */
    public function getIdRole(): Collection
    {
        return $this->id_role;
    }

    /**
     * @param mixed $id_role
     * @return User
     */
    public function setIdRole($id_role)
    {
        $this->id_role = $id_role;
        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setIdUtilsateur($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->contains($commentaire)) {
            $this->commentaires->removeElement($commentaire);
            // set the owning side to null (unless already changed)
            if ($commentaire->getIdUtilsateur() === $this) {
                $commentaire->setIdUtilsateur(null);
            }
        }

        return $this;
    }

}
