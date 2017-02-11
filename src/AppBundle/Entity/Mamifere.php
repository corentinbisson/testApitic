<?php
/**
 * Created by PhpStorm.
 * User: coren
 * Date: 09/02/2017
 * Time: 21:20
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mamifere
 *
 * @ORM\Table(name="animal")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AnimalRepository")
 */
class Mamifere extends Animal
{
    /**
     * @var string
     */
    private $couleur = '#1E90FF';

    /**
     * @var string
     *
     * @ORM\Column(name="fur", type="string", length=100, nullable=true)
     */
    private $fur;

    /**
     * Set fur
     *
     * @param string $fur
     * @return Mamifere
     */
    public function setFur($fur)
    {
        $this->fur = $fur;

        return $this;
    }

    /**
     * Get fur
     *
     * @return string
     */
    public function getFur()
    {
        return $this->fur;
    }

    /**
     * Set couleur
     *
     * @param string $couleur
     * @return Reptile
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get couleur
     *
     * @return string
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * growl
     *
     * @return string
     */
    public function growl(){
        return 'je suis '.$this->getNom();
    }

    /**
     * get Description
     *
     * @return string
     */
    public function getDescription(){
        return $this->growl().' et ma fourrure est '.$this->fur;
    }
}