<!-- SIDEBAR -->
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reports 2</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include './includes/sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Procurar..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Procurar..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                       
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Assistente Social</span>
                                <img class="img-profile rounded-circle"
                                    src="./img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Configurações
                                </a>
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Sair
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="criarRelatorios">
                            <i class="fas fa-file-signature fa-sm text-white-50"></i> Criar Relatório
                        </button>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Relatórios Criados</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="total-relatorios">Carregando...</div>
                                        </div> 
                                        <div class="col-auto">
                                            <i class="fas fa-file-signature fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                            <script>
                                document.addEventListener("DOMContentLoaded", function () {
    // Função para obter a data atual formatada
                        function obterDataAtual() {
                            const hoje = new Date();
                            const dia = hoje.getDate().toString().padStart(2, '0'); // Dia com 2 dígitos
                            const mes = (hoje.getMonth() + 1).toString().padStart(2, '0'); // Mês com 2 dígitos (0-indexado)
                            const ano = hoje.getFullYear(); // Ano com 4 dígitos
                            return `${dia}/${mes}/${ano}`;
                        }

                        // Atualiza o elemento no card com a data atual
                        const elementoData = document.getElementById("currentDate");
                        if (elementoData) {
                            elementoData.textContent = `${obterDataAtual()}`;
                        }
                        });

                            </script>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                DATA</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="currentDate"></div>
                                            <!-- Data Atual -->
                                            <div class="text-xs text-gray-500 mt-2" ></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Agendamentos Pendentes</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="total-agendamentos">
                                                <!-- Total será atualizado aqui -->
                                                Carregando...
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                        <script>
                    document.addEventListener('DOMContentLoaded', () => {
                        const carregarTotalRelatorios = async () => {
                            try {
                                const response = await fetch('./system/situacoes_prioritarias.php');
                                if (!response.ok) {
                                    throw new Error(`Erro HTTP! Status: ${response.status}`);
                                }
                                const data = await response.json();
                                console.log('Resposta do endpoint:', data);

                                // Agora acessando a chave correta do JSON
                                if (data && data.totalAlertasPrioritarios !== undefined) {
                                    const total = data.totalAlertasPrioritarios;
                                    const totalElement = document.getElementById('prioritarias');
                                    if (totalElement) {
                                        totalElement.textContent = total || '0'; // Coloca '0' caso não tenha valor
                                        console.log('Texto atualizado com sucesso');
                                    } else {
                                        console.error('Elemento com ID "prioritarias" não encontrado.');
                                    }
                                } else {
                                    console.error('Valor não encontrado ou é undefined', data);
                                }
                            } catch (error) {
                                console.error('Erro na requisição ou no processamento:', error);
                            }
                        };

                        carregarTotalRelatorios();
                    });

                                        </script>
                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Situações Prioritárias</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="prioritarias">
                                                <!-- Total será atualizado aqui -->
                                                Carregando...

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-exclamation-circle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

<!-- Script para integrar com o endpoint -->
<script>
 // Garante que o DOM está pronto
document.addEventListener('DOMContentLoaded', () => {
    const carregarTotalRelatorios = async () => {
        try {
            const response = await fetch('./system/get_visitas.php');
            if (!response.ok) {
                throw new Error(`Erro HTTP! Status: ${response.status}`);
            }
            const data = await response.json();
            console.log('Resposta do endpoint:', data);

            const totalElement = document.getElementById('total-agendamentos');
            if (totalElement) {
                console.log('Elemento encontrado:', totalElement);
                totalElement.textContent = data.totalVisitas || '0';
                console.log('Texto atualizado com sucesso');
            } else {
                console.error('Elemento com ID "total-agendamentos" não encontrado.');
            }
        } catch (error) {
            console.error('Erro na requisição ou no processamento:', error);
        }
    };
    carregarTotalRelatorios();
});

</script>


<!-- Content Row -->
<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4" style="width: 102.5%;">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Beneficiários</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>    <button id="btnZerarGrafico" class="btn btn-danger">Zerar Gráfico</button>

                    </a>
             
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->



<script>
    // Função para carregar o total de relatórios
    function carregarTotalRelatorios() {
        fetch('./system/get_total_relatorios.php')
            .then(response => response.json())
            .then(data => {
                if (data.totalRelatorios !== undefined) {
                    document.getElementById('total-relatorios').textContent = data.totalRelatorios + ' ';
                } else if (data.error) {
                    document.getElementById('total-relatorios').textContent = 'Erro: ' + data.error;
                }
            })
            .catch(error => {
                document.getElementById('total-relatorios').textContent = 'Erro ao carregar dados.';
            });
    }

         // Carrega o total de relatórios ao carregar a página
        window.onload = carregarTotalRelatorios;
                            </script>
                          
                           

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
<!-- Modal de Criar Relatório -->
<div class="modal fade" id="criarRelatorioModal" tabindex="-1" aria-labelledby="criarRelatorioModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="criarRelatorioModalLabel">Cadastro e Acompanhamento Social</h5>
                <!-- Botão de Fechar -->
                <button id="btnVoltar" type="button" class="btn btn-secondary">Voltar</button>
            </div>
            <div class="modal-body">
                <form id="criarRelatorioForm" action="./system/processar_dados.php" method="POST">
                    <!-- Informações Pessoais -->
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nomee</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome" >
                    </div>
                    <div class="mb-3">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite o CPF" >
                    </div>
                    <div class="mb-3">
                        <label for="rg" class="form-label">RG</label>
                        <input type="text" class="form-control" id="rg" name="rg" placeholder="Digite o RG" >
                    </div>
                    <div class="mb-3">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Digite o endereço" >
                    </div>
                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Digite o telefone" >
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Digite o e-mail" >
                    </div>
                
                    <!-- Informações Sociais Relevantes -->
                    <h5>Informações Sociais Relevantes</h5>
                    <div class="mb-3">
                        <label for="rendaFamiliar" class="form-label">Renda Familiar</label>
                        <input type="text" class="form-control" id="rendaFamiliar" name="rendaFamiliar" placeholder="Digite a renda familiar" >
                    </div>
                    <div class="mb-3">
                        <label for="composicaoFamiliar" class="form-label">Composição Familiar</label>
                        <input type="text" class="form-control" id="composicaoFamiliar" name="composicaoFamiliar" placeholder="Digite a composição familiar" >
                    </div>
                    <div class="mb-3">
                        <label for="beneficios" class="form-label">Benefícios Recebidos</label>
                        <input type="text" class="form-control" id="beneficios" name="beneficios" placeholder="Ex: Bolsa Família" >
                    </div>
                    <div class="mb-3">
                        <label for="situacaoHabitacional" class="form-label">Situação Habitacional</label>
                        <input type="text" class="form-control" id="situacaoHabitacional" name="situacaoHabitacional" placeholder="Digite a situação habitacional" >
                    </div>
                    <div class="mb-3">
                        <label for="nivelEscolaridade" class="form-label">Nível de Escolaridade</label>
                        <input type="text" class="form-control" id="nivelEscolaridade" name="nivelEscolaridade" placeholder="Digite o nível de escolaridade" >
                    </div>
                    <div class="mb-3">
                        <label for="situacaoEmprego" class="form-label">Situação de Emprego</label>
                        <input type="text" class="form-control" id="situacaoEmprego" name="situacaoEmprego" placeholder="Digite a situação de emprego" >
                    </div>
                
                    <!-- Histórico de Interações -->
                    <h5>Histórico de Interações</h5>
                    <div class="mb-3">
                        <label for="historicoAtendimentos" class="form-label">Histórico de Atendimentos</label>
                        <textarea class="form-control" id="historicoAtendimentos" name="historicoAtendimentos" rows="3" placeholder="Registro de atendimentos anteriores" ></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="notasAssistentes" class="form-label">Notas das Assistentes Sociais</label>
                        <textarea class="form-control" id="notasAssistentes" name="notasAssistentes" rows="3" placeholder="Notas e observações das assistentes sociais" ></textarea>
                    </div>

                    <!-- Upload de Documentos -->
                    <h5>Upload de Documentos</h5>
                    <div class="mb-3">
                        <label for="comprovanteRenda" class="form-label">Comprovante de Renda</label>
                        <input type="file" class="form-control" id="comprovanteRenda" name="comprovanteRenda" >
                    </div>
                    <div class="mb-3">
                        <label for="comprovanteResidencia" class="form-label">Comprovante de Residência</label>
                        <input type="file" class="form-control" id="comprovanteResidencia" name="comprovanteResidencia" >
                    </div>

                    <!-- Relatórios e Estatísticas -->
                    <h5>Relatórios e Estatísticas</h5>
                    <div class="mb-3">
                        <label for="relatorioEstatisticas" class="form-label">Geração de Relatórios</label>
                        <textarea class="form-control" id="relatorioEstatisticas" name="relatorioEstatisticas" rows="3" placeholder="Gerar relatórios sobre atendimentos, perfil dos atendidos" ></textarea>
                    </div>

                    <!-- Acompanhamento de Casos -->
                    <h5>Acompanhamento de Casos</h5>
                    <div class="mb-3">
                        <label for="agendamentoVisitas" class="form-label">Agendamento de Visitas/Reuniões</label>
                        <input type="date" class="form-control" id="agendamentoVisitas" name="agendamentoVisitas" >
                    </div>
                    <div class="mb-3">
                        <label for="alertasPrioritarios" class="form-label">Alertas para Casos Prioritários</label>
                        <textarea class="form-control" id="alertasPrioritarios" name="alertasPrioritarios" rows="3" placeholder="Descreva alertas para casos prioritários ou pendências" ></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Salvar Informações</button>
                </form>
            </div>
        </div>
    </div>
</div>




<script>

document.getElementById("btnVoltar").addEventListener("click", () => {
    window.location.href = 'index.php'; // Redireciona para index.php
});

// Função para carregar o total de relatórios
function carregarTotalRelatorios() {
    fetch('./system/get_total_relatorios.php') // Requisição ao arquivo PHP
        .then(response => {
            if (!response.ok) {
                // Lança um erro caso a resposta do servidor não seja "ok"
                throw new Error('Erro na resposta do servidor: ' + response.statusText);
            }
            return response.json(); // Converte a resposta para JSON
        })
        .then(data => {
            console.log('Dados recebidos:', data); // Exibe os dados no console para depuração
            if (data.totalRelatorios !== undefined) {
                // Atualiza o texto no card com o total de relatórios
                document.getElementById('total-relatorios').textContent = data.totalRelatorios + ' ';
            } else if (data.error) {
                // Caso haja erro, exibe a mensagem
                document.getElementById('total-relatorios').textContent = 'Erro: ' + data.error;
            }
        })
        .catch(error => {
            // Exibe erro caso a requisição falhe
            console.error('Erro ao carregar dados:', error);
            document.getElementById('total-relatorios').textContent = 'Erro ao carregar dados.';
        });
}


    document.getElementById('criarRelatorios').addEventListener('click', function () {
        // Exibir o modal de Cadastro e Acompanhamento Social
        var myModal = new bootstrap.Modal(document.getElementById('criarRelatorioModal'));
        myModal.show();
    });

    // Função para fechar o modal manualmente
    function fecharModal() {
        var myModal = bootstrap.Modal.getInstance(document.getElementById('criarRelatorioModal'));
        myModal.hide();  // Força o fechamento do modal
        
    }

 </script>
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>// Função para calcular a média das rendas
    // Função para calcular a média das rendas
function calcularMedia(rendas) {
    const soma = rendas.reduce((acc, valor) => acc + valor, 0);
    return rendas.length > 0 ? soma / rendas.length : 0;
}

// Função para carregar os dados do LocalStorage e atualizar o gráfico
function carregarDados() {
    // Pega os dados armazenados no LocalStorage
    const rendas = JSON.parse(localStorage.getItem("rendas")) || [];
    const labels = JSON.parse(localStorage.getItem("labels")) || [];

    // Se não houver rendas (ou se os dados estiverem vazios), limpa o gráfico
    if (rendas.length === 0) {
        myAreaChart.data.labels = [];
        myAreaChart.data.datasets[0].data = [];
        myAreaChart.update();
        return; // Retorna e não faz mais nada
    }

    // Calcula a média progressiva das rendas
    const medias = rendas.map((_, index) => calcularMedia(rendas.slice(0, index + 1)));

    // Atualiza o gráfico com os dados do LocalStorage
    myAreaChart.data.labels = labels;
    myAreaChart.data.datasets[0].data = medias;
    myAreaChart.update(); // Atualiza o gráfico
}

// Função para limpar todos os dados do LocalStorage e resetar o gráfico
function limparTudo() {
    localStorage.removeItem("rendas");
    localStorage.removeItem("labels");

    // Limpa o gráfico
    myAreaChart.data.labels = [];
    myAreaChart.data.datasets[0].data = [];
    myAreaChart.update();
}

// Manipulador do formulário
document.getElementById("criarRelatorioForm").addEventListener("submit", function (e) {
    e.preventDefault(); // Impede o envio padrão do formulário para executar a lógica personalizada.

    // Captura o valor do campo "Renda Familiar"
    const rendaInput = document.getElementById("rendaFamiliar");
    const valorRenda = parseFloat(rendaInput.value);

    if (!isNaN(valorRenda) && valorRenda > 0) {
        // Pega os dados de rendas e labels do LocalStorage
        let rendas = JSON.parse(localStorage.getItem("rendas")) || [];
        let labels = JSON.parse(localStorage.getItem("labels")) || [];

        // Adiciona o novo valor de renda
        rendas.push(valorRenda);

        // Adiciona um novo label para o eixo X (com a data atual)
        const dataAtual = new Date();
        const mesAno = `${dataAtual.toLocaleString('pt-BR', { month: 'long' })} ${dataAtual.getFullYear()}`;
        labels.push(mesAno);

        // Armazena os dados atualizados no LocalStorage
        localStorage.setItem("rendas", JSON.stringify(rendas));
        localStorage.setItem("labels", JSON.stringify(labels));

        // Recarrega os dados e atualiza o gráfico
        carregarDados();

        // Limpa o campo de input após inserir o valor
        rendaInput.value = '';

        // Após a lógica, envie o formulário manualmente
        e.target.submit();
    } else {
        alert("Por favor, insira um valor válido para a renda familiar.");
    }
});


// Configuração inicial do gráfico
const ctx = document.getElementById("myAreaChart").getContext("2d");
const myAreaChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [], // Inicialmente vazio, será atualizado após carregar os dados
        datasets: [{
            label: "Média da Renda Familiar (R$)", // Texto do rótulo
            data: [], // Inicialmente vazio, será preenchido após calcular a média
            backgroundColor: "rgba(78, 115, 223, 0.1)",
            borderColor: "rgba(78, 115, 223, 1)",
            borderWidth: 2,
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            tension: 0.4, // Linhas suaves
        }]
    },
    options: {
        maintainAspectRatio: false,
        scales: {
            x: { 
                display: false, // Remover os rótulos do eixo X
                grid: { display: false } // Remover o grid do eixo X
            },
            y: {
                ticks: { beginAtZero: true },
                grid: { color: "rgba(234, 236, 244, 1)" },
            }
        },
        plugins: {
            legend: { 
                display: true // Exibe a legenda
            },
            tooltip: { 
                enabled: true // Exibe os tooltips
            },
        }
    }
});

// Inicializa o gráfico com dados vazios (zerado) e aguarda os dados serem inseridos
carregarDados();
function zerarDadosGrafico() {
    // Remove apenas os dados relacionados ao gráfico do localStorage
    localStorage.removeItem("rendas");
    localStorage.removeItem("labels");

    // Atualiza o gráfico para refletir os dados zerados
    myAreaChart.data.labels = [];
    myAreaChart.data.datasets[0].data = [];
    myAreaChart.update();
}

// Exemplo de uso: Adiciona um botão para zerar os dados
document.getElementById("btnZerarGrafico").addEventListener("click", zerarDadosGrafico);


</script>


<!-- Incluindo os scripts do Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Incluindo os scripts do Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>