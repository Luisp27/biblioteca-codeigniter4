<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Lista de libros</h1>
            <a href="<?= site_url('books/create') ?>" class="btn btn-primary">Agregar libro</a>
            <table id="book-table" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nombre</td>
                        <td>Edición</td>
                        <td>Fecha de publicación</td>
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
        $('#book-table').DataTable({
            ajax: {
                url: "<?php echo site_url("books/books_table") ?>",
                type: 'GET'
            },
            columns: [{
                    data: 'id'
                },
                {
                    data: 'name'
                },
                {
                    data: 'edition'
                },
                {
                    data: 'publication_date'
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