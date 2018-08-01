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
    private $images_path;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ProfileSettings", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $setting_id;

    public function getId()
    {
        return $this->id;
    }

    public function getImagesPath(): ?string
    {
        return $this->images_path;
    }

    public function setImagesPath(string $images_path): self
    {
        $this->images_path = $images_path;

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
