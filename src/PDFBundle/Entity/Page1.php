<?php

namespace PDFBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Page1
 */
class Page1
{
    /**
     * @var int
     */
    private $id;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
