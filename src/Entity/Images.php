<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImagesRepository")
 */
class Images
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
    private $image_path;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ProfileSettings", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $setting_id;

    public function getId()
    {
        return $this->id;
    }

    public function getImagePath(): ?string
    {
        return $this->image_path;
    }

    public function setImagePath(string $image_path): self
    {
        $this->image_path = $image_path;

        return $this;
    }

    public function getSettingId(): ?ProfileSettings
    {
        return $this->setting_id;
    }

    public function setSettingId(ProfileSettings $setting_id): self
    {
        $this->setting_id = $setting_id;

        return $this;
    }
}
