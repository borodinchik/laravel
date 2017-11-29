<?php $__env->startSection('content'); ?>
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-heading">Список Опросов<img class="avatar" src="/uploads/user_avatar/<?php echo e(Auth::user()->avatar); ?>" alt=""></div>
              <div class="panel-body">
                <div class="modal-loader">
                  <div class="loader">
                  </div>
                </div>
                <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="form-group">
                    <a  class="question-id id-answer-<?php echo e($question->id); ?>"  data-question-id="<?php echo e($question->id); ?>" data-user-id="<?php echo e(Auth::user()->id); ?>">
                      <?php echo e($question->title); ?>

                    </a>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="cartQuestions myModal-<?php echo e($question->id); ?>">
                    <div class="modal-content">
                      <span class="close">&times</span>
                      <div class="form-group">
                        <form  class="form-save">
                          <h4 class="text-center"><?php echo e($question->body); ?></h4>
                          <?php echo e(csrf_field()); ?>

                          <?php $__currentLoopData = $question->answer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="radio" name="user_answer_id" value="<?php echo e($value->id); ?>" required>
                            <?php echo e($value->answer); ?>

                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <br><button class="btn btn-sm btn-primary form-save save-answer" type="submit">Сохранить</button>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="alert alert-success" role="alert">Спасибо за ваш голос </div>
<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/app.js')); ?>"></script>


<script src="<?php echo e(asset('js/user.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>