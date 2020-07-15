<?php

namespace TelcosSimulacion\Client;

# use \TelcosSimulacion\Client\ApiException;

class TelcosSimulacionApiTest extends \PHPUnit_Framework_TestCase
{
    
    public function setUp()
    {
        $handler = \GuzzleHttp\HandlerStack::create();
        $config = new \TelcosSimulacion\Client\Configuration();
        $config->setHost('the_url');

        $client = new \GuzzleHttp\Client(['handler' => $handler]);
        $this->apiInstance = new \TelcosSimulacion\Client\Api\TelcosSimulacionApi($client,$config);
    }
    
    public function testGetReporte()
    {
        $x_api_key = "your_api_key";

        $domicilio = new \TelcosSimulacion\Client\Model\DomicilioPeticion();
        $estado = new \TelcosSimulacion\Client\Model\CatalogoEstados();
        $tipoDom = new \TelcosSimulacion\Client\Model\CatalogoTipoDomicilio();
        $tipoAsent = new \TelcosSimulacion\Client\Model\CatalogoTipoAsentamiento();

        $domicilio->setDireccion(null);
        $domicilio->setColoniaPoblacion(null);
        $domicilio->setDelegacionMunicipio(null);
        $domicilio->setCiudad(null);
        $domicilio->setEstado($estado::CDMX);
        $domicilio->setCP(null);
        $domicilio->setFechaResidencia(null);
        $domicilio->setNumeroTelefono(null);
        $domicilio->setTipoDomicilio($tipoDom::O);
        $domicilio->setTipoAsentamiento($tipoAsent::_0);

        $request = new \TelcosSimulacion\Client\Model\Peticion();
        $persona = new \TelcosSimulacion\Client\Model\PersonaPeticion();
        $residencia = new \TelcosSimulacion\Client\Model\CatalogoResidencia();
        $edoCivil = new \TelcosSimulacion\Client\Model\CatalogoEstadoCivil();
        $sexo = new \TelcosSimulacion\Client\Model\CatalogoSexo();
        
        $persona->setPrimerNombre("NOMBRE");
        $persona->setSegundoNombre(null);
        $persona->setApellidoPaterno("PATERNO");
        $persona->setApellidoMaterno("MATERNO");
        $persona->setApellidoAdicional(null);
        $persona->setFechaNacimiento("1986-06-27");
        $persona->setRfc(null);
        $persona->setCurp(null);
        $persona->setNacionalidad(null);
        $persona->setResidencia($residencia::_1);
        $persona->setEstadoCivil($edoCivil::S);
        $persona->setSexo($sexo::M);
        $persona->setClaveElectorIfe(null);
        $persona->setNumeroDependientes(null);
        $persona->setFechaDefuncion(null);
        $persona->setDomicilio($domicilio);

        $request->setFolioOtorgante("24124212");
        $request->setPersona($persona);

        try {
            $result = $this->apiInstance->getReporte($x_api_key, $request);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling TelcosSimulacionApi->getReporte: ', $e->getMessage(), PHP_EOL;
        }
    }

}
