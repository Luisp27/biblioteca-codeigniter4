<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Crear autor</h1>
            <form id='create_form' action="<?= site_url('authors/store') ?>" method="POST">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del autor">
                </div>
                <div class="form-group">
                    <label for="lastname">Apellido</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Apellido del autor">
                </div>
                <div class="form-group">
                    <label for="country">País</label>
                    <input type="text" class="form-control" id="country" name="country" placeholder="País del autor">
                </div>
                <div class="form-group">
                    <label for="country">Fecha de registro</label>
                    <input type="date" class="form-control" id="register_date" name="register_date" placeholder="Fecha de registro del autor">
                </div>
                <button type="submit" class="btn btn-primary">Crear</button>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    if ($("#create_form").length > 0) {
        $("#create_form").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                lastname: {
                    required: true,
                    minlength: 3
                },
                country: {
                    required: true,
                },
                register_date: {
                    required: true,
                }
            },
            messages: {
                name: {
                    required: "Por favor ingrese un nombre",
                    minlength: "El nombre debe tener al menos 3 caracteres"
                },
                lastname: {
                    required: "Por favor ingrese un apellido",
                    minlength: "El apellido debe tener al menos 3 caracteres"
                },
                country: {
                    required: "Por favor ingrese un país",
                },
                register_date: {
                    required: "Por favor ingrese una fecha de registro",
                }
            },
        })
    }
</script>
<?= $this->endSection() ?>