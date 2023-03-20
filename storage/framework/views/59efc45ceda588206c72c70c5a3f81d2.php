<?php $__env->startSection('title', 'Liste des Clients'); ?>

<?php $__env->startSection("contents"); ?>
<div class="card shadow mb-4">
    <div class="card-body">
    <a href="clients/create" class="btn btn-primary mb-3">Ajouter</a>
    <?php if(count($clients)>0): ?>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                    <th>Nom de Client Principale</th>
                    <th>Societe</th>
                    <th>Ville</th>
                    <th>Telephone</th>
                    <th>Emails</th>
                    <th>Note</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($client->Client_Principale); ?></td>
                        <td><?php echo e($client->Client_Societe); ?></td>
                        <td ><?php echo e($client->villes->Ville_Nom); ?></td>
                        <td ><?php echo e($client->Client_Tel); ?></td>
                        <td><?php echo e($client->Client_Emails); ?></td>
                        <td><?php echo e($client->Client_Note); ?></td>
                        <td>
                            <div class="actions">
                                <a href="modifier/<?php echo e($client->id); ?>" class="btn btn-warning">Modifier</a>
                                <form id="<?php echo e($client->id); ?>" method="POST" action="<?php echo e(route('clients.delete',$client->id)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-danger" onclick="event.preventDefault();
                                        if(confirm('Êtes-vous sûr ?'))
                                        document.getElementById(<?php echo e($client->id); ?>).submit();" type="submit">
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
        <p>Aucun client disponible dans la base de données</p>
    <?php endif; ?>
    </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hp\laravelapp\resources\views/clients/index.blade.php ENDPATH**/ ?>