<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProductoRepository;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ProductoRepository::class)
 * @UniqueEntity("categoria", message="This category is already registered")
 */
class Producto
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nombre;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     * @Assert\Range(
     *      min = 0,
     *      max = 4,
     *      minMessage = "The price must be at least 0",
     *      maxMessage = "The price cannot be greater than 4"
     * )
     */
    private $precio;

    /**
     * @ORM\ManyToOne(targetEntity=Categoria::class, inversedBy="productos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categoria;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getPrecio(): ?string
    {
        return $this->precio;
    }

    public function setPrecio(string $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    public function getCategoria(): ? Categoria
    {
        return $this->categoria;
    }

    public function setCategoria(? Categoria $categoria): self
    {
        if ($this->categoria && $this->categoria !== $categoria) {
            throw new \Exception('This category is already registered');
        }
        $this->categoria = $categoria;
        return $this;
    }
}