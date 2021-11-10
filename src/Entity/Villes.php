<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Villes
 *
 * @ORM\Table(name="villes")
 * @ORM\Entity
 * @ApiResource
 * @ORM\Table(name="villes", indexes={@ORM\Index(columns={"nom"}, flags={"fulltext"})})
 */
class Villes
{
  /**
   * @var int
   *
   * @ORM\Column(name="id", type="integer", nullable=false)
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="IDENTITY")
   * @Groups("ville:read")
   */
  private $id;

  /**
   * @var string|null
   *
   * @ORM\Column(name="nom", type="text", nullable=true)
   * @Groups("ville:read")
   */
  private $nom;

  /**
   * @var string|null
   *
   * @ORM\Column(name="codepostal", type="text", nullable=true)
   * @Groups("ville:read")
   */
  private $codepostal;

  /**
   * @var string|null
   *
   * @ORM\Column(name="codeinsee", type="text", nullable=true)
   * @Groups("ville:read")
   */
  private $codeinsee;

  /**
   * @var int|null
   *
   * @ORM\Column(name="population2010", type="integer", nullable=true)
   * @Groups("ville:read")
   */
  private $population2010;

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getNom(): ?string
  {
    return $this->nom;
  }

  public function setNom(?string $nom): self
  {
    $this->nom = $nom;

    return $this;
  }

  public function getCodepostal(): ?string
  {
    return $this->codepostal;
  }

  public function setCodepostal(?string $codepostal): self
  {
    $this->codepostal = $codepostal;

    return $this;
  }

  public function getCodeinsee(): ?string
  {
    return $this->codeinsee;
  }

  public function setCodeinsee(?string $codeinsee): self
  {
    $this->codeinsee = $codeinsee;

    return $this;
  }

  public function getPopulation2010(): ?int
  {
    return $this->population2010;
  }

  public function setPopulation2010(?int $population2010): self
  {
    $this->population2010 = $population2010;

    return $this;
  }
}
