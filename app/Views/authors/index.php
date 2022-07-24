<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            if ($error) {
                echo '<div class="alert alert-danger" role="alert">' .
                    $error
                    . '</div>';
            }
            ?>
            <h1>Lista de autores</h1>
            <a href="<?= site_url('authors/create') ?>" class="btn btn-primary">Agregar autor</a>
            <table id="author-table" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nombre</td>
                        <td>Apellido</td>
                        <td>País</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#author-table').DataTable({
            ajax: {
                url: "<?php echo site_url("authors/authors_table") ?>",
                type: 'GET'
            },
            columns: [{
                    data: 'id'
                },
                {
                    data: 'name'
                },
                {
                    data: 'lastname'
                },
                {
                    data: 'country'
                },
                {
                    data: 'actions'
                }
            ],
            language: {
                url: '/biblioteca-codeigniter4/public/datatables.es-ES.json'
            }
        });
    });
</script>
<?= $this->endSection() ?>