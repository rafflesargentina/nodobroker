<?php

namespace Raffles\Modules\Nodobroker\Database\Seeds;

use Raffles\Modules\Nodobroker\Models\Project;

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dosValles = Project::create(
            [
            'base_price' => '50000',
            'city' => 'San Carlos',
            'country' => 'Argentina',
            'description' => 'Dos Valles se desarrolla en 293 hectáreas, de las cuales tan solo 123 son ocupadas por lotes. Con amplias superficies desde 900 m² hasta 2.500 m², y frentes mínimos de 20 metros, los lotes previstos en el masterplan permiten una muy baja densidad de construcciones, favoreciendo la privacidad entre viviendas y respetando el medio ambiente. La gran mayoría de los lotes son planos, permitiendo un gran aprovechamiento del jardín, y manteniendo excelentes vistas a los cerros circundantes. Existen también lotes en pendiente con increíbles vistas hacia las montañas y los valles.',
            'entertainment' => 'Dos Valles ofrece innumerables opciones de recreación, con variedad de instalaciones deportivas y sociales para el uso exclusivo de los propietarios. Fueron planificadas 114 hectáreas de áreas verdes para recreación, incluida un gran parque central, plazas, pulmones de manzana, y 30 kilómetros de sendas de trekking y mountain bike. Dos Valles ofrece innumerables opciones de recreación, con variedad de instalaciones deportivas y sociales para el uso exclusivo de los propietarios.',
            'gas' => '1',
            'investment' => 'Dos Valles te ofrece 3 claras ventajas para tu compra: Un tipo de cambio más bajo, para que aproveches tus dólares y pagues menos, cuotas fijas en pesos sin interés, para que la inflación futura te juegue a favor, descuentos adicionales por pagos al contado, y te congelamos el tipo de cambio al día de tu reserva por dos semanas, y si el Dólar baja en ese plazo, también baja el precio del lote.',
            'light' => '1',
            'name' => 'Dos Valles',
            'place' => 'Con acceso principal directo desde Ruta 40 y Circunvalación, a través del Camino al Valle del Challhuaco. Dos Valles se ubica en una soleada pampa con amplias vistas a los cerros Ventana, Otto, Catedral y Carbón. Cuenta con un acceso secundario directo desde Ruta 40 Sur, atravesando la zona prevista para oficinas, centro comerciales y colegios. Ambos accesos se encuentran a 10 minutos del Centro Cívico, y permiten una rápida conexión al Aeropuerto, el Cerro Catedral, y Zona Oeste de Bariloche por Villa Arelauquen "Dos Valles es lindero al Parque Nacional Nahuel Huapi y al Arroyo Ñireco, ofreciendo innumerables opciones de recreación"',
            'project_type_id' => '1',
            'resume' => 'Dos Valles es el primer Club de Campo de Bariloche que ofrece, tanto a las familias locales, como a aquellas que residen parte del año afuera de Bariloche, una opción amplia y diversa para vivir favoreciendo su bienestar. Dos Valles representa un verdadero cambio en calidad de vida donde encontrará seguridad, tranquilidad y contacto con la naturaleza, sin resignar la comodidad y la infraestructura de la ciudad y un inmejorable acceso al centro de Bariloche y al aeropuerto. Con una completa infraestructura social y deportiva, encontrará en Dos Valles el más alto estándar de calidad de vida, en completa armonía con la naturaleza, y propiciando la vida al aire libre y el deporte. Con numerosas familias viviendo y varias etapas de desarrollo consolidadas, Dos Valles es una realidad palpable día a día donde se observan cada vez más niños jugando, familias haciendo deportes o disfrutando un asado, y construcciones de casas que avanzan sin pausa.',
            'slug' => 'dos-valles',
            'state' => 'Bariloche',
            'total_area' => '1000',
                ]
        );
    
        $dosValles->featured_photo()->create(['location' => 'dos-valles/h-feature-1.jpg']);
        $dosValles->unfeatured_photos()->create(['location' => 'dos-valles/h-feature-1.jpg']);
        $dosValles->unfeatured_photos()->create(['location' => 'dos-valles/h-feature-2.jpg']);
        $dosValles->unfeatured_photos()->create(['location' => 'dos-valles/h-feature-3.jpg']);
        $dosValles->unfeatured_photos()->create(['location' => 'dos-valles/h-feature-4.jpg']);
        $dosValles->unfeatured_photos()->create(['location' => 'dos-valles/h-feature-5.jpg']);
        $dosValles->offer_types()->attach('3');
    
        $laAldea = Project::create(
            [
            'base_price' => '50000',
            'country' => 'Argentina',
            'description' => 'Se encuentran para la venta unidades de 2 y 3 dormitorios super confort, totalmente equipadas y amuebladas con finos detalles de terminación y decoración, listas para ser disfrutadas.',
            'entertainment' => 'Acceso a playa sobre costa del Río Uruguay, imponente piscina, espacios verdes, actividades deportivas, deportes náuticos, restaurante.',
            'investment' => 'Casa 2 Dormitorios de 70 m2 con lote de 800 m2: Living-comedor con mobiliario y Tv Led, cocina totalmente equipada con mesada, alacena, cocina con horno, heladera con frezer, microondas, baño completo, 2 dormitorios con somier de 2 plazas y de 1 plaza, y galería cubierta con deck y parrilla. Pisos de porcelanato, amplias ventanales de aluminio, Aires acondicionado, calefacción, apliques de luz, cortinas en todos los ambientes.
        
        Casa 3 dormitorios de 100 m2 con lote de 800 m2: Living-comedor con mobiliario y Tv Led, cocina totalmente equipada con mesada, alacena, cocina con horno, heladera con frezer, microondas, baño completo, 3 dormitorios, 2 baños, habitación principal en suite, con somier de 2 plazas y de 1 plaza, y galería cubierta con deck y parrilla. Pisos de porcelanato, amplias ventanales de aluminio, Aires acondicionado, calefacción, apliques de luz, cortinas en todos los ambientes.',
            'light' => '1',
            'name' => 'La Aldea Club de Campo',
            'place' => 'A solo 15 minutos de Colón se encuentra La Aldea Club de Campo, en Colonia San Anselmo, sobre el Río Uruguay entre medanos de arena blanca, bosques de pinos y eucaliptos.',
            'project_type_id' => '3',
            'resume' => 'Servicios: Agua corriente - Desagüe cloacal - Internet - Luz - Video cable
        
    Características: Aire acondicionado - Amoblado - Calefacción - Cancha deportes - Quincho - Vigilancia
        
    Ambientes: Cocina - Comedor - Comedor de diario - Hall - Jardín - Lavadero - Living - Living comedor - Patio
        
    Características generales: Permite mascotas - Uso comercial - Cantidad dormitorios (2) - Cantidad plantas (1) - Estado del inmueble (excelente) - Etapa (terminado) - Luminosidad (muy luminoso) - Ofrece financiación - Superficie del terreno (m2) (800) - Tipo techo (chapa) - Parrilla - Piscina - Sala de juegos - Solarium.',
            'slug' => 'la-aldea',
            'state' => 'Entre Ríos',
            'total_area' => '800',
            'water' => '1',
                ]
        );
        
        $laAldea->featured_photo()->create(['location' => 'la-aldea/h-feature-1.jpg']);
        $laAldea->unfeatured_photos()->create(['location' => 'la-aldea/h-feature-1.jpg']);
        $laAldea->unfeatured_photos()->create(['location' => 'la-aldea/h-feature-2.jpg']);
        $laAldea->unfeatured_photos()->create(['location' => 'la-aldea/h-feature-3.jpg']);
        $laAldea->unfeatured_photos()->create(['location' => 'la-aldea/h-feature-4.jpg']);
        $laAldea->unfeatured_photos()->create(['location' => 'la-aldea/h-feature-5.jpg']);
        $laAldea->offer_types()->attach(['1','2']);
    
        $elDesafio = Project::create(
            [
            'base_price' => '55000',
            'city' => 'San Martín de Los Andes',
            'country' => 'Argentina',
            'description' => 'Exclusivos departamentos emplazados en terrazas sobre un terreno de casi 3 hectáreas que se ofrece como platea preferencial a la zona del Polo y al cautivamente paisaje patagónico. Tanto el diseño, en pequeños módulos, llevado a cabo por Arquitectura Amoroso, como los materiales empleados, buscan mimetizar la construcción con el entorno. Sus grandes ventanales así como sus decks y jardín-terrazas miran al norte, al polo y a la inmensidad patagónica. Chimenea en estar e hidromasaje en jardín-terraza, son denominadores comunes en las unidades.',
            'entertainment' => '<ul><li>Acceso a Lodge boutique 5 estrellas</li>
    <li>Acceso a Spa & Wellness Center</li>
    <li>Cancha de golf Greg Norman Signature</li>
    <li>2 canchas de polo profesionales</li>
    <li>Instalaciones hípicas y caballerizas</li>
    <li>Zona de taqueo</li>
    <li>Escuela de equitación</li>
    <li>Sendas ecuestres para recorrer toda la montaña</li>
    <li>2 club houses (polo y golf)</li>
    <li>Reserva natural (birdwatching, mountain bike, trekking, ski de fondo)</li></ul>',
            'gas' => '1',
            'investment' => '2 tipos de unidades diferentes:<br><ul><li> Departamentos de 1 dormitorio • Departamentos de 2 dormitorios.Calles de ripio consolidado de máxima seguridad.</li>
    <li>Lotes amplios de más de 4000 m2 en promedio</li>
    <li>600 hectáreas de reserva natural propia</li>
    <li>1040 hectáreas de montaña, 300 hectáreas urbanizables con lotes para viviendas</li>
    <li>Número limitado de departamentos de lujo con diseño</li>
    <li>Servicios subterráneos y estrictos reglamentos de arquitectura, urbanización y paisajismo</li></ul>',
            'light' => '1',
            'name' => 'El Desafío Mountain Resort',
            'place' => 'Una sucesión de lagos cristalinos que avanza entre montañas. Lagos entrelazados que esculpen los valles de la Patagonia Norte, atraviesan los bosques de lengas, araucarias, cohiues, cipreses. Lagos de distintas extensiones y ritmos, que nutren la tierra henchida de misterios naturales, ancestrales, vitales. Lagos especiales para una vivencia especial; región del mundo elegida para la pesca con mosca y la vida libre al aire libre.En el centro mismo del Corredor de los Lagos, se alza la montaña de El Desafío: el desarrollo parte de los 840 metros sobre el nivel del mar y llega a los 1420 metros en el sector de la reserva natural. Su altura y su orientación norte le otorgan un máximo aprovechamiento del sol e imponentes vistas 360º: la Cordillera de los Andes, el cordón Chapelco, el volcán Lanín, los valles, los lagos, los bosques nativos, la estepa, las estancias patagónicas. Esta es nuestra montaña, una especie de “tierra prometida”.',
            'project_type_id' => '1',
            'resume' => '<ul><li>Revestimientos exteriores en piedra y madera.</li>
    <li>Doble vidrio hermético DVH.</li>
    <li>Arquitectura patagónica moderna con ambientes muy amplios, equipamiento completo y materiales de primera línea.</li>
    <li>Placards y muebles de cocina hechos a mano de excelente calidad.</li>
    <li>Baño y cocina modernos con jacuzzi en suite, artefactos y grifería de alta gama.</li>
    <li>Pisos interiores de madera.</li>
    <li>Calefacción por loza radiante. Anafe y horno, eléctricos.</li>
    <li>Carpintería moderna de aluminio negro (rpt) y vidrios dobles (dvh) de alta calidad.</li>
    <li>Jacuzzi-Spa (opcional) y Parrilla en terraza.</li></ul>',
            'slug' => 'el-desafio',
            'state' => 'Neuquén',
            'total_area' => '1000',
                ]
        ); 
    
        $elDesafio->featured_photo()->create(['location' => 'el-desafio/h-feature-1.jpg']);
        $elDesafio->unfeatured_photos()->create(['location' => 'el-desafio/h-feature-1.jpg']);
        $elDesafio->unfeatured_photos()->create(['location' => 'el-desafio/h-feature-2.jpg']);
        $elDesafio->unfeatured_photos()->create(['location' => 'el-desafio/h-feature-3.jpg']);
        $elDesafio->unfeatured_photos()->create(['location' => 'el-desafio/h-feature-4.jpg']);
        $elDesafio->unfeatured_photos()->create(['location' => 'el-desafio/h-feature-5.jpg']);
        $elDesafio->offer_types()->attach(['1','2']);

        $vistaAlPolo = Project::create(
            [
            'base_price' => '48000',
            'city' => 'San Martín de Los Andes',
            'country' => 'Argentina',
            'gas' => '1',
            'light' => '1',
            'name' => 'Vista al Polo',
            'slug' => 'vista-al-polo',
            'state' => 'Neuquén',
            'total_area' => '1000',
            ]
        );

        $vistaAlPolo->featured_photo()->create(['location' => 'vista-al-polo/img_5.jpg']);
        $vistaAlPolo->unfeatured_photos()->create(['location' => 'vista-al-polo/img_5.jpg']);
        $vistaAlPolo->offer_types()->attach('3');

        $nidoCondominioJardin = Project::create(
            [
            'base_price' => '48000',
            'country' => 'Bolivia',
            'gas' => '1',
            'light' => '1',
            'name' => 'Nido Condominio Jardín',
            'slug' => 'nido-condominio-jardin',
            'state' => 'Santa Cruz',
            'total_area' => '1000',
            ]
        );

        $nidoCondominioJardin->featured_photo()->create(['location' => 'nido-condominio-jardin/img_4.jpg']);
        $nidoCondominioJardin->unfeatured_photos()->create(['location' => 'nido-condominio-jardin/img_4.jpg']);
        $nidoCondominioJardin->offer_types()->attach('3');

        $championsGate = Project::create(
            [
            'base_price' => '48000',
            'city' => 'Miami',
            'country' => 'Estados Unidos',
            'gas' => '1',
            'light' => '1',
            'name' => 'Champions Gate',
            'slug' => 'champions-gate',
            'state' => 'Florida',
            'total_area' => '1000',
            ]
        );

        $championsGate->featured_photo()->create(['location' => 'champions-gate/img_6.jpg']);
        $championsGate->unfeatured_photos()->create(['location' => 'champions-gate/img_6.jpg']);
        $championsGate->offer_types()->attach('3');

        $vista = Project::create(
            [
            'base_price' => '100000',
            'city' => 'Vicente López',
            'country' => 'Argentina',
            'description' => 'Departamentos de 4 y 7 ambientes con dependencia.',
            'featured' => '1',
            'gas' => '1',
            'light' => '1',
            'name' => 'VISTA',
            'slug' => 'vista',
            'state' => 'Buenos Aires', 
            'total_area' => '8140',
            ]
        );

        $vista->featured_photo()->create(['location' => 'vista/fachada_-vista_grande.jpg']);
        $vista->unfeatured_photos()->create(['location' => 'vista/01-proyecto-vista.jpg']);
        $vista->unfeatured_photos()->create(['location' => 'vista/02-proyecto-vista.jpg']);
        $vista->unfeatured_photos()->create(['location' => 'vista/03-proyecto-vista.jpg']);
        $vista->unfeatured_photos()->create(['location' => 'vista/04-proyecto-vista.jpg']);
        $vista->unfeatured_photos()->create(['location' => 'vista/05-proyecto-vista.jpg']);
        $vista->unfeatured_photos()->create(['location' => 'vista/06-proyecto-vista.jpg']);
        $vista->offer_types()->attach(['1','2','3']);

        $cassaIsidro = Project::create(
            [
            'base_price' => '100000',
            'city' => 'San Isidro',
            'description' => 'Deptos de 2 a 4 ambientes.<br>Unidades en Dúplex.</br>Con y sin dependencia de servicio',
            'country' => 'Argentina',
            'featured' => '1',
            'gas' => '1',
            'light' => '1',
            'name' => 'Cassa Isidro',
            'slug' => 'cassa-isidro',
            'state' => 'Buenos Aires',
            'total_area' => '18556',
            ]
        );

        $cassaIsidro->featured_photo()->create(['location' => 'cassa-isidro/fachada_-la_casona_san_isidro_grande.jpg']);
        $cassaIsidro->unfeatured_photos()->create(['location' => 'cassa-isidro/01_proyecto_la_casona_de_san_isidro.jpg']);
        $cassaIsidro->unfeatured_photos()->create(['location' => 'cassa-isidro/02_proyecto_la_casona_de_san_isidro.jpg']);
        $cassaIsidro->unfeatured_photos()->create(['location' => 'cassa-isidro/03_proyecto_la_casona_de_san_isidro.jpg']);
        $cassaIsidro->unfeatured_photos()->create(['location' => 'cassa-isidro/04_proyecto_la_casona_de_san_isidro.jpg']);
        $cassaIsidro->unfeatured_photos()->create(['location' => 'cassa-isidro/04_proyecto_la_casona_de_san_isidro.jpg']);
        $cassaIsidro->unfeatured_photos()->create(['location' => 'cassa-isidro/06_proyecto_la_casona_de_san_isidro.jpg']);
        $cassaIsidro->offer_types()->attach(['1','2','3']);
    }
}
