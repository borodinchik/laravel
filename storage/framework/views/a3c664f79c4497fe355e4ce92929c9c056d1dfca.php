<?php $__env->startSection('content'); ?>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading">Admin|Создание опроса|
              <a href="<?php echo e(route('all-questions')); ?>">Все вопросы</a>
              <a style="float: right;" href="<?php echo e(route('show.all.users')); ?>">All Users</a>
            </div>
            <div class="panel-body">
              <?php if(session('status')): ?>
                <div class="alert alert-success">
                  <?php echo e(session('status')); ?>

                </div>
              <?php endif; ?>
              <div class="panel-body">
              
              <form class="form-horizontal" action="admin/questions" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                  <input type="text" class="form-control" name="title" placeholder="Название вопроса">
                </div>
                <div class="form-group">
                  <textarea name="body" class="form-control" rows="3" placeholder="Вопрос"></textarea>
                </div>
                <div class="form-group" id="sites">
                  <div class="col-sm-10" >
                    <hr>
                  </div>
                </div>
                <div class="form-group" >
                  <div class="col-sm-10" id="back">
                    <button type="submit" class="btn btn-default">Добавить</button>
                  </div>
                </div>
              </form>
              <div class="form-group">
                <button id="input" type="submit" class="btn btn-primary">Добавить вариант ответа</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
  <script src="<?php echo e(asset('js/main.js')); ?>"></script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>