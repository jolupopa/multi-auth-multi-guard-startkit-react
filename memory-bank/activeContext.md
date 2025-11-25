### Contexto Actual de Trabajo

Se ha implementado una lógica para el manejo de sesiones y autenticación multi-guard, específicamente para el área de administración. El middleware `SetSessionTable` se ejecuta al inicio de las solicitudes web para configurar dinámicamente la tabla de sesiones y el guard de autenticación según la ruta.

**Cambios Recientes:**
- Se ha añadido `SetSessionTable::class` al array `prepend` de middlewares en `bootstrap/app.php`. Esto asegura que el middleware se ejecute antes que otros middlewares web.
- El middleware `SetSessionTable` detecta rutas que comienzan con `admin/*` y ajusta la configuración de la sesión (`session.cookie`, `session.table`) y la autenticación (`fortify.guard`, `auth.defaults.guard`) para usar `admin_sessions` y el guard `admin`.

**Aprendizajes y Decisiones Recientes:**
- **Uso de Wayfinder con `useForm` de Inertia:** Se ha corregido un error de tipado en `resources/js/pages/auth/register.tsx`. El error `Argument of type 'RouteDefinition' is not assignable to parameter of type 'string'` ocurre porque las funciones de Wayfinder (ej. `store()`) devuelven un objeto `RouteDefinition`. El `post` helper de `useForm` espera una cadena de URL. La solución correcta es pasar explícitamente la propiedad `url` del objeto: `post(store().url, { ... })`.

**Próximos Pasos:**
- Documentar los patrones del sistema y el contexto técnico en los archivos correspondientes del Memory Bank.
- Confirmar la revisión con el usuario y finalizar la tarea actual.
