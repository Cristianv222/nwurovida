<!-- HTML para la Barra Lateral -->
<div class="left-sidebar box-shadow">
    <div class="sidebar-content">
        <!-- Navegación -->
        <div class="sidebar-nav">
            <ul class="side-nav color-gray">
                <li class="nav-header">
                    <span>Panel de Control</span>
                </li>
                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

                <li class="nav-header">
                    <span>Configuración</span>
                </li>
                <li class="has-children">
                    <a href="#"><i class="fa fa-file-text"></i> <span>Horarios</span> <i class="fa fa-angle-right arrow"></i></a>
                    <ul class="child-nav">
                        <li><a href="create-class.php"><i class="fa fa-plus"></i> <span>Crear Horarios</span></a></li>
                        <li><a href="manage-classes.php"><i class="fa fa-bars"></i> <span>Gestionar Horarios</span></a></li>
                    </ul>
                </li>
                <li class="has-children">
                    <a href="#"><i class="fa fa-book"></i> <span>Actividades</span> <i class="fa fa-angle-right arrow"></i></a>
                    <ul class="child-nav">
                        <li><a href="create-subject.php"><i class="fa fa-plus"></i> <span>Crear Actividades</span></a></li>
                        <li><a href="manage-subjects.php"><i class="fa fa-bars"></i> <span>Gestionar Actividades</span></a></li>
                        <li><a href="add-subjectcombination.php"><i class="fa fa-plus"></i> <span>Gestionar Relación Actividades</span></a></li>
                        <li><a href="manage-subjectcombination.php"><i class="fa fa-bars"></i> <span>Ver Relación de Actividades</span></a></li>
                    </ul>
                </li>
                <li class="has-children">
                    <a href="#"><i class="fa fa-users"></i> <span>Estudiantes</span> <i class="fa fa-angle-right arrow"></i></a>
                    <ul class="child-nav">
                        <li><a href="add-students.php"><i class="fa fa-plus"></i> <span>Agregar Estudiantes</span></a></li>
                        <li><a href="manage-students.php"><i class="fa fa-bars"></i> <span>Gestionar Estudiantes</span></a></li>
                    </ul>
                </li>
                <li class="has-children">
                    <a href="#"><i class="fa fa-file-o"></i> <span>Resultados</span> <i class="fa fa-angle-right arrow"></i></a>
                    <ul class="child-nav">
                        <li><a href="add-result.php"><i class="fa fa-plus"></i> <span>Agregar Resultado</span></a></li>
                        <li><a href="manage-results.php"><i class="fa fa-bars"></i> <span>Gestionar Resultados</span></a></li>
                    </ul>
                </li>
                <li class="has-children">
                    <a href="#"><i class="fa fa-bell"></i> <span>Comunicado</span> <i class="fa fa-angle-right arrow"></i></a>
                    <ul class="child-nav">
                        <li><a href="add-notice.php"><i class="fa fa-plus"></i> <span>Agregar Comunicado</span></a></li>
                        <li><a href="manage-notices.php"><i class="fa fa-bars"></i> <span>Gestionar Comunicados</span></a></li>
                    </ul>
                </li>
                <li><a href="change-password.php"><i class="fa fa-key"></i> <span>Cambiar Contraseña</span></a></li>
            </ul>
        </div>
        <!-- /.sidebar-nav -->
    </div>
    <!-- /.sidebar-content -->
</div>


<style>
    /* Mantener tus estilos originales */
    .left-sidebar {
        background-color: #5CA9A8;
        width: 250px;
        transition: all 0.3s ease;
    }

    .sidebar-content {
        padding: 20px;
    }

    .side-nav {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .side-nav>li {
        padding: 10px;
        margin-bottom: 5px;
    }

    .side-nav>li>a {
        color: #f0f4f7;
        text-decoration: none;
        display: block;
        transition: background-color 0.3s;
        border-radius: 5px;
        padding: 10px 15px;
    }

    .side-nav>li>a:hover {
        background-color: #FFB81C;
    }

    .side-nav .nav-header {
        color: #FFD700;
        font-weight: bold;
        margin-top: 15px;
    }

    .side-nav .has-children>a .arrow {
        float: right;
    }

    .child-nav {
        display: none;
        padding-left: 20px;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Nuevos estilos para móvil */
    @media (max-width: 768px) {
        .left-sidebar {
            position: fixed;
            width: 100%;
            height: auto;
            max-height: 0;
            overflow: hidden;
            top: 60px;
            /* Ajusta esto según la altura de tu navbar */
            left: 0;
            right: 0;
            z-index: 1000;
            transform: none;
        }

        .left-sidebar.active {
            max-height: calc(100vh - 60px);
            overflow-y: auto;
        }

        .main-content {
            margin-left: 0;
            transition: transform 0.3s ease;
            padding-top: 60px;
            /* Ajusta esto según la altura de tu navbar */
        }

        body.sidebar-active .main-content {
            transform: translateY(var(--sidebar-height, 0));
        }

        .child-nav {
            padding-left: 15px;
            background-color: rgba(0, 0, 0, 0.1);
            margin-top: 5px;
            border-radius: 5px;
        }
    }

    /* Botón de menú móvil */
    .mobile-nav-toggle {
        display: none;
        background: none;
        border: none;
        color: white;
        font-size: 24px;
        cursor: pointer;
        padding: 10px;
    }

    @media (max-width: 1024px) {
        .mobile-nav-toggle {
            display: block;
        }
    }

    @media (min-width: 768px) and (max-width: 1024px) {
        
        .left-sidebar {
            width: 200px;
            /* Ajuste de ancho para iPad */
        }

        .side-nav>li>a {
            padding: 8px 12px;
            /* Reducir padding para optimizar espacio */
            font-size: 14px;
            /* Tamaño de texto reducido */
        }

        .child-nav {
            padding-left: 15px;
            background-color: rgba(0, 0, 0, 0.1);
            margin-top: 5px;
            border-radius: 5px;
        }

        /* Configurar la visibilidad del submenú */
        .side-nav .has-children>a::after {
            content: '\25B6';
            /* Icono de flecha para indicar submenú */
            float: right;
            transition: transform 0.3s ease;
        }

        .side-nav .has-children.active>a::after {
            transform: rotate(90deg);
            /* Rota el icono cuando está activo */
        }
    }
</style>

<script>


    document.addEventListener('DOMContentLoaded', function() {
        const mobileNavToggle = document.querySelector('.mobile-nav-toggle');
        const leftSidebar = document.querySelector('.left-sidebar');
        const body = document.body;

        // Toggle sidebar al hacer clic en el botón
        mobileNavToggle?.addEventListener('click', function() {
            leftSidebar.classList.toggle('active');
            body.classList.toggle('sidebar-active');

            // Ajusta el tamaño del sidebar después de que se abra
            if (leftSidebar.classList.contains('active')) {
                setTimeout(() => {
                    const sidebarHeight = leftSidebar.scrollHeight;
                    document.documentElement.style.setProperty('--sidebar-height', `${sidebarHeight}px`);
                }, 10);
            } else {
                document.documentElement.style.setProperty('--sidebar-height', '0px');
            }
        });

        // Cerrar sidebar al redimensionar la ventana a tamaño de escritorio
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                leftSidebar.classList.remove('active');
                body.classList.remove('sidebar-active');
                document.documentElement.style.setProperty('--sidebar-height', '0px');
            }
        });

        // Manejo de submenús - Configurado para abrir con un solo clic
    });
</script>