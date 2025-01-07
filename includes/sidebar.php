<!-- VERIFICANDO O NOME DA PÁGINA SELECIONADA -->
<?php
    $current_page = basename($_SERVER['PHP_SELF']);
?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../../Assistente-social/index.php">
        <div class="sidebar-brand-icon">
            <i class="fas fa-address-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Reports</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php echo $current_page == 'index.php' ? 'active' : ''; ?>">
        <a class="nav-link" href="../../Assistente-social/index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Público
    </div>

    <!-- Nav Item - Cadastro -->
    <li class="nav-item <?php echo $current_page == 'cadastrados.php' ? 'active' : ''; ?>">
        <a class="nav-link" href="../../Assistente-social/pages/cadastrados.php">
            <i class="fas fa-fw fa-user-plus"></i>
            <span>Cadastros</span></a>
    </li>

    <!-- Nav Item - Relatórios -->
    <li class="nav-item <?php echo $current_page == 'relatorios.php' ? 'active' : ''; ?>">
        <a class="nav-link" href="../../Assistente-social/pages/relatorios.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Relatórios</span></a>
    </li>
    <!-- Nav Item - Pendentes -->
     
    <li class="nav-item <?php echo $current_page == 'agendamentos.php' ? 'active' : ''; ?>">
        <a class="nav-link" href="../../Assistente-social/pages/agendamentos.php">
        <i class="fas fa-comments fa-2x text-gray-300"></i>
        <span>Agendamentos</span></a>
    </li>

    <!-- Nav Item - Documentos -->
    <li class="nav-item <?php echo $current_page == 'documentos.php' ? 'active' : ''; ?>">
        <a class="nav-link" href="../../Assistente-social/pages/documentos.php">
            <i class="fas fa-fw fa-file"></i>
            <span>Documentos</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Sistema
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-cog"></i>
            <span>Configurações</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Telas:</h6>
                <a class="collapse-item" href="../../Assistente-social/pages/login.html">Login</a>
                <a class="collapse-item" href="../../Assistente-social/pages/cadastro.html">Cadastro</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item <?php echo ($current_page == 'help-como-funciona.php' ||  $current_page == 'help-como-cadastrar.php') ? 'active' : ''; ?>">
        <a class="nav-link <?php echo ($current_page != 'help-como-funciona.php' ||  $current_page != 'help-como-cadastrar.php') ? 'collapsed' : ''; ?>" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-question-circle"></i>
            <span>Ajuda</span>
        </a>
        <div id="collapseUtilities" class="collapse <?php echo ($current_page == 'help-como-funciona.php' ||  $current_page == 'help-como-cadastrar.php') ? 'show' : ''; ?>" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Perguntas frequentes:</h6>
                <a class="collapse-item <?php echo $current_page == 'help-como-funciona.php' ? 'active' : ''; ?>" href="../../Assistente-social/pages/help-como-funciona.php">Como funciona?</a>
                <a class="collapse-item <?php echo $current_page == 'help-como-cadastrar.php' ? 'active' : ''; ?>" href="../../Assistente-social/pages/help-como-cadastrar.php">Como cadastrar?</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->