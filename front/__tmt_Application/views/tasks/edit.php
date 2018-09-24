<form action="<?php echo base_url('tarefas/editar_tarefa/'.$id) ?>" method="post">
  <div class="head">
      <h1>Editando a tarefa</h1>
  </div>
  <div class="body">
    <?php if(isset($error)):  ?>
        <p class="alert alert-danger"></p>
    <?php endif; ?>
     <label for="title">Digite o titulo da tarefa :</label>
     <input type="text" name="title" value="<?php echo $title ?>">
     <label for="description">Digite a descrição da tarefa :</label>
     <textarea style="display: block ; font-weight: normal; width: 80%; margin-left: 40px;" id="description" name="description" rows="7" cols="33" maxlength="2000" wrap="hard">
<?php echo $description ?></textarea>

     <label for="description">Digite a descrição da tarefa :</label>
     <div style="display: block ; font-weight: normal; width: 80%; margin-left: 40px;">
       <input type="radio" name="status" value="1" <?php if ($status == 1) {echo 'checked';} ?>> Concluída &nbsp;&nbsp;
       <input type="radio" name="status" value="0"<?php if ($status == 0) {echo 'checked';} ?>> Pendente
     </div>
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
