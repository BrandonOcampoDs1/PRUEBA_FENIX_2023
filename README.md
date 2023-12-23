# PRUEBA TECNICA FENIX CRUD DE USUARIOS

## Instalación del repositorio

- **[Clonamos nuestro repositorio]**

```
git clone [https://github.com/BrandonOcampoDs1/prueba_konecta.git](https://github.com/BrandonOcampoDs1/PRUEBA_FENIX_2023)
```

Ejecutamos nuestro comando [git clone] más el repositorio.

- **[Instalamos los manejadores de dependencias**

```
composer install O composer update
```

- **[Instalamos las dependencias de package.json]**

```
npm install
```

- **Crear el archivo .env**

```
Copiamos el archivo .env del servidor
```
- **Generamos las llaves de la base de datos Ejecutamos**
```
php artisan key:generate
```

### CORREMOS MIGRACIONES
```
php artisan migrate
```
### CORREMOS LOS SEEDERS PARA TENER DOS REGISTROS POR DEFECTO
```
php artisan db:seed
```
### BASE DE DATOS
• DB_DATABASE=db_prueba_fenix
<br>
•DB_USERNAME=f_user
<br>
• DB_PASSWORD=123456

### USUARIO PARA INGRESAR AL SISTEMA
• CORREO:admin@admin;
<br>
• CONTRASEÑA=12345678



### Desarollado por:

- **[Brandon Ocampo]()**


