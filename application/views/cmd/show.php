<div class="container-fluid" style="height:100%;background-color:#bacce5;width:100%">
        <!-- Message Flash -->
        <div style="height: 10%; border:1px solid #bacce5">
                <div style="display:none;" class="alert alert-light role="alert"></div>
        </div>
        <!-- Fin message Flash -->
        <div id="commande" class="row" data="<?= $cmd[0]->id_cmd ?>">
            <div class="col-md-12">
                <div class="card" style="margin-top:2%; padding: 25px;">
                    <div style="background-color:#bacce5" class="card-header border-2">
                        <span>Detail de la commande</span>
                    </div>
                    <span style="color:red;"><?php echo validation_errors(); ?></span>
                        <div class="row col-md-12">
                            <div class="form-group col-md-4">
                                <label for="">PO:</label>
                                <input type="text" disabled name="po" class="form-control" value="<?= $cmd[0]->po ?>">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="">Fournisseur:</label>
                                <input type="text" disabled name="po" class="form-control" value="<?= $cmd[0]->nom_fsseur ?>">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="">Date Livraison:</label>
                                <input type="text" disabled class="form-control" value="<?= $this->parse_date->parseDate($cmd[0]->dte_livraison) ?>">
                            </div>
                        </div>
                </div>
            </div>

          
                 <div id="display" class="card col-md-10 d-none" style="margin:2%; padding: 25px;">
                    <div class="card-header border-2">
                         <span>Nouvel Item</span>
                    </div>
                    <form id="formItem" action="<?= site_url('itemControlleur/store'); ?>" method="POST">
                    <input type="hidden" name="itemId" value="0">
                        <div class="row col-md-12">
                            <div class="form-group col-md-3">
                                <label for="">Modele de l'item:</label>
                                <input type="text" name="modele" class="form-control" value="">
                                <span id="errorModele"  style="color:red;font-style:italic"></span>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Famille:</label>
                                <div class="d-flex">
                                <select name="famille" id="showdata" class="form-control">
                                </select>
                                    <button id="addFamille" style="border-radius:50px; margin-left:10px" class="btn btn-dark btn-sm">+</button>
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Quantité:</label>
                                <input type="number" name="qte" class="form-control" value="">
                                <span id="errorQte"  style="color:red;font-style:italic"></span>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Qte Livrée:</label>
                                <input type="number" name="qteLivrer" class="form-control" value="">
                                <span id="errorQteLivrer"  style="color:red;font-style:italic"></span>
                            </div>
                            
                            <div class="form-group col-md-6">
                               <input id="saveItem" type="submit" class="btn btn-outline-dark" value="Nouvel Item">
                               <button id="annuler" class="btn btn-outline-danger">Annuler</button>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="hidden" name="cmd" class="form-control" value="<?= $cmd[0]->id_cmd ?>">
                            </div>
                        </div>
                    </form>
                    <!-- Formulaire d'ajout dune nouvelle famille -->
                    <form class="d-none" id="formAddFamille" action="<?= site_url('familleControlleur/store'); ?>" method="post">
                        <div class="d-flex col-md-8">
                            <input type="text" name="famille" placeholder="Libelle Famille" class="form-control"><br>
                            <div class="form-group col-md-4">
                                <button style="margin-left:10px" id="saveFamille" class="btn btn-outline-dark">Valider</button>
                                <input type="hidden" name="cmd" class="form-control" value="<?= $cmd[0]->id_cmd ?>">
                                <button id="annulerFamille" class="btn btn-outline-danger">Annuler</button>
                            </div>
                        </div>
                        <span id="errorFamille" style="color:red;font-style:italic" ></span>
                    </form>
            </div>
        </div>


                <!-- Tableau d'items -->
            <div class="col-md-10">
            <div class="card" style="margin-top:5%; padding: 25px;">
                <div class="card-header border-0">
                    <button id="insert" class="btn btn-dark btn-sm">Ajouter</button>
                </div>
                <div class="table-responsive" style="margin-top: 10px;">

                <table id="tables" class="display nowrap">
                    <thead class="thead-light">
                    <tr>
                        <th>Item</th>
                        <th>Designation</th>
                        <th>Famille</th>
                        <th>Quantite</th>
                        <th>Qte Livrée</th>
                        <th>En Attente.</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="list" id="showItem">
                    </tbody>
                    <tfoot class="thead-light">
                    <tr>
                         <th>Item</th>
                        <th>Designation</th>
                        <th>Famille</th>
                        <th>Quantite</th>
                        <th>Qte Livrée</th>
                        <th>En Attente.</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>
    

    <script src="<?= base_url('assets/js/jquery-3.2.1.min.js') ?>"></script>
    <script src="<?= base_url('assets/DataTables/media/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script> 
    <script>
        $(document).ready(function () {
            $(document).ready(function() {
                // Exportation des donnees
                $('#tables').DataTable(
                {
                    language: {
                        url: "//cdn.datatables.net/plug-ins/1.10.25/i18n/French.json"
                    }
                });
            });

            //  Afficher le formulaire d'ajout cmd
            $(document).on('click', '#insert', function(e){
              let fm1 = document.getElementById('display');
              fm1.classList.remove('d-none');
              let bt = document.getElementById('insert');
              bt.classList.add('d-none');
            });

             //   masquer le formulaire d'ajout Cmd
             $(document).on('click', '#annuler', function(e){
                e.preventDefault();
                $('#formItem')[0].reset();
              let fr = document.getElementById('display');
              let bt = document.getElementById('insert');
              bt.classList.remove('d-none');
              fr.classList.add('d-none');
            });

            //  Afficher le formulaire d'ajout famille
            $(document).on('click', '#addFamille', function(e){
                e.preventDefault();
              let fr = document.getElementById('formAddFamille');
              let bt = document.getElementById('addFamille');
              bt.classList.add('d-none');
              fr.classList.remove('d-none');
            });

            //   masquer le formulaire d'ajout famille
            $(document).on('click', '#annulerFamille', function(e){
                e.preventDefault();
              let fr = document.getElementById('formAddFamille');
              let bt = document.getElementById('addFamille');
              bt.classList.remove('d-none');
              fr.classList.add('d-none');
            });


            listeItems();
            listeFamille();


            // Fucntion qui recupere les donnees en bd (Liste Famille)
            function listeFamille(){
                $.ajax({
                    type: 'ajax',
                    url:'<?= base_url() ?>assets_it.php/familleControlleur/listeFamille',
                    async:false,
                    dataType: 'json',
                    success: function(data){
                        console.log(data);
                        var html = '';
                        var i;
                        for (i=0; i<data.length; i++) {
                            html += '<option value="'+data[i].id_famille+'"> '+data[i].libelle_famille+' </option>';
                        }
                        $('#showdata').html(html);
                    },
                    error:function(){
                        alert('Erreur! narrive pas a obteniries donnnees demandées')
                    }
                });
            }

              //Ajouter
            // -----------------------------------------------------------------------------------
            $('#saveFamille').click(function(e){
                e.preventDefault();
                var url = $('#formAddFamille').attr('action');                
                var data = $('#formAddFamille').serialize();
                //valider le formulaire

                var famille = $('input[name=famille]');
                var resultat = 1;

                if(famille.val()==''){
                    $('#errorFamille').html('Ce Champs est obligatoire!').fadeIn().delay(2000).fadeOut('slow');
                    resultat = 0;
                }else{
                    $('#errorFamille').html('');
                }
                if(resultat == 1){
                    $.ajax({
                    type: 'ajax',
                    method:'post',
                    url:url,
                    data:data,
                    async:false,
                    dataType: 'json',
                    success: function(response){
                        if (response.success) {
                            $('#formAddFamille')[0].reset();
                            if (response.type == 'update') {
                                var type = 'Modifié';
                            }else{
                                var type = 'ajouté';
                            }
                            $('.alert-light').html('Famille '+ type).fadeIn().delay(2000).fadeOut('slow');
                            listeFamille();
                        }else{
                            alert('Cette Valeur existe deja en Base de donnee');
                        }
                    },
                    error:function(){
                        alert('Impossible d\'effectuer l\'action');
                    }
                });
                }
            });

            // Fucntion qui recupere les donnees en bd (Liste)
            function listeItems(){
                var id = $('#commande').attr('data');
            $.ajax({
                type: 'ajax',
                method:'get',
                url:'<?= base_url() ?>assets_it.php/itemControlleur/listeItem',
                async:false,
                data:{id:id},
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    var htmlItem = '';
                    var i;
                    for (i=0; i<data.length; i++) {
                        htmlItem += '<tr>'+
                                ' <td>'+i+'</td>'+
                                    '<td>'+data[i].libelle_item+'</td>'+
                                    '<td>'+data[i].libelle_famille+'</td>'+
                                    '<td>'+data[i].qte_item+'</td>'+
                                    '<td>'+data[i].qte_livrer+'</td>'+
                                    '<td>'+data[i].qte_receptionner+'</td>'+
                                    '<td>'+
                                        '<a href="javascript:;" class="btn btn-outline-dark btn-sm item-delete" data="'+data[i].id_items+'" >Supprimer</a>'+
                                        '<a href="<?= base_url() ?>assets_it.php/itemControlleur/receptionner/'+data[i].id_items+'" class="btn btn-dark btn-sm" data="'+data[i].id_cmd+'" >Receptionner</a>'+
                                    '</td>'+
                            ' </tr>';
                    }
                    $('#showItem').html(htmlItem);
                },
                error:function(){
                    alert('Erreur! narrive pas a obteniries donnnees demandées')
                }
            });
        }

         //Ajouter et modification Item
            // -----------------------------------------------------------------------------------
            $('#saveItem').click(function(e){
                e.preventDefault();
                var url = $('#formItem').attr('action');                
                var data = $('#formItem').serialize();
                //valider le formulaire

                var modele = $('input[name=modele]');
                var famille = $('input[name=famille]');
                var qte = $('input[name=qte]');
                var qteLivrer = $('input[name=qteLivrer]');
                var itemId = $('input[name=itemId]');
                var resultat = 1;

                if(modele.val()==''){
                    $('#errorModele').html('Le Modele est Obligatoire!').fadeIn().delay(2000).fadeOut('slow');
                    resultat = 0;
                }else{
                    $('#errorModele').html('');
                }

                if(qte.val()==''){
                    $('#errorQte').html('la Quantite est Obligatoire!').fadeIn().delay(2000).fadeOut('slow');
                    resultat = 0;
                }else if(qte.val() <= 0){
                    $('#errorQte').html('La Quantite doit etre positive');
                    resultat = 0;
                }else{
                    $('#errorQte').html('');
                }

                if(qteLivrer.val()==''){
                    $('#errorQteLivrer').html('la Quantite Livrée est Obligatoire!').fadeIn().delay(2000).fadeOut('slow');
                    resultat = 0;
                }else if(qteLivrer.val() > qte.val()){
                    $('#errorQteLivrer').html('La Quantite Livrée ne peut pas etre superieur a la Quantité total ');
                    resultat = 0;
                }else if(qteLivrer.val() <= 0){
                    $('#errorQteLivrer').html('La Quantite Livrée doit etre positive');
                    resultat = 0;
                }else{
                    $('#errorQteLivrer').html('');
                }

                if(resultat == 1){
                    $.ajax({
                    type: 'ajax',
                    method:'post',
                    url:url,
                    data:data,
                    async:false,
                    dataType: 'json',
                    success: function(response){
                        if (response.success) {
                            $('#formItem')[0].reset();
                            if (response.type == 'update') {
                                var type = 'Modifié';
                            }else{
                                var type = 'ajouté';
                            }
                            $('.alert-light').html('Commande '+ type).fadeIn().delay(2000).fadeOut('slow');
                            listeItems();
                        }else{
                            alert('Erreur doublont');
                        }
                    },
                    error:function(){
                        alert('Impossible d\'effectuer l\'action');
                    }
                });
                }
            });

        });
    </script>   
</body>
</html>