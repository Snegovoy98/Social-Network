<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProfileSettingsRepository")
 */
class ProfileSettings
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $show_date_born;

    /**
     * @ORM\Column(type="boolean")
     */
    private $show_born_city;

    /**
     * @ORM\Column(type="boolean")
     */
    private $show_live_city;

    /**
     * @ORM\Column(type="boolean")
     */
    private $show_friends;

    /**
     * @ORM\Column(type="integer")
     */
    private $user_id;

    public function getId()
    {
        return $this->id;
    }

    public function getShowDateBorn(): ?bool
    {
        return $this->show_date_born;
    }

    public function setShowDateBorn(bool $show_date_born): self
    {
        $this->show_date_born = $show_date_born;

        return $this;
    }

    public function getShowBornCity(): ?bool
    {
        return $this->show_born_city;
    }

    public function setShowBornCity(bool $show_born_city): self
    {
        $this->show_born_city = $show_born_city;

        return $this;
    }

    public function getShowLiveCity(): ?bool
    {
        return $this->show_live_city;
    }

    public function setShowLiveCity(bool $show_live_city): self
    {
        $this->show_live_city = $show_live_city;

        return $this;
    }

    public function getShowFriends(): ?bool
    {
        return $this->show_friends;
    }

    public function setShowFriends(bool $show_friends): self
    {
        $this->show_friends = $show_friends;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }
}
