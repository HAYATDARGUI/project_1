<?php $__env->startSection("meta"); ?>
<title>Liste des Receptions</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("contents"); ?>

<div class="card shadow mb-4">
    <div class="card-body">
        <a href="receptions/create" class="btn btn-primary mb-3">Ajouter</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Client Principale</th>
                        <th>Societe</th>
                        <th>Ville</th>
                        <th>Zones</th>
                        <th>Qantite</th>
                        <th>Transport</th>
                        <th>Produit</th>
                        <th>Note</th>
                    </tr>
                </thead>
                <?php if(!is_null($receptions) && count($receptions)>0): ?>
                <tbody>
                    <?php $__currentLoopData = $receptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reception): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($reception->BR_Date); ?></td>
                        <?php if($reception->clients): ?>
                        <td><?php echo e($reception->clients->Client_Principale); ?></td>
                        <?php else: ?>
                        <td>client non disponible</td>
                        <?php endif; ?>
                        <?php if($reception->clients): ?>
                        <td><?php echo e($reception->clients->Client_Societe); ?></td>
                        <?php else: ?>
                        <td>societe non disponible</td>
                        <?php endif; ?>
                        <?php if($reception->clients && $reception->clients->villes): ?>
                        <td> <?php echo e($reception->clients->villes->Ville_Nom); ?></td>
                        <?php elseif($reception->clients): ?>
                        <td>client sans ville</td>
                        <?php else: ?>
                        <td>ville non disponible</td>
                        <?php endif; ?>

                        <?php if($reception->clients && $reception->clients->villes && $reception->clients->villes->zones): ?>
                        <td><?php echo e($reception->clients->villes->zones->Zone_Nom); ?></td>
                        <?php else: ?>
                        <td>Zone non disponible</td>
                        <?php endif; ?>
                        <td><?php echo e($reception->BR_Qte); ?></td>
                        <td><?php echo e($reception->transports->Transport_Nom); ?></td>

                        <td>
                            <?php if($reception->Detail_Br): ?>
                            <?php $__currentLoopData = $reception->Detail_Br; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail_br): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($detail_br->Produits->Produit_Nom); ?><br>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </td>

                        <td><?php echo e($reception->BR_Note); ?></td>
                        <td>
                            <div class="actions">
                                <a href="edition/<?php echo e($reception->id); ?>" class="btn btn-warning">Modifier</a>
                                <form id="<?php echo e($reception->id); ?>" method="POST" action="<?php echo e(route('receptions.delete',$reception->id)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-danger"  onclick="event.preventDefault();
                                        if(confirm('Êtes-vous sûr ?'))
                                        document.getElementById(<?php echo e($reception->id); ?>).submit();" type="submit">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php else: ?>
<p>Liste de reception est vide dans la base de données</p>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hp\laravelapp\resources\views/receptions/index.blade.php ENDPATH**/ ?>