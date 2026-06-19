# Sistema de Gestión de Clientes

## Descripción
Este proyecto consiste en una aplicación web desarrollada en PHP diseñada para la administración y gestión eficiente de registros de clientes. El sistema permite realizar operaciones CRUD (Crear, Leer, Actualizar y Eliminar) sobre una base de datos centralizada, ofreciendo una interfaz clara para la manipulación de información de contacto.

## Funcionalidades
El sistema integra las siguientes capacidades operativas:

* **Autenticación de usuarios**: Acceso restringido al panel de control mediante un sistema de inicio de sesión basado en sesiones.
* **Gestión de clientes**:
    * **Alta de registros**: Formulario habilitado para la inserción de nuevos clientes (nombre, correo electrónico y teléfono).
    * **Visualización**: Listado dinámico de todos los registros existentes en la base de datos, ordenados cronológicamente de forma descendente.
    * **Modificación**: Interfaz dedicada para la actualización de datos de clientes específicos.
    * **Eliminación**: Funcionalidad para la baja definitiva de registros del sistema.
* **Control de acceso por roles**: Diferenciación de permisos entre el perfil de administrador (acceso total a funciones de escritura y modificación) y usuarios estándar (acceso de solo lectura).
* **Interfaz adaptativa**: Diseño consistente que garantiza una experiencia de usuario uniforme entre las vistas de administración y consulta.

## Estructura de la Base de Datos
Para el funcionamiento correcto, la base de datos requiere una tabla `clientes` con la siguiente estructura:

```sql
CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefono VARCHAR(20)
);