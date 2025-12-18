
    <table  style="width:33%; border-collapse:collapse; border: 1px solid #000; margin:10px 0px;" border="1">
        <thead>
            <tr>
                <th>SCORE RANGE</th>
                <th>GRADE</th>
                <th>MEANING</th>
            </tr>
        </thead>
        <tbody>
        <?php if(Mk::getGradeList($class_type->id)->count()): ?>
            <?php $__currentLoopData = Mk::getGradeList($class_type->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($gr->mark_from.' - '.$gr->mark_to); ?></td>
                    <td><?php echo e($gr->name); ?></td>
                    <td><?php echo e($gr->remark); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        </tbody>
    </table>




<?php /**PATH /Users/yusufolatunji/MyProject/Saas/lav_sms/resources/views/pages/support_team/marks/print/grading.blade.php ENDPATH**/ ?>