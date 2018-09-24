<?php $__env->startSection('title', 'View a ticket'); ?>
<?php $__env->startSection('content'); ?>

    <div class="container col-md-8 col-md-offset-2">
            <div class="well well bs-component">
                <div class="content">
                    <h2 class="header"><?php echo $ticket->title; ?></h2>
                    <p> <strong>Status</strong>: <?php echo $ticket->status ? 'Pending' : 'Answered'; ?></p>
                    <p> <?php echo $ticket->content; ?> </p>
                </div>
                <a href="<?php echo e(route('tickets.edit', $ticket->slug)); ?>" class="btn btn-info">Edit</a>
                <form method="post" action="<?php echo e(route('tickets.destroy', $ticket->slug)); ?>" class="pull-left">
                    <?php echo csrf_field(); ?>

                    <div>
                        <button type="submit" class="btn btn-warning">Delete</button>
                    </div>
                </form>

                <div class="clearfix"></div>
            </div>

            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="well well bs-component">
                    <div class="content">
                        <?php echo $comment->content; ?>

                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="well well bs-component">
                <form class="form-horizontal" method="post" action="/comment">

                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p class="alert alert-danger"><?php echo e($error); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" name="post_id" value="<?php echo $ticket->id; ?>">
                    <input type="hidden" name="post_type" value="App\Ticket">

                    <fieldset>
                        <legend>Reply</legend>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <textarea class="form-control" rows="3" id="content" name="content"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-primary">Post</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
    </div>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>