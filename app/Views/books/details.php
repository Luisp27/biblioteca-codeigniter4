<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="<?= site_url('') ?>" class="btn btn-primary">Volver</a>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Detalles del libro</h5>
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" disabled id="name" name="name" placeholder="Nombre del libro" value="<?= $book['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Edición</label>
                        <input type="text" class="form-control" disabled id="name" name="name" placeholder="Edición del libro" value="<?= $book['edition'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Fecha de publicación</label>
                        <input type="text" class="form-control" disabled id="name" name="name" placeholder="Fecha de publicación del libro" value="<?= $book['publication_date'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Autores</label>
                        <input type="text" class="form-control" disabled id="name" name="name" placeholder="Edición del libro" value="<?= $book['authors'] ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?= $this->endSection() ?>