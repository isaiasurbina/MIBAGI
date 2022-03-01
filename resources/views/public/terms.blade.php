@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
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
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="section-title mb-3">
                <small><a href="{{route('home') }}">Ayuda</a> > Terminos y condiciones</small>
                <h4 class="mt-1">Términos de <span>servicio</span></h4>
                <i><small class="text-muted">Última actualización: 01 Noviembre 2020</small></i>

                <p>Bienvenido a mibagi.com. Mibagi Inc. y/o sus filiales ("Mibagi") le ofrecen funciones de sitio web y otros productos y servicios cuando visita o compra en mibagi.com, utiliza productos o Servicios de mibagi, utiliza aplicaciones mibagi para dispositivos móviles o utiliza software proporcionado por mibagi en relación con alguna de las opciones mencionadas (de manera colectiva, "Servicios de mibagi"). mibagi le proporciona los Servicios de mibagi sujeto a las condiciones siguientes.</p>

                <hr>
                <h6>Al utilizar los Servicios de MIBAGI, usted acepta estas condiciones. Léalas detenidamente.</h6>

                <div id="lipsum">
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin orci lectus, mollis nec risus et, vulputate consectetur diam. Aenean tristique magna quis est consequat sollicitudin. Proin laoreet nibh quis odio ultrices, vitae condimentum leo egestas. Nullam eget efficitur ipsum, nec lobortis nibh. Nulla sed interdum elit, vitae sagittis tellus. Etiam molestie sapien fringilla diam ultricies aliquet. Mauris tortor leo, mattis nec viverra dapibus, ultricies in ex. Nam dui dui, auctor eu molestie ut, elementum ut ligula. Sed lacinia vitae massa ac aliquam. Aliquam faucibus dolor ac erat ultricies tempus. In id ipsum ac sem vehicula maximus. Vestibulum id consectetur lorem. Duis tempor ultrices leo vel facilisis. Phasellus ante massa, posuere eu tincidunt sit amet, feugiat sed magna. Ut dui mi, lobortis eu maximus ut, porttitor in urna. Nullam vehicula lorem nec ex placerat, vitae eleifend turpis molestie.
                    </p>
                    <p>
                    Donec id est tincidunt, placerat mi sit amet, sodales neque. Morbi viverra condimentum interdum. Nullam quis rutrum sapien. Mauris venenatis eget urna ac rutrum. Etiam sed turpis augue. Nulla vel vulputate augue. Nam efficitur dui id lorem dignissim, in dictum quam efficitur. Etiam feugiat in metus eget porta.
                    </p>
                    <p>
                    Suspendisse potenti. Nullam ultricies commodo tortor. Nulla facilisi. Sed placerat gravida neque eget condimentum. Aenean rhoncus velit velit, vel scelerisque nunc pretium a. Mauris nunc nisi, pharetra aliquam dui vitae, luctus venenatis diam. Aenean non facilisis turpis. Fusce vestibulum egestas nibh, at cursus orci tempor id. Integer ac dapibus odio. Integer iaculis ipsum nec interdum tempor.
                    </p>
                    <p>
                    Donec finibus sed velit eget placerat. Sed sed mollis ex. Nullam sed tellus et ipsum interdum placerat et ut tortor. Aenean cursus at lorem quis suscipit. Nunc nec libero dui. Ut justo velit, fringilla sed suscipit facilisis, scelerisque eu lorem. Morbi facilisis nisl libero, at convallis nibh venenatis id. Sed eleifend iaculis mauris, vitae rhoncus turpis. Nunc ut nisl at est lobortis aliquet non vel quam. Suspendisse at mauris quis ligula pharetra elementum. Aliquam ut ex purus. Aenean quis felis fermentum, ultricies diam ac, pretium mi. Duis placerat arcu nec neque vestibulum, eget gravida dui molestie. Phasellus vehicula elit quis sapien commodo tincidunt.
                    </p>
                    <p>
                    Nam at turpis vel enim elementum faucibus. Sed magna lorem, sodales porttitor eleifend a, interdum in orci. Vestibulum malesuada turpis nunc, non viverra arcu aliquet eget. Vivamus euismod pulvinar rhoncus. Etiam finibus magna quis consectetur mattis. Integer tortor odio, posuere eu dictum eu, consequat ac erat. Ut cursus, ante id iaculis porta, turpis leo mollis mi, sit amet hendrerit lectus mi ut nisi. Aliquam erat volutpat. Quisque pellentesque, elit at tincidunt condimentum, diam nibh sollicitudin est, tincidunt vulputate ipsum odio a lacus. Aliquam sed accumsan mi.
                    </p></div>
            </div>
        </div>
    </div>
</div>
@endsection
