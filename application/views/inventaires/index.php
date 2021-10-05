
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
        
              <!-- Formulaire de MAD -->
              <div class="col-md-6">
                <div id="divRecuper" class="card d-none" style="padding: 25px;">
                    <div class="card-header border-2">
                        <span>Recuperer Materiel </span>
                    </div>
                    <!-- Formulaire de recuperation dun materiel -->
                    <form id="formRecup" action="<?= site_url('inventaireControlleur/RecupererMateriel'); ?>" method="post">
                    <hr>
                       <div class="row col-md-12">                        
                        <div class="form-group col-md-6">
                            <label>Date de recuperation <span style="color:red">*</span></label>
                            <input type="date" class="form-control" name="dte_recup">
                            <span id="errorDte2" style="color:red;font-style:italic" ></span>
                        </div>
                            <input type="hidden" class="form-control" value="" name="hostname">
                        <div class="form-group col-md-3">
                            <label>SN <span style="color:red">*</span></label>
                            <input type="text" disabled class="form-control" name="sn" value="">
                        </div>
                        <input type="hidden" class="form-control" name="materiel_id" value="">

                        <div class="form-group col-md-4">
                            <button style="margin-left:10px" id="saveRecuperer" class="btn btn-outline-dark">Valider</button>
                            <button id="annulerRecup" class="btn btn-outline-danger">Annuler</button>
                        </div>
                       </div>
                    </form>
                      <!-- Formulaire d'ajout dune nouveau site -->
                      <form class="d-none" id="formAddSite" action="<?= site_url('siteControlleur/addSite'); ?>" method="post">
                    <hr style="background-color:grey">
                        <strong>Ajouter un site</strong>
                        <div class="d-flex col-md-8">
                            <input type="text" name="site" placeholder="Libelle Site" class="form-control"><br>
                            <div class="form-group col-md-4">
                                <button style="margin-left:10px" id="saveSite" class="btn btn-outline-dark">Valider</button>
                                <button id="annulerSite" class="btn btn-outline-danger">Annuler</button>
                            </div>
                        </div>
                        <span id="errorSite" style="color:red;font-style:italic" ></span>
                    </form>
                    </div>
            </div>
    <!--Fin Formulaire de recuperation dun materiel  -->

            <!-- Formulaire de MAD -->
            <div class="col-md-12">
                <div id="formSiteMat" class="card d-none" style="padding: 25px;">
                    <div class="card-header border-2">
                        <span>Mise a disposition  </span>
                    </div>
                    <!-- Formulaire d'affectation de materiel au site -->
                    <form id="formSiteMateriel" action="<?= site_url('inventaireControlleur/affectation'); ?>" method="post">
                    <hr>
                       <div class="row col-md-12">
                       <div class="d-flex">
                            <div class="form-group">
                                <label for="">Site:</label>
                                <div class="d-flex">
                                <select name="site" id="showdataSite" class="form-control">
                                </select>
                                    <button id="addSite" style="border-radius:50px; margin-left:10px" class="btn btn-outline-dark btn-sm">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Batiment</label>
                            <input type="text" class="form-control" name="batiment">
                            <span id="errorBatiment" style="color:red;font-style:italic" ></span>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Bureau</label>
                            <input type="text" class="form-control" name="bureau">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Details</label>
                            <input type="text" class="form-control" name="detail">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Date MAD <span style="color:red">*</span></label>
                            <input type="date" class="form-control" name="dte_mad">
                            <span id="errorDte" style="color:red;font-style:italic" ></span>
                        </div>

                        <div class="form-group col-md-6">
                            <input type="hidden" class="form-control" name="materiel_id" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="hidden" class="form-control" name="sn" value="">
                        </div>
                        <input type="hidden" class="form-control" name="hostnameMAD" value="">
                         <!--  Choix de user ou compte -->

                         <hr style="background-color:blue">
                        <div class="form-group col-md-12">
                            <strong>s'agit-il d'un utilisateur ou d'un compte?</strong><br>
                            <label for="user">Utilisateur</label>
                            <input type="checkbox" id="user">
                            <label for="compte">Compte</label>
                            <input type="checkbox" id="compte">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Utilisateur:</label>
                            <div class="d-flex">
                            <select name="famille" id="showdataUser" class="form-control">
                                <option value="">utlisateur</option>
                            </select>
                                <button id="addUser" style="border-radius:50px; margin-left:10px" class="btn btn-dark btn-sm">+</button>
                            </div>
                        </div>

                        <div class="form-group col-md-6 d-none" id="displayUser">
                            <label for="">Compte:</label>
                            <div class="d-flex">
                            <select name="famille" id="showdataUser" class="form-control">
                                <option value="">compte</option>
                            </select>
                                <button id="addCompte" style="border-radius:50px; margin-left:10px" class="btn btn-dark btn-sm">+</button>
                            </div>
                        </div>
                        
                        
                        <div class="form-group col-md-12" id="displayCompte">
                            <button style="margin-left:10px" id="saveSiteMat" class="btn btn-outline-dark">Valider</button>
                            <button id="annulerSiteMat" class="btn btn-outline-danger">Annuler</button>
                        </div>
                       </div>
                    </form>

                      <!-- Formulaire d'ajout dune nouveau site -->
                      <form class="d-none" id="formAddSite" action="<?= site_url('siteControlleur/addSite'); ?>" method="post">
                    <hr style="background-color:grey">
                        <strong>Ajouter un site</strong>
                        <div class="d-flex col-md-8">
                            <input type="text" name="site" placeholder="Libelle Site" class="form-control"><br>
                            <div class="form-group col-md-4">
                                <button style="margin-left:10px" id="saveSite" class="btn btn-outline-dark">Valider</button>
                                <button id="annulerSite" class="btn btn-outline-danger">Annuler</button>
                            </div>
                        </div>
                        <span id="errorSite" style="color:red;font-style:italic" ></span>
                    </form>
                    </div>
            </div>
    <!--Fin Formulaire de MAD -->

    <!-- Formulaire d'ajout materiel -->
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
                                        <input type="text" name="serailnber" class="form-control" value="">
                                        <span id="errorSn" style="color:red" ></span>
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
                                        <label for="">Num.Mac:</label>
                                        <input type="text" name="mac" class="form-control" value="">
                                    </div>


                                    <div class="form-group col-md-4">
                                        <label for="">modele:</label>
                                        <input type="text" name="modele" class="form-control" value="">
                                        <span id="errorModele" style="color:red" ></span>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="">Statut:</label>
                                        <select class="form-control" name="statut" id="">
                                            <option value="En production">En production</option>
                                            <option value="En stock">En stock</option>
                                            <option value="Donation">Donation</option>
                                            <option value="Destruction">Destruction</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="">Famille:</label>
                                        <div class="d-flex">
                                        <select name="famille" id="showdataFamille" class="form-control">
                                        </select>
                                            <button id="addFamille" style="border-radius:50px; margin-left:10px" class="btn btn-dark btn-sm">+</button>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="">Observation:</label>
                                        <textarea class="form-control" name="observation" id=""></textarea>
                                    </div>

                                    <div class="form-group col-md-6">
                                    <input type="submit" id="saveAsset" data="" class="btn btn-outline-dark save" value="Valider">
                                    <button id="annuler" class="btn btn-outline-danger">Annuler</button>
                                    </div>
                                </div>
                    </form>

                    <!-- Formulaire d'ajout dune nouvelle famille -->
                    <form class="d-none" id="formAddFamille" action="<?= site_url('familleControlleur/store'); ?>" method="post">
                    <hr style="background-color:grey">
                        <strong>Nouvelle famille de materiel</strong>
                        <div class="d-flex col-md-8">
                            <input type="text" name="famille" placeholder="Libelle Famille" class="form-control"><br>
                            <div class="form-group col-md-4">
                                <button style="margin-left:10px" id="saveFamille" class="btn btn-outline-dark">Valider</button>
                                <button id="annulerFamille" class="btn btn-outline-danger">Annuler</button>
                            </div>
                        </div>
                        <span id="errorFamille" style="color:red;font-style:italic" ></span>
                        <span id="successFamille" style="color:green" ></span>
                    </form>
                </div>
            </div>
            <!-- Tableau des assets -->
            <div class="col-md-12">
                <div class="card" style="margin-top:3%; padding: 25px;">
                <div class="card-header border-0">
                    <button id="insert" class="btn btn-outline-dark btn-sm">Ajouter asset</button>
                </div>

                <div class="table-responsive" style="margin-top: 10px;">
                    <table id="tables"  class="display nowrap" style="width:100%">
                        <thead class="thead-light">
                        <tr>
                        <th>Action</th>
                            <th>Item</th>
                            <th>Status</th>
                            <th>Code Article(Sous SAP)</th>  
                            <th>Hostname</th>
                            <th>SN</th>
                            <th>Numero mac</th>
                            <th>Modele</th>
                            <th>Observations</th>
                            <th>Famille</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="list" id="showdata">
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Action</th>
                            <th>Item</th>
                            <th>Status</th>
                            <th>Code Article(Sous SAP)</th>  
                            <th>Hostname</th>
                            <th>SN</th>
                            <th>Numero mac</th>
                            <th>Modele</th>
                            <th>Observations</th>
                            <th>Famille</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    </table>
                </div>
            </div>

            <!-- Tableau recapitulatif des site dun materiel -->
            <div class="col-md-12">
                <div id="tabSiteMat" class="card d-none" style="margin-top:3%; padding: 25px;">
                <div class="card-header border-0">
                    <button id="close" class="btn btn-outline-dark btn-sm">fermer</button>
                </div>

                <div class="table-responsive" style="margin-top: 10px;">
                    <table id="tablesSite"  class="display nowrap" style="width:100%">
                        <thead class="thead-light">
                        <tr>
                            <th>Date</th>
                            <th>Site</th>
                            <th>Batiment-Bureau</th>
                            <th>Hostname</th>  
                            <th>Statut</th>
                            <th>Type Mvt</th>
                            <th>Details</th>
                        </tr>
                        </thead>
                        <tbody class="list" id="showdataSiteMat">
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Date</th>
                            <th>Site</th>
                            <th>Batiment-Bureau</th>
                            <th>Hostname</th>  
                            <th>Statut</th>
                            <th>Type Mvt</th>
                            <th>Details</th>
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

                // charger les donnees materiel site
                $('#tablesSite').DataTable();

             //  Afficher le formulaire d'ajout d'Item
            $(document).on('click', '#insert', function(e){
              let fm1 = document.getElementById('myform');
              fm1.classList.remove('d-none');
              let bt = document.getElementById('insert');
              bt.classList.add('d-none');
            });

            //   masquer le formulaire d'ajout Item
            $(document).on('click', '#annuler', function(e){
                e.preventDefault();
                $('#forms')[0].reset();
              let fr =document.getElementById('myform');
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

             //  Afficher le formulaire d'ajout Site
             $(document).on('click', '#addSite', function(e){
                e.preventDefault();
              let fr = document.getElementById('formAddSite');
              let bt = document.getElementById('addSite');
              bt.classList.add('d-none');
              fr.classList.remove('d-none');
            });

            //   masquer le formulaire d'ajout Site
            $(document).on('click', '#annulerSite', function(e){
                e.preventDefault();
              let fr = document.getElementById('formAddSite');
              let bt = document.getElementById('addSite');
              bt.classList.remove('d-none');
              fr.classList.add('d-none');
            });

            //   masquer le formulaire d'affectation materiel-site
            $(document).on('click', '#annulerSiteMat', function(e){
                e.preventDefault();
              let fr = document.getElementById('formSiteMat');
              fr.classList.add('d-none');
            });

             //   masquer le tableau des sites d'un materiel
             $(document).on('click', '#close', function(e){
                e.preventDefault();
              let fr = document.getElementById('tabSiteMat');
              fr.classList.add('d-none');
            });

             //   masquer le formulaire de recuperation de materiel
             $(document).on('click', '#annulerRecup', function(e){
                e.preventDefault();
              let fr = document.getElementById('divRecuper');
              $('#formRecup')[0].reset();
              fr.classList.add('d-none'); 
            });

            //   Afficher le tableau des sites d'un materiel
            $('#showdata').on('click', '.item-localiser', function(){
                let fr = document.getElementById('tabSiteMat');
                fr.classList.remove('d-none');
                var id = $(this).attr('data');
                $.ajax({
                    type: 'ajax',
                    method:'get',
                    url:'<?= site_url('inventaireControlleur/materielSite'); ?>',
                    data:{id:id},
                    async:false,
                    dataType: 'json',
                    success: function(data){
                        console.log(data);
                        var htmlSiteMat = '';
                        var a;
                        for (a=0; a<data.length; a++) {
                            let date1 = new Date(data[a].dte_affectation);
                            let dateLocale = date1.toLocaleString('fr-FR', {
                                weekday: 'long',
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric',
                            });

                            let dateRetour = '';
                            let hostnameRetour = '';
                            let bureau = '';
                            let batiment = '';
                            let site_libelle = ''; 

                            if(data[a].dte_retour != null)
                            {
                                let date2 = new Date(data[a].dte_retour);
                               dateRetour = date2.toLocaleString('fr-FR', {
                                weekday: 'long',
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric',
                            });
                            }

                            if(data[a].hostnameSortant != null)
                            {
                                hostnameRetour = data[a].hostnameSortant;
                            }

                            if(data[a].batiment != null)
                            {
                                batiment = data[a].batiment;
                            }

                            if(data[a].bureau != null)
                            {
                                bureau = data[a].bureau;
                            }

                            if(data[a].libelle_site != null)
                            {
                                site_libelle = data[a].libelle_site;
                            }

                            htmlSiteMat += '<tr>'+
                                        '<td>'+dateLocale+'-- <span style="color:green">'+dateRetour+'</span></td>'+
                                       ' <td>'+site_libelle+'</td>'+
                                        '<td>'+batiment+'-'+bureau+'</td>'+
                                        ' <td>'+data[a].hostname+'<span style="color:green">'+hostnameRetour+'</span></td>'+
                                        '<td>'+data[a].statut+'</td>'+
                                        '<td>'+data[a].typeMAD+'</td>'+
                                        '<td>'+data[a].details+'</td>'+
                                       
                                   ' </tr>';
                        }
                        $('#showdataSiteMat').html(htmlSiteMat);
                    },
                    error:function(){
                        alert('Impossible d effectuer cette action');
                    }
                });
            });

            showAllMateriel();
            listeFamille();
            listeSite();


                // Fucntion qui recupere les donnees en bd (Liste Famille)
                function listeFamille(){
                    $.ajax({
                        type: 'ajax',
                        url:'<?= base_url() ?>assets_it.php/familleControlleur/listeFamille',
                        async:false,
                        dataType: 'json',
                        success: function(data){
                            console.log(data);
                            var htmlFamille = '';
                            var i;
                            for (i=0; i<data.length; i++) {
                                htmlFamille += '<option value="'+data[i].libelle_famille+'"> '+data[i].libelle_famille+' </option>';
                            }
                            $('#showdataFamille').html(htmlFamille);
                        },
                        error:function(){
                            alert('Erreur! narrive pas a obteniries donnnees demandées')
                        }
                    });
                }

                  // Fonction qui recupere les donnees en bd (Liste Site)
                  function listeSite(){
                    $.ajax({
                        type: 'ajax',
                        url:'<?= base_url() ?>assets_it.php/siteControlleur/showAllSite',
                        async:false,
                        dataType: 'json',
                        success: function(data){
                            console.log(data);
                            var htmlSite = '';
                            var i;
                            for (i=1; i<data.length; i++) {
                                htmlSite += '<option value="'+data[i].id_site+'"> '+data[i].libelle_site+' </option>';
                            }
                            $('#showdataSite').html(htmlSite);
                        },
                        error:function(){
                            alert('Erreur! n\'arrive pas a obtenir les données demandées');
                        }
                    });
                }

                //Ajouter Famille
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
                                $('#successFamille').html('Famille inserée').fadeIn().delay(2000).fadeOut('slow');
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

                //Ajouter Site
                // -----------------------------------------------------------------------------------
                $('#saveSite').click(function(e){
                e.preventDefault();
                var url = $('#formAddSite').attr('action');                
                var data = $('#formAddSite').serialize();
                //valider le formulaire

                var site = $('input[name=site]');
                var resultat = 0;

                if(site.val()==''){
                    $('#errorSite').html('Ce champs est obligatoire').fadeIn().delay(2000).fadeOut('slow');
                }else{
                    $('#errorSite').html('');
                    resultat = 1;
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
                            $('#formAddSite')[0].reset();
                            if (response.type == 'update') {
                                var type = 'Modifié';
                            }else{
                                var type = 'ajouté';
                            }
                            $('.alert-light').html('site '+ type).fadeIn().delay(2000).fadeOut('slow');
                            listeSite();
                        }else{
                            alert('Erreur! Ce libelle Existe deja dans la bd');
                        }
                    },
                    error:function(){
                        alert('Impossible d\'effectuer l\'action');
                    }
                });
                }
            });

             //Affecter materiel a un site
                // -----------------------------------------------------------------------------------
                $('#saveSiteMat').click(function(e){
                e.preventDefault();
                var url = $('#formSiteMateriel').attr('action');                
                var data = $('#formSiteMateriel').serialize();
                //valider le formulaire

                var batiment = $('input[name=batiment]');
                var bureau = $('input[name=bureau]');
                var detail = $('input[name=detail]');
                var dte = $('input[name=dte_mad]');
                var materiel = $('input[name=materiel_id]');
                var sn = $('input[name=sn]');
                var resultat = '0';

                if(materiel.val()==''){
                    $('#errorDte').html('Identifiant du materiel absent').fadeIn().delay(2000).fadeOut('slow');
                }else{
                    $('#errorDte').html('');
                    resultat += '1';
                }

                if(dte.val()==''){
                    $('#errorDte').html('La date de MAD  est obligatoire').fadeIn().delay(2000).fadeOut('slow');
                }else{
                    $('#errorDte').html('');
                    resultat += '2';
                }

                if(resultat == '012'){
                    $.ajax({
                    type: 'ajax',
                    method:'post',
                    url:url,
                    data:data,
                    async:false,
                    dataType: 'json',
                    success: function(response){
                        if (response.success) {
                            $('#formSiteMateriel')[0].reset();
                            if (response.type == 'update') {
                                var type = 'Modifié';
                            }else{
                                var type = 'ajouté';
                            }
                            $('.alert-light').html('Materiel affecté').fadeIn().delay(2000).fadeOut('slow');
                            // listeSite();
                            showAllMateriel();
                        }else{
                            alert('Erreur!');
                        }
                    },
                    error:function(){
                        alert('Impossible d\'effectuer l\'action');
                    }
                });
                }
            });

              //Editer Affectation site materiel-------------------------------------------------------------------------------
              $('#showdata').on('click', '.item-mad', function(){
                let fr = document.getElementById('formSiteMat');
                fr.classList.remove('d-none');
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
                        $('input[name=materiel_id]').val(data.id_mat);
                        $('input[name=hostnameMAD]').val(data.designation_mat);
                    },
                    error:function(){
                        alert('Impossible d effectuer cette action');
                    }
                });
            });


            //Recuperer le materiel en production-------------------------------------------------------------------------------
            $('#showdata').on('click', '.item-recuperer', function(){
                let fr = document.getElementById('divRecuper');
                fr.classList.remove('d-none');
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
                        $('input[name=materiel_id]').val(data.id_mat);
                        $('input[name=hostname]').val(data.designation_mat);
                    },
                    error:function(){
                        alert('Impossible d effectuer cette action');
                    }
                });
            });

            
            $('#saveRecuperer').click(function(e){
                e.preventDefault();
                var url = $('#formRecup').attr('action');                
                var data = $('#formRecup').serialize();
                //valider le formulaire

                var dte = $('input[name=dte_recup]');
                var resultat = 0;

                if(dte.val()==''){
                    $('#errorDte2').html('Preciser la date de recuperation').fadeIn().delay(2000).fadeOut('slow');
                }else{
                    $('#errorDte2').html('');
                    resultat = 1;
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
                            $('#formRecup')[0].reset();
                            if (response.type == 'update') {
                                var type = 'Modifié';
                            }else{
                                var type = 'ajouté';
                            }
                            $('.alert-light').html('Materiel recuperé').fadeIn().delay(2000).fadeOut('slow');
                            showAllMateriel();
                        }else{
                            alert('Erreur!');
                        }
                    },
                    error:function(){
                        alert('Impossible d\'effectuer l\'action');
                    }
                });
                }
            });

                // Function qui renvoie une couleur en fonction de la valeur de la variable
            function colorStatut(statut)
            {
                if(statut == 'En production')
                {
                    return 'info';
                }
                if(statut == 'Destruction')
                {
                    return 'danger';
                }

                if(statut == 'Donation')
                {
                    return 'warning';
                }
                if(statut == 'En stock')
                {
                    return 'default';
                }
            }

            // Fucntion qui recupere les donnees en bd (Materiels)------------------------------------------
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
                            // -------------------------------
                            if(data[i].items_id == null){
                                fam = data[i].famille;
                            }else{
                                fam = data[i].libelle_famille;
                            }
                            // --------Verifie si le statut est en donation ou en destruction
                            function QuelStatut(statut)
                            {
                                if(statut == 'En stock')
                                {
                                    return '<a href="javascript:;" class="btn btn-outline-info btn-sm item-mad" data="'+data[i].id_mat+'" >MAD</a>';
                                }else if(statut == 'En production')
                                {
                                    return '<a title="Recuperer le materiel" href="javascript:;" class="btn btn-outline-info btn-sm item-recuperer" data="'+data[i].id_mat+'" > <- </a>';
                                }else{
                                    return '';
                                }
                            }

                            html += '<tr>'+
                                        '<td>'+
                                            QuelStatut(data[i].statut)
                                            +'<a href="javascript:;" class="btn btn-outline-info btn-sm item-edit" data="'+data[i].id_mat+'" >Modifier</a>'+
                                            '<a href="javascript:;" class="btn btn-outline-danger btn-sm item-delete" data="'+data[i].id_mat+'" >X</a>'+
                                        '</td>'+
                                       ' <td>'+data[i].id_mat+'</td>'+
                                        '<td><span class="btn btn-'+colorStatut(data[i].statut)+' btn-sm">'+data[i].statut+'</span></td>'+
                                        '<td>'+data[i].code_mat+'</td>'+
                                        '<td>'+data[i].designation_mat+'</td>'+
                                        '<td>'+data[i].sn+'</td>'+
                                        '<td>'+data[i].num_mac+'</td>'+
                                        '<td>'+data[i].modele+'</td>'+
                                        '<td>'+data[i].observation+'</td>'+
                                        '<td>'+fam+'</td>'+
                                        '<td>'+
                                            '<a href="javascript:;" class="btn btn-primary btn-sm item-localiser" data="'+data[i].id_mat+'" >Details</a>'+
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

            //Ajouter et modification materiel
            // -----------------------------------------------------------------------------------
            $('#saveAsset').click(function(e){
                e.preventDefault();
                var url = $('#forms').attr('action');                
                var data = $('#forms').serialize();
                //valider le formulaire

                var sn = $('input[name=serailnber]');
                var modele = $('input[name=modele]');
                var matId = $('input[name=matId]');
                var resultat = '';

                if(sn.val()==''){
                    $('#errorSn').html('le numero de serie est requis!').fadeIn().delay(2000).fadeOut('slow');
                }else{
                    resultat = '1';
                }

                if(modele.val()==''){
                    $('#errorModele').html('le modele est requis!').fadeIn().delay(2000).fadeOut('slow');
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

            //Editer Materiels -------------------------------------------------------------------------------
            $('#showdata').on('click', '.item-edit', function(){
                    let fm1 = document.getElementById('myform');
                fm1.classList.remove('d-none');
                let bt = document.getElementById('insert');
                bt.classList.add('d-none');
                $('#saveAsset').html('Modifier');
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
                        $('input[name=serailnber]').val(data.sn);
                        $('input[name=mac]').val(data.num_mac);
                        $('input[name=statut]').val(data.statut);
                        $('input[name=modele]').val(data.modele);
                        $('input[name=code]').val(data.code_mat);
                        $('input[name=designation]').val(data.designation_mat);
                        $('input[name=observation]').val(data.observation);
                        $('input[name=matId]').val(data.id_mat);
                    },
                    error:function(){
                        alert('Impossible d effectuer cette action');
                    }
                });
            });

            //Supprimer Materiels -----------------------------------------------------------------------
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