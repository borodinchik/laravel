<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Список Опросов<a href="<?php echo e(route('admin.dashboard')); ?>">|Admin panel</a>
                  <div class="my_result_modal">
                      <div class="modal-content-charts">
                        <span class="close">&times</span>

                            <canvas id="myChart"></canvas>

                      </div>
                    </div>
                    <div class="panel-body">
                        <?php if(session('status')): ?>
                          <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                          </div>
                        <?php endif; ?>
                        <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <div class="form-group" >
                            <h3><?php echo e($question->title); ?></h3>
                            <a class="result" style="float: right;" id=<?php echo e($question->id); ?>>Результат опросов</a>
                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['delete.question', $question->id]]); ?>

                            <?php echo Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']); ?>

                            <?php echo Form::close(); ?>

                          </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
            <script src="<?php echo e(asset('js/app.js')); ?>"></script>
            <script src="<?php echo e(asset('js/main.js')); ?>"></script>
            <script src="<?php echo e(asset('js/charts.js')); ?>"></script>
          <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>