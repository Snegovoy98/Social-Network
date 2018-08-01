<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $surname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fathername;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_born;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Cities", mappedBy="user")
     */
    private $city_born_id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Cities", mappedBy="user")
     */
    private $live_city_id;

    public function __construct()
    {
        $this->city_born_id = new ArrayCollection();
        $this->live_city_id = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
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

    public function getFathername(): ?string
    {
        return $this->fathername;
    }

    public function setFathername(string $fathername): self
    {
        $this->fathername = $fathername;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getDateBorn(): ?\DateTimeInterface
    {
        return $this->date_born;
    }

    public function setDateBorn(\DateTimeInterface $date_born): self
    {
        $this->date_born = $date_born;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @return Collection|Cities[]
     */
    public function getCityBornId(): Collection
    {
        return $this->city_born_id;
    }

    public function addCityBornId(Cities $cityBornId): self
    {
        if (!$this->city_born_id->contains($cityBornId)) {
            $this->city_born_id[] = $cityBornId;
            $cityBornId->setUser($this);
        }

        return $this;
    }

    public function removeCityBornId(Cities $cityBornId): self
    {
        if ($this->city_born_id->contains($cityBornId)) {
            $this->city_born_id->removeElement($cityBornId);
            // set the owning side to null (unless already changed)
            if ($cityBornId->getUser() === $this) {
                $cityBornId->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Cities[]
     */
    public function getLiveCityId(): Collection
    {
        return $this->live_city_id;
    }

    public function addLiveCityId(Cities $liveCityId): self
    {
        if (!$this->live_city_id->contains($liveCityId)) {
            $this->live_city_id[] = $liveCityId;
            $liveCityId->setUser($this);
        }

        return $this;
    }

    public function removeLiveCityId(Cities $liveCityId): self
    {
        if ($this->live_city_id->contains($liveCityId)) {
            $this->live_city_id->removeElement($liveCityId);
            // set the owning side to null (unless already changed)
            if ($liveCityId->getUser() === $this) {
                $liveCityId->setUser(null);
            }
        }

        return $this;
    }
}
