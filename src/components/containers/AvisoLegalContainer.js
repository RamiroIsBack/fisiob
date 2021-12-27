import React, { Component } from "react";
import { connect } from "react-redux";
import { Container } from "reactstrap";

class AvisoLegalContainer extends Component {
  avisoLegalDatos(){
    return(
    <div>
      <b>1. Datos identificativos:</b>
      <p>- Denominación social: JAVIER BUENDIA CAPELLA</p>
      <p>- Domicilio social: CALLE ARTISTAS N57 28020 MADRID</p>
      <p>- CIF: 51450520A</p>
      <p>- Dirección de correo electrónico: INFO@FISIOTERAPIABUENDIA.COM</p>
    </div>);
  };
  avisoLegalDefiniciones(){
    return(
    <div>
      <b>2. Definiciones:</b>
      <p>- “Página”, dominio www.fisioterapiabuendia.com que se pone a disposición de los Usuarios de Internet.</p>
      <p>- “Usuario”, persona física o jurídica que utiliza o navega por la Página.</p>
      <p>- “Contenido”, son las páginas que conforman la totalidad del dominio www.fisioterapiabuendia.com, las cuales conforman la información y los servicios que JAVIER BUENDIA CAPELLA pone a disposición de los Usuarios de Internet. En ellas se contienen los mensajes, textos, fotografías, gráficos, iconos, logos, tecnología, links, texturas, dibujos, archivos de sonido y/o imagen, grabaciones, software, aspecto, diseño gráfico y códigos fuente y, en general, cualquier clase de material contenido en
    la Página.</p>
      <p>- “Web”, palabra técnica que describe el sistema de acceso a la información vía Internet, que se configura por medio de páginas confeccionadas con lenguaje HTML o similar, y mecanismos de programación tales como java, javascript, PHP, u otros, etc. En estas
    páginas diseñadas y publicadas bajo un nombre de dominio Internet son el resultado de la información que el titular pone a disposición de los Usuarios de Internet.
    </p>
      <p>- “Hiperenlace”, técnica por la cual un Usuario puede navegar por diferentes páginas de la Web, o por Internet, con un simple click sobre el texto, icono, botón o indicativo que contiene el enlace.
      </p>
      <p>- “Cookies”, medio técnico para la “trazabilidad” y seguimiento de la navegación en los sitios Web. Son pequeños ficheros de texto que se escriben en el ordenador del Usuario. Este método tiene implicaciones sobre la privacidad, por lo que JAVIER BUENDIA CAPELLA avisará oportuna y fehacientemente de su utilización en el momento en que se implanten en la Página.
    </p>
    </div>)
    };

    AvisoLegalUsuarios(){
    return(
      <div>
        <b>3. Usuarios / Condiciones de uso:</b>
        <p>
    El acceso y/o uso de este sitio web de www.fisioterapiabuendia.com atribuye la condición de USUARIO, que acepta, desde dicho acceso y/o uso, los presentes términos de uso, sin reservas de todas y cada una de las cláusulas y condiciones generales incluidas en el Aviso Legal. Si el Usuario no estuviera conforme con las cláusulas y condiciones de uso de este Aviso Legal, se abstendrá de utilizar la Página.
        </p>
      </div>)
    }

    AvisoLegalUso(){
      return(
      <div>
      <b>4. Uso del sitio web</b>
      <p>
      www.fisioterapiabuendia.com proporciona el acceso a artículos, informaciones y datos (en adelante, “LOS CONTENIDOS”) propiedad de JAVIER BUENDIA CAPELLA . El USUARIO asume la responsabilidad del uso de la web.
      </p>
      <p>
      Algunas páginas del sitio Web (www.fisioterapiabuendia.com) pueden permitir laparticipación mediante comentarios, pudiendo en tal caso cualquier usuario enviar textos a través del formulario establecido a tal efecto. Al enviar dichos textos, haciendo clic en el
    enlace correspondiente, El USUARIO se compromete y acepta, a hacer un uso adecuado de los contenidos que www.fisioterapiabuendia.com ofrece a través de su web, a no emplearlos para:
      </p>
      <p>(i) incurrir en actividades ilícitas, ilegales o contrarias a la buena fe y al orden público.</p>
      <p>(ii) difundir contenidos o propaganda de carácter racista, xenófobo, pornográfico-ilegal, de apología del terrorismo o atentatorio contra los derechos humanos.</p>
      <p>(iii) provocar daños en los sistemas físicos y lógicos de www.fisioterapiabuendia.com, de sus proveedores o de terceras personas, introducir o difundir en la red virus informáticos o cualesquiera otros sistemas físicos o lógicos que sean susceptibles de provocar los daños anteriormente mencionados.</p>
      <p>(iv) intentar acceder y, en su caso, utilizar las cuentas de correo electrónico de otros usuarios y modificar o manipular sus mensajes.</p>
      <p>(v) En definitiva, a respetar la legislación aplicable, la moral y buenas costumbres generalmente aceptadas, el orden público y las presentes condiciones generales de acceso y utilización.</p>
      <p>A tal efecto, EL USUARIO se obliga y compromete a NO utilizar cualquiera de los Contenidos con fines o efectos ilícitos, prohibidos en el Aviso Legal o por la legislación vigente, lesivos de
    los derechos e intereses de terceros, o que de cualquier forma puedan dañar, inutilizar, sobrecargar, deteriorar o impedir la normal utilización de los Contenidos, los equipos informáticos o los documentos, archivos y toda clase de contenidos almacenados en cualquier
    equipo informático propios o contratados por JAVIER BUENDIA CAPELLA , de otros Usuarios o de cualquier usuario de Internet (hardware y software).</p>
    <p>EL USUARIO se obliga y se compromete a no transmitir, difundir o poner a disposición de terceros cualquier clase de material contenido en la Página, tales como informaciones, textos, datos, contenidos, mensajes, gráficos, dibujos, archivos de sonido y/o imagen, fotografías,
    grabaciones, software, logotipos, marcas, iconos, tecnología, fotografías, software, enlaces, diseño gráfico y códigos fuente, o cualquier otro material al que tuviera acceso en su condición de Usuario de la Página, sin que esta enumeración tenga carácter limitativo.</p>
    <p>Asimismo, de conformidad con todo ello, EL USUARIO no podrá:</p>
    <p>- Reproducir, copiar, distribuir, poner a disposición o de cualquier otra forma comunicar públicamente, transformar o modificar los Contenidos, a menos que se cuente con la autorización escrita y explícita de JAVIER BUENDIA CAPELLA , que es titular de los correspondientes derechos, o bien que ello resulte legalmente permitido.</p>
    <p>- Suprimir, manipular o de cualquier forma alterar el &quot;copyright&quot; y demás datos identificativos de la reserva de derechos de JAVIER BUENDIA CAPELLA o de sus titulares, de las huellas y/o identificadores digitales, o de cualesquiera otros medios técnicos establecidos para su reconocimiento.</p>
    <p>- El Usuario deberá abstenerse de obtener e incluso de intentar obtener los Contenidos empleando para ello medios o procedimientos distintos de los que, según los casos, se hayan puesto a su disposición a este efecto o se hayan indicado a este efecto en las páginas Web donde se encuentren los Contenidos o, en general, de los que se empleen
    habitualmente en Internet a este efecto siempre que no entrañen un riesgo de daño o inutilización de la Página, y/o de los Contenidos.</p>
    <p>Del mismo modo, El USUARIO reconoce:</p>
    <p>- Que JAVIER BUENDIA CAPELLA no responderá de forma alguna por las opiniones vertidas por los usuarios, que participan bajo su única y exclusiva responsabilidad.</p>
    <p>- Que los comentarios de los usuarios no representan las opiniones de JAVIER BUENDIA CAPELLA , de sus socios o de sus empleados.</p>
    <p>- Que JAVIER BUENDIA CAPELLA no garantiza, en ningún caso, la publicación de los contenidos enviados por los usuarios. En tal sentido, todos los comentarios recibidos serán revisados automáticamente por un filtro antispam y moderados, en cuanto a su
    forma, por un administrador del sitio Web, que actuará en todo caso respetando las libertades democráticas de expresión e información.</p>
    <p>Asimismo, JAVIER BUENDIA CAPELLA se reserva el derecho de retirar todos aquellos comentarios y aportaciones que vulneren el respeto a la dignidad de la persona, que sean discriminatorios, xenófobos, racistas, pornográficos, que atenten contra la juventud o la infancia, el orden o la seguridad pública o que, a su juicio, no resultaran adecuados para su
    publicación. En cualquier caso, www.fisioterapiabuendia.com no será responsable de las opiniones vertidas por los usuarios a través del blog u otras herramientas de participación que puedan crearse, conforme a lo previsto en la normativa de aplicación.</p>
    </div>)
    }

    AvisoLegalPrivacidad(){
      return(
        <div>
          <b>5. Política de privacidad. Protección de Datos:</b>
          <p>
          JAVIER BUENDIA CAPELLA es consciente de la importancia de la protección de datos, así como de la privacidad de EL USUARIO y por ello, ha implementado una política de tratamiento de
    datos orientada a proveer la máxima seguridad en el uso y recogida de los mismos, garantizando el cumplimiento de la normativa vigente en la materia y configurando dicha política como uno de los pilares básicos en las líneas de actuación de la entidad. Por ello, JAVIER BUENDIA CAPELLA insiste en la lectura obligada de su “Política de Privacidad”.
          </p>
        </div>)
      }

      AvisoLegalHiperenlaces(){
        return(
          <div>
            <b>6. Hiperenlaces</b>
            <p>
            Como un servicio a nuestros visitantes, nuestro sitio web puede incluir hipervínculos a otros sitios que no son operados o controlados por JAVIER BUENDIA CAPELLA . Por ello, JAVIER BUENDIA CAPELLA no garantiza, ni se hace responsable de la licitud, fiabilidad, utilidad, veracidad y actualidad de los contenidos de tales sitios web o de sus prácticas de privacidad. Por favor, antes de proporcionar su información personal a estos sitios web ajenos a www.fisioterapiabuendia.com, tenga en cuenta que sus prácticas de privacidad pueden diferir de las nuestras. Asimismo, aquellas personas que se propongan establecer hiperenlaces entre su página Web y la nuestra (www.fisioterapiabuendia.com) deberán observar y cumplir las condiciones siguientes:
            </p>
            <p>- No será necesaria autorización previa cuando el Hiperenlace permita únicamente el acceso a la página de inicio, pero no podrá reproducirla de ninguna forma. Cualquier otra forma de Hiperenlace requerirá la autorización expresa e inequívoca por escrito por parte de JAVIER BUENDIA CAPELLA .</p>
            <p>- No se crearán “marcos” (“frames”) con las páginas Web ni sobre las páginas Web de JAVIER BUENDIA CAPELLA .</p>
            <p>- No se realizarán manifestaciones o indicaciones falsas, inexactas, u ofensivas sobre JAVIER BUENDIA CAPELLA sus directivos, sus empleados o colaboradores, o de las personas que se relacionen en la Página por cualquier motivo, o de los Usuarios de las Página, o de los Contenidos suministrados.</p>
            <p>- No se declarará ni se dará a entender que JAVIER BUENDIA CAPELLA ha autorizado el Hiperenlace o que ha supervisado o asumido de cualquier forma los Contenidos ofrecidos o puestos a disposición de la página Web en la que se establece el Hiperenlace.</p>
            <p> - La página Web en la que se establezca el Hiperenlace solo podrá contener lo estrictamente necesario para identificar el destino del Hiperenlace.</p>
            <p> 
            - La página Web en la que se establezca el Hiperenlace no contendrá
            informaciones o contenidos ilícitos, contrarios a la moral y a las buenas costumbres generalmente aceptadas y al orden público, así como tampoco contendrá contenidos contrarios a cualesquiera derechos de terceros.
            </p>
          </div>)
        }
        AvisoLegalModificacion(){
          return(
            <div>
              <b>7. Modificación del Aviso Legal:</b>
              <p>
              Con el fin de mejorar las prestaciones del sitio Web, JAVIER BUENDIA CAPELLA se reserva la facultad de efectuar, en cualquier momento y sin necesidad de previo aviso, modificaciones y actualizaciones de la información contenida en el sitio Web, de la configuración y diseño de éste y del presente aviso legal, así como de cualesquiera otras condiciones particulares. Por tanto, EL USUARIO debe leer el Aviso Legal en todas y cada una de las ocasiones en que acceda a la Página.
              </p>
            </div>)
          }
          AvisoLegalIntelectual(){
            return(
              <div>
                <b>8. Propiedad intelectual / industrial:</b>
                <p>
                JAVIER BUENDIA CAPELLA es titular de todos los derechos de propiedad intelectual e industrial de su página web, así como de los elementos contenidos en la misma (a título enunciativo, imágenes, sonido, audio, vídeo, software o textos; marcas o logotipos, combinaciones de colores, estructura y diseño, selección de materiales usados, programas de ordenador necesarios para su funcionamiento, acceso y uso, etc.), titularidad de JAVIER BUENDIA CAPELLA o bien de sus licenciantes, estando todos los derechos reservados. Cualquier uso no autorizado previamente por JAVIER BUENDIA CAPELLA , será considerado un incumplimiento grave de los derechos de propiedad intelectual o industrial del autor. El USUARIO se compromete a respetar los derechos de Propiedad Intelectual e Industrial titularidad de JAVIER BUENDIA CAPELLA . Podrá visualizar los elementos de la web e incluso imprimirlos, copiarlos y almacenarlos en el disco duro de su ordenador o en cualquier otro soporte físico siempre y cuando sea, única y exclusivamente, para su uso personal y privado. El USUARIO deberá abstenerse de suprimir, alterar, eludir o manipular cualquier dispositivo de protección o sistema de seguridad que estuviera instalado en las páginas de JAVIER BUENDIA CAPELLA.
                </p> 
                <p>Todas las marcas, nombres comerciales o signos distintivos de cualquier clase que aparecen en la Página son propiedad de JAVIER BUENDIA CAPELLA o, en su caso, de terceros que han autorizado su uso, sin que pueda entenderse que el uso o acceso al Portal y/o a los Contenidos atribuya al Usuario derecho alguno sobre las citadas marcas, nombres comerciales y/o signos distintivos, y sin que puedan entenderse cedidos al Usuario, ninguno de los derechos de explotación que existen o puedan existir sobre dichos Contenidos.
                </p>
                <p> De igual modo los Contenidos son propiedad intelectual de JAVIER BUENDIA CAPELLA , o de terceros en su caso, por tanto, los derechos de Propiedad Intelectual son titularidad de JAVIER BUENDIA CAPELLA o de terceros que han autorizado su uso, a quienes corresponde el ejercicio exclusivo de los derechos de explotación de los mismos en cualquier forma y, en especial, los derechos de reproducción, distribución, comunicación pública y transformación. Quedan expresamente prohibidas la reproducción, la distribución y la comunicación pública, incluida su modalidad de puesta a disposición, de la totalidad o parte de los contenidos de esta página web, con fines comerciales, en cualquier soporte y por cualquier medio técnico, sin la autorización de JAVIER BUENDIA CAPELLA . La utilización no autorizada de la información contenida en esta Web, así como la lesión de los derechos de Propiedad Intelectual o Industrial de JAVIER BUENDIA CAPELLA o de terceros incluidos en la Página que hayan cedido contenidos dará lugar a las responsabilidades legalmente establecidas.
                </p>
              </div>)
            }
            AvisoLegalCookies(){
              return(
                <div>
                  <b>9. Cookies:</b>
                  <p>
                  Las cookies son el medio técnico para la “trazabilidad” y seguimiento de la navegación en los Sitios Web. Son pequeños ficheros de texto que se escriben en el ordenador del Usuario. Este método tiene implicaciones sobre la privacidad, por lo que JAVIER BUENDIA CAPELLA informa de que podrá utilizar cookies con la finalidad de elaborar estadísticas de utilización del sitio web así como para identificar el PC del Usuario permitiendo reconocerle en sus próximas visitas. En todo caso, el usuario puede configurar su navegador para no permitir el uso de cookies en sus visitas al web site. JAVIER BUENDIA CAPELLA es consciente de la importancia de la protección de datos, así como de la privacidad de EL USUARIO y por ello, insiste en la lectura de la “Política de Cookies” de nuestra página web.
                  </p>
                </div>)
              }
              AvisoLegalDisponibilidad(){
                return(
                  <div>
                    <b>10. Disponibilidad de la página:</b>
                    <p>
                    JAVIER BUENDIA CAPELLA no garantiza la inexistencia de interrupciones o errores en el acceso a la Página, a sus Contenidos, ni que éste se encuentren actualizados, aunque desarrollará sus mejores esfuerzos para, en su caso, evitarlos, subsanarlos o actualizarlos. Por consiguiente, JAVIER BUENDIA CAPELLA no se responsabiliza de los daños o perjuicios de cualquier tipo producidos en EL USUARIO que traigan causa de fallos o desconexiones en las redes de telecomunicaciones que produzcan la suspensión, cancelación o interrupción del servicio del Portal durante la prestación del mismo o con carácter previo. JAVIER BUENDIA CAPELLA excluye, con las excepciones contempladas en la legislación vigente, cualquier responsabilidad por los daños y perjuicios de toda naturaleza que puedan deberse a la falta de disponibilidad, continuidad o calidad del funcionamiento de la Página y de los Contenidos, al no cumplimiento de la expectativa de utilidad que los usuarios hubieren podido atribuir a la Página y a los Contenidos. La función de los Hiperenlaces que aparecen en esta Web es exclusivamente la de informar al usuario acerca de la existencia de otras Web que contienen información sobre la materia. Dichos Hiperenlaces no constituyen sugerencia ni recomendación alguna.</p>
                    
                    <p>JAVIER BUENDIA CAPELLA tampoco se hace responsable de los errores de seguridad que se puedan producir, ni de los daños que puedan causarse al sistema informático del usuario (hardware y software), o a los ficheros o documentos almacenados en el mismo, como consecuencia de: </p>
                    <p>- La presencia de un virus en el ordenador del usuario que sea utilizado para la conexión a los servicios y contenidos del sitio Web</p>
                    <p>- Un mal funcionamiento del navegador o el uso de versiones no actualizadas del mismo. </p>
                    <p>JAVIER BUENDIA CAPELLA no se hace responsable de los contenidos de dichas páginas enlazadas, del funcionamiento o utilidad de los Hiperenlaces ni del resultado de dichos enlaces, ni garantiza la ausencia de virus u otros elementos en los mismos que puedan producir alteraciones en el sistema informático (hardware y software), los documentos o los ficheros del usuario, excluyendo cualquier responsabilidad por los daños de cualquier clase causados al usuario por este motivo. El acceso a la Página no implica la obligación por parte de JAVIER BUENDIA CAPELLA de controlar la ausencia de virus, gusanos o cualquier otro elemento informático dañino.Corresponde al Usuario, en todo caso, la disponibilidad de herramientas adecuadas para la detección y desinfección de programas informáticos dañinos, por lo tanto, JAVIER BUENDIA CAPELLA no se hace responsable de los posibles errores de seguridad que se puedan producir durante la prestación del servicio de la Página, ni de los posibles daños que puedan causarse al sistema informático del usuario o de terceros (hardware y software), los ficheros o documentos almacenados en el mismo, como consecuencia de la presencia de virus en el ordenador del usuario utilizado para la conexión a los servicios y contenidos de la Web, de un mal funcionamiento del navegador o del uso de versiones no actualizadas del mismo.
                    </p>
                  </div>
                )
              }
              AvisoLegalCalidad(){
                return(
                  <div>
                    <b>11. Calidad de la Página:</b>
                    <p>
                    Dado el entorno dinámico y cambiante de la información y servicios que se suministran por medio de la Página, JAVIER BUENDIA CAPELLA realiza su mejor esfuerzo, pero no garantiza la completa veracidad, exactitud, fiabilidad, utilidad y/o actualidad de los Contenidos. La información contenida en las páginas que componen este Portal sólo tiene carácter informativo, consultivo, divulgativo y publicitario. En ningún caso ofrecen ni tienen carácter de compromiso vinculante o contractual. JAVIER BUENDIA CAPELLA excluye toda responsabilidad por las decisiones que EL USUARIO pueda tomar basado en esta información, así como por los posibles errores tipográficos que puedan contener los documentos y gráficos de la Página. La información está sometida a posibles cambios periódicos sin previo aviso de su contenido por ampliación, mejora, corrección o actualización de los Contenidos.
                    </p>
                  </div>)
                }
                AvisoLegalContenidos(){
                  return(
                    <div>
                      <b>12. Disponibilidad de los Contenidos:</b>
                      <p>
                      La prestación del servicio de la Página y de los Contenidos tiene, en principio, duración indefinida. JAVIER BUENDIA CAPELLA , no obstante, queda autorizada para dar por terminada o suspender la prestación del servicio de la Página y/o de cualquiera de los Contenidos en cualquier momento. Cuando ello sea razonablemente posible, JAVIER BUENDIA CAPELLA advertirá previamente la terminación o suspensión de la Página.
                      </p>
                    </div>)
                  }
                  AvisoLegalJurisdiccion(){
                    return(
                      <div>
                        <b>13. Jurisdicción:</b>
                        <p>
                        Para cuantas cuestiones se susciten sobre la interpretación, aplicación y cumplimiento de este Aviso Legal, así como de las reclamaciones que puedan derivarse de su uso, todas las partes intervinientes se someten a los Jueces y Tribunales de Madrid renunciando de forma expresa a cualquier otro fuero que pudiera corresponderles.
                        </p>
                      </div>)
                    }
                    AvisoLegallegislacion(){
                      return(
                        <div>
                          <b>14. Legislación aplicable:</b>
                          <p>
                          Las presentes condiciones se rigen por la legislación española. Reservados todos los derechos de autor por las leyes y tratados internacionales de propiedad intelectual. Queda expresamente prohibida su copia, reproducción o difusión, total o parcial, por cualquier medio.
                          </p>
                        </div>)
                      }


  render() {
    
    var avisoLegalIntro = `En cumplimiento con el deber de información estipulado en artículo 10 de la Ley 34/2002, de
    11 de julio, de Servicios de la Sociedad de la Información y del Comercio Electrónico, JAVIER
    BUENDIA CAPELLA en calidad de titular del sitio web wwwww, hace constar:`
    let avisolegalBody= `La presente información conforma y regula las condiciones de uso, las limitaciones de responsabilidad y las obligaciones que, los usuarios de la página Web que se publica bajo el nombre de dominio wwwww, asumen y se comprometen a respetar.`
    
    var politicaDePrivacidad = `




VII. AUTORIDAD DE CONTROL
Desde BUENCAP FISIOGESTION S.L. ponemos el máximo empeño para cumplir con la
normativa de protección de datos dado que es el activo más valioso para nosotros. No
obstante, le informamos que en caso de que usted entienda que sus derechos se han visto
menoscabados, puede presentar una reclamación ante la Agencia Española de Protección
de Datos (AEPD), sita en C/ Jorge Juan, 6. 28001 – Madrid. Más información sobre la AEPD.
http://www.agpd.es/`;

    return (
      <Container>
        <p>
          {avisoLegalIntro}
        </p>
        {this.avisoLegalDatos()}
        <p>
          {avisolegalBody}
        </p>
        {this.avisoLegalDefiniciones()}
        {this.AvisoLegalUsuarios()}
        {this.AvisoLegalUso()}
        {this.AvisoLegalPrivacidad()}
        {this.AvisoLegalHiperenlaces()}
        {this.AvisoLegalModificacion()}
        {this.AvisoLegalIntelectual()}
        {this.AvisoLegalCookies()}
        {this.AvisoLegalDisponibilidad()}
        {this.AvisoLegalCalidad()}
        {this.AvisoLegalContenidos()}
        {this.AvisoLegalJurisdiccion()}
        {this.AvisoLegallegislacion()}

        <h2>Política de Privacidad</h2>
        <p>
        De conformidad con lo establecido en la legislación vigente sobre protección de datos, el Reglamento (UE) 2016/679, del Parlamento Europeo y del Consejo, de 27 de abril de 2016, relativo a la protección de las personas físicas en lo que respecto al tratamiento de datos personales y a la libre circulación de estos datos (en adelante, RGPD), así como en la Ley Orgánica 3/2018, de 5 de diciembre, de Protección de Datos y garantía de los derechos digitales (en adelante, LOPD-GDD), se informa al usuario de conformidad con lo establecido en los artículos 13 del RGPD y 11 de la LOPD-GDD:
        </p>
        <b>¿Quién es el responsable de tratamiento de sus datos?</b>
        <p>- Razón social: JAVIER BUENDÍA CAPELLÁ</p>
        <p>- CIF: 51450520-A</p>
        <p>- Domicilio: C/ Artistas 57. 28020. Madrid</p>
        <p>- Teléfono: 915349476</p>
        <p>- Correo electrónico: info@fisioterapiabuendia.com</p>
        <b>¿Con que finalidad trataremos sus datos personales?</b>
        <p>En BUENCAP FISIOGESTION S.L. trataremos su información para:</p>
        <p>1. Mantenimiento de la relación mercantil y prestación del servicio contratado.</p>
        <p>2. Prestación asistencial, sanitaria o que incluya el tratamiento de datos de salud para la prestación de los servicios contratados.</p>
        <p>3. Realización de un presupuesto ajustado a sus necesidades.
        </p>
        <p>4. Gestionar comunicaciones por correo electrónico con interesados.
        </p>
        <p>5. Llevar a cabo los procesos de selección de la sociedad.
        </p>
        <p>6. Gestión de los empleados y recursos humanos de la sociedad.  
        </p>

        <b>¿Durante cuánto tiempo tendremos sus datos?</b>
        <p>
          Los datos personales que nos proporciones serán conservados mientras se mantenga la relación mercantil vigente. No obstante para tener la máxima transparencia con usted le indicamos que los cómputos generales con los que trabajamos son:
        </p>
        <p>- Contable, fiscal y laboral: seis (6) años.</p>
        <p>- Laboral: diez (10) años.</p>
        <p>- Sanitaria: cinco (5) años desde que se produzca el alta de cada proceso asistencial.</p>
        <p>- Procesos de selección: dos (2) años desde la entrega del curriculum vitae.</p>
        <p>No obstante pese a la existencia de estos plazos generales, le informamos que de forma periódica revisaremos nuestros sistemas para proceder a eliminar aquellos datos que no sean legalmente necesarios.</p>

        <b>¿Cuál es la legitimación para el tratamiento de sus datos?</b>
        <p>Según las finalidades de la recogida de nuestros datos, el tratamiento de sus datos es necesario:</p>
        <p>1. Gestionar la relación mercantil que ha suscrito y contratado con nosotros.
</p>
        <p>a. Ejecución de un contrato (habilitado por el artículo 6.1.b RGPD)</p>
        <p>b. Consentimiento del interesado (habitado por el artículo 6.1.a RGPD)</p>
        <p>2. Prestación asistencial o sanitaria.</p>
        <p>a. Consentimiento del interesado (habitado por el artículo 6.1.a RGPD)</p>
        <p>3. Realización de un presupuesto ajustado a sus necesidades.</p>
        <p>a. Ejecución de un contrato y/o relación precontractual (habilitado por el artículo
6.1.b RGPD)</p>
        <p>4. Gestionar comunicaciones por correo electrónico con interesados.</p>
        <p>a. Consentimiento del interesado (habitado por el artículo 6.1.a RGPD)</p>
        <p>b. Interés legítimo (habilitado por el artículo 6.1.f RGPD)</p>
        <p>5. Llevar a cabo los procesos de selección de la sociedad.</p>
        <p>a. Consentimiento del interesado (habitado por el artículo 6.1.a RGPD)</p>
        <p>6. Gestión de los empleados y recursos humanos internos de la sociedad</p>
        <p>a. Ejecución contractual (habilitado por el artículo 6.1.b RGPD)</p>
        <p>Asimismo, todos los datos recogidos son necesarios para la prestación del servicio. No obstante, aquellos datos que estén marcados con un asterisco (*) serán obligatorios. En el caso de que los datos obligatorios no fueran facilitados [RAZÓN SOCIAL] no podrá prestarle el servicio contratado.</p>

        <b>¿Qué derechos tengo en materia de protección de datos?</b>
        <p>Conforme a lo establecido en los artículos 13 RGPD y 11.2.c) LOPDGDD, puede ejercitar cualquiera de los siguientes derechos comunicándonoslo a la dirección postal [DIRECCIÓN] o a la dirección electrónica [EMAIL DEL RESPONSABLE DE PROTECCIÓN DE DATOS]. En todo caso, según la normativa vigente tiene reconocidos los siguientes derechos de acuerdo a lo contenido en los artículo 15 a 22 RGPD y 12 a 18 LOPDGDD:</p>
        <p>- Derecho a solicitar el acceso a los datos personales relativos al interesado.</p>
        <p>- Derecho a solicitar su rectificación o supresión.</p>
        <p>- Derecho a solicitar la limitación del tratamiento.</p>
        <p>- Derecho a oponerse al tratamiento.</p>
        <p>- Derecho a la portabilidad.</p>
        <p>Podrá hacer uso de los siguientes formularios para poder ejercitar sus derechos de una manera más fácil. Puede descargarlos pulsando aquí. [ADJUNTAR FORMULARIOS. VÉASE DOCUMENTO NÚMERO 12: DERECHO DE LOS INTERESADOS].</p>
        <p>Adicionalmente, puede presentar una reclamación ante la Agencia Española de Protección de Datos (AEPD). Más información en el Apartado VII del presente documento.</p>

        <b>¿A qué destinatarios se comunicarán sus datos?
        </b>
        <p>Sus datos no serán comunicados a terceras empresas. Asimismo, le informamos que sus datos no se transferirán internacionalmente a ningún tercer país.</p>

        <b>¿Cómo hemos obtenido sus datos?</b>
        <p>Los datos de carácter personal que utiliza [RAZÓN SOCIAL] proceden del propio interesado, dando así cumplimiento a lo establecido en los artículos 13 RGPD y 11 LOPDGDD ya mencionados.
        </p>

        <b>¿Qué categorías de datos manejamos?</b>
        <p>Las categorías de datos de carácter personal que se tratan:</p>
        <p>- Datos de identificación, Nombre, Apellidos,DNI / NIE / Pasaporte o documento equivalente, Direcciones postales, Direcciones electrónicas, Sexo, Fecha de nacimiento, Lugar de nacimiento,Teléfono de contacto (móvil / fijo)</p>
        <p>- Información comercial</p>
        <p>- Datos económicos, Número de cuenta bancaria, Número de tarjeta de crédito </p>
        <p>- Curriculum vitae, Datos académicos, Titulaciones, Aficiones, Pertenencia a asociaciones o clubes</p>
        <p>- Datos sensibles, Datos relativos a la salud</p>
        <p>En base a la prestación asistencial y/o médica prestada por BUENCAP FISIOGESTION S.L., se tratan datos especialmente protegidos siempre bajo el consentimiento explícito del interesado. Los datos recogidos son únicamente los derivados del servicio contratado y/o prestado al usuario.</p>
        <b>AUTORIDAD DE CONTROL</b>
        <p>Desde BUENCAP FISIOGESTION S.L. ponemos el máximo empeño para cumplir con la normativa de protección de datos dado que es el activo más valioso para nosotros. No obstante, le informamos que en caso de que usted entienda que sus derechos se han visto menoscabados, puede presentar una reclamación ante la Agencia Española de Protección de Datos (AEPD), sita en C/ Jorge Juan, 6. 28001 – Madrid. Más información sobre la AEPD. http://www.agpd.es/
        </p>

      </Container>
    );
  }
}
const stateToProps = ({ copy, navigation }) => {
  return {
    navigation,
    copy
  };
};

export default connect(
  stateToProps,
  null
)(AvisoLegalContainer);
