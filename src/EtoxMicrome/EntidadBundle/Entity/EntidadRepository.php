<?php

namespace EtoxMicrome\EntidadBundle\Entity;

use EtoxMicrome\EvidenciaEntidadBundle\Entity\Evidencia;
use Doctrine\ORM\EntityRepository;

/**
 * EntidadRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EntidadRepository extends EntityRepository
{
    public function findEntidadesFromNombre($nombre)
    {
        $em = $this->getEntityManager();
        $consulta = $em->createQuery("
            SELECT e
            FROM EntidadBundle:Entidad e
            WHERE e.tipo = 'organismo'
            AND lower(e.nombre) like lower(:nombre)
        ");
        $consulta->setParameter('nombre', "%".$nombre."%");
        return $consulta;
    }
}
