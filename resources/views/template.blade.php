<!DOCTYPE html>
<html lang="es">
<head>
    
    <meta charset="utf-8" />
    <title>Agenda - Celsh</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/logos/sello_sl.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/logos/sello_sl.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/logos/sello_sl.png') }}">
    
    <!-- SweetAlert2 CSS desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/assets/css/styles.min.css')}}" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('vendors/styles/core.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/styles/icon-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/styles/style.css') }}">
    <link rel="stylesheet" href="{{ asset('src/plugins/fullcalendar/fullcalendar.css') }}">
    <link rel="stylesheet" href="{{ asset('src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2973766580778258" crossorigin="anonymous"></script>
</head>

<body>

    <!-- Header -->
    <div class="header">
        
        <div class="header-left">
            <div class="menu-icon bi bi-list"></div>
            
        </div>
        <div class="header-right">
            <div class="dashboard-setting user-notification">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                        <i class="dw dw-settings2"></i>
                    </a>
                </div>
            </div>

            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="user-icon">
                            <img src="{{ asset('images/logos/sello_sl.png') }}" alt="Usuario">
                        </span>
                        <span class="user-name">{{ auth()->user()->name . ' ' . auth()->user()->last_name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-icon-list">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                <i class="dw dw-logout"></i> Cerrar sesión
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

		<div class="left-side-bar">
			<div class="brand-logo">
				<a href="#">
					<img src="{{asset('images/logos/logo_blanco.png')}}" alt="" class="light-logo" width="75"/>
					<img src="{{asset('images/logos/logo.png')}}" alt="" class="dark-logo" width="75"/>
					<!--<img
						src=""
						alt=""
						class="light-logo"
					/>-->
				</a>
				<div class="close-sidebar" data-toggle="left-sidebar-close">
					<i class="ion-close-round"></i>
				</div>
			</div>
			<div class="menu-block customscroll">
				<div class="sidebar-menu">
					<ul id="accordion-menu">
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-house"></span
								><span class="mtext">Agenda</span>
							</a>
							<ul class="submenu">
								<li><a href="{{ route('agenda.index')}}">Calendario</a></li>
							</ul>
							@if (auth()->user()->rol == 'SA')
								<ul class="submenu">
									<li><a href="{{ route('evento.index')}}">Lista</a></li>
								</ul>
							@endif
							
						</li>
						<li class="dropdown">
							<a href="{{ route('grupo.index')}}" class="dropdown-toggle">
								<span class="micon bi bi-house"></span
								><span class="mtext">Grupo</span>
							</a>
							
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="mobile-menu-overlay"></div>
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            @endif
    </div>

    <!-- Configuración lateral -->
    <div class="right-sidebar">
        <div class="sidebar-title">
            <h3 class="weight-600 font-16 text-blue">
                Configuración de diseño
                <span class="btn-block font-weight-400 font-12">Configuración de la interfaz de usuario</span>
            </h3>
            <div class="close-sidebar" data-toggle="right-sidebar-close">
                <i class="icon-copy ion-close-round"></i>
            </div>
        </div>

        <div class="right-sidebar-body customscroll">
            <div class="right-sidebar-body-content">
                <h4 class="weight-600 font-18 pb-10">Fondo del encabezado</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Fondo de la barra lateral</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
                </div>

                <div class="reset-options pt-30 text-center">
                    <button class="btn btn-danger" id="reset-settings">Restablecer configuración</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="left-side-bar">
        <div class="brand-logo">
            <a href="#">
                <img src="{{ asset('images/logos/logo_blanco.png') }}" alt="Logo claro" class="light-logo" width="75">
                <img src="{{ asset('images/logos/logo.png') }}" alt="Logo oscuro" class="dark-logo" width="75">
            </a>
            <div class="close-sidebar" data-toggle="left-sidebar-close">
                <i class="ion-close-round"></i>
            </div>
        </div>

        <div class="menu-block customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon bi bi-house"></span>
                            <span class="mtext">Agenda</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('agenda.index') }}">Calendario</a></li>
                            @if (auth()->user()->rol == 'SA')
                                <li><a href="{{ route('evento.index') }}">Lista</a></li>
                            @endif
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon bi bi-calendar-event"></span>
                            <span class="mtext">Sesiones</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('sesiones.index') }}">Sesión</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon bi bi-calendar-event"></span>
                            <span class="mtext">Acuerdos</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('acuerdos.index') }}">Acuerdos</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="mobile-menu-overlay"></div>

    <!-- Contenido principal -->
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                @yield('content')
                
            </div>
        </div>
    </div>

    <!-- Scripts - ORDEN IMPORTANTE -->
    <!-- 1. jQuery primero -->
    <script src="{{ asset('vendors/scripts/core.js') }}"></script>
    
    <!-- 2. SweetAlert2 JS - AGREGAR ESTA LÍNEA -->
    <script src="{{asset('/sweetalert/dist/sweetalert2.min.js')}}"></script>
    
    <!-- 3. Otros scripts -->
    <script src="{{ asset('vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('vendors/scripts/layout-settings.js') }}"></script>
    <script src="{{ asset('src/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('vendors/scripts/calendar-setting.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    @yield('js')
    
    <!-- Script de confirmación de eliminación con SweetAlert2 -->
    <script>
        console.log('Script cargado');
        console.log('jQuery disponible:', typeof $ !== 'undefined');
        console.log('SweetAlert2 disponible:', typeof Swal !== 'undefined');
        
        $(function() {
            console.log('Document ready ejecutado');
            console.log('Formularios encontrados:', $('.form_baja').length);
            
            $('.form_baja').submit(function (event) {
                console.log('Submit interceptado');
                event.preventDefault();

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "Esto eliminará el registro por completo",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, Eliminar',
                    cancelButtonText: 'No, cancelar',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        console.log('Confirmado - enviando formulario');
                        this.submit();
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire(
                            'Cancelado',
                            'Tu registro está seguro :)',
                            'error'
                        )
                    }
                })
            });
        });
    </script>

    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
</body>
</html>