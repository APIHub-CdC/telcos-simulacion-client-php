# telcos-simulacion-client-php

Carga de cuentas de personas físicas (entorno de simulación).

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
    $config = new \ReportarEnLineaSimulacion\Client\Configuration();
    $config->setHost('the_url');

    $client = new \GuzzleHttp\Client(['handler' => $handler, 'verify' => false]);
    $this->apiInstance = new \ReportarEnLineaSimulacion\Client\Api\CargaDeCuentasDePersonasFsicasApi($client,$config);    
}    
```
```php

<?php
/**
* Este es el método que se será ejecutado en la prueba ubicado en path/to/repository/test/Api/CargaDeCuentasDePersonasFsicasApiTest.php 

*/
public function testReportarEnLineaSimulacion()
{
    $x_api_key = "your_api_key";

    $requestNombre = new \ReportarEnLineaSimulacion\Client\Model\Nombre();
    $requestNombre->setApellidoPaterno("PATERNO");
    $requestNombre->setApellidoMaterno("MATERNO");
    $requestNombre->setApellidoAdicional(null);
    $requestNombre->setNombres("NOMBRE");
    $requestNombre->setFechaNacimiento("YYYYMMDD");
    $requestNombre->setRfc("PAPN860627");
    $requestNombre->setCurp("PAPN860627MOCNSB02");
    $requestNombre->setNumeroSeguridadSocial(null);
    $requestNombre->setNacionalidad("MX");
    $requestNombre->setResidencia("1");
    $requestNombre->setNumeroLicenciaConducir(null);
    $requestNombre->setEstadoCivil("S");
    $requestNombre->setSexo("F");
    $requestNombre->setClaveElectorIfe(null);
    $requestNombre->setNumeroDependientes("0");
    $requestNombre->setFechaDefuncion("YYYYMMDD");
    $requestNombre->setTipoPersona("PF");
    $requestNombre->setIndicadorDefuncion("1");

    $requestDomicilio = new \ReportarEnLineaSimulacion\Client\Model\Domicilio();
    $requestDomicilio->setDireccion("CONOCIDA S/N");
    $requestDomicilio->setColoniaPoblacion("CONOCIDA");
    $requestDomicilio->setDelegacionMunicipio("MUNICIPIO");
    $requestDomicilio->setCiudad("CIUDAD");
    $requestDomicilio->setEstado("MEX");
    $requestDomicilio->setEstadoExtranjero(null);
    $requestDomicilio->setCp("55010");
    $requestDomicilio->setFechaResidencia("YYYYMMDD");
    $requestDomicilio->setNumeroCelular(null);
    $requestDomicilio->setNumeroTelefono(null);
    $requestDomicilio->setExtension(null);
    $requestDomicilio->setFax(null);
    $requestDomicilio->setTipoDomicilio("C");
    $requestDomicilio->setTipoAsentamiento("2");
    $requestDomicilio->setOrigenDomicilio("2");

    $requestEmpleo = new \ReportarEnLineaSimulacion\Client\Model\Empleo();
    $requestEmpleo->setNombreEmpresa("VTA DE PRODUCTOS");
    $requestEmpleo->setDireccion("CONOCIDA S/N");
    $requestEmpleo->setColoniaPoblacion("CONOCIDA");
    $requestEmpleo->setDelegacionMunicipio("MUNICIPIO");
    $requestEmpleo->setCiudad("CIUDAD");
    $requestEmpleo->setEstado("MX");
    $requestEmpleo->setCp("55010");
    $requestEmpleo->setNumeroTelefono(null);
    $requestEmpleo->setExtension(null);
    $requestEmpleo->setFax(null);
    $requestEmpleo->setPuesto(null);
    $requestEmpleo->setFechaContratacion("YYYYMMDD");
    $requestEmpleo->setClaveMoneda("MX");
    $requestEmpleo->setSalarioMensual("5600");
    $requestEmpleo->setFechaUltimoDiaEmpleo("YYYYMMDD");
    $requestEmpleo->setFechaVerificacionEmpleo("YYYYMMDD");
    $requestEmpleo->setOrigenRazonSocialDomicilio("2");

    $requestCuenta = new \ReportarEnLineaSimulacion\Client\Model\Cuenta();
    $requestCuenta->setClaveActualOtorgante("0000080008");
    $requestCuenta->setNombreOtorgante("OTORGANTE");
    $requestCuenta->setCuentaActual("TCDC000001");
    $requestCuenta->setTipoResponsabilidad("O");
    $requestCuenta->setTipoCuenta("F");
    $requestCuenta->setTipoContrato("BC");
    $requestCuenta->setClaveUnidadMonetaria("MX");
    $requestCuenta->setValorActivoValuacion(null);
    $requestCuenta->setNumeroPagos("17");
    $requestCuenta->setFrecuenciaPagos("S");
    $requestCuenta->setMontoPagar("0");
    $requestCuenta->setFechaAperturaCuenta("YYYYMMDD");
    $requestCuenta->setFechaUltimoPago("YYYYMMDD");
    $requestCuenta->setFechaUltimaCompra("YYYYMMDD");
    $requestCuenta->setFechaCierreCuenta("YYYYMMDD");
    $requestCuenta->setFechaCorte("YYYYMMDD");
    $requestCuenta->setGarantia(null);
    $requestCuenta->setCreditoMaximo("10000");
    $requestCuenta->setSaldoActual("0");
    $requestCuenta->setLimiteCredito("0");
    $requestCuenta->setSaldoVencido("0");
    $requestCuenta->setNumeroPagosVencidos("2");
    $requestCuenta->setPagoActual(" V");
    $requestCuenta->setHistoricoPagos(null);
    $requestCuenta->setClavePrevencion("1");
    $requestCuenta->setTotalPagosreportados("0");
    $requestCuenta->setClaveAnteriorOtorgante(null);
    $requestCuenta->setNombreAnteriorOtorgante(null);
    $requestCuenta->setNumeroCuentaAnterior(null);
    $requestCuenta->setFechaPrimerIncumplimiento("YYYYMMDD");
    $requestCuenta->setSaldoInsoluto(null);
    $requestCuenta->setMontoUltimoPago(null);
    $requestCuenta->setFechaIngresoCarteraVencida("YYYYMMDD");
    $requestCuenta->setMontoCorrespondienteIntereses("2");
    $requestCuenta->setFormaPagoActualIntereses("2");
    $requestCuenta->setDiasVencimiento("3");
    $requestCuenta->setPlazoMeses(null);
    $requestCuenta->setMontoCreditoOriginacion(null);
    $requestCuenta->setCorreoElectronicoConsumidor(null);
    $requestCuenta->setEstatusCan("01");
    $requestCuenta->setOrdenPrelacionOrigen("01");
    $requestCuenta->setOrdenPrelacionActual("01");
    $requestCuenta->setFechaAperturaCan("YYYYMMDD");
    $requestCuenta->setFechaCancelacionCan("null");    

    $requestPersona = new \ReportarEnLineaSimulacion\Client\Model\Persona();
    $requestPersona->setNombre($requestNombre);
    $requestPersona->setDomicilio($requestDomicilio);
    $requestPersona->setEmpleo($requestEmpleo);
    $requestPersona->setCuenta($requestCuenta);

    $requestEncabezado = new \ReportarEnLineaSimulacion\Client\Model\Encabezado();
    $requestEncabezado->setNombreOtorgante("OTORGANTE");
    $requestEncabezado->setClaveOtorgante("100000");

    $request = new \ReportarEnLineaSimulacion\Client\Model\CargasPFRegistrarRequest();
    $request->setEncabezado($requestEncabezado);
    $request->setPersona($requestPersona);
    try {
        $result = $this->apiInstance->registrar($x_api_key, $request);
        print_r($result);
    } catch (Exception $e) {
        echo 'Exception when calling CargaDeCuentasDePersonasFsicasApi->registrar: ', $e->getMessage(), PHP_EOL;
    }
}
?>
```
## Pruebas unitarias

Para ejecutar las pruebas unitarias:

```sh
./vendor/bin/phpunit
```

[1]: https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos
