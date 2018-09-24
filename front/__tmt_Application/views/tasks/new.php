<form action="<?php echo base_url('tarefas/incluir_tarefa') ?>" method="post">
  <div class="head">
      <h1>Criar uma nova tarefa</h1>
  </div>
  <div class="body">
    <?php if(isset($error)):  ?>
        <p class="alert alert-danger"></p>
    <?php endif; ?>
     <label for="title">Nome da tarefa :</label>
     <input type="text" name="title" value="">
     <label for="description">Digite da tarefa :</label>
     <textarea style="display: block ; font-weight: normal; width: 80%; margin-left: 40px;" id="description" name="description" rows="7" cols="33" maxlength="2000" wrap="hard"></textarea>
  </div>
  <div class="footer">
  <input type="submit" name="save" value="save" class="task-button task-block task-green">
  </div>
</form>
<br>
<div style="text-align:right;">
  <a href="<?php echo base_url('tarefas'); ?>" class="btn btn-default btn-xs">
    <i class="fa fa-arrow-left"></i>
    Voltar
  </a>
</div>
