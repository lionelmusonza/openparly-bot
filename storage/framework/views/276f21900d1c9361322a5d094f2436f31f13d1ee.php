<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">Queue</h1>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Contact</th>
                                        <th>Chat id</th>
                                        <th>Confirm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $todos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($todo->phone); ?></td>
                                            <td><?php echo e($todo->chatID); ?></td>
                                            <td>
                                                <form action="<?php echo e(url('/todo/'. $todo->id)); ?>" method="POST"> 
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo e(method_field('DELETE')); ?>

                                                    <button type="submit" class="btn btn-danger btn-sm">Contacted</button>
                                                </form>
                                                
                                            </td>
                                            </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gurukota/Open Paly Hackathon/counselors/resources/views/todo.blade.php ENDPATH**/ ?>