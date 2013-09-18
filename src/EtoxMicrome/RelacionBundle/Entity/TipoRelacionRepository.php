<?php

namespace EtoxMicrome\RelacionBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * TipoRelacionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TipoRelacionRepository extends EntityRepository
{
    public function getTipoRelaciones()
    {
        //Devuelve un array con todos los tipos de relaciones posibles que se pueden establecer entre dos entidades...
        $em = $this->getEntityManager();
        $consulta = $em->createQuery('
            SELECT tr
            FROM RelacionBundle:TipoRelacion tr
        ');
        $arrayObjetos=$consulta->getResult();
        $arrayRelaciones=array();
        foreach($arrayObjetos as $relacion){
           array_push($arrayRelaciones, $relacion->getTipo());
        }
        return($arrayRelaciones);
    }

    public function getTipoRelacionId($tipoRelacion)
    {
        $em = $this->getEntityManager();
        $consulta = $em->createQuery('
            SELECT tr
            FROM RelacionBundle:TipoRelacion tr
            WHERE tr.tipo = :tipoRelacion
        ');
        $consulta->setParameter('tipoRelacion', $tipoRelacion);
        $tipo=$consulta->getSingleResult();
        return ($tipo->getId());
    }
}