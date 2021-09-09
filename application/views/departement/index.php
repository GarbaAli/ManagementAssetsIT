<div class="container" style="height:100%;background-color:#bacce5">
    <div class="d-flex justify-content-between">
        <h4>Departements</h4>
        <a class="btn btn-default" style="background-color:white" href="<?= site_url('technicienControlleur/index'); ?>">Liste des Techniciens</a>
    </div>
        <div class="row">
            <div class="col-md-6">
            <div class="card" style="margin-top:10%; padding: 25px;">
                <div class="card-header border-0">
                <span class="mb-0">Departement</span>
                </div>
                <div class="table-responsive" style="margin-top: 10px;">

                <table id="tables">
                    <thead class="thead-light">
                    <tr>
                        <th>CODE</th>
                        <th>Libelle</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="list">
                    <?php foreach($departements as $departement){ ?>
                        <tr>
                        <td><?= $departement['codeDept'] ?></td>
                        <td><?= $departement['libelleDept'] ?></td>
                        <td>
                            <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                            <?= anchor("departementControlleur/delete/{$departement['codeDept']}", 'Delete', ['class'=> 'btn btn-danger btn-sm']); ?>
                            </div>
                        </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                </div>
            </div>
            </div>
            
            <div class="col-md-6">
            <div class="card" style="margin-top:10%; padding: 25px;">
                    <div class="card-header border-2">
                    <span>Ajouter un departement</span>
                    <span style="color:red;font-size:15px;"><?=  form_error('code') ?></span>
                    <span style="color:red;font-size: 15px;"><?=  form_error('libelle') ?></span>
                    </div>
                    <form method="POST" action="<?= site_url('departementControlleur/store'); ?>" style="margin-top: 10px;">
                        <div class="form-row align-items-center">
                            <div class="col-auto">
                            <label class="sr-only" for="inlineFormInputGroup">Libelle :</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text"></div>
                                </div>
                                <input type="text" name="libelle" value="<?= set_value('libelle') ?>" class="form-control" id="inlineFormInputGroup" placeholder="Entrer le libelle">
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