<div class="container-fluid" style="height:100%;background-color:#bacce5;">
    <div class="d-flex justify-content-between">
        <h4>Commande de materiels</h4>
    </div>

    <!-- Message Flash -->
   <div style="height: 10%; border:1px solid #bacce5">
        <div style="display:none;" class="alert alert-light role="alert"></div>
    </div>
 <!-- Fin message Flash -->



        <div class="row">
            <div class="col-md-12">
            <div class="card d-none" id="formPO" style="margin-top:2%; padding: 25px;">
                    <div class="card-header border-2">
                    <span>Ajouter une commande</span>
                    </div>
                    <span style="color:red;"><?php echo validation_errors(); ?></span>
                    <form id="formCmd" action="<?= site_url('cmdControlleur/store'); ?>" method="POST">
                        <input type="hidden" name="cmdId" value="0">
                        <div class="row col-md-12">
                            <div class="form-group col-md-4">
                                <label for="">PO:</label>
                                <input type="text" name="po" class="form-control" value="<?= set_value('po') ?>">
                                <span id="errorPo"  style="color:red;font-style:italic"></span>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="">Fournisseur:</label>
                                <div class="d-flex">
                                <select name="fsseur" id="showdata" class="form-control">
                                </select>
                                    <button id="addFsseur" style="border-radius:50px; margin-left:10px" class="btn btn-dark btn-sm">+</button>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="">Date Livraison:</label>
                                <input type="date" name="dte" class="form-control" value="<?= set_value('dte') ?>">
                            </div>
                            <div class="form-group col-md-6">
                               <input id="saveCmd" type="submit" class="btn btn-outline-dark" value="Nouvelle Commande">
                               <button id="annuler" class="btn btn-outline-danger">Annuler</button>
                            </div>
                            <hr>
                        </div>
                    </form>
                      <!-- Formulaire dajout fournisseur -->
                      <form id="myform" class="needs-validation d-none" method="POST" action="<?= site_url('fsseurControlleur/store'); ?>">
                      <h4>Ajouter Fournisseur</h4>
                                <input type="hidden" name="fsseurId" value="0">
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Nom& Prenom</label>
                                    <input type="text" name="nom" class="form-control" id="validationCustom01" placeholder="Nom& Prenom" value="">
                                    <span id="errorNom" style="color:red;font-style:italic" ></span>
                                    <div class="valid-feedback">
                                    </div>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                    <label for="validationCustomUsername">Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        </div>
                                        <input type="text" name="email" class="form-control" id="validationCustomUsername" placeholder="Email du Fournisseur" aria-describedby="inputGroupPrepend" value="">
                                        <span id="errorEmail"  style="color:red;font-style:italic"></span>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                    <label for="validationCustom03">Phone 1</label>
                                    <input type="text" name="phone1" class="form-control" id="validationCustom03" placeholder="6xxx" value="">
                                    <div>
                                    <span id="errorPhone1"  style="color:red;font-style:italic"></span>
                                    </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                    <label for="validationCustom03">Phone 2</label>
                                    <input type="text" name="phone2" class="form-control" id="validationCustom03" placeholder="6xxx" value="">
                                    <span id="errorPhone2"  style="color:red;font-style:italic" ></span>
                                    <div class="invalid-feedback">
                                    </div>
                                    </div>
                                </div>
                                <button id="saveFournisseur" class="btn btn-outline-dark btn-sm" type="submit">Valider</button>
                                <button id="annulerFsseur" class="btn btn-outline-danger btn-sm">Annuler</button>
                             </form>
                </div>

            </div>
            <div class="col-md-12">
            <div class="card" style="margin-top:5%; padding: 25px;">
                <div class="card-header border-0">
                    <button id="insert" class="btn btn-outline-dark btn-sm">Nouvelle Commande</button>
                </div>
                <div class="table-responsive" style="margin-top: 10px;">

                <table id="tables" class="display nowrap">
                    <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>PO</th>
                        <th>Fournisseur</th>
                        <th>Date Livraison</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="list" id="show">
                    </tbody>
                    <tfoot class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>PO</th>
                        <th>Fournisseur</th>
                        <th>Date Livraison</th>
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
              let fm1 = document.getElementById('formPO');
              fm1.classList.remove('d-none');
              let bt = document.getElementById('insert');
              bt.classList.add('d-none');
            });

             //   masquer le formulaire d'ajout Cmd
             $(document).on('click', '#annuler', function(e){
                e.preventDefault();
                $('#formCmd')[0].reset();
              let fr = document.getElementById('formPO');
              let bt = document.getElementById('insert');
              bt.classList.remove('d-none');
              fr.classList.add('d-none');
            });

            //  Afficher le formulaire d'ajout fournisseur
            $(document).on('click', '#addFsseur', function(e){
                e.preventDefault();
              let fr = document.getElementById('myform');
              let bt = document.getElementById('addFsseur');
              bt.classList.add('d-none');
              fr.classList.remove('d-none');
            });

            //   masquer le formulaire d'ajout fournisseur
            $(document).on('click', '#annulerFsseur', function(e){
                e.preventDefault();
              let fr = document.getElementById('myform');
              let bt = document.getElementById('addFsseur');
              bt.classList.remove('d-none');
              fr.classList.add('d-none');
            });

            listeCmd();
            listeFournisseur();
            

            // Fucntion qui recupere les donnees en bd (Liste)
            function listeFournisseur(){
                $.ajax({
                    type: 'ajax',
                    url:'<?= base_url() ?>assets_it.php/fsseurControlleur/listeFournisseur',
                    async:false,
                    dataType: 'json',
                    success: function(data){
                        console.log(data);
                        var html = '';
                        var i;
                        for (i=0; i<data.length; i++) {
                            html += '<option value="'+data[i].id_fsseur+'"> '+data[i].nom_fsseur+' </option>';
                        }
                        $('#showdata').html(html);
                    },
                    error:function(){
                        alert('Erreur! narrive pas a obteniries donnnees demandées')
                    }
                });
            }

             //Ajouter fournisseur
            // -----------------------------------------------------------------------------------
            $('#saveFournisseur').click(function(e){
                e.preventDefault();
                var url = $('#myform').attr('action');                
                var data = $('#myform').serialize();
                //valider le formulaire

                var nom = $('input[name=nom]');
                var email = $('input[name=email]');
                var phone1 = $('input[name=phone1]');
                var phone2 = $('input[name=phone2]');
                var FournisseurId = $('input[name=fsseurId]');
                var resultat = 1;

                if(nom.val()==''){
                    $('#errorNom').html('Le Nom du fournisseur requis!').fadeIn().delay(2000).fadeOut('slow');;
                    resultat = 0;
                }else{
                    $('#errorNom').html('');
                }

                if(email.val()==''){
                    $('#errorEmail').html('Email Requis').fadeIn().delay(2000).fadeOut('slow');;
                    resultat = 0;
                }else{
                    $('#errorEmail').html('');
                }

                if(phone1.val()=='' && phone2.val() == ''){
                    $('#errorPhone1').html('Phone1 ou phone2 Requis').fadeIn().delay(2000).fadeOut('slow');;
                    resultat = 0;
                }else{
                    $('#errorPhone1').html('');
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
                            $('#myform')[0].reset();
                            if (response.type == 'update') {
                                var type = 'Modifié';
                            }else{
                                var type = 'ajouté';
                            }
                            $('.alert-light').html('Fournisseur '+ type).fadeIn().delay(2000).fadeOut('slow');
                            listeFournisseur();
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



             // Fucntion qui recupere les donnees en bd (Liste)
             function listeCmd(){
            $.ajax({
                type: 'ajax',
                url:'<?= base_url() ?>assets_it.php/cmdControlleur/listeCmd',
                async:false,
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    var htmlcmd = '';
                    var i;
                    for (i=0; i<data.length; i++) {
                        let date1 = new Date(data[i].dte_livraison);
                        let dateLocale = date1.toLocaleString('fr-FR', {
                            weekday: 'long',
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric',
                        });
                        htmlcmd += '<tr>'+
                                ' <td>'+data[i].id_cmd+'</td>'+
                                    '<td>'+data[i].po+'</td>'+
                                    '<td>'+data[i].nom_fsseur+'</td>'+
                                    '<td>'+dateLocale+'</td>'+
                                    '<td>'+
                                        '<a href="javascript:;" class="btn btn-outline-dark btn-sm item-edit" data="'+data[i].id_cmd+'" >Modifier</a>'+
                                        '<a href="<?= base_url() ?>assets_it.php/cmdControlleur/show/'+data[i].id_cmd+'" class="btn btn-dark btn-sm item-delete" data="'+data[i].id_cmd+'" >Detail Commande</a>'+
                                    '</td>'+
                            ' </tr>';
                    }
                    $('#show').html(htmlcmd);
                },
                error:function(){
                    alert('Erreur! narrive pas a obteniries donnnees demandées')
                }
            });
        }


         //Ajouter et modification cmd
            // -----------------------------------------------------------------------------------
            $('#saveCmd').click(function(e){
                e.preventDefault();
                var url = $('#formCmd').attr('action');                
                var data = $('#formCmd').serialize();
                //valider le formulaire

                var po = $('input[name=po]');
                var dte = $('input[name=dte]');
                var fsseur = $('input[name=fsseur]');
                var cmdId = $('input[name=cmdId]');
                var resultat = 1;

                if(po.val()==''){
                    $('#errorPo').html('Le PO de la commande requis!').fadeIn().delay(2000).fadeOut('slow');
                    resultat = 0;
                }else{
                    $('#errorPo').html('');
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
                            $('#formCmd')[0].reset();
                            if (response.type == 'update') {
                                var type = 'Modifié';
                            }else{
                                var type = 'ajouté';
                            }
                            $('.alert-light').html('Commande '+ type).fadeIn().delay(2000).fadeOut('slow');
                            listeCmd();
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

              //Editer -------------------------------------------------------------------------------
              $('#show').on('click', '.item-edit', function(){


                let fm1 = document.getElementById('formPO');
                fm1.classList.remove('d-none');
                let bt = document.getElementById('insert');
                bt.classList.add('d-none');

                $('#saveCmd').html('Modifier');
                $('#formCmd').attr('action','<?= site_url('cmdControlleur/updateCmd'); ?>');
                var id = $(this).attr('data');
                $.ajax({
                    type: 'ajax',
                    method:'get',
                    url:'<?= site_url('cmdControlleur/editCmd'); ?>',
                    data:{id:id},
                    async:false,
                    dataType: 'json',
                    success: function(data){
                        $('input[name=po]').val(data.po);
                        $('input[name=dte]').val(data.dte_livraison);
                        $('input[name=fsseur]').val(data.nom_fsseur);
                    },
                    error:function(){
                        alert('Impossible d ajouter le Famille');
                    }
                });
            });
        });
    </script>   
</body>
</html>