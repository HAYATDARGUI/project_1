<?php $__env->startSection('title', 'Liste des Produits'); ?>

<?php $__env->startSection("contents"); ?>
<div class="card shadow mb-4">
    <div class="card-body">
        <a href="produits/create" class="btn btn-primary mb-3">Ajouter</a>
        <?php if(count($produits)>0): ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nom de Produit</th>
                        <th>Reference</th>
                        <th>Categorie</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($produit->Produit_Nom); ?></td>
                        <td><?php echo e($produit->Produit_Ref); ?></td>
                        <td>
                            <?php if($produit->cathegories): ?>
                            <?php echo e($produit->cathegories->Cath_Designation); ?>

                            <?php else: ?>
                            Catégorie non disponible
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($produit->Produit_Description); ?></td>
                        <td>
                            <div class="actions">
                                <a href="edit/<?php echo e($produit->id); ?>" class="btn btn-warning">Modifier</a>
                                <form id="<?php echo e($produit->id); ?>" method="POST"
                                    action="<?php echo e(route('produits.delete',$produit->id)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-danger" onclick="event.preventDefault();
                                        if(confirm('Êtes-vous sûr ?'))
                                        document.getElementById(<?php echo e($produit->id); ?>).submit();" type="submit">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php else: ?>
            <p>Aucun produit disponible dans la base de données</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hp\laravelapp\resources\views/produits/index.blade.php ENDPATH**/ ?>