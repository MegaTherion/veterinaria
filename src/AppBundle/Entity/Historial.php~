<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Historial
 *
 * @ORM\Table(name="historial", indexes={@ORM\Index(name="fk_Historial_Mascota1_idx", columns={"Mascota_id"})})
 * @ORM\Entity
 */
class Historial
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
     * @ORM\Column(name="motivo_atencion", type="text", length=65535, nullable=true)
     */
    private $motivoAtencion;

    /**
     * @var string
     *
     * @ORM\Column(name="diagnostico", type="text", length=65535, nullable=true)
     */
    private $diagnostico;

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
     * @return Historial
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
     * Set motivoAtencion
     *
     * @param string $motivoAtencion
     *
     * @return Historial
     */
    public function setMotivoAtencion($motivoAtencion)
    {
        $this->motivoAtencion = $motivoAtencion;

        return $this;
    }

    /**
     * Get motivoAtencion
     *
     * @return string
     */
    public function getMotivoAtencion()
    {
        return $this->motivoAtencion;
    }

    /**
     * Set diagnostico
     *
     * @param string $diagnostico
     *
     * @return Historial
     */
    public function setDiagnostico($diagnostico)
    {
        $this->diagnostico = $diagnostico;

        return $this;
    }

    /**
     * Get diagnostico
     *
     * @return string
     */
    public function getDiagnostico()
    {
        return $this->diagnostico;
    }

    /**
     * Set mascota
     *
     * @param \AppBundle\Entity\Mascota $mascota
     *
     * @return Historial
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
