@extends('layouts.app')

@section('content')

<div class="container py-5">
    {{-- <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="form">
                <form action="" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Buscar" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-warning" type="button"><i class="fal fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div> --}}
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="section-title mb-3">
                <small><a href="{{route('home') }}">Ayuda</a> > Terminos y condiciones</small>
                <h4 class="mt-1">Términos de <span>servicio</span></h4>
                <i><small class="text-muted">Última actualización: 23 Marzo 2022</small></i>

                <p>Bienvenido a mibagi.com. Mibagi Inc. y/o sus filiales ("Mibagi") le ofrecen funciones de sitio web y otros productos y servicios cuando visita o compra en mibagi.com, utiliza productos o Servicios de mibagi, utiliza aplicaciones mibagi para dispositivos móviles o utiliza software proporcionado por mibagi en relación con alguna de las opciones mencionadas (de manera colectiva, "Servicios de mibagi"). mibagi le proporciona los Servicios de mibagi sujeto a las condiciones siguientes.</p>

                <hr>
                <h6>Al utilizar los Servicios de MIBAGI, usted acepta estas condiciones. Léalas detenidamente.</h6>

                <div id="lipsum">
                    
                    <p>El presente contrato describe los términos y condiciones aplicables al uso del contenido, productos y/o servicios del sitio web MIBAGI.COM del cual es titular la empresa Constanza & Asociados SA de CV. Para hacer uso del contenido, productos y/o servicios del sitio web el usuario deberá sujetarse a los presentes términos y condiciones.</p>
                    <br>
                    <h6>I. OBJETO</h6>
                    <p>El objeto es regular el acceso y utilización del contenido, productos y/o servicios a disposición del público en general en el dominio https://www.mibagi.com.</p>
                    <p>
                        El titular se reserva el derecho de realizar cualquier tipo de modificación en el sitio web en cualquier momento y sin previo aviso, el usuario acepta dichas modificaciones.
                    </p>
                    <p>
                        El acceso al sitio web por parte del usuario es libre y gratuito, la utilización del contenido, productos y/o servicios implica un costo de suscripción para el usuario.
                    </p>
                    <p>
                        El sitio web solo admite el acceso a personas mayores de edad y no se hace responsable por el incumplimiento de esto.
                    </p>
                    <p>
                        El sitio web está dirigido a usuarios residentes en El Salvador y cumple con la legislación establecida en dicho país, si el usuario reside en otro país y decide acceder al sitio web lo hará bajo su responsabilidad.
                        La administración del sitio web puede ejercerse por terceros, es decir, personas distintas al titular, sin afectar esto los presentes términos y condiciones.
                    </p>
                    <br>
                    <h6>II. USUARIO</h6>
                    <p>La actividad del usuario en el sitio web como publicaciones o comentarios estarán sujetos a los presentes términos y condiciones. El usuario se compromete a utilizar el contenido, productos y/o servicios de forma lícita, sin faltar a la moral o al orden público, absteniéndose de realizar cualquier acto que afecte los derechos de terceros o el funcionamiento del sitio web.</p>
                    <p>El usuario se compromete a proporcionar información verídica en los formularios del sitio web.</p>
                    <p>El acceso al sitio web no supone una relación entre el usuario y el titular del sitio web.</p>
                    <p>El usuario manifiesta ser mayor de edad y contar con la capacidad jurídica de acatar los presentes términos y condiciones.</p>
                    <br>
                    <h6>III. ACCESO Y NAVEGACIÓN EN EL SITIO WEB</h6>
                    <p>El titular no garantiza la continuidad y disponibilidad del contenido, productos y/o servicios en el sitio web, realizará acciones que fomenten el buen funcionamiento de dicho sitio web sin responsabilidad alguna.</p>
                    <p>El titular no se responsabiliza de que el software esté libre de errores que puedan causar un daño al software y/o hardware del equipo del cual el usuario accede al sitio web. De igual forma, no se responsabiliza por los daños causados por el acceso y/o utilización del sitio web.</p>
                    <br>
                    <h6>IV. POLÍTICA DE PRIVACIDAD Y PROTECCIÓN DE DATOS</h6>
                    <p>Conforme a lo establecido en la Ley Federal de Protección de Datos Personales en Posesión de Particulares, el titular se compromete a tomar las medidas necesarias que garanticen la seguridad del usuario, evitando que se haga uso indebido de los datos personales que el usuario proporcione en el sitio web.</p>
                    <p>El titular corroborará que los datos personales contenidos en las bases de datos sean correctos, verídicos y actuales, así como que se utilicen únicamente con el fin con el que fueron recabados.</p>
                    <p>El uso de datos personales se limitará a lo previsto en el Aviso de Privacidad disponible en https://www.mibagi.com/aviso-de-privacidad.</p>
                    <p>MIBAGI se reserva el derecho de realizar cualquier tipo de modificación en el Aviso de Privacidad en cualquier momento y sin previo aviso, de acuerdo con sus necesidades o cambios en la legislación aplicable, el usuario acepta dichas modificaciones.</p>
                    <p>El sitio web implica la utilización de cookies que son pequeñas cantidades de información que se almacenan en el navegador utilizado por el usuario como datos de ingreso, preferencias del usuario, fecha y hora en que se accede al sitio web, sitios visitados y dirección IP, esta información es anónima y sólo se utilizará para mejorar el sitio web. Los cookies facilitan la navegación y la hacen más amigable, sin embargo, el usuario puede desactivarlos en cualquier momento desde su navegador en el entendido de que esto puede afectar algunas funciones del sitio web.</p>
                    <br>
                    <h6>V. POLÍTICA DE ENLACES</h6>
                    <p>El sitio web puede contener enlaces a otros sitios de internet pertenecientes a terceros de los cuales no se hace responsable.</p>
                    <br>
                    <h6>VI. POLÍTICA DE PROPIEDAD INTELECTUAL E INDUSTRIAL</h6>
                    <p>El titular manifiesta tener los derechos de propiedad intelectual e industrial del sitio web incluyendo imágenes, archivos de audio o video, logotipos, marcas, colores, estructuras, tipografías, diseños y demás elementos que lo distinguen, protegidos por la legislación salvadoreña e internacional en materia de propiedad intelectual e industrial.</p>
                    <p>El usuario se compromete a respetar los derechos de propiedad industrial e intelectual del titular pudiendo visualizar los elementos del sitio web, almacenarlos, copiarlos e imprimirlos exclusivamente para uso personal.</p>
                    <br>
                    <h6>VII. LEGISLACIÓN Y JURISDICCIÓN APLICABLE</h6>
                    <p>
                        La relación entre el usuario y el titular se regirá por las legislaciones aplicables en El Salvador.
                        MIBAGI no se responsabiliza por la indebida utilización del contenido, productos y/o servicios del sitio web y del incumplimiento de los presentes términos y condiciones.
                    </p>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
