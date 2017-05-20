<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enfermedades
 *
 * @ORM\Table(name="enfermedades", indexes={@ORM\Index(name="fk_Enfermedades_Mascota1_idx", columns={"Mascota_id"})})
 * @ORM\Entity
 */
class Enfermedades
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text", length=65535, nullable=true)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="sintomas", type="text", length=65535, nullable=true)
     */
    private $sintomas;

    /**
     * @var \Mascota
     *
     * @ORM\ManyToOne(targetEntity="Mascota")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Mascota_id", referencedColumnName="id")
     * })
     */
    private $mascota;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Enfermedades
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set sintomas
     *
     * @param string $sintomas
     *
     * @return Enfermedades
     */
    public function setSintomas($sintomas)
    {
        $this->sintomas = $sintomas;

        return $this;
    }

    /**
     * Get sintomas
     *
     * @return string
     */
    public function getSintomas()
    {
        return $this->sintomas;
    }

    /**
     * Set mascota
     *
     * @param \AppBundle\Entity\Mascota $mascota
     *
     * @return Enfermedades
     */
    public function setMascota(\AppBundle\Entity\Mascota $mascota = null)
    {
        $this->mascota = $mascota;

        return $this;
    }

    /**
     * Get mascota
     *
     * @return \AppBundle\Entity\Mascota
     */
    public function getMascota()
    {
        return $this->mascota;
    }
}
