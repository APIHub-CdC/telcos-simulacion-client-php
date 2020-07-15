# telcos-simulacion-client-php

Presenta los creditos de la persona con servicios con domicilio asociado de: telefonía celular; televisión de paga; y, telefonía local y de larga distancia (entorno de simulación).

## Requisitos

PHP 7.1 ó superior

### Dependencias adicionales
- Se debe contar con las siguientes dependencias de PHP:
    - ext-curl
    - ext-mbstring
- En caso de no ser así, para linux use los siguientes comandos

```sh
#ejemplo con php en versión 7.3 para otra versión colocar php{version}-curl
apt-get install php7.3-curl
apt-get install php7.3-mbstring
```
- Composer [vea como instalar][1]

## Instalación

Ejecutar: `composer install`

## Guía de inicio

### Paso 1. Agregar el producto a la aplicación

Al iniciar sesión seguir os siguientes pasos:

 1. Dar clic en la sección "**Mis aplicaciones**".
 2. Seleccionar la aplicación.
 3. Ir a la pestaña de "**Editar '@tuApp**' ".
    <p align="center">
      <img src="https://github.com/APIHub-CdC/imagenes-cdc/blob/master/edit_applications.jpg" width="900">
    </p>
 4. Al abrirse la ventana emergente, seleccionar el producto.
 5. Dar clic en el botón "**Guardar App**":
    <p align="center">
      <img src="https://github.com/APIHub-CdC/imagenes-cdc/blob/master/selected_product.jpg" width="400">
    </p>

### Paso 2. Capturar los datos de la petición

Los siguientes datos a modificar se encuentran en ***test/Api/TelcosSimulacionApiTest.php***

Es importante contar con el setUp() que se encargará de inicializar la url. Modificar la URL ***('the_url')*** de la petición del objeto ***$config***, como se muestra en el siguiente fragmento de código:

```php
<?php
public function setUp()
{
    $handler = \GuzzleHttp\HandlerStack::create();
    $config = new \TelcosSimulacion\Client\Configuration();
    $config->setHost('the_url');

    $client = new \GuzzleHttp\Client(['handler' => $handler, 'verify' => false]);
    $this->apiInstance = new \TelcosSimulacion\Client\Api\TelcosSimulacionApi($client,$config);
}  
```
```php

<?php
/**
* Este es el método que se será ejecutado en la prueba ubicado en path/to/repository/test/Api/TelcosSimulacionApiTest.php 

*/
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
?>
```
## Pruebas unitarias

Para ejecutar las pruebas unitarias:

```sh
./vendor/bin/phpunit
```

[1]: https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos
