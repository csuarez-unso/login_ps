# Sistema de Autenticación de Usuarios
### Integrantes del proyecto - Comision B - Grupo 21
- Manuela Sanchez Diez
- Walter Alejandro Santinon
- Matías Benegas
- Carlos Suarez.

Este proyecto es una aplicación web que permite a los usuarios registrarse, iniciar sesión y, en caso de ser necesario, recuperar su contraseña. Incluye un perfil de administrador que permite gestionar usuarios y ver un registro de accesos (logs).

## Tabla de Contenidos
- [Entorno de Desarrollo](#entorno-de-desarrollo)
- [Instalación y Configuración](#instalación-y-configuración)
- [Estructura del Proyecto](#estructura-del-proyecto)
- [Diseño de Interfaz](#diseño-de-interfaz)
- [Descripción del Funcionamiento](#descripción-del-funcionamiento)
  - [Registro e Inicio de Sesión](#registro-e-inicio-de-sesión)
  - [Recuperación de Contraseña](#recuperación-de-contraseña)
  - [Funcionalidad de Administración](#funcionalidad-de-administración)
- [Base de Datos](#base-de-datos)
- [Funcionalidades Adicionales](#funcionalidades-adicionales)
- [Instrucciones para Desarrolladores](#instrucciones-para-desarrolladores)

## Entorno de Desarrollo

Para este proyecto se utiliza el siguiente entorno de desarrollo:

- **Servidor Web**: XAMPP versión 8.2.12, que incluye Apache y MySQL
- **Base de Datos**: PHPMyAdmin para gestionar la base de datos MySQL
- **PHP**: Versión 8.2 (incluida en XAMPP 8.2.12)
- **Editor de Código**: Visual Studio Code, recomendado para desarrollar y editar el código PHP, HTML y CSS

## Instalación y Configuración

Sigue estos pasos para instalar y configurar el sistema:

1. **Clona el Repositorio**:
   ```bash
   git clone https://github.com/csuarez-unso/login_ps.git
   cd login-ps
   ```

2. **Configura la Base de Datos**:
   - Abre PHPMyAdmin en el navegador (http://localhost/phpmyadmin)
   - Crea una nueva base de datos llamada `ps_db`
   - Importa el archivo SQL `ps_db.sql` en la base de datos `ps_db`

3. **Configura el Servidor Web**:
   - Coloca el proyecto en la carpeta `htdocs` de XAMPP
   - Asegúrate de que Apache y MySQL estén activos en el panel de control de XAMPP
   - Accede al sistema en http://localhost/proyecto-autenticacion

## Estructura del Proyecto

```
proyecto-autenticacion/
├── css/
│   └── cell_phone_style.css       # Estilos CSS originales
├── php/
│   ├── change_password.php        # Cambio de contraseña
│   ├── db.php                     # Configuración de base de datos
│   ├── delete_user.php            # Eliminación de usuarios
│   ├── duplicate_user.php         # Verificación de usuarios duplicados
│   ├── failed_login.php           # Manejo de inicio de sesión fallido
│   ├── index.php                  # Página principal
│   ├── login.php                  # Proceso de inicio de sesión
│   ├── logout.php                 # Cierre de sesión
│   ├── logs.php                   # Registro de accesos
│   ├── modify_user.php            # Modificación de usuarios
│   ├── register_user.php          # Registro de usuarios
│   ├── send_new_password.php      # Envío de nueva contraseña
│   ├── success_login.php          # Éxito en inicio de sesión
│   ├── success_register.php       # Éxito en registro
│   ├── users.php                  # Gestión de usuarios
│   └── validate_login.php         # Validación de credenciales
├── assets/
│   └── logo.PNG                   # Logo del sistema
├── php.ini                        # Configuración de PHP
└── readme-markdown.md             # Documentación del proyecto
```

## Diseño de Interfaz

El diseño de la interfaz de usuario está disponible en Figma:

- **Link del Diseño**: [Ver Mockup en Figma](https://www.figma.com/design/alqOynnJNqglu0ZcCQzNSl/Grupo-21?node-id=0-1&node-type=canvas&t=D1Pkvyna7q4Vv6P6-0)

Los mockups incluyen todas las vistas del sistema:
- Página de inicio de sesión
- Formulario de registro
- Interfaz de recuperación de contraseña
- Panel de administración
- Vistas de usuario estándar

## Descripción del Funcionamiento

### Registro e Inicio de Sesión

#### Archivos Relacionados:
- `register_user.php`: Gestiona el registro de nuevos usuarios
- `login.php`: Maneja el proceso de inicio de sesión
- `validate_login.php`: Valida las credenciales del usuario
- `duplicate_user.php`: Verifica usuarios duplicados
- `success_login.php`: Página de éxito de inicio de sesión
- `failed_login.php`: Página de error de inicio de sesión
- `success_register.php`: Confirmación de registro exitoso

#### Funcionalidades:
- Registro de nuevos usuarios con validación de datos
- Inicio de sesión con nombre de usuario o correo electrónico
- Validación de contraseñas con requisitos de seguridad
- Manejo de sesiones y redirecciones según el rol del usuario
- Protección contra intentos de inicio de sesión fallidos

### Recuperación de Contraseña

#### Archivos Relacionados:
- `change_password.php`: Permite cambiar la contraseña
- `send_new_password.php`: Envía enlaces de recuperación

#### Funcionalidades:
- Recuperación de contraseña mediante correo electrónico
- Generación y validación de tokens temporales
- Proceso seguro de cambio de contraseña

### Funcionalidad de Administración

#### Archivos Relacionados:
- `users.php`: Gestión de usuarios del sistema
- `modify_user.php`: Modificación de datos de usuarios
- `delete_user.php`: Eliminación de usuarios
- `logs.php`: Visualización de registros de acceso

#### Funcionalidades:
- Gestión completa de usuarios (CRUD)
- Visualización y exportación de logs
- Desbloqueo de cuentas
- Administración de permisos

## Base de Datos

La base de datos `ps_db` incluye las siguientes tablas principales:

### Tabla `users`:
- `ID`: Identificador único
- `username`: Nombre de usuario
- `password`: Contraseña cifrada
- `email`: Correo electrónico
- `is_admin`: Rol de usuario
- `account_locked`: Estado de la cuenta
- `reset_token`: Token de recuperación
- `token_expiry`: Expiración del token

### Tabla `access_logs`:
- `log_id`: ID del registro
- `user_id`: ID del usuario
- `login_time`: Timestamp del acceso
- `ip_address`: Dirección IP
- `success`: Estado del intento

## Funcionalidades Adicionales

- **Sistema de Bloqueo**: Bloqueo automático tras intentos fallidos
- **Gestión de Sesiones**: Control de sesiones activas
- **Exportación de Logs**: Descarga de registros en varios formatos
- **Validación Robusta**: Verificación completa de datos de entrada
- **Interfaz Responsive**: Diseño adaptable a dispositivos móviles

## Instrucciones para Desarrolladores

### Configuración del Entorno
1. Configurar `php.ini` según los requerimientos del proyecto
2. Verificar permisos de escritura para logs y archivos temporales
3. Configurar el servidor de correo para recuperación de contraseñas

### Estándares de Código
- Seguir PSR-12 para estilo de código PHP
- Documentar todas las funciones y clases
- Validar entrada de usuarios en el servidor
- Implementar prácticas de seguridad OWASP

### Flujo de Trabajo
1. Desarrollar en ramas separadas
2. Realizar pruebas unitarias
3. Revisar código antes de integrar
4. Mantener actualizada la documentación

## Créditos

Este sistema fue desarrollado como una simulación de un sistema de autenticación de usuarios con fines educativos y de práctica en PHP.
