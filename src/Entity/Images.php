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
     * @ORM\Column(type="integer")
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

    public function getSettingId(): ?int
    {
        return $this->setting_id;
    }

    public function setSettingId(int $setting_id): self
    {
        $this->setting_id = $setting_id;

        return $this;
    }
}
