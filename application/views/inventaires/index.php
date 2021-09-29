    <!-- <link rel="stylesheet" href="//cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css"> -->
    <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css"> -->
    
    <!-- <script src="//code.jquery.com/jquery-3.5.1.js"></script> -->
    <!-- <script src="//cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script> -->
     <!-- <script src="//cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script> -->
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> -->
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> -->
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> -->
    <!-- <script src="//cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script> -->
    <!-- <script src="//cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script> -->
<!-- --------------------------------------------------------------------------------- -->
    <!-- <link rel="stylesheet" href="<?= base_url('assets/DataTables/export/buttons.dataTables.min.css') ?>"> -->
    <link rel="stylesheet" href="<?= base_url('assets/DataTables/export/buttons.dataTables.min.css') ?>">
    <script src="<?= base_url('assets/DataTables/export/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('assets/DataTables/export/dataTables.buttons.min.js') ?>"></script>
    <script src="<?= base_url('assets/DataTables/export/jszip.min.js') ?>"></script>
    <script src="<?= base_url('assets/DataTables/export/pdfmake.min.js') ?>"></script>
    <script src="<?= base_url('assets/DataTables/export/vfs_fonts.js') ?>"></script>
    <script src="<?= base_url('assets/DataTables/export/buttons.html5.min.js') ?>"></script>
    <script src="<?= base_url('assets/DataTables/export/buttons.print.min.js') ?>"></script>
        
    
    

<div class="container-fluid" style="height:100%;background-color:#bacce5">
    <div class="d-flex justify-content-between">
        <h4>Inventaire</h4>
    </div>
    <div style="display:none" class="alert alert-light role="alert"></div>
    <div style="display:none" class="alert alert-danger role="alert"></div>
        <div class="row">
            <div class="col-md-12">
            <div id="myform" class="card d-none" style="padding: 25px;">
                    <div class="card-header border-2">
                        <span>Nouvel Asset</span>
                    </div>
                    <form id="forms" action="<?= site_url('inventaireControlleur/newMateriel'); ?>" method="POST">
                         <input type="hidden" name="matId" value="0">
                                <div class="row col-md-12">
                                    <div class="form-group col-md-4">
                                        <label for="">Serial Number:</label>
                                        <input type="text" name="sn" class="form-control" value="">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="">Code materiel:</label>
                                        <input type="text" name="code" class="form-control" value="">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="">Designation:</label>
                                        <input type="text" name="designation" class="form-control" value="">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="">Reference:</label>
                                        <input type="text" name="reference" class="form-control" value="">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="">Num.Mac:</label>
                                        <input type="text" name="mac" class="form-control" value="">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="">Etat:</label>
                                        <select class="form-control" name="etat" id="">
                                            <option value="Bon">Bon</option>
                                            <option value="Moyen">moyen</option>
                                            <option value="critique">critique</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="">Service:</label>
                                        <select class="form-control" name="service" id="">
                                            <option value="Bon">Reseau</option>
                                            <option value="Moyen">Telephonie</option>
                                            <option value="critique">helpdesk</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="">modele:</label>
                                        <input type="text" name="modele" class="form-control" value="">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="">derniere Localisation:</label>
                                        <input type="text" name="localisation" class="form-control" value="">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="">Statut:</label>
                                        <select class="form-control" name="statut" id="">
                                            <option value="Bon">En production</option>
                                            <option value="Moyen">En stock</option>
                                            <option value="critique">Donation</option>
                                            <option value="Destruction">Destruction</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="">Famille:</label>
                                        <select name="famille" class="form-control">
                                            <?php foreach($this->Famille_model->liste_famille() as $famille){ ?>
                                            <option value="<?= $famille->libelle_famille ?>"><?= $famille->libelle_famille ?></option>
                                            <?php } ?>                                    
                                        </select>
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="">Observation:</label>
                                        <textarea class="form-control" name="observation" id=""></textarea>
                                    </div>

                                    <div class="form-group col-md-6">
                                    <input type="submit" id="saveSite" data="" class="btn btn-outline-dark save" value="Valider">
                                    </div>
                                </div>
                    </form>
                </div>
            </div>
            <div class="col-md-12">
            <div class="card" style="margin-top:3%; padding: 25px;">
                <div class="card-header border-0">
                <button id="insert" class="btn btn-outline-dark btn-sm">Ajouter asset</button>
                </div>
                <div class="table-responsive" style="margin-top: 10px;">

                <table id="tables"  class="display nowrap" style="width:100%">
                    <thead class="thead-light">
                    <tr>
                         <th>Act.</th>
                        <th>Item</th>
                        <th>Status</th>
                        <th>Code materiel</th>  
                        <th>Designation</th>
                        <th>SN</th>
                        <th>reference</th>
                        <th>Numero mac</th>
                        <th>Service</th>
                        <th>Modele</th>
                        <th>Etat</th>
                        <th>Derniere localisation</th>
                        <th>Observations</th>
                        <th>Famille</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="list" id="showdata">
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Act.</th>
                        <th>Item</th>
                        <th>Status</th>
                        <th>Code materiel</th>  
                        <th>Designation</th>
                        <th>SN</th>
                        <th>reference</th>
                        <th>Numero mac</th>
                        <th>Service</th>
                        <th>Modele</th>
                        <th>Etat</th>
                        <th>Derniere localisation</th>
                        <th>Observations</th>
                        <th>Famille</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $(document).ready(function() {
                // Exportation des donnees
                $('#tables').DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print' 
                    ]
                } );
            } );

             //  Afficher et masquer le formulaire d'ajout d'Item
             $(document).on('click', '#insert', function(e){
              let fm = document.getElementById('myform');
              fm.classList.toggle('d-none');
              if(document.getElementById('insert').innerHTML == "Fermer")
              {
                document.getElementById('insert').innerHTML = "Ajouter Asset";
              }else{
                document.getElementById('insert').innerHTML = "Fermer";
              }             
            });

            showAllMateriel();

            // Fucntion qui recupere les donnees en bd (Liste)
            function showAllMateriel(){
                $.ajax({
                    type: 'ajax',
                    url:'<?= base_url() ?>assets_it.php/inventaireControlleur/showAllMateriel',
                    async:false,
                    dataType: 'json',
                    success: function(data){
                        var html = '';
                        var i;
                        for (i=0; i<data.length; i++) {
                            var fam = '';
                            if(data[i].items_id == null){
                                fam = data[i].famille;
                            }else{
                                fam = data[i].libelle_famille;
                            }
                            html += '<tr>'+
                                        '<td>'+
                                            '<a href="javascript:;" class="btn btn-outline-dark btn-sm item-edit" data="'+data[i].id_mat+'" >Modifier</a>'+
                                            '<a href="javascript:;" class="btn btn-outline-danger btn-sm item-delete" data="'+data[i].id_mat+'" >Supprimer</a>'+
                                        '</td>'+
                                       ' <td>'+data[i].id_mat+'</td>'+
                                        '<td>'+data[i].statut+'</td>'+
                                        '<td>'+data[i].code_mat+'</td>'+
                                        '<td>'+data[i].designation_mat+'</td>'+
                                        '<td>'+data[i].sn+'</td>'+
                                        '<td>'+data[i].reference+'</td>'+
                                        '<td>'+data[i].num_mac+'</td>'+
                                        '<td>'+data[i].service+'</td>'+
                                        '<td>'+data[i].modele+'</td>'+
                                        '<td>'+data[i].etat+'</td>'+
                                        '<td>'+data[i].derniere_localisation+'</td>'+
                                        '<td>'+data[i].observation+'</td>'+
                                        '<td>'+fam+'</td>'+
                                        '<td>'+
                                            '<a href="javascript:;" class="btn btn-outline-dark btn-sm item-edit" data="'+data[i].id_mat+'" >Modifier</a>'+
                                            '<a href="javascript:;" class="btn btn-outline-dark btn-sm item-delete" data="'+data[i].id_mat+'" >Supprimer</a>'+
                                        '</td>'+
                                   ' </tr>';
                        }
                        $('#showdata').html(html);
                    },
                    error:function(){
                        alert('Erreur! narrive pas a obtenir les donnees demandées')
                    }
                });
            }

            //Ajouter et modification
            // -----------------------------------------------------------------------------------
            $('#saveSite').click(function(e){
                e.preventDefault();
                var url = $('#forms').attr('action');                
                var data = $('#forms').serialize();
                //valider le formulaire

                var sn = $('input[name=sn]');
                var modele = $('input[name=modele]');
                var matId = $('input[name=matId]');
                var resultat = '';

                if(sn.val()==''){
                    $('.alert-danger').html('le numero de serie est requis!').fadeIn().delay(2000).fadeOut('slow');
                }else{
                    resultat = '1';
                }

                if(modele.val()==''){
                    $('.alert-danger').html('le modele est requis!').fadeIn().delay(2000).fadeOut('slow');
                }else{
                    resultat += '2';
                }

                if(resultat == '12'){
                    $.ajax({
                    type: 'ajax',
                    method:'post',
                    url:url,
                    data:data,
                    async:false,
                    dataType: 'json',
                    success: function(response){
                        if (response.success) {
                            $('#forms')[0].reset();
                            if (response.type == 'update') {
                                var type = 'Modifié';
                            }else{
                                var type = 'ajouté';
                            }
                            $('.alert-light').html('Asset '+ type).fadeIn().delay(2000).fadeOut('slow');
                            showAllMateriel();
                        }else{
                            alert('Une erreur est survenu!');
                        }
                    },
                    error:function(){
                        alert('Impossible d\'effectuer l\'action');
                    }
                });
                }
            });

            //Editer -------------------------------------------------------------------------------
            $('#showdata').on('click', '.item-edit', function(){
                $('#saveSite').html('Modifier');
                $('#forms').attr('action','<?= site_url('inventaireControlleur/updateMateriel'); ?>');
                var id = $(this).attr('data');
                $.ajax({
                    type: 'ajax',
                    method:'get',
                    url:'<?= site_url('inventaireControlleur/editMateriel'); ?>',
                    data:{id:id},
                    async:false,
                    dataType: 'json',
                    success: function(data){
                        $('input[name=sn]').val(data.sn);
                        $('input[name=reference]').val(data.reference);
                        $('input[name=mac]').val(data.num_mac);
                        $('input[name=modele]').val(data.modele);
                        $('input[name=code]').val(data.code_mat);
                        $('input[name=designation]').val(data.designation_mat);
                        $('input[name=localisation]').val(data.derniere_localisation);
                        $('input[name=observation]').val(data.observation);
                        $('input[name=matId]').val(data.id_mat);
                    },
                    error:function(){
                        alert('Impossible d effectuer cette action');
                    }
                });
            });

            //Supprimer -----------------------------------------------------------------------
            $('#showdata').on('click', '.item-delete', function(){
                var id = $(this).attr('data');
                var res = confirm("Êtes-vous sûr de vouloir supprimer?");
                if(res){
                        $.ajax({
                        type: 'ajax',
                        method:'get',
                        url:'<?= site_url('inventaireControlleur/deleteMateriel'); ?>',
                        data:{id:id},
                        async:false,
                        dataType:'json',
                        success: function(response){
                            if (response.success) {
                                $('.alert-light').html('site Supprimé').fadeIn().delay(2000).fadeOut('slow');
                                showAllMateriel();
                            } else {
                                alert('Impossile de supprimer cette localisation');
                            }
                        },
                        error:function(){
                            alert('Impossible d ajouter le site');
                        }
                    });
                }
                
            });

        });
    </script>   
</body>
</html>