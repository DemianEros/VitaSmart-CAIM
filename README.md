<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>README - Vita-Smart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        h2 {
            color: #555;
        }
        code {
            background-color: #f4f4f4;
            padding: 2px 4px;
            border-radius: 4px;
        }
        pre {
            background-color: #f4f4f4;
            padding: 10px;
            border-radius: 4px;
            overflow-x: auto;
        }
        ul {
            list-style-type: none;
            padding-left: 0;
        }
        li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Bienvenido a Vita-Smart</h1>
    <p>Para descargar este proyecto, sigue los pasos a continuación:</p>
    <ol>
        <li><strong>Clona el repositorio</strong></li>
        <li><strong>Asegúrate de crear el archivo <code>.env</code></strong></li>
        <li><strong>Esta es la configuración de la base de datos:</strong>
            <pre>
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=vitasmart
DB_USERNAME=root
DB_PASSWORD=
            </pre>
        </li>
        <li><strong>Ejecuta las migraciones:</strong>
            <pre><code>php artisan migrate</code></pre>
        </li>
        <li><strong>Ejecuta los seeders:</strong>
            <pre><code>php artisan db:seed</code></pre>
        </li>
        <li><strong>Levanta el servidor de PHP:</strong>
            <pre><code>php artisan serve</code></pre>
        </li>
        <li><strong>Levanta el servidor de Node:</strong>
            <pre><code>npm run dev</code></pre>
        </li>
        <li><strong>Estas son las credenciales de acceso:</strong>
            <ul>
                <li><strong>Admin:</strong>
                    <ul>
                        <li>Email: <code>empleado@example.com</code></li>
                        <li>Contraseña: <code>password123</code></li>
                    </ul>
                </li>
                <li><strong>Empleado:</strong>
                    <ul>
                        <li>Email: <code>empleado@example.com</code></li>
                        <li>Contraseña: <code>password123</code></li>
                    </ul>
                </li>
                <li><strong>Visor:</strong>
                    <ul>
                        <li>Email: <code>visor@example.com</code></li>
                        <li>Contraseña: <code>password123</code></li>
                    </ul>
                </li>
            </ul>
        </li>
    </ol>
</body>
</html>