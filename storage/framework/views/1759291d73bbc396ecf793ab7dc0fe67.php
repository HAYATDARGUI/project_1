<?php $__env->startSection('title', 'Form Produit'); ?>

<?php $__env->startSection('contents'); ?>
<form method="POST" action="<?php echo e(route('produits.store')); ?>">
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="form-group">
                        <label for="Produit_Nom"><?php echo e(__('Nom de produit :')); ?></label>
                        <input type="text" id="Produit_Nom" name="Produit_Nom" value="<?php echo e(old('Produit_Nom')); ?>"
                            <?php $__errorArgs = ['Nom de produit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> autocomplete="Nom de produit" autofocus>

                        <?php $__errorArgs = ['Nom de produit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="error">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">


                        <label for="Produit_Ref"><?php echo e(__('Reference :')); ?></label>
                        <input type="text" id="Produit_Ref" name="Produit_Ref" value="<?php echo e(old('Produit_Ref')); ?>"
                            <?php $__errorArgs = ['Reference'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> autocomplete="Reference" autofocus>

                        <?php $__errorArgs = ['Reference'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="error">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">

                        <label for="Nouvelle_Cathegorie"><?php echo e(__('Nouvelle catégorie :')); ?></label>
                        <input type="text" id="Nouvelle_Cathegorie" name="Nouvelle_Cathegorie"
                            value="<?php echo e(old('Nouvelle_Cathegorie')); ?>" autocomplete="off">

                        <?php if($errors->has('Nouvelle_Cathegorie')): ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('Nouvelle_Cathegorie')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="Produit_Cath"><?php echo e(__('Categories :')); ?></label>
                        <select id="Produit_Cath" name="Produit_Cath">
                            <?php $__currentLoopData = $Cathegories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cathegorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cathegorie->id); ?>"><?php echo e($cathegorie->Cath_Designation); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <?php $__errorArgs = ['Categories'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="error">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <label for="Produit_Description"><?php echo e(__('Description de produit :')); ?></label>
                        <input type="text" id="Produit_Description" name="Produit_Description"
                            value="<?php echo e(old('Produit_Description')); ?>" <?php $__errorArgs = ['Description de produit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            autocomplete="Description de produit" autofocus>

                        <?php $__errorArgs = ['Description de produit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="error">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" value="<?php echo e(__('enregistrer')); ?>">ajouter</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hp\laravelapp\resources\views/produits/create.blade.php ENDPATH**/ ?>