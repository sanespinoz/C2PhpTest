<?php

namespace App\Entity;

use App\Repository\EnderecamentoPostalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EnderecamentoPostalRepository::class)
 */
class EnderecamentoPostal
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $cep;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logradouro;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $complemento;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $localidade;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $uf;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ibge;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $gia;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ddd;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $siafi;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bairro;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCep(): ?int
    {
        return $this->cep;
    }

    public function setCep(int $cep): self
    {
        $this->cep = $cep;

        return $this;
    }

    public function getLogradouro(): ?string
    {
        return $this->logradouro;
    }

    public function setLogradouro(string $logradouro): self
    {
        $this->logradouro = $logradouro;

        return $this;
    }

    public function getComplemento(): ?string
    {
        return $this->complemento;
    }

    public function setComplemento(string $complemento): self
    {
        $this->complemento = $complemento;

        return $this;
    }

    public function getLocalidade(): ?string
    {
        return $this->localidade;
    }

    public function setLocalidade(?string $localidade): self
    {
        $this->localidade = $localidade;

        return $this;
    }

    public function getUf(): ?string
    {
        return $this->uf;
    }

    public function setUf(?string $uf): self
    {
        $this->uf = $uf;

        return $this;
    }

    public function getIbge(): ?int
    {
        return $this->ibge;
    }

    public function setIbge(?int $ibge): self
    {
        $this->ibge = $ibge;

        return $this;
    }

    public function getGia(): ?string
    {
        return $this->gia;
    }

    public function setGia(?string $gia): self
    {
        $this->gia = $gia;

        return $this;
    }

    public function getDdd(): ?int
    {
        return $this->ddd;
    }

    public function setDdd(?int $ddd): self
    {
        $this->ddd = $ddd;

        return $this;
    }

    public function getSiafi(): ?int
    {
        return $this->siafi;
    }

    public function setSiafi(?int $siafi): self
    {
        $this->siafi = $siafi;

        return $this;
    }

    public function getBairro(): ?string
    {
        return $this->bairro;
    }

    public function setBairro(?string $bairro): self
    {
        $this->bairro = $bairro;

        return $this;
    }
}
