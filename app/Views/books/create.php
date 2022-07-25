<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Crear libro</h1>
            <form id='create_form' method="POST">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del libro">
                </div>
                <div class="form-group">
                    <label for="publication_date">Fecha de publicación</label>
                    <input type="date" class="form-control" id="publication_date" name="publication_date" placeholder="Fecha de publicación">
                </div>
                <div class="form-group">
                    <label for="edition">Edición</label>
                    <input type="number" class="form-control" id="edition" name="edition" placeholder="Edición">
                </div>
                <div class="form-group">
                    <label for="authors">Autores</label>
                    <select class="selectpicker" id="authors" name="authors" multiple>
                        <?php foreach ($authors as $author) : ?>
                            <option value="<?= $author['id'] ?>"><?= $author['name'] . ' ' . $author['lastname'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Crear</button>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.selectpicker').selectpicker();

        // get authors and transform to string divided by comma
        $('#create_form').on('submit', function(e) {
            e.preventDefault();

            var form = $("#create_form");

            if (form.length > 0) {
                form.validate({
                    rules: {
                        name: {
                            required: true,
                            minlength: 3
                        },
                        publication_date: {
                            required: true,
                        },
                        edition: {
                            required: true,
                        },
                        authors: {
                            required: true,
                        }
                    },
                    messages: {
                        name: {
                            required: "Por favor ingrese un nombre",
                            minlength: "El nombre debe tener al menos 3 caracteres"
                        },
                        publication_date: {
                            required: "Por favor ingrese una fecha de publicación",
                        },
                        edition: {
                            required: "Por favor ingrese una edición",
                        },
                        authors: {
                            required: "Por favor seleccione un autor",
                        }
                    },
                })

                if (form.valid()) {
                    var authors = $('#authors').val();
                    authors.join(',');

                    $.ajax({
                        type: 'POST',
                        url: '<?= base_url('books/store') ?>',
                        data: {
                            name: $('#name').val(),
                            publication_date: $('#publication_date').val(),
                            edition: $('#edition').val(),
                            authors
                        },
                        success: function(data) {
                            window.location.href = '<?= site_url('') ?>';
                            console.log('success');
                        },
                        error: function(data) {
                            console.log('error');
                        }
                    });
                }

            }
        });


    });
</script>
<?= $this->endSection() ?>