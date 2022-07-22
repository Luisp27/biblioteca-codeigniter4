<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="<?= site_url('authors') ?>" class="btn btn-primary">Volver</a>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Detalles de autor</h5>
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" disabled id="name" name="name" placeholder="Nombre del autor" value="<?= $author['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Apellido</label>
                        <input type="text" class="form-control" disabled id="lastname" name="lastname" placeholder="Apellido del autor" value="<?= $author['lastname'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="country">País</label>
                        <input type="text" class="form-control" disabled id="country" name="country" placeholder="País del autor" value="<?= $author['country'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="country">Fecha de registro</label>
                        <input type="text" class="form-control" disabled id="country" name="country" placeholder="País del autor" value="<?= $author['register_date'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="country">Cantidad de libro</label>
                        <input type="text" class="form-control" disabled id="country" name="country" placeholder="País del autor" value="<?= $author['books_count'] ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?= $this->endSection() ?>