<?php $__env->startSection('title', 'View all tickets'); ?>
<?php $__env->startSection('content'); ?>

    <div class="container col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2> Tickets </h2>
                </div>
                <?php if(session('status')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>

                <?php if($tickets->isEmpty()): ?>
                    <p> There is no ticket.</p>
                <?php else: ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo $ticket->id; ?> </td>
                                    <td>
                                        <a href="<?php echo e(route('tickets.show', $ticket->slug)); ?>">
                                            <?php echo $ticket->title; ?>

                                        </a>
                                    </td>
                                    <td><?php echo $ticket->status ? 
                                        '<span class="label label-default"> Pending </span>' : 
                                        '<span class="label label-info"> Answered </span>'; ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>