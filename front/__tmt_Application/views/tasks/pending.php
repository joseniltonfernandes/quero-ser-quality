<div class="head">
  <h1>Lista de Tarefas Pendentes</h1>
  <br>
</div>
<div class="body">
  <div class="task-container">
    <div style="text-align:right;">
      <a href="<?php echo base_url('tarefas'); ?>" class="btn btn-default btn-xs">
        <i class="fa fa-arrow-left"></i>
        Voltar
      </a>
    </div>
    <br>
    <ul>
      <?php if (!empty($tarefas['message'])): ?>
        <h4>Não existe nehnuma tarefa registrada.</h4>
      <?php else: ?>
        <?php for ($i=0; $i < count($tarefas); $i++): ?>
          <div class="task-card-4" style="width:90%">
            <header class="task-container task-light-grey">
              <li class="<?php if($tarefas[$i]['status'] == 1) { echo 'done'; } ?>">
              <h3><?php echo $tarefas[$i]['title']; ?></h3>
            </header>
            <div class="task-container">
              <p><pre><?php echo $tarefas[$i]['description']; ?></pre></p><br>
              <div style="text-align:center;">
                <a href="<?php echo base_url('tarefas/done/'.$tarefas[$i]['id']); ?>"  class="fa fa-check" title="Concluir Tarefa"></a>
                <a href="<?php echo base_url('tarefas/edit/'.$tarefas[$i]['id']); ?>"  class="fa fa-pencil-square-o" title="Editar Tarefa"></a>
                <a href="<?php echo base_url('tarefas/delete/'.$tarefas[$i]['id']); ?>"  class="fa fa-trash" title="Excluir Tarefa"></a>
              </div>
            </div>

            <a href="<?php echo base_url('tarefas/edit/'.$tarefas[$i]['id']); ?>" title="Editar Tarefa">
              <?php $tarefas[$i]['status'] == 1 ? print_r('<h6 class="task-button task-block task-green">Tarefa Concluída</h6>') : print_r('<h6 class="task-button task-block task-red">Tarefa Pendente</h6>') ?>
            </a>

          </div>
        <?php endfor; ?>
      <?php endif; ?>
      <div style="text-align:right;">
        <a href="<?php echo base_url('tarefas'); ?>" class="btn btn-default btn-xs">
          <i class="fa fa-arrow-left"></i>
          Voltar
        </a>
      </div>
      <br>
    </ul>
  </div>
</div>
