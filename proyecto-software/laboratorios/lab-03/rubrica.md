# Rúbrica - Laboratorio 3 (Producto y calidad)

**10 puntos** · Se publica **el Día 11**, junto con el enunciado.

| Criterio | Excelente (100%) | En desarrollo (50%) | Insuficiente (0%) | Pts |
|---|---|---|---|---|
| **Base de datos** | Normalizada, con FK, tipos correctos (`DECIMAL`, `utf8mb4`), nada calculable guardado | Funciona pero con datos repetidos, o sin FK, o dinero en `FLOAT` | Una sola tabla con todo, o no carga | **2.0** |
| **Backend y seguridad** | Endpoint que devuelve JSON; **prepared statements** en todo; tipos arreglados; los datos de los clientes piden **sesión** (401 sin ella) y la contraseña se guarda como **hash** | Funciona pero algún parámetro concatenado, tipos como texto, o datos de clientes sin login | Vulnerable a inyección, no devuelve JSON válido, o contraseña guardada tal cual | **2.5** |
| **Frontend conectado** | Consume el endpoint; los **tres estados** manejados; caso vacío distinto del error; **panel del dueño** con los números del día | Consume el endpoint pero sin manejar el error o el vacío, o sin panel | No conecta, o pantalla en blanco al fallar | **2.0** |
| **Matriz de pruebas** | Una fila por requerimiento; casos de error/borde; al menos uno de seguridad; **corrida** | Matriz presente pero de puros casos normales, o sin correr | Sin matriz, o inventada sin ejecutar | **2.5** |
| **El sistema corre** | Se carga la base, se levanta el backend y se usa la página, de punta a punta | Corre con ayuda o algún paso roto | No corre | **0.5** |
| **Datos sensibles** | La contraseña real y los datos personales del cliente fuera del código que se entrega | Algún dato sensible expuesto, como teléfonos o correos reales | Contraseña real en el código entregado o en git | **0.5** |

**Total: 10.0 puntos**

**Por dónde entregas no cambia la nota.** El laboratorio se entrega por el formulario del curso, en tu
memoria USB o con el enlace de GitHub, como te resulte posible. Tu repositorio puede estar solo en tu
computadora, y los commits son opcionales: lo que se revisa es el trabajo.

**La copia y la IA se miden, pero no descuentan.** Se revisa cuánto del documento y del código coincide
con el de un compañero o con otra fuente sin citarla, y cuánto parece escrito con IA sin revisar. No resta
puntos: se te muestra en la devolución para que sepas cómo está tu trabajo. Indica siempre de dónde
sale cada cosa (Día 8).

## Cómo se revisa

**La seguridad es obligatoria, y es fácil de verificar.** Buscar en el código si algún
parámetro se concatena dentro del SQL (`WHERE id = $id`). Si lo hay, es inyectable, y el criterio
de backend cae a la mitad aunque "funcione": que funcione mientras nadie lo ataca no significa que sea seguro. La
prueba en vivo: `?categoria=1 OR 1=1` no debe devolver más de lo que corresponde.

**La matriz de pruebas se corrige por la columna "tipo".** Contar los casos: si son todos
"normal", faltan bordes y errores, y el criterio no llega a la mitad. El software no falla en lo
normal. Y verificar que esté **corrida**: una matriz con todo PASA y sin evidencia de ejecución
casi siempre no se corrió. Dos fallas bien documentadas valen más que un "todo pasa" sin sustento.

**El sistema tiene que correr en la corrección, no solo "en mi casa".** Pedir que lo carguen y lo
usen delante. El caso de error se prueba apagando MySQL: si la página queda en blanco en vez de
mostrar un mensaje, el criterio de frontend baja. Es el Día 13 hecho o no hecho.

**Sobre la contraseña.** Revisar `conexion.php` y, si el proyecto usa git, el historial:
`git log -p -- conexion.php` no debe mostrar credenciales reales. Es un error de forma, pero importa: es un hábito que en producción cuesta
caro.

