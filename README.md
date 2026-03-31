# 🚀 Mi Portafolio y Blog Personal
🌐 [Visita el sitio en vivo: gomez-sito.mx](https://gomez-site.mx)

¡Bienvenido a mi proyecto personal! Este es mi portafolio desarrollado con **Laravel**, donde comparto mis proyectos, habilidades y algun que otro apunte que utilizo en mi día a día como desarrollador.

## 🛠️ Tecnologías utilizadas
- **Backend:** Laravel 10 / PHP 8.2
- **Frontend:** Blade / Bootstrap 4.6 / SASS / Jquery
- **Base de datos:** MySQL 


## ✨ Características
- [ ] Panel de administración para Blog y Portafolio.
- [ ] Sección de portafolio y blog con filtro.
- [ ] Diseño totalmente responsive.

## 🐳 Instalación Local (Con Docker Sail)

Para correr este proyecto localmente, asegúrate de tener instalado [Docker Desktop](https://www.docker.com/products/docker-desktop/).

### 1. Clonar el repositorio
Usa el alias de tu llave personal configurada:
```bash
git clone git@github.com:el-tio-victor/gomez-site-dev.git
cd gomez-site-dev
```

### 2. Instalar dependencias iniciales
Como la carpeta vendor no está en el repo, usamos este comando de Docker para instalar Composer por primera vez:
```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```
### 3. Configurar Entorno
```bash
cp .env.example .env
```

### 4.  Levantar los contenedores
```bash
./vendor/bin/sail up -d
```

### 5. Configuración final de Laravel
```bash
./vendor/bin/sail artisan key:generate
./vendor/bin/sail npm install
./vendor/bin/sail mysql < blogGS.sql
./vendor/bin/sail npm run build
```

### 6. ¡Listo!
Ahora puedes acceder al sitio en: http://localhost

📝 Comandos Útiles de Sail
Detener el proyecto: ./vendor/bin/sail stop

Ejecutar tests: ./vendor/bin/sail artisan test

Acceder a la consola de Tinker: ./vendor/bin/sail artisan thinker

📝 Notas Adicionales
El archivo SQL se importa directamente al contenedor de MySQL gestionado por Sail.

Asegúrate de que las credenciales en tu .env coincidan con las de Sail (por defecto: DB_USERNAME=sail, DB_PASSWORD=password).

Hecho con ❤️ por Victor Gomez

   