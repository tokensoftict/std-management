
    
    <table  style="width:33%; border-collapse:collapse; border: 1px solid #000; margin:10px 0px;" border="1">
        <thead>
        <tr>
            <td><strong>AFFECTIVE TRAITS</strong></td>
            <td><strong>RATING</strong></td>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $skills->where('skill_type', 'AF'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $af): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($af->name); ?></td>
                <td><?php echo e($exr->af ? explode(',', $exr->af)[$loop->index] : ''); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <table  style="width:34%; border-collapse:collapse;border: 1px solid #000;  margin: 10px 0px;" border="1">
        <thead>
        <tr>
            <td><strong>PSYCHOMOTOR</strong></td>
            <td><strong>RATING</strong></td>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $skills->where('skill_type', 'PS'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($ps->name); ?></td>
                <td><?php echo e($exr->ps ? explode(',', $exr->ps)[$loop->index] : ''); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

<?php /**PATH /Users/yusufolatunji/MyProject/Saas/lav_sms/resources/views/pages/support_team/marks/print/skills.blade.php ENDPATH**/ ?>