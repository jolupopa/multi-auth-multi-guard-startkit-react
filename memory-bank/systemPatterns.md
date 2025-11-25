### Patrones del Sistema

**Manejo de Sesiones Multi-Guard:**
- **Patrón:** Configuración dinámica de sesiones y guards de autenticación.
- **Descripción:** Se utiliza un middleware (`SetSessionTable`) para interceptar las solicitudes entrantes y modificar la configuración de la sesión y el guard de autenticación de Laravel en tiempo de ejecución. Esto permite que diferentes áreas de la aplicación (ej. `admin/*`) utilicen sus propias tablas de sesión y guards de autenticación, aislando las sesiones de usuarios normales de las sesiones de administradores.
- **Componentes Clave:**
    - `bootstrap/app.php`: Registra el middleware `SetSessionTable` para que se ejecute al inicio de la cadena de middlewares web.
    - `app/Http/Middleware/SetSessionTable.php`: Contiene la lógica para detectar rutas específicas (`admin/*`) y aplicar la configuración de sesión y guard correspondiente (`session.cookie`, `session.table`, `fortify.guard`, `auth.defaults.guard`).
- **Ventajas:**
    - Aislamiento de sesiones: Evita conflictos entre las sesiones de diferentes tipos de usuarios (ej. usuarios regulares y administradores).
    - Flexibilidad: Permite una gestión de autenticación más granular y adaptada a las necesidades de cada sección de la aplicación.
    - Seguridad: Mejora la seguridad al separar los contextos de sesión.

**Routing Frontend con Wayfinder e Inertia:**
- **Patrón:** Generación de rutas tipadas para el frontend.
- **Descripción:** Se utiliza Laravel Wayfinder para generar automáticamente funciones TypeScript a partir de las rutas y controladores de Laravel. Esto proporciona un puente de comunicación fuertemente tipado entre el backend y el frontend, eliminando la necesidad de escribir URLs manualmente en los componentes de React.
- **Componentes Clave:**
    - `wayfinder:generate`: Comando de Artisan que inspecciona las rutas de Laravel y genera los archivos TypeScript correspondientes.
    - `resources/js/routes/*`: Directorio (o similar) donde Wayfinder coloca las funciones de ruta generadas.
    - Componentes de React (`.tsx`): Importan las funciones de ruta generadas (ej. `import { store } from '@/routes/register'`).
- **Uso con `useForm` de Inertia:**
    - Las funciones de Wayfinder (ej. `store()`) devuelven un objeto `RouteDefinition` que contiene `url` y `method`.
    - El `post` helper de `useForm` de Inertia espera una cadena de URL como primer argumento.
    - El patrón correcto es extraer la propiedad `url` del objeto devuelto por Wayfinder: `form.post(store().url)`.
- **Ventajas:**
    - Seguridad de tipos: Evita errores en las URLs y sus parámetros en tiempo de compilación.
    - Mantenibilidad: Si una ruta cambia en el backend, la actualización en el frontend es guiada por el compilador de TypeScript tras regenerar las rutas.
    - Código más limpio: Elimina cadenas de URL "mágicas" del código del frontend.
