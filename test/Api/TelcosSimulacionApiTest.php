<?php

namespace TelcosSimulacion\Client;

use \TelcosSimulacion\Client\Configuration;
use \TelcosSimulacion\Client\ApiException;
use \TelcosSimulacion\Client\ObjectSerializer;

class TelcosSimulacionApiTest extends \PHPUnit_Framework_TestCase
{
    
    public function setUp()
    {
        $handler = \GuzzleHttp\HandlerStack::create();
        $config = new \TelcosSimulacion\Client\Configuration();
        $config->setHost('the_url');

        $client = new \GuzzleHttp\Client(['handler' => $handler, 'verify' => false]);
        $this->apiInstance = new \TelcosSimulacion\Client\Api\TelcosSimulacionApi($client,$config);
    }
    
    public function testGetReporte()
    {
        $x_api_key = "your_api_key";

        $requestDomicilio = new \TelcosSimulacion\Client\Model\DomicilioPeticion();
        $requestEstado = new \TelcosSimulacion\Client\Model\CatalogoEstados();
        $requestTipoDom = new \TelcosSimulacion\Client\Model\CatalogoTipoDomicilio();
        $requestTipoAsent = new \TelcosSimulacion\Client\Model\CatalogoTipoAsentamiento();

        $requestDomicilio->setDireccion(null);
        $requestDomicilio->setColonia(null);
        $requestDomicilio->setMunicipio(null);
        $requestDomicilio->setCiudad(null);
        $requestDomicilio->setEstado($requestEstado::CDMX);
        $requestDomicilio->setCodigoPostal(null);
        $requestDomicilio->setFechaResidencia(null);
        $requestDomicilio->setNumeroTelefono(null);
        $requestDomicilio->setTipoDomicilio($requestTipoDom::O);
        $requestDomicilio->setTipoAsentamiento($requestTipoAsent::_0);

        $requestPersona = new \TelcosSimulacion\Client\Model\PersonaPeticion();
        $requestResidencia = new \TelcosSimulacion\Client\Model\CatalogoResidencia();
        $requestEdoCivil = new \TelcosSimulacion\Client\Model\CatalogoEstadoCivil();
        $requestSexo = new \TelcosSimulacion\Client\Model\CatalogoSexo();
        
        $requestPersona->setPrimerNombre("NOMBRE");
        $requestPersona->setSegundoNombre(null);
        $requestPersona->setApellidoPaterno("PATERNO");
        $requestPersona->setApellidoMaterno("MATERNO");
        $requestPersona->setApellidoAdicional(null);
        $requestPersona->setFechaNacimiento("27-06-1986");
        $requestPersona->setRfc(null);
        $requestPersona->setCurp(null);
        $requestPersona->setNumeroSeguridadSocial(null);
        $requestPersona->setNacionalidad(null);
        $requestPersona->setResidencia($requestResidencia::_1);
        $requestPersona->setEstadoCivil($requestEdoCivil::S);
        $requestPersona->setSexo($requestSexo::M);
        $requestPersona->setClaveElector(null);
        $requestPersona->setNumeroDependientes(null);
        $requestPersona->setFechaDefuncion(null);
        $requestPersona->setDomicilio($requestDomicilio);        

        try {
            $result = $this->apiInstance->getReporte($x_api_key, $requestPersona);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling TelcosSimulacionApi->getReporte: ', $e->getMessage(), PHP_EOL;
        }
    }

}
