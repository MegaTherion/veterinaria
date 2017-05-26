<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vacuna
 *
 * @ORM\Table(name="vacuna", indexes={@ORM\Index(name="fk_Vacuna_Mascota1_idx", columns={"Mascota_id"})})
 * @ORM\Entity
 */
class Vacuna
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_vacuna", type="string", length=45, nullable=true)
     */
    private $tipoVacuna;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_dosis", type="integer", nullable=true)
     */
    private $numDosis;

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
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Vacuna
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set tipoVacuna
     *
     * @param string $tipoVacuna
     *
     * @return Vacuna
     */
    public function setTipoVacuna($tipoVacuna)
    {
        $this->tipoVacuna = $tipoVacuna;

        return $this;
    }

    /**
     * Get tipoVacuna
     *
     * @return string
     */
    public function getTipoVacuna()
    {
        return $this->tipoVacuna;
    }

    /**
     * Set numDosis
     *
     * @param integer $numDosis
     *
     * @return Vacuna
     */
    public function setNumDosis($numDosis)
    {
        $this->numDosis = $numDosis;

        return $this;
    }

    /**
     * Get numDosis
     *
     * @return integer
     */
    public function getNumDosis()
    {
        return $this->numDosis;
    }

    /**
     * Set mascota
     *
     * @param \AppBundle\Entity\Mascota $mascota
     *
     * @return Vacuna
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
