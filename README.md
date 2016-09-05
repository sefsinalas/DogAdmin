# DogAdmin

[Documentación oficial (Requisitos, Instalación y demas)](https://docs.google.com/document/d/1vcM6b53ROd1zZs3FX30hY2y2DkzN4B0giPKQ6sHlLik/edit?usp=sharing)

Documentación sobre la configuración del archivo config.json

  - **general** `requerido`: Configuración general del proyecto
    - **DB** `requerido`: Datos de conexión a la base de datos
    - **redirect_on_login** `requerido`: A donde redireccionar en el login. Normalmente sera uno de los modulos. Ej: "/productos"
    - **redirect_after_logout** `requerido`: A donde redireccionar al desloguearse. Normalmente sera siempre al formulario de login. Ej: "/login"
    - **title** `requerido`: Título del proyecto. Se muestra en la parte superior izquierda del panel. Ej: "Estudio Yokohama"
    - **mini_title** `opcional`: Título que aparece en la parte superior izquierda cuando el sidebar esta minimizado. Ej: "E.Y." Default: 3 primeros caracteres de *title*
    - **allow_register** `requerido`: Muestra o esconde en enlace para registrarse en la pagina de login. Opciones: true | false
    - **main_color** `requerido`: Establece el color principal para todo el panel de administración. Opciones: blue | black | purple | yellow | red | green
    - **layout** `requerido`: Establece el layout para el panel. Opciones: fixed | layout-boxed | layout-top-nav | sidebar-collapse | sidebar-mini
    - **footer_link** `requerido`: URL del enlace en el footer dentro del panel
    - **footer_title** `requerido`: Anchor text del enlace en el footer dentro del panel
  - **modules** `requerido`: Array de modulos
    - **general** `requerido`: Opciones generales para el modulo
        - **name** `requerido`: Nombre del modulo. Se usara para visualizar en el sidebar y como titulo en las paginas del modulo. Ej: "Productos"
        - **table** `requerido`: Tabla principal en la base de datos que se usara para almacenar los datos de este modulo. Ej: "productos"
    - **fields** `requerido`: Array de campos para el modulo
        - **title** `requerido`: Título del campo. Se usara principalmente como label en los formularios y como titulos en las tablas. Ej: "Precio"
        - **type** `requerido`: Tipo del campo. Ver mas abajo para info completa sobre cada tipo de campo. Ej: "string"

## Tipos de campos

### string

**Base de datos**: Crea un campo tipo varchar(255)

**Listados**: Muestra una porcion de maximo 50 caracteres de largo

**Formularios**: Es un campo tipo input text

**Opciones adicionales**

- **name** `opcional`: Nombre del campo en la base de datos. Ej: "precio". Default: Se intuye desde *title*