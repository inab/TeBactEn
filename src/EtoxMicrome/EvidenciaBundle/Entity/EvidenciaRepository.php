<?php

namespace EtoxMicrome\EvidenciaBundle\Entity;

use Doctrine\ORM\EntityRepository;
#use EtoxMicrome\EvidenciaEntidadBundle\Entity\EvidenciaEntidad;
#use EtoxMicrome\EntidadBundle\Entity\Entidad;

/**
 * EvidenciaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EvidenciaRepository extends EntityRepository
{

    public function getEvidenciasWithOrigin($url){

        ld($url);
        $em = $this->getEntityManager();
        $connection = $em->getConnection();
        //ld($arrayParameters);

        //Ejecutamos una busqueda seg�n cada uno de los par�metros y guardamos la intersecci�n de los resultados iterativamente en un array de objetos EvidenciaEntidad
        //Empezamos por la specie porque ya la tenemos
        //OJO, para realizar estas consultas necesitaremos sql normal ya que sino se va de memoria...
        $user = $connection->getUsername();
        $password = $connection->getPassword();
        $host = $connection->getHost();
        $database=$connection->getDatabase();
        $conn = mysql_connect ($host, $user, $password);
        mysql_select_db($database, $conn);
        mysql_query("SET NAMES 'utf8'");

    }

}