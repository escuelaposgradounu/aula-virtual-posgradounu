<div>
    <div class="page-header d-print-none animate__animated animate__fadeIn animate__faster">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        <ol class="breadcrumb breadcrumb-arrows
                        " aria-label="breadcrumbs">
                            <li class="breadcrumb-item">
                                <a href="{{ route('inicio') }}">Inicio</a>
                            </li>

                            @if (session('tipo_vista') === 'alumno')
                                <li class="breadcrumb-item">
                                    @if($this->modo_admin)
                                        <a href="{{ route('alumnos.cursos', encriptar($id_gestion_aula_usuario)) }}">Mis Cursos</a>
                                    @else
                                        <a href="{{ route('cursos') }}">Mis Cursos</a>
                                    @endif
                                </li>
                            @else
                                <li class="breadcrumb-item">
                                    @if($this->modo_admin)
                                        <a href="{{ route('docentes.carga-academica', encriptar($id_gestion_aula_usuario)) }}">Carga Académica</a>
                                    @else
                                        <a href="{{ route('carga-academica') }}">Carga Académica</a>
                                    @endif
                                </li>
                            @endif

                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="#">
                                    Detalle
                                </a>
                            </li>
                        </ol>
                    </div>
                    <h2 class="page-title text-uppercase">
                        {{ $nombre_curso }} - GRUPO "{{ $grupo_gestion_aula }}"
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        @if (session('tipo_vista') === 'alumno')
                            @if($this->modo_admin)
                                <a href="{{ route('alumnos.cursos')}}" class="btn btn-secondary d-none d-md-inline-block">
                            @else
                                <a href="{{ route('cursos')}}" class="btn btn-secondary d-none d-md-inline-block">
                            @endif
                        @else
                            @if($this->modo_admin)
                                <a href="{{ route('docentes.carga-academica')}}" class="btn btn-secondary d-none d-md-inline-block">
                            @else
                                <a href="{{ route('carga-academica') }}" class="btn btn-secondary d-none d-md-inline-block">
                            @endif
                        @endif
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M15 6l-6 6l6 6" />
                            </svg>
                            Regresar
                        </a>
                        <a href="" class="btn btn-secondary d-md-none btn-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M15 6l-6 6l6 6" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">

            @if($modo_admin)
                @livewire('components.info-alumnos-docentes', ['usuario' => $usuario])
            @endif

            <div class="row g-3">

                <div class="col-lg-8">
                    <div class="row g-3">
                        @if(session('tipo_vista') == 'alumno')
                            <div class="col-12" wire:init="load_orientaciones">
                                @if($cargando_orientaciones)
                                    <div class="card card-stacked placeholder-glow animate__animated animate__fadeIn animate__faster">
                                        <div class="card-header bg-teal-lt">
                                            <div class="placeholder col-5 bg-teal" style="height: 1.5rem; width: 217.16px;"></div>
                                        </div>
                                        <div class="card-body px-5">
                                            <div class="placeholder col-12"></div>
                                            <div class="placeholder col-10"></div>
                                            <div class="placeholder col-12"></div>
                                            <div class="placeholder col-11"></div>
                                            <div class="placeholder col-7"></div>
                                        </div>
                                    </div>
                                @else
                                    <div class="card card-stacked">
                                        <div class="card-header bg-teal-lt">
                                            <span class="text-teal me-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-license">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11" />
                                                    <path d="M9 7l4 0" />
                                                    <path d="M9 11l4 0" />
                                                </svg>
                                            </span>
                                            <h3 class="card-title fw-semibold">Orientaciones Generales</h3>
                                        </div>
                                        <div class="card-body px-5">
                                            @if($orientaciones_generales)
                                                <span style="text-align: justify;">
                                                    {{ $orientaciones_generales }}
                                                </span>
                                            @else
                                                <span class="text-muted" style="text-align: justify;">
                                                    Actualmente no hay orientaciones generales disponibles para este curso.
                                                    Por favor, revisa más tarde o consulta con el <strong>docente</strong>  del curso para más información.
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif

                        <div class="col-12">
                            <div class="card card-md card-stacked animate__animated animate__fadeIn animate__faster">
                                <div class="card-stamp card-stamp-lg">
                                    @if (session('tipo_vista') == 'docente')
                                        <div class="card-stamp-icon bg-orange">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-align-box-left-middle">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                                <path d="M9 15h-2" />
                                                <path d="M13 12h-6" />
                                                <path d="M11 9h-4" />
                                            </svg>
                                        </div>
                                    @else
                                        <div class="card-stamp-icon bg-teal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-vocabulary">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M10 19h-6a1 1 0 0 1 -1 -1v-14a1 1 0 0 1 1 -1h6a2 2 0 0 1 2 2a2 2 0 0 1 2 -2h6a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-6a2 2 0 0 0 -2 2a2 2 0 0 0 -2 -2z" />
                                                <path d="M12 5v16" />
                                                <path d="M7 7h1" />
                                                <path d="M7 11h1" />
                                                <path d="M16 7h1" />
                                                <path d="M16 11h1" />
                                                <path d="M16 15h1" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body d-flex justify-content-center">
                                    <div class="row g-3">
                                        <div class="col-6 col-md-2 col-lg-4 col-xl-3">
                                            <span class="hide-theme-dark">
                                                <div class="" wire:click="mostrar_silabus({{ $id_gestion_aula_usuario }})">
                                                    <div class="image-button {{ session('tipo_vista') == 'alumno' ? 'image-button-alumno' : 'image-button-docente'}}">
                                                        <img src="/media/icons/icon-libro-info.webp" alt="Info"
                                                            style="width: 80px; height: 80px;">
                                                        <div class="text-content text-center mt-3 fw-semibold fs-3">
                                                            Silabus
                                                        </div>
                                                    </div>
                                                </div>
                                            </span>
                                            <span class="hide-theme-light">
                                                <div class="dark-mode" wire:click="mostrar_silabus({{ $id_gestion_aula_usuario }})">
                                                    <div class="image-button {{ session('tipo_vista') == 'alumno' ? 'image-button-alumno' : 'image-button-docente'}}">
                                                        <img src="/media/icons/icon-libro-info.webp" alt="Info"
                                                            style="width: 80px; height: 80px;">
                                                        <div class="text-content text-center mt-3 fw-semibold fs-3">
                                                            Silabus
                                                        </div>
                                                    </div>
                                                </div>
                                            </span>
                                        </div>

                                        <div class="col-6 col-md-2 col-lg-4 col-xl-3">
                                            <span class="hide-theme-dark">
                                                <div class="" wire:click="mostrar_recursos({{ $id_gestion_aula_usuario }})">
                                                    <div class="image-button {{ session('tipo_vista') == 'alumno' ? 'image-button-alumno' : 'image-button-docente'}}">
                                                        <img src="/media/icons/icon-carpeta.webp" alt="Info"
                                                            style="width: 80px; height: 80px;">
                                                        <div class="text-content text-center mt-3 fw-semibold fs-3">
                                                            Recursos
                                                        </div>
                                                    </div>
                                                </div>
                                            </span>
                                            <span class="hide-theme-light">
                                                <div class="dark-mode" wire:click="mostrar_recursos({{ $id_gestion_aula_usuario }})">
                                                    <div class="image-button {{ session('tipo_vista') == 'alumno' ? 'image-button-alumno' : 'image-button-docente'}}">
                                                        <img src="/media/icons/icon-carpeta.webp" alt="Info"
                                                            style="width: 80px; height: 80px;">
                                                        <div class="text-content text-center mt-3 fw-semibold fs-3">
                                                            Recursos
                                                        </div>
                                                    </div>
                                                </div>
                                            </span>
                                        </div>

                                        <div class="col-6 col-md-2 col-lg-4 col-xl-3">
                                            <span class="hide-theme-dark">
                                                <div class="" wire:click="mostrar_foro({{ $id_gestion_aula_usuario }})">
                                                    <div class="image-button {{ session('tipo_vista') == 'alumno' ? 'image-button-alumno' : 'image-button-docente'}}">
                                                        <img src="/media/icons/icon-foro-discusion.webp"
                                                            alt="Info" style="width: 80px; height: 80px;">
                                                        <div class="text-content text-center mt-3 fw-semibold fs-3">
                                                            Foro
                                                        </div>
                                                    </div>
                                                </div>
                                            </span>
                                            <span class="hide-theme-light">
                                                <div class="dark-mode" wire:click="mostrar_foro({{ $id_gestion_aula_usuario }})">
                                                    <div class="image-button {{ session('tipo_vista') == 'alumno' ? 'image-button-alumno' : 'image-button-docente'}}">
                                                        <img src="/media/icons/icon-foro-discusion.webp"
                                                            alt="Info" style="width: 80px; height: 80px;">
                                                        <div class="text-content text-center mt-3 fw-semibold fs-3">
                                                            Foro
                                                        </div>
                                                    </div>
                                                </div>
                                            </span>
                                        </div>


                                        <div class="col-6 col-md-2 col-lg-4 col-xl-3">
                                            <span class="hide-theme-dark">
                                                <div class="" wire:click="mostrar_asistencia({{ $id_gestion_aula_usuario }})">
                                                    <div class="image-button {{ session('tipo_vista') == 'alumno' ? 'image-button-alumno' : 'image-button-docente'}}">
                                                        <img src="/media/icons/icon-matricula.webp" alt="Info"
                                                            style="width: 80px; height: 80px;">
                                                        <div class="text-content text-center mt-3 fw-semibold fs-3">
                                                            Asistencia
                                                        </div>
                                                    </div>
                                                </div>
                                            </span>
                                            <span class="hide-theme-light">
                                                <div class="dark-mode" wire:click="mostrar_asistencia({{ $id_gestion_aula_usuario }})">
                                                    <div class="image-button {{ session('tipo_vista') == 'alumno' ? 'image-button-alumno' : 'image-button-docente'}}">
                                                        <img src="/media/icons/icon-matricula.webp" alt="Info"
                                                            style="width: 80px; height: 80px;">
                                                        <div class="text-content text-center mt-3 fw-semibold fs-3">
                                                            Asistencia
                                                        </div>
                                                    </div>
                                                </div>
                                            </span>
                                        </div>

                                        <div class="col-6 col-md-2 col-lg-4 col-xl-3">
                                            <span class="hide-theme-dark">
                                                <div class="" wire:click="mostrar_trabajo_academico({{ $id_gestion_aula_usuario }})">
                                                    <div class="image-button {{ session('tipo_vista') == 'alumno' ? 'image-button-alumno' : 'image-button-docente'}}">
                                                        <img src="/media/icons/icon-curso-por-internet.webp"
                                                            alt="Info" style="width: 80px; height: 80px;">
                                                        <div class="text-content text-center mt-3 fw-semibold fs-3">
                                                            Trabajos Académicos
                                                        </div>
                                                    </div>
                                                </div>
                                            </span>
                                            <span class="hide-theme-light">
                                                <div class="dark-mode" wire:click="mostrar_trabajo_academico({{ $id_gestion_aula_usuario }})">
                                                    <div class="image-button {{ session('tipo_vista') == 'alumno' ? 'image-button-alumno' : 'image-button-docente'}}">
                                                        <img src="/media/icons/icon-curso-por-internet.webp"
                                                            alt="Info" style="width: 80px; height: 80px;">
                                                        <div class="text-content text-center mt-3 fw-semibold fs-3">
                                                            Trabajos Académicos
                                                        </div>
                                                    </div>
                                                </div>
                                            </span>
                                        </div>

                                        <div class="col-6 col-md-2 col-lg-4 col-xl-3">
                                            <span class="hide-theme-dark">
                                                <div class="" wire:click="mostrar_webgrafia({{ $id_gestion_aula_usuario }})">
                                                    <div class="image-button {{ session('tipo_vista') == 'alumno' ? 'image-button-alumno' : 'image-button-docente'}}">
                                                        <img src="/media/icons/icon-ubicacion-ip.webp" alt="Info"
                                                            style="width: 80px; height: 80px;">
                                                        <div class="text-content text-center mt-3 fw-semibold fs-3">
                                                            Webgrafía
                                                        </div>
                                                    </div>
                                                </div>
                                            </span>
                                            <span class="hide-theme-light">
                                                <div class="dark-mode" wire:click="mostrar_webgrafia({{ $id_gestion_aula_usuario }})">
                                                    <div class="image-button {{ session('tipo_vista') == 'alumno' ? 'image-button-alumno' : 'image-button-docente'}}">
                                                        <img src="/media/icons/icon-ubicacion-ip.webp" alt="Info"
                                                            style="width: 80px; height: 80px;">
                                                        <div class="text-content text-center mt-3 fw-semibold fs-3">
                                                            Webgrafía
                                                        </div>
                                                    </div>
                                                </div>
                                            </span>
                                        </div>

                                        @if(session('tipo_vista') == 'docente')
                                            <div class="col-6 col-md-2 col-lg-4 col-xl-3">
                                                <span class="hide-theme-dark">
                                                    <div class="">
                                                        <div class="image-button image-button-docente position-relative">
                                                            <img src="/media/icons/icon-link-hipervinculo.webp" alt="Info"
                                                                style="width: 80px; height: 80px;">
                                                            <div class="text-content text-center mt-3 fw-semibold fs-3">
                                                                Subir Link de Clases
                                                            </div>
                                                            @if(!$link_clase)
                                                                <span class="badge bg-yellow badge-notification badge-blink badge-pill">!</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </span>
                                                <span class="hide-theme-light">
                                                    <div class="dark-mode">
                                                        <div class="image-button image-button-docente position-relative">
                                                            <img src="/media/icons/icon-link-hipervinculo.webp" alt="Info"
                                                                style="width: 80px; height: 80px;">
                                                            <div class="text-content text-center mt-3 fw-semibold fs-3">
                                                                Subir Link de Clases
                                                            </div>
                                                            @if(!$link_clase)
                                                                <span class="badge bg-yellow badge-notification badge-blink badge-pill">!</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </span>
                                            </div>

                                            <div class="col-6 col-md-2 col-lg-4 col-xl-3" wire:init="load_orientaciones">
                                                <span class="hide-theme-dark">
                                                    <div class="">
                                                        <div class="image-button image-button-docente position-relative" style="z-index: 1;">
                                                            <img src="/media/icons/icon-orien-presentacion2.webp" alt="Info"
                                                                style="width: 80px; height: 80px;">
                                                            <div class="text-content text-center mt-3 fw-semibold fs-3">
                                                                Orientaciones Generales
                                                            </div>
                                                            @if(!$orientaciones_generales)
                                                                <span class="badge bg-yellow badge-notification badge-blink badge-pill">!</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </span>
                                                <span class="hide-theme-light">
                                                    <div class="dark-mode">
                                                        <div class="image-button image-button-docente position-relative">
                                                            <img src="/media/icons/icon-orien-presentacion2.webp" alt="Info"
                                                                style="width: 80px; height: 80px;">
                                                            <div class="text-content text-center mt-3 fw-semibold fs-3">
                                                                Orientaciones Generales
                                                            </div>
                                                            @if(!$orientaciones_generales)
                                                                <span class="badge bg-yellow badge-notification badge-blink badge-pill">!</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </span>
                                            </div>

                                            <div class="col-6 col-md-2 col-lg-4 col-xl-3">
                                                <span class="hide-theme-dark">
                                                    <div class="" wire:click="mostrar_alumnos({{ $id_gestion_aula_usuario }})">
                                                        <div class="image-button image-button-docente" style="z-index: 1;">
                                                            <img src="/media/icons/icon-registro.webp" alt="Info"
                                                                style="width: 80px; height: 80px;">
                                                            <div class="text-content text-center mt-3 fw-semibold fs-3">
                                                                Alumnos
                                                            </div>
                                                        </div>
                                                    </div>
                                                </span>
                                                <span class="hide-theme-light">
                                                    <div class="dark-mode" wire:click="mostrar_alumnos({{ $id_gestion_aula_usuario }})">
                                                        <div class="image-button image-button-docente">
                                                            <img src="/media/icons/icon-registro.webp" alt="Info"
                                                                style="width: 80px; height: 80px;">
                                                            <div class="text-content text-center mt-3 fw-semibold fs-3">
                                                                Alumnos
                                                            </div>
                                                        </div>
                                                    </div>
                                                </span>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4">

                    @livewire('components.info-docente', ['id_gestion_aula_usuario' => $id_gestion_aula_usuario])

                    @livewire('components.datos-curso', ['id_gestion_aula_usuario' => $id_gestion_aula_usuario])

                </div>

            </div>
        </div>
    </div>

</div>
