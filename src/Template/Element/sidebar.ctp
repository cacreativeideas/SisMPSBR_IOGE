<ul class="side-nav metisMenu" id="menu">
    <li>
        <?= $this->Html->link(__('Dashboard'), ['controller' => 'InstituicoesOrganizadoras', 'action' => 'dashboard']) ?>
    </li>
    <li>
        <a href="#" aria-expanded="true" class="heading">
            <span class="fa fa-caret-right"></span> Empresas
        </a>

        <ul aria-expanded="true">
            <li>
                <?= $this->Html->link(__('Gerenciar Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?>
            </li>
        </ul>
    </li>

    <li>
        <a href="#" aria-expanded="true" class="heading">
            <span class="fa fa-caret-right"></span> Unidades Organizacionais
        </a>

        <ul aria-expanded="true">
            <li>
                <?= $this->Html->link(__('Gerenciar Unidades Organizacionais'), ['controller' => 'UnidadesOrganizacionais', 'action' => 'index']) ?>
            </li>
            <li>
                <?= $this->Html->link(__('Gerenciar Projetos de Unidades Organizacionais'), ['controller' => 'ProjetosUos', 'action' => 'index']) ?>
            </li>
        </ul>
    </li>
    <li>
        <a href="#" aria-expanded="true" class="heading">
            <span class="fa fa-caret-right"></span> Grupo de Empresas
        </a>

        <ul aria-expanded="true">
            <li>
                <?= $this->Html->link(__('Associar UO a Grupo de Empresas'), ['controller' => 'GruposEmpresas', 'action' => 'associarUnidadeOrganizacional']) ?>
            </li>
            <li>
                <?= $this->Html->link(__('Associar II a Grupo de Empresas'), ['controller' => 'GruposEmpresas', 'action' => 'associarInstituicaoImplementadora']) ?>
            </li>
            <li>
                <?= $this->Html->link(__('Associar IA a Grupo de Empresas'), ['controller' => 'GruposEmpresas', 'action' => 'associarInstituicaoAvaliadora']) ?>
            </li>
            <li>
                <?= $this->Html->link(__('Gerenciar Grupos de Empresas'), ['controller' => 'GruposEmpresas', 'action' => 'index']) ?>
            </li>
        </ul>
    </li>
    <li>
        <a href="#" aria-expanded="true" class="heading">
            <span class="fa fa-caret-right"></span> Projeto de Grupo de Empresas
        </a>

        <ul aria-expanded="true">
            <li>
                <?= $this->Html->link(__('Gerenciar Projetos de Implementação'), ['controller' => 'Projetos', 'action' => 'index']) ?>
            </li>
            <li>
                <?= $this->Html->link(__('Adicionar Consultores do Projeto'), ['controller' => 'Consultores', 'action' => 'associarConsultorProjeto']) ?>
            </li>
            <li>
                <?= $this->Html->link(__('Gerenciar Riscos'), ['controller' => 'Riscos', 'action' => 'index']) ?>
            </li>
            <li>
                <?= $this->Html->link(__('Gerenciar Problemas'), ['controller' => 'Problemas', 'action' => 'index']) ?>
            </li>
            <li>
                <?= $this->Html->link(__('Gerenciar Lições Aprendidas'), ['controller' => 'LicoesAprendidas', 'action' => 'index']) ?>
            </li>
            <li>
                <?= $this->Html->link(__('Adicionar Parecer da Instituição Implementadora'), ['controller' => 'Projetos', 'action' => 'addParecerIi']) ?>
            </li>
            <li>
                <?= $this->Html->link(__('Adicionar Parecer da IOGE'), ['controller' => 'Projetos', 'action' => 'addParecerIoge']) ?>
            </li>
            <li>
                <?= $this->Html->link(__('Gerenciar Treinamentos'), ['controller' => 'Treinamentos', 'action' => 'index']) ?>
            </li>
        </ul>
    </li>

    <li>
        <a href="#" aria-expanded="true" class="heading">
            <span class="fa fa-caret-right"></span> Instituições Implementadoras
        </a>

        <ul aria-expanded="true">
            <!--
                <li>
                    <?= $this->Html->link(__('Marcar Reunião'), ['controller' => 'Atividades', 'action' => 'marcarReuniao']) ?>
                </li>
                <li>
                    <?= $this->Html->link(__('Agenda de Atividades'), ['controller' => 'Atividades', 'action' => 'agenda']) ?>
                </li>
                -->
            <li>
                <?= $this->Html->link(__('Gerenciar Reuniões'), ['controller' => 'Reunioes', 'action' => 'index']) ?>
            </li>
            <li>
                <?= $this->Html->link(__('Gerenciar Plano de Ações'), ['controller' => 'Acoes', 'action' => 'index']) ?>
            </li>
            <li>
                <?= $this->Html->link(__('Gerenciar Atividades'), ['controller' => 'Atividades', 'action' => 'index']) ?>
            </li>
        </ul>
    </li>
  
    <li>
        <a href="#" aria-expanded="true" class="heading">
            <span class="fa fa-caret-right"></span> Pagamentos
        </a>
        <ul aria-expanded="false" class="collapse">
            <li>
                <?= $this->Html->link(__('Gerenciar Pagamentos'), ['controller' => 'Pagamentos', 'action' => 'index']) ?>
            </li>
            <li>
                <?= $this->Html->link(__('Gerenciar Parcelas'), ['controller' => 'Parcelas', 'action' => 'index']) ?>
            </li>
            <li>
                <?= $this->Html->link(__('Gerenciar Restituições'), ['controller' => 'Restituicoes', 'action' => 'index']) ?>
            </li>
        </ul>
    </li>

    <li class="heading">Configurações Gerais</li>

    <li>
        <a href="#" aria-expanded="true" class="heading">
            <span class="fa fa-caret-right"></span> Instituições Implementadoras
        </a>

        <ul aria-expanded="true">
            <li>
                <?= $this->Html->link(__('Gerenciar II\'s'), ['controller' => 'InstituicoesImplementadoras', 'action' => 'index']) ?>
            </li>
            <li>
                <?= $this->Html->link(__('Gerenciar Consultores'), ['controller' => 'Consultores', 'action' => 'index']) ?>
            </li>
        </ul>
    </li>

    <li>
        <a href="#" aria-expanded="true" class="heading">
            <span class="fa fa-caret-right"></span> Instituições Avaliadoras
        </a>

        <ul aria-expanded="true">
            <li>
                <?= $this->Html->link(__('Gerenciar IA\'s'), ['controller' => 'InstituicoesAvaliadoras', 'action' => 'index']) ?>
            </li>
        </ul>
    </li>

    <li>
        <a href="#" aria-expanded="true" class="heading">
            <span class="fa fa-caret-right"></span> Instituições Organizadoras de Grupo de Empresas
        </a>

        <ul aria-expanded="true">
            <li>
                <?= $this->Html->link(__('Gerenciar IOGE\'s'), ['controller' => 'InstituicoesOrganizadoras', 'action' => 'index']) ?>
            </li>
            <li>
                <?= $this->Html->link(__('Gerenciar Coordenador IOGE\'s'), ['controller' => 'CoordenadoresIoges', 'action' => 'index']) ?>
            </li>
        </ul>

    </li>
  
    <li>
        <a href="#" aria-expanded="true" class="heading">
            <span class="fa fa-caret-right"></span> Tópicos de Lições Aprendidas
        </a>

        <ul aria-expanded="true">
            <li>
                <?= $this->Html->link(__('Gerenciar Tópicos'), ['controller' => 'Topicos', 'action' => 'index']) ?>
            </li>
        </ul>
    </li>
</ul>

<script type="application/javascript">
    $(function () {
        $('#menu').metisMenu();
    });
</script>