<?php
$video='<object width="330" height="270">
<param name="movie" value="EditTelecom.swf">
<embed src="somefilename.swf" width="330" height="270">
</embed>
</object>
';

switch ($_GET["prof"]) {
    case "1": //Miguel Moctezuma
        $Nombre='Miguel Moctezuma Flores';
        $profeImg='MiguelMoctezuma.jpg';
        $Detalles='Profesor de Carrera Titular "A", Tiempo Completo.
            <p>
                <blockquote>• Doctorado en Procesamiento de Señales e Imágenes, ENST, Paris, Francia.</blockquote>
                <blockquote>• Maestría en Procesamiento de Señales e Imágenes, ENST, Paris, Francia.</blockquote>
                <blockquote>• Maestría en Ingeniería Eléctrica, Fac. de Ingeniería, UNAM</blockquote>
                <blockquote>• Licenciatura en Ingeniería Mécanica-Eléctrica, Fac. de Ingeniería, UNAM</blockquote>
            </p>
        ';
        $Body='
            <h1>Información adicional.</h1>
            <span class="NuTitle"><strong>Distinciones:</strong></span>
              <span class="NuParagraph"><p>
                    SNI nivel candidato de 1996 a 2000. Evaluador en el proceso de selección de candidatos a Beca para estudios en el extranjero, CONACyT 1999-2001. Arbitro en el proceso de evaluación de Proyectos de Investigación Sometidos a CONACyT 1999-2001. Miembro del Comité Aspirantes a Beca de Lucent Global Scholars Program, Lucent Technologies 1999.
                    </p><span class="NuTitle"><strong>Logros:</strong></span><p>
                    Miembro del Comité Académico del Posgrado en Ciencias de la Computación de la UNAM, noviembre de 2000. Beca del Instituto Tecnológico de Teléfonos de México para profesores/investigadores del área de Telecomunicaciones. Período Septiembre 1996-Agosto 1999. Representante de la Facultad de Ingeniería ante el Comité Consultivo Nacional de Normalización de Telecomunicaciones, CCNNT- a partir de diciembre de 1998. Miembro del Comité de preparación del Examen General de Calidad Profesional del Ceneval, de la carrera de Ing. Eléctrica-Electrónica, a partir de agosto de 1997. Miebro del Comité Científico del "V Ibero-American Symposium on Pattern Recognition, SIARP", Lisbon 2000, september 11-13, 2000. Vice-Chair y miembro del Comité Técnico del "International Conference on Telecommunications, ICT-2000", Acapulco, 22-25 de mayo, 2000. Miembro del Comité Científico del "3er Simposio Iberoamericano de Reconocimiento de Patrones, SIARP"99", La Habana, Cuba, 22-26 de marzo de 1999.
                    </p><span class="NuTitle"><strong>Fichas Bibliográficas:</strong></span><p>
                    <blockquote>• M. Moctezuma, H. Maitre, F. Parmiggiani, "Sea-ice velocity fields estimation On Ross Sea
                    with NOAA-AVHRR", IEEE Transactions on Geoscience and Sensing, Vol. 33, No. 5, pp 1286-1289, sept. 1995</blockquote>
                    <blockquote>• Special issue on the 1994 International Geoscience and Remote Sensing Symposium, IGARSS 94.
                    X. Descombes, M. Moctezuma, H. Maitre, J-P Rudant, "Coastline detection by a Markovian segmentation on SAR
                    images", Signal Processing, (EURASIP- European Association for Singal Processing) 55, 1995, pp123-132.</blockquote>
             </span></p>';
    case "2": //Ignacio Flores Llamas
        $Nombre='Ignacio Flores Llamas';
        $profeImg='llamas.jpg';
        $Detalles='Profesor de Carrera Titular "A", Tiempo Completo.
            <p>
                <blockquote>• Doctorado en Ingeniería – Universidad Nacional Autónoma de México, México D. F., 2007.</blockquote>
                <blockquote>• M. en C. Comunicaciones de Datos – Universidad de Sheffield, Sheffield, Gran Bretaña., 2001.</blockquote>
                <blockquote>• Maestría en Ingeniería Eléctrica, Fac. de Ingeniería, UNAM</blockquote>
            </p>
        ';
        $Body='
            <h1>Información adicional.</h1>
            <span class="NuTitle"><strong>TESIS: Síntesis de las rejillas de período largo en fibra óptica por medio de un algoritmo genético.</strong></span>
              <span class="NuParagraph"><p>
                    Descripción: Obtención de nuevos conocimientos científicos y de aplicación en el diseño de dispositivos basados en las rejillas de período largo en fibra óptica, para los sistemas de comunicación y medición.
                    </p><span class="NuTitle"><strong>TESIS: Reed-Solomon codecs de baja potencia.</strong></span><p>
                    Descripción: Análisis de potencia de diferentes codecs utilizados para la corrección de errores en sistemas digitales de grabación, comunicaciones y almacenamiento de datos.
                    </p><span class="NuTitle"><strong>PROYECTO  TERMINAL: Mezcladora digital automática de Compact Disc. </strong></span><p>
                    Descripción: Sistema digital basado en el microcontrolador 68HC11; es decir, el diseño de hardware y software (en ensamblador), para controlar volúmenes y velocidades de dos reproductores de compact disc.
              </span></p>';
        
        break;
    case "3": //Mario Alfredo Ibarra Pereyra
        $Nombre='Alfredo Ibarra Pereyra'.'<img src="images/Black_ribbon.png" border="0" alt="blackribbon" width="20" height="30" />';
        $profeImg='ibarrafin.jpg';
        $Detalles='Profesor Asociado "C", T.C. Definitivo
            <p>
                <blockquote>• Maestría en Ingeniería Eléctrica, DEPFI-UNAM</blockquote>
                <blockquote>• Licenciatura en Ing. Mecánico Electricista, Facultad de Ingeniería, UNAM.</blockquote>
            </p>
        ';
        $Body='
            <h1>Información adicional.</h1>
            <span class="NuTitle"><strong>Logros:</strong></span>
              <span class="NuParagraph"><p>
               30 Años de docencia. Aproximadamente 100 tesis profesionales de titulación
               de alumnos. 25 años coordinando el Laboratorio de Comunicaciones
               Capacitación de más de 50 profesores y ayudantes.
              </span></p>';
        break;
    case "4": //Bohumil Psenicka Skuhersky
        $Nombre='Bohumil Psenicka Skuhersky';
        $profeImg='bohumil.jpg';
        $Detalles='Profesor de Carrera.
            <p>
                <blockquote>• Doctorado en: Ingeniería en Telecomunicaciones, Universidad Tecnológica Checa, 1967 Tesis: Filtros RC con los parámetros distribuidos.</blockquote>
                <blockquote>• Maestría en: Ingeniería en Telecomunicaciones, Universidad Tecnológica Checa, 1972 Tesis: Filtros activos en las Telecomunicaciones.</blockquote>
                <blockquote>• Especialidad en: Procesamiento digital de Señales, Universidad Tecnológica Checa, 1990 Tesis: Filtros Digitales.</blockquote>
                <blockquote>• Licenciatura en: Ingeniería en Telecomunicaciones, Universidad Tecnológica Checa, 1962 Tesis: Filtros para líneas de alta tensión.</blockquote>
            </p>
        ';
        $Body='
            <h1>Información adicional.</h1>
            <span class="NuTitle"><strong>Distinciones:</strong></span>
              <span class="NuParagraph">
                    <p>
                    SNI Nivel I de 1995 -2001 PRIDE Nivel C 1995
                    </p>
                    <span class="NuTitle"><strong>Actividades escolares:</strong></span>
                    <p>
                        <blockquote>• Profesor en la Universidad Técnica Checa en el departamento de Telecomunicaciones 1962-1969.</blockquote>
                        <blockquote>• Profesor en la Universidad Técnica Checa en el departamento Teoría de Circuitos 1969-1993.</blockquote>
                        <blockquote>• 3 meses en la Universidad en Darmstadt - Alemania 1968.</blockquote>
                        <blockquote>• 3 meses en la Universidad en Bochum - Alemania 1986.</blockquote>
                        <blockquote>• 6 meses en la Universidad Nacional Autónoma de México 1989.</blockquote>
                        <blockquote>• 1 semana en el curso en Munich - Texas Instruments.</blockquote>
                        <blockquote>• Desde el 16 mayo 1993 profesor Titular A con T.C. en la UNAM.</blockquote>
                        <blockquote>• Desde el 8 mayo 1997 profesor Titular B con T.C. en la UNAM.</blockquote>
                        <blockquote>• Desde el 14 mayo de 1998 prof. Tit B. de tiempo completo a contrato.</blockquote>
                        <blockquote>• Desde el 16 octubre de 2000 prof. Tit. C de tiempo completo definitivo.</blockquote>
                    </p>
                <span class="NuTitle"><strong>Proyectos:</strong></span>
                  </p><table style="height: 421px;" border="1">
                          <tr>
                            <td colspan="2"><span class="NuTitle"><strong>Cargo</strong></span></td>
                          </tr>
                          <tr>
                            <td rowspan="3"><span class="NuTitle"><strong>Responsable</strong></span></td>
                            <td><span class="NuTitle"><strong>Tema:</strong></span> Desarrollo de interfaces
                                                multimodales combinando técnicas de inteligencia artificial.</td>
                          </tr>
                          <tr>
                            <td><span class="NuTitle"><strong>Aprobado:</strong></span> La Dirección General de Asuntos del Personal Académico.
                                                                                        PAPIIT. 1996. No. IN107496</td>
                          </tr>
                          <tr>
                            <td><span class="NuTitle"><strong>Duración:</strong></span> 3años</td>
                          </tr>
                          <tr>
                              <td rowspan="3"><span class="NuTitle"><strong>Responsable</strong></span></td>
                              <td><span class="NuTitle"><strong>Tema:</strong></span> Desarrollo de un Sistema para Aplicaciones de
                                                                                      Micro-procesadores DSP en Telecomunicaciones.</td>
                          </tr>
                          <tr>
                            <td>
                             <span class="NuTitle"><strong>Aprobado:</strong></span> El comité de evaluación en programa de apoyo a proyectos 
                                                                                     institucionales de mejoramiento de la  enseñanza PAPIME 1997.
                                                                                     TIPO N6-96</td>
                          </tr>
                          <tr>
                            <td><span class="NuTitle"><strong>Duración:</strong></span> 2 años</td>
                          </tr>
                            <tr><td rowspan="3"><span class="NuTitle"><strong>Responsable</strong></span></td>
                            <td><span class="NuTitle"><strong>Tema:</strong></span> Análisis y diseño de un sistema para la medición de
                                                                                    microcirculación de la sangre.</td>
                          </tr>
                          <tr>
                            <td><span class="NuTitle"><strong>Aprobado:</strong></span> La Dirección General de Asuntos del Personal Académico.
                                                                                        PAPIIT. 1998. No. IN117998.</td>
                          </tr>
                          <tr>
                            <td><span class="NuTitle"><strong>Duración:</strong></span> 2 años</td>
                          </tr>
                   </table></p>
                            <span class="NuTitle"><strong>Logros:</strong></span> 2 años
                            <p>
                            En la empresa TESLA Stransnice trabajé como investigador. Durante la investigación fabriqué los filtros electromecánicos para los canales 60 Hz- 108 Hz. En telefonía, el grupo donde trabajé obtuvo por la investigación de los filtros, el premio de Clement Gottwald. En la Facultad de Ingeniería, UNAM, preparé en el laboratorio los dispositivos con DSP TM532OC25. En la Facultad de Ingeniería, UNAM, escribí tres libros de texto.
                            </p>
                            <span class="NuTitle"><strong>Fichas Bibliográficas:</strong></span> 2 años
                            <p>
                            <blockquote>• "Design of State Digital Filters", IEEE Transaction on Signal Proc. 1998</blockquote>
                            <blockquote>• "Finite Word Length Efects in Digital State Filters", Radioengineering. 1999</blockquote>
                            <blockquote>• "Zur Synthese Von Activen Filtren", Inform. Tech. 1997</blockquote>
                            <blockquote>• "Design of State Digital Filters without Multiplers", ICSDAT, 1999.</blockquote>
                            <blockquote>• "Implementation of Impulse Noise Algoritme from Images", IASTED, 2000</blockquote>
                            <blockquote>• "Análisis de señales analógicas y digitales", Facultad de Ingeniería</blockquote>
                            <blockquote>• "Prácticas de laboratorio con microprocesadores TMS320C6711", Facultad de Ingeniería</blockquote>
                            <blockquote>• "Prácticas de laboratorio con microprocesadores TMS320C30", Facultad de Ingeniería </blockquote>
                            </p>
                </span>';
        break;
    case "5": //Damián Federico Vargas Sandoval
        $Nombre='Damián Federico Vargas Sandoval';
        $profeImg='Undefined.jpg';
        $Detalles='Técnico Académico Asociado "B", T.C.
            <p>
                <blockquote>• Maestría en Ing. Eléctrica(Comunicaciones), Facultad de Ingeniería, UNAM.</blockquote>
                <blockquote>• Licenciatura en Ingeniero Mecánico-Electricista, Facultad de Ingeniería, UNAM.</blockquote>
            </p>
        ';
        $Body='
            <h1>Información adicional.</h1>
            <span class="NuTitle"><strong>Logros:</strong></span>
              <span class="NuParagraph"><p>
                Mención honorífica en estudios de Licenciatura. Mención honorífica en estudios de Maestría.
                Maestría en Ciencias, comenzada para Doctorado.
              </span></p>';
        break;
    case "6": //Javier Gómez Castellanos
        $Nombre='Javier Gómez Castellanos';
        $profeImg='javiergc.bmp';
        $Detalles='Profesor de Carrera
            <p>
                <blockquote>• Doctorado (Ph.D.), Columbia University, New York, USA, 2002.</blockquote>
                <blockquote>• Maestro en Ciencias, Columbia University, New York, NY, USA, 1996.</blockquote>
                <blockquote>• Licenciatura, Ingeniero Mecánico-Electricista, Facultad de Ingeniería, UNAM, México,1992.</blockquote>
            </p>
        ';
        $Body='
            <h1>Información adicional.</h1>
            <span class="NuTitle"><strong>Reconocimientos:</strong></span>
              <span class="NuParagraph"><p>
                SNI nivel I (2004-2007), Beca de INTTELMEX (2003-2004), PAIPA C (2003-2004),
                beca para estudios de doctorado por parte de la Universidad de Columbia, beca de la DGAPA para estudios de maestría.
            </p><span class="NuTitle"><strong>Invitaciones Académicas:</strong></span>
             <p>
             Miembro del comité técnico del programa de: ACM WMASH 2003, ACM WMASH 2004, IEEE TEDC 2003, IEEE TEDC 2004, BROADWIN 2004, ACM MOBIHOC 2005, IEEE GLOBECOM 2005”
             </br>Revisor en varias revistas y conferencias internacionales de la IEEE y de la ACM
             </p>
             <span class="NuTitle"><strong>Experiencia Profesional:</strong></span>
             <p>
                </br>Profesor Titular A TC, (2003-2004) DEPFI/DIE, Facultad de Ingeniería
                </br>Asistente de investigador en la Universidad de Columbia, Nueva York, 1999-2002
                </br>Investigador interino en el IBM T.J. Watson Research Center, 1999-2002
             </p>
                <span class="NuTitle"><strong>Labor Académica:</strong></span>
             <p>
                </br>Participación en el diseño y revisión de planes y programas de estudio de la carrera de Ing. en Telecomunicaciones
                </br>Coordinación de proyecto de investigación
                </br>Investigador responsable del proyecto PAPIIT IN103803, sobre redes inalámbricas híbridas, 2004-2005
             </p>
               <span class="NuTitle"><strong>Labor docente y de formación de recursos humanos:</strong></span>
             <p>
               </br> Imparto cátedra tanto en la licenciatura como en el posgrado
               </br> Asesorías a mis tesistas, alumnos de mis materias y de proyectos
               </br> Tengo 5 tesis en proceso, 3 de maestría y dos de licenciatura
              </br>  Participo en los comités tutoriales de la Maestría en Ingeniería y de la maestría en Ciencias de la Computación.
               </br> Participo como jurado en exámenes profesionales
             </p>
             <span class="NuTitle"><strong>Productividad Académica:</strong></span>
             <p>
               </br> Producción científica: 7 artículos publicados en revistas internacionales
              </br>  17 artículos en memorias de conferencias y congresos internacionales
              </br>  6 Internet drafts
              </br>  4 Productos Tecnológicos
              </br>  Se crearon dos laboratorios, uno para desarrollar investigación y docencia en redes inalámbricas de datos, y el segundo para desarrollar aplicaciones para teléfonos celulares de 3ra generación
              </br>  16 trabajos de investigación presentados en congresos
             </p></span></p>';
        break;
    case "7": //Jesús Reyes García
        $Nombre='Jesús Reyes García';
        $profeImg='JReyes.jpg';
        $Detalles='Profesor Asociado "B" Tiempo Completo.
            <p>
                <blockquote>• Maestría en Ingeniería Eléctrica, DEPFI-UNAM.</blockquote>
                <blockquote>• Licenciatura en Ingeniero Mecánico- Electricista, Facultad de Ingeniería, UNAM.</blockquote>
            </p>
        ';
        $Body='
            <h1>Información adicional.</h1>
            <span class="NuTitle"><strong>Logros:</strong></span>
              <span class="NuParagraph"><p>
                Haber participado en la creación de la carrera de Ingeniero en Telecomunicaciones; plan de estudios y planeación de
                toda la infraestructura relacionada con la carrera. Como primer Jefe del departamento de Ingeniería en Telecomunicaciones,
                ser el responsable del avance de la carrera de Ingeniero en Telecomunicaciones para que egresara la primera generación y
                supervisar la construcción de los laboratorios y equipamiento de éstos. Haber participado en el primer grupo que puso en
                marcha el proyecto para la construcción del satélite UNAMSAT.
             </p><span class="NuTitle"><strong>Fichas Bibliográficas:</strong></span>
             <p>
        <blockquote>•       "Engineering Undergraduate Program at México", Engineering Education for 21 st Century IEEE. Frontiers in Education,
        atlanta GA. EEUU 1995.</blockquote>
        <blockquote>•      "Análisis y síntesis de Filtros digitales usando la Matriz de Flujo de Estado", ELECTRO 95 IEEE. Chihuahua,
        Chihuahua, México 1995.</blockquote>
        <blockquote>•      "Implementation of Personal Communications Services in Rural Areas", Multicom21. Northern Telecomm. Dallas TX, EEUU 1993.</blockquote>
        <blockquote>•      "Manual de Practicas del Laboratorio de Electromagnética", Co-autor 1978-1982. Notas de cursos de Educación Continua.</blockquote>
             </p>
              </span></p>';
        break;
    case "8": //José Luis García García
        $Nombre='José Luis García García';
        $profeImg='garcia.jpg';
        $Detalles='Profesor de Carrera
            <p>
                <blockquote>• Licenciatura en la Facultad de Ingeniería de la UNAM, Ing. Mecánico-Electricista en el área eléctrica-electrónica.</blockquote>
                <blockquote>• Maestría en la Facultad de Ingeniería de la UNAM.</blockquote>
            </p>
        ';
        $Body='
            <h1>Información adicional.</h1>
            <span class="NuTitle"><strong>Logros:</strong></span>
              <span class="NuParagraph"><p>
                    </br>Llevó a cabo una estancia de investigación en el Laboratorio de Desarrollo de Sistemas Espaciales de la Universidad de Stanford.
                   </br> Adicionalmente ha acreditado el Diplomado en Gestión de Proyectos Tecnológicos y Propiedad Industrial, así como el Diplomado en
                    Docencia de la Ingeniería.
                    </br>Participó en la iniciativa privada en empresas de Telecomunicaciones donde fungió como de Director de Tecnología.
                    Sus líneas de investigación incluyen  Electrónica, Radio Frecuencia, Redes de Fibra óptica,
                    Comunicaciones inalámbricas y Tecnología Espacial, donde ha destacado por su participación en proyectos de
                    satélites pequeños tanto en México como en Estados Unidos y Rusia. Actualmente imparte la asignatura de
                    Sistemas de Radiocomunicaciones II. </span></p>';
        break;
    case "9": //José María Matías Maru
        $Nombre='José María Matías Maruri';
        $profeImg='matiasm.jpg';
        $Detalles='Información no disponible.';
        $Body='<h1>Información no disponible</h1>';
        break;
    case "10": //Julio César Tinoco Magaña
        $Nombre='Julio César Tinoco Magaña';
        $profeImg='tinocom.jpg';
        $Detalles='Información no disponible.';
        $Body='<h1>Información no disponible</h1>';
        break;
    case "11": //Margarita Bautista
        $Nombre='Margarita Bautista';
        $profeImg='Undefined.jpg';
        $Detalles='Información no disponible.';
        $Body='<h1>Información no disponible</h1>';
        break;
    case "12": //Oleksandr Martynyuk
        $Nombre='Oleksandr Martynyuk';
        $profeImg='martiniukfin.jpg';
        $Detalles='Profesor Titular "A", T.C.
            <p>
                <blockquote>• Doctorado en Antenas y Dispositivos de Microondas, Instituto Politécnico de Kiev.</blockquote>
                <blockquote>• Maestría en Radiocomunicaciones, Instituto Politécnico de Kiev.</blockquote>
                <blockquote>• Licenciatura en Ingeniero en Telecomunicaciones, Instituto Politécnico de Kiev.</blockquote>
            </p>
        ';
        $Body='
            <h1>Información adicional.</h1>
            <span class="NuTitle"><strong>Distinciones:</strong></span>
              <span class="NuParagraph"><p>
                    IEEE International Publication Acknowledgement Award. SNI 1996-2000.
              </p><span class="NuTitle"><strong>Logros:</strong></span><p>
                    Investigación y diseño de nuevos tipos de desplazadores de fase para la banda Ka. Investigación y diseño de las antenas integradas para la banda Ka.
                    </p><span class="NuTitle"><strong>Fichas Bibliográficas:</strong></span><p>
                     <blockquote>•        A.E. Martynyuk, Yu Sidoruk, "Estimate of the Maximum Attanable Loss Level in a Reflex Polarization Phase
                     Shifter", Radioelectronics and Communications Systems, Alestron Press N.Y. Vol .38, pp 54-56.</blockquote>
                    <blockquote>•         A.E. Martynyuk,Yu Sidoruk, "Reflex Polarization Phase Shifter For The Millimeter Wave Band",
                    Radioelectronics and Communications Systems, Alestron N.Y. Vol 38, pp.67-73.</blockquote>
                    <blockquote>•         A. Martynyuk et al., "Millimeter -Wave Amplitude- Phase Modulator", IEEE Transactions on
                    Microwave Theory & Techniques, Vol 45, No 6, pp. 911-917, 1997.</blockquote>
                    <blockquote>•         A. Martynyuk, Yu Sidoruk, " Low Loss Phase Shifter for Ka-band Passive Phased Array",
                    IEEE International Conference on Phased Array Systems and Tech., May 2000, California, USA.</blockquote>
                    </span></p>';
        break;
    case "13": //Salvador Landeros Ayala
        $Nombre='Salvador Landeros Ayala';
        $profeImg='Undefined.jpg';
        $Detalles='Prof. Titular "B", Tiempo completo.
            <p>
                <blockquote>• Doctorado en Ingeniería, Facultad de Ingeniería, UNAM.</blockquote>
                <blockquote>• Maestría en Ciencias de la Ingeniería, Universidad de Pennsylvania.</blockquote>
                <blockquote>• Licenciatura en Ingeniero Mecánico-Electricista, Facultad de Ingeniería, UNAM.</blockquote>
            </p>
        ';
        $Body='
            <h1>Información adicional.</h1>
            <span class="NuTitle"><strong>Distinciones:</strong></span>
              <span class="NuParagraph"><p>
                    Reconocimiento del Gobierno Mexicano por contribuir a las Telecomunicaciones del país, 1998.
                    </p><span class="NuTitle"><strong>Logros:</strong></span><p>
                    Inicié nuevas asignaturas en el campo de las Telecomunicaciones. He sido una de las primeras personas en el campo de las
                    comunicaciones vía satélite. Coordiné los trabajos para prolongar la vida del satélite Morelos II. He impartido 14 asignaturas
                    diferentes de licenciatura, maestría y especialidades. He realizado más de 40 publicaciones nacionales e internacionales.
                    He impartido más de 40 conferencias en distintas universidades y empresas de México. He coordinado 5 proyectos de alcance
                    Nacional. He sido directivo de Asociaciones y Colegios de Ingenieros. Fui Presidente del Congreso Mundial ICT-2000.
                    </p><span class="NuTitle"><strong>Fichas Bibliográficas:</strong></span><p>
                    <blockquote>• "Trends on Satellite Communications in Latin Américaand the potential for Ka band multimedia services".
                    Proceedings of the ICT-98. Grecia.</blockquote>
                    <blockquote>• "Apuntes de Satélites de Comunicaciones". División de Educación Continua. Facultad de Ingeniería, UNAM.</blockquote>
                    <blockquote>• "Panorama cronológico de los satélites de comunicaciones en el mundo". Revista Ciencia y Desarrollo de
                    CONACYT, agosto 1997.</blockquote>
                    <blockquote>• "Propagación coherente en lluvia con longitudes de onda milimétricas". Academia Nacional de Ingeniería, 1983.</blockquote>
                    <blockquote>• "Information Transmission modulation and Noise ". Mc. Graw-Hill, 1983. Revisión Técnica.</blockquote>
                    </span></p>';
        break;
    case "14": //Serguei Khotiaintsev Duskriatchenko
        $Nombre='Serguei Khotiaintsev Duskriatchenko';
        $profeImg='Undefined.jpg';
        $Detalles='Profesor Titular "C", Tiempo Completo.
            <p>
                <blockquote>• Doctorado en Electrónica, Instituto Politécnico de Kiev.</blockquote>
                <blockquote>• Maestría en Telecomunicaciones, Instituto Politécnico de Kiev.</blockquote>
                <blockquote>• Especialidad en Fibras Opticas, Imperial College, Londres.</blockquote>
                <blockquote>• Licenciatura en Ing. en Telecomunicaciones, Instituto Politécnico de Kiev.</blockquote>
            </p>
        ';
        $Body='
            <h1>Información adicional.</h1>
            <span class="NuTitle"><strong>Distinciones:</strong></span>
              <span class="NuParagraph"><p>
                    Tres premios y distinciones en Ucrania, 1974-1993.
                    </p><span class="NuTitle"><strong>Logros:</strong></span><p>
                        Tener más de 20 años de experiencia en docencia e investigación científica. Ser asesor y tutor de cinco
                        tesis de licenciatura concluidas y cuatro en proceso. Trabajo de doctorado concluido y otro en proceso en
                        México. Fui asesor de un gran número de tesis en Ucrania. Soy director de un proyecto de investigación
                        de CONACYT y otro de la UNAM. En Ucrania desarrollé 12 proyectos como director y 3 como participante.
                        Estoy participando en el intercambio académico con cuatro universidades del extranjero.
                    </p><span class="NuTitle"><strong>Fichas Bibliográficas:</strong></span><p>
                        <blockquote>• S. Khotiaintsev, M.L. Sánchez huerta, G. Flores et al., "Laser helps to study structures funtional
                        correlations in cerebral cortex", Ukrainian journal of Pathology. Vol 3.</blockquote>
                        <blockquote>• V.Svirid, V.León, S.Khotiaintsev. "A prototype fiber-optic discrete level-sensor", IEICE Transactions
                        on electronics, Vol E 83, no.3,pp.1,2. 2000.</blockquote>
                        <blockquote>• V. Setkin, T. Belyaeva, S. Khotiaintsev, "Wave to second solutions of Maxwell non-circular
                        equations". DOKER. Vol 359, pp. 760-764, 1998</blockquote>
                        <blockquote>• A. Martyniuk, N. Martyniuk, S. Khotiaintsev, "Millimiter wave amplitud de-phase modulations",
                        IEEE Trans. MTTT- US. No. 6, pp. 911-917, 1997.</blockquote>
                        <blockquote>• S.V. León, S. Khotiaintsev. "Microoptical parabolicalshafed sensing Elements
                        for Refractometric Applications". Instrumentation and development, Vol. 4, no. 1, 1999.</blockquote>
                        </span></p>';
        break;
    case "15": //Víctor García Garduño
        $Nombre='Víctor García Garduño';
        $profeImg='victorfin.jpg';
        $Detalles='Profesor Titular "A", de tiempo Completo Interino.
            <p>
                <blockquote>• Doctorado en Procesamiento de señales y Telecomunicaciones, Univ. de Rennes, Francia.</blockquote>
                <blockquote>• Maestría en Señales de imágenes y voz, INPG-GRENOBLIE, Francia.</blockquote>
                <blockquote>• Maestría en Ingeniería Eléctrica, DEPFI, UNAM.</blockquote>
                <blockquote>• Licenciatura en Ing. Mecánico-Eléctrico, Facultad de Ingeniería, UNAM.</blockquote>
            </p>
        ';
        $Body='
            <h1>Información adicional.</h1>
            <span class="NuTitle"><strong>Distinciones:</strong></span>
              <span class="NuParagraph"><p>
                    Pertenecí al SNI como Candidato a Investigador, 1996-1999 Miembro Académico del Comité Academico del
                    Ceneval, para el examen de Calidad Profesional(EGCP-IE, IECCP-IFO). Logros: Haber estudiado el
                    posgrado en la Facultad de Ingeniería y completar los conocimientos del mismo en el extranjero.
                    Impartir clases en la Facultad de Ingeniería, UNAM. Ser el Jefe del Departamento de Ingeniería en
                    Telecomunicaciones, Facultad de Ingeniería, UNAM.
              </span></p>';
        break;
    case "16": //Víctor Rangel Licea
        $Nombre='Víctor Rangel Licea';
        $profeImg='victorrl.bmp';
        $Detalles='Profesor de Carrera Titular.
            <p>
                <blockquote>• Doctorado (PhD) y Maestría en Ingeniería en Telecomunicaciones en la Universidad de Sheffield, Inglaterra.</blockquote>
                <blockquote>• Licenciatura en Ing. en Computación, UNAM, Facultad de Ingeniería, Jun 96.</blockquote>
            </p>
        ';
        $Body='
            <h1>Información adicional.</h1>
            <span class="NuTitle"><strong>Distinciones:</strong></span>
              <span class="NuParagraph"><p>
                        <blockquote>• Ingreso a Fomdoc, -SNI Nivel Candidato, -PAIPA Nivel C, - Obtención de Beca INTTELMEX</blockquote>
                        <blockquote>• Beca DGAPA para estudios de Maestría y Doctorado</blockquote>
                        <blockquote>• Beca SEP/SRE para estudios de doctorado</blockquote>
                    </p><span class="NuTitle"><strong>Experiencia profesional:</strong></span><p>
                        <blockquote>• Profesor de Carrera Titular A, TC, FI/DIE, UNAM, Mayo 2003 – Presente.</blockquote>
                        <blockquote>• Profesor de Tiempo Completo, DEP/UNAM, Octubre 2002 – Abril 2003.</blockquote>
                        <blockquote>• Consultor, ARRIS INTERACTIVE, Andover, Estados Unidos Jun 2000 – Ago 2000.</blockquote>
                        <blockquote>• Consultor, NETTONICS Ltd., Inglaterra, Marzo 2000 – Mayo 2000.</blockquote>
                    </p>
                    <span class="NuTitle"><strong>Participación en organizaciones profesionales:</strong></span>
                        <p>
                            <blockquote>• Miembro de la asociación “IEEE Communications Society”, Febrero 02-Enero 03.</blockquote>
                            <blockquote>• Miembro de la asociación “IEEE Transactions on Broadcasting”, Febrero 02-Enero 03.</blockquote>
                            <blockquote>• Miembro de la asociación, “Society of Cable Telecommunications Engineers”.</blockquote>
                        </p>
                        <span class="NuTitle"><strong>Diseño y revisión de planes y programas de estudio:</strong></span>
                        <p>
                                Participación en la actualización del plan de estudios de la carrera en Ing. en Telecomunicaciones
                                </br>Participación en la actualización del plan de estudios de la Academia de Telecomunicaciones
                        </p>
                        <span class="NuTitle"><strong>Coordinación de áreas académicas:</strong></span>
                        <p>
                        </br>Participación en la creación del área de REDES DE TELECOMUNICACIONES, en el Depto. Ing. Telecomunicaciones, y en la DEP, del cual soy uno de los responsables de área.
                        </p>
                        <span class="NuTitle"><strong>Coordinación y participación en proyectos de investigación y/o docencia:</strong></span>
                        <p>
                            Co-responsable del Proyecto PAPIIT No: IN103803: Redes IEEE 802.11
                            </br>Responsable del Proyecto PAPIIT No: IN110805: Redes IEEE 802.16, Wimax, BWA
                            </br>Participé en la Coordinación del Proyecto UNAM-Qualcomm (Noviembre 2002- Febrero 2004).
                        </p>
                        <span class="NuTitle"><strong>Labor docente y de formación de recursos humanos:</strong></span>
                        <p>
                        6 Tesis de licenciatura y 5 de maestría en proceso de revisión
                        </p>
                        <span class="NuTitle"><strong>Productividad Académica:</strong></span>
                        <p>
                        4 Publicaciones en revistas internaciones con arbitraje.
                        </br>7 Publicaciones de artículos en memorias con arbitraje.
                        </br>2 Artículos en proceso de revisión.
                        </p>
                        <span class="NuTitle"><strong>Productos de infraestructura académica:</strong></span>
                        <p>
                            Participé en la creación del Lab. de Aplicaciones Móviles UNAM-QUALCOMM.
                            </br>Para el área de Redes de Telecom. participé en la creación del Lab. de Redes Inalámbricas
                        </p>
                        <span class="NuTitle"><strong>Trabajos presentados en congresos:</strong></span>
                        <p>
                            4 trabajos presentados en congresos internacionales (Londres, Ámsterdam, Texas, Acapulco)
                        </p>
                  </span>';
        break;
    case "17": //Vladimir Svirid
        $Nombre='Vladimir Svirid';
        $profeImg='Undefined.jpg';
        $Detalles='Profesor Asociado "C", T.C.
            <p>
                <blockquote>• Doctorado en Comunicaciones Opticas, DEPFI-UNAM.</blockquote>
                <blockquote>• Maestría en Ingeniería de Radio, Instituto Politécnico de Kiev, Ucrania.</blockquote>
                <blockquote>• Licenciatura en Ingeniería de Radio, Instituto Politécnico de Kiev, Ucrania.</blockquote>
            </p>
        ';
        $Body='
            <h1>Información adicional.</h1>
            <span class="NuTitle"><strong>Distinciones:</strong></span>
              <span class="NuParagraph"><p>
                    Cátedra Especial Angel Borja Osorno de la Facultad de Ingeniería de la UNAM, México, 2000.
                    Cátedra Patrimonial Nivel II del CONACYT, México, 1997-98. Diploma de Primer grado, Premio y medalla en la Exposición
                    de los Proyectos de Investigación, Ucrania, 1991. Dos premios por el cumplimiento de los Proyectos de Investigación
                    para la Industria, Ucrania, 1988-1989. Siete premios por la obtención de las patentes, Ucrania, 1983-1991.
                    </p><span class="NuTitle"><strong>Logros:</strong></span><p>
                    Preparación e impartición de los cursos de teoría y prácticas de laboratorio de las materias de
                    Comunicaciones Opticas y Fibras Opticas. Investigaciones realizadas sobre la Instrumentación láser y
                    de fibra óptica aplicadas en la industria y la medicina. Desarrollo de los métodos del cálculo y
                    simulación de cómputo de los sensores refractométricos de fibra óptica y la tecnología de su fabricación.
                    </p><span class="NuTitle"><strong>Fichas Bibliográficas:</strong></span><p>
                        <blockquote>• "A Prototype Fiber-Optic Discrete Level-Sensor", IEICE Trans. On Electron., 2000. Vol E 83-C. No, 3, pp 303-308.</blockquote>
                        <blockquote>• "Optoelectronic Multipiont Liquid-Level Sensor", SPIE Proc, 1999. Vol4148, pp. 262-268.</blockquote>
                        <blockquote>• "Primary Transdusers of Discrete Fiber -Optic", Measur. Technig., 1990. Vol 33, no. 7, pp. 30-32.</blockquote>
                        <blockquote>• "Problems and Prospects of Creating Discrete...", Measur. Technig., 1990. Vol 33, no. 6, pp. 576-579.</blockquote>
                        <blockquote>• "Evaluating the Performance of Multielement", Radioalectron & Commun. Systems, 1986. Vol 29, no.1, pp. 75-77.</blockquote>
                    </span></p>';
        break;
        case "18": //Juan Fernando Solórzano Palomares
        $Nombre='Juan Fernando Solórzano Palomares';
        $profeImg='solorzanofin.jpg';
        $Detalles='Prof. Asociado "B", Tiempo Completo.
            <p>
                <blockquote>• Maestría en Ingeniería Eléctrica, DEPFI-UNAM.</blockquote>
                <blockquote>• Especialización en Diseño y Planeación de Redes Telefónicas, JICA-Japón.</blockquote>
                <blockquote>• Licenciatura en Ing. Mecánico-Electricista, Facultad de Ingeniería, UNAM.</blockquote>
            </p>
        ';
        $Body='
            <h1>Información adicional.</h1>
            <span class="NuTitle"><strong>Distinciones:</strong></span>
              <span class="NuParagraph"><p>
                    Miembro del Colegio de Profesores de la DIE. Consejero Técnico de la Facultad de Ingeniería por parte de la DIE.
              </span></p>';
        break;
    default: //Miguel Moctezuma
        $Nombre='Miguel Moctezuma Flores';
        $profeImg='MiguelMoctezuma.jpg';
        $Detalles='Profesor de Carrera Titular "A", Tiempo Completo.
            <p>
                <blockquote>• Doctorado en Procesamiento de Señales e Imágenes, ENST, Paris, Francia.</blockquote>
                <blockquote>• Maestría en Procesamiento de Señales e Imágenes, ENST, Paris, Francia.</blockquote>
                <blockquote>• Maestría en Ingeniería Eléctrica, Fac. de Ingeniería, UNAM</blockquote>
                <blockquote>• Licenciatura en Ingeniería Mécanica-Eléctrica, Fac. de Ingeniería, UNAM</blockquote>
            </p>
        ';
        $Body='
            <h1>Información adicional.</h1>
            <span class="NuTitle"><strong>Distinciones:</strong></span>
              <span class="NuParagraph"><p>
                    SNI nivel candidato de 1996 a 2000. Evaluador en el proceso de selección de candidatos a Beca para estudios en el extranjero, CONACyT 1999-2001. Arbitro en el proceso de evaluación de Proyectos de Investigación Sometidos a CONACyT 1999-2001. Miembro del Comité Aspirantes a Beca de Lucent Global Scholars Program, Lucent Technologies 1999.
                    </p><span class="NuTitle"><strong>Logros:</strong></span><p>
                    Miembro del Comité Académico del Posgrado en Ciencias de la Computación de la UNAM, noviembre de 2000. Beca del Instituto Tecnológico de Teléfonos de México para profesores/investigadores del área de Telecomunicaciones. Período Septiembre 1996-Agosto 1999. Representante de la Facultad de Ingeniería ante el Comité Consultivo Nacional de Normalización de Telecomunicaciones, CCNNT- a partir de diciembre de 1998. Miembro del Comité de preparación del Examen General de Calidad Profesional del Ceneval, de la carrera de Ing. Eléctrica-Electrónica, a partir de agosto de 1997. Miebro del Comité Científico del "V Ibero-American Symposium on Pattern Recognition, SIARP", Lisbon 2000, september 11-13, 2000. Vice-Chair y miembro del Comité Técnico del "International Conference on Telecommunications, ICT-2000", Acapulco, 22-25 de mayo, 2000. Miembro del Comité Científico del "3er Simposio Iberoamericano de Reconocimiento de Patrones, SIARP"99", La Habana, Cuba, 22-26 de marzo de 1999.
                    </p><span class="NuTitle"><strong>Fichas Bibliográficas:</strong></span><p>
                    <blockquote>• M. Moctezuma, H. Maitre, F. Parmiggiani, "Sea-ice velocity fields estimation On Ross Sea
                    with NOAA-AVHRR", IEEE Transactions on Geoscience and Sensing, Vol. 33, No. 5, pp 1286-1289, sept. 1995</blockquote>
                    <blockquote>• Special issue on the 1994 International Geoscience and Remote Sensing Symposium, IGARSS 94.
                    X. Descombes, M. Moctezuma, H. Maitre, J-P Rudant, "Coastline detection by a Markovian segmentation on SAR
                    images", Signal Processing, (EURASIP- European Association for Singal Processing) 55, 1995, pp123-132.</blockquote>
             </span></p>';

}

$foto= GetImageName($profeImg);

function GetImageName($profeImg){
    $ImageName='<img src="';
    $ImageName=$ImageName.'http://telecom.fi-b.unam.mx/images/Profesores/'.$profeImg.'"';
    $ImageName=$ImageName.'/>';
    return $ImageName;

}
?>
