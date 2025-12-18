<html>
<head>
    <title>Student Marksheet - <?php echo e($sr->user->name); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/my_print.css')); ?>" />
    <link rel="icon" href="<?php echo e(\App\Repositories\SettingRepo::getlogo()); ?>">
</head>
<body>
<div class="container">
    <div id="print"  style="border-radius: 5px;margin: 0; padding: 10px; height: 100vh" xmlns:margin-top="http://www.w3.org/1999/xhtml">
        
        <table width="100%">
            <tr>
                <td>
                    <img src="<?php echo e($s['logo']); ?>" style="max-height : 150px;">
                </td>

                <td style="text-align: center; ">
                    <strong><span style="color: #1b0c80; font-size: 25px;"><?php echo e(strtoupper(Qs::getSetting('system_name'))); ?></span></strong><br/>
                     <strong><span style="color: red; font-style: italic; font-size: 23px;"><?php echo e(Qs::getSetting('motto')); ?></span></strong><br/>
                    <strong><span style="color: #000; font-size: 15px"><i><?php echo e(ucwords($s['address'])); ?></i></span></strong><br/>
                    <strong><span style="color: #000; font-size: 12px"><i><?php echo e($s['website']); ?></i></span></strong><br/>
                    <strong><span style="color: #000; font-size: 15px"><i><?php echo e($s['phone']); ?></i></span></strong><br/>
                    <strong><span style="color: #000; font-size: 15px;"> REPORT SHEET <?php echo e('('.strtoupper($class_type->name).')'); ?></span></strong>
                </td>
                <td style="width: 100px; height: 100px; float: left;">
                    <?php if(!empty($sr->user->photo) and $sr->user->photo != Qs::getDefaultUserImage()): ?>
                    <img src="<?php echo e($sr->user->photo); ?>"
                         alt="..."  width="100" height="100">
                    <?php endif; ?>
                </td>
            </tr>
        </table>
        <br/>

        
        <div style="position: relative;  text-align: center; ">
            <img src="<?php echo e($s['logo']); ?>" style="max-width: 500px; max-height:600px; margin-top: 60px; position:absolute ; opacity: 0.2; margin-left: auto;margin-right: auto; left: 0; right: 0;" />
        </div>

        
        <?php echo $__env->make('pages.support_team.marks.print.sheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div style=" display: flex;justify-content: space-around; gap: 10px; width: 100%;">
            
            <?php echo $__env->make('pages.support_team.marks.print.grading', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            
            <?php echo $__env->make('pages.support_team.marks.print.skills', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
            
            <?php echo $__env->make('pages.support_team.marks.print.comments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    </div>
</div>

<script>
     window.print();
</script>
</body>

</html>
<?php /**PATH /Users/yusufolatunji/MyProject/Saas/lav_sms/resources/views/pages/support_team/marks/print/index.blade.php ENDPATH**/ ?>