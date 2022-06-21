# Cuatro en linea

Este proyecto es una adaptación del juego 4 en linea realizada con PHP en el framework Laravel.

## Dependencias

Para poder iniciar el proyecto es necesario tener instalado Docker(https://docs.docker.com/desktop/) y DDEV(https://ddev.readthedocs.io/en/stable/). Simplemente seguir las instrucciones tal y como estan en la documentación linkeada.

## Instalación

### Descarga del proyecto

Esto podemos hacerlo simplemente con este comando donde querramos crear la carpeta con los contenidos:
```shell
git clone https://github.com/ManuRC2/cuatroenlinea
```
Alternativamente, si no se tiene GIT instalado, se puede descargar manualmente el código desde esta página de Github.

Independientemente de como se haga esto, luego debemos navegar a la carpeta del proyecto en cuestión con la consola.

### Configuración del proyecto

Una vez descargado, comenzaremos a ejecutar una serie de comandos necesarios para que el proyecto este bien configurado y listo para ser iniciado.
Primero que nada, vamos a correr el siguiente comando:
```shell
ddev config
```
Esto nos llevará por una configuración basica del proyecto, donde podremos modificar el nombre del mismo, el tipo de proyecto del que se trata y la ubicación del docroot. Podemos simplemente dejar vacías todas estas opciones para que se elijan las opciones predeterminadas.

Ahora tenemos que instalar composer en el proyecto con este comando:
```shell
ddev composer install
```

Luego crearemos el archivo de ambiente para el proyecto, simplemente copiando los contenidos del archivo de ejemplo, de la siguiente manera:
```shell
cp .env.example .env
```

Por ultimo, vamos a generar una key para nuestro proyecto, con el siguiente comando:
```shell
ddev php artisan key:generate
```

## Inicialización
Una vez hecho esto ya habremos finalizado con la configuración podemos iniciar el proyecto y luego abrir el navegador con la URL correespondiente con estos comandos respectivamente:
```shell
ddev start
ddev launch
```
Una vez en la index de Laravel <code>[mkdir "nombre"](https://cuatroenlinea.ddev.site)</code>, podemos acceder al juego yendo a la dirección <code>[mkdir "nombre"](https://cuatroenlinea.ddev.site/jugar/{números})</code>. 

Una vez se haya dejado de usar el proyecto se puede apagar con:
```shell
ddev poweroff
```
