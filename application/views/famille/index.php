    <div class="container" style="height:100%;background-color:#bacce5">
    <div class="d-flex justify-content-between">
        <h4>Familles Materiels</h4>
        <a class="btn btn-default" style="background-color:white" href="<?= site_url('model_controlleur/index'); ?>">Modeles Materiels</a>
    </div>
        <div class="row">
            <div class="col-md-6">
            <div class="card" style="margin-top:10%; padding: 25px;">
                    <div class="card-header border-2">
                    <span>Ajouter une Famille</span>
                    </div>
                    <form method="POST" action="<?= site_url('familleControlleur/store'); ?>" style="margin-top: 10px;">
                        <div class="form-row align-items-center">
                            <div class="col-auto">
                            <label class="sr-only" for="inlineFormInputGroup">Famille</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text"></div>
                                </div>
                                <input type="text" name="famille" value="<?= set_value('famille') ?>" class="form-control" id="inlineFormInputGroup" placeholder="Entree le libelle">
                            </div>
                            </div>
                            <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-2">Valider</button>
                            </div>
                            <span style="color:red;font-style:italic" ><?= form_error('famille'); ?></span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
            <div class="card" style="margin-top:10%; padding: 25px;">
                <div class="card-header border-0">
                <span class="mb-0">Famille</span>
                </div>
                <div class="table-responsive" style="margin-top: 10px;">

                <table id="tables">
                    <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Libelle</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="list">
                    <?php foreach($familles as $famille){ ?>
                        <tr>
                        <td><?= $famille->getIdFamille() ?></td>
                        <td><?= $famille->getLibelleFamille() ?></td>
                        <td>
                            <div class="d-flex justify-content-between">
                            <!-- <a href="#" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                            <a href="<?= base_url('assets_it.php/familleControlleur/delete/'.$famille->getIdFamille()) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> -->

                            <?= anchor("familleControlleur/delete/{$famille->getIdFamille()}", 'Delete', ['class'=> 'btn btn-danger']); ?>
                            </div>
                        </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>
    

    <script src="<?= base_url('assets/js/jquery-3.2.1.min.js') ?>"></script>
    <script src="//cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script> 
    <script>
        $(document).ready(function () {
            $('#tables').DataTable(
                {
                    language: {
                        url: "//cdn.datatables.net/plug-ins/1.10.25/i18n/French.json"
                    }
                }
            );
        });
    </script>   
</body>
</html>