<div class="container-fluid" style="height:100%;background-color:#bacce5">
    <div style="height: 10%; border:1px solid #bacce5">
        <div style="display:none;" class="alert alert-light role="alert"></div>
    </div>
        <div class="row">           
            <div class="col-md-12">

            <div id="myform" class="card d-none" style="margin-top:2%; padding: 25px;">
                    <div class="card-header border-2">
                    <span>Nouveau Utilisateur</span>
                    </div>
                    <form id="formAddUser" class="needs-validation" method="POST" action="<?= site_url('utilisateurController/store'); ?>">
                         <input type="hidden" name="userId" value="0">
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
                                <input type="text" name="email" class="form-control" id="validationCustomUsername" placeholder="Email du user" aria-describedby="inputGroupPrepend" value="">
                                <span id="errorEmail"  style="color:red;font-style:italic"></span>
                            </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                            <label for="validationCustom03">Phone</label>
                            <input type="text" name="phone1" class="form-control" id="validationCustom03" value="">
                            <div>
                            <span id="errorPhone1"  style="color:red;font-style:italic"></span>
                            </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="validationCustom03">Fonction</label>
                                <input type="text" name="fonction" class="form-control" id="validationCustom03" value="">
                                <span id="errorPhone2"  style="color:red;font-style:italic" ></span>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="validationCustom03">Staff</label>
                                <input type="text" name="staff" class="form-control" id="validationCustom03" value="">
                                <span id="errorPhone2"  style="color:red;font-style:italic" ></span>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Departement:</label>
                                <div class="d-flex">
                                <select name="departement" id="showdataDepartement" class="form-control">
                                </select>
                                    <button id="addDepartement" style="border-radius:50px; margin-left:10px" class="btn btn-dark btn-sm">+</button>
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="ckeckRole">Donner des droit a cette Utilisateur</label>
                                <input type="checkbox" id="ckeckRole">
                            </div>

                            <div id="inputRole" class="form-group col-md-3 d-none">
                                <label for="">Role:</label>
                                <div class="d-flex">
                                <select name="role" id="showdataRole" class="form-control">
                                </select>
                                    <button id="addRole" style="border-radius:50px; margin-left:10px" class="btn btn-dark btn-sm">+</button>
                                </div>
                            </div>
                        </div>
                        <button id="saveuser" class="btn btn-outline-dark" type="submit">Valider</button>
                        <button id="annuler" class="btn btn-outline-danger">Annuler</button>
                    </form>
                    <!-- ------------------------------------------------------------------------------------------------------------------------- -->
                     <!-- Formulaire d'ajout dun nouveau role -->
                     <form class="d-none" id="formAddRole" action="<?= site_url('roleControlleur/addrole'); ?>" method="post">
                    <hr style="background-color:grey">
                        <strong>Ajouter un role</strong>
                        <div class="d-flex col-md-8">
                            <input type="text" name="role" placeholder="Libelle role" class="form-control"><br>
                            <div class="form-group col-md-4">
                                <button style="margin-left:10px" id="saveRole" class="btn btn-dark">Valider</button>
                                <button id="annulerRole" class="btn btn-outline-danger">Annuler</button>
                            </div>
                        </div>
                        <span id="errorRole" style="color:red;font-style:italic" ></span>
                        <span id="succesRole" style="color:green" ></span>
                    </form>

                    <!-- Formulaire d'ajout dun nouveau Departement -->
                    <form class="d-none" id="formAddDepartement" action="<?= site_url('departementControlleur/adddepartement'); ?>" method="post">
                    <hr style="background-color:grey">
                        <strong>Ajouter un Departement</strong>
                        <div class="d-flex col-md-8">
                            <input type="text" name="departement" placeholder="Libelle Departement" class="form-control"><br>
                            <div class="form-group col-md-4">
                                <button style="margin-left:10px" id="saveDepartement" class="btn btn-dark">Valider</button>
                                <button id="annulerDepartement" class="btn btn-outline-danger">Annuler</button>
                            </div>
                        </div>
                        <span id="errorDepartement" style="color:red;font-style:italic" ></span>
                        <span id="succesDepartement" style="color:green" ></span>
                    </form>
                </div>

            <div class="card" style="margin-top:2%;padding:20px">
                <div class="card-header border-0">
                 <button id="addUser" class="btn btn-outline-dark btn-sm">Nouvel Utilisateur</button>
                </div>
                <div class="table-responsive" style="margin-top: 10px;">

                <table id="tables" class="display nowrap">
                    <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Utilisateur</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Staff</th>
                        <th>Fonction</th>
                        <th>Departement</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="list" id="showdata">
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Utilisateur</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Staff</th>
                        <th>Fonction</th>
                        <th>Departement</th>
                        <th>Role</th>
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

            //  Toggle l'input Role
            $(document).on('click', '#ckeckRole', function(e){
              let fm1 = document.getElementById('inputRole');
              fm1.classList.toggle('d-none');
            });

              //  Afficher le formulaire d'ajout d'utilisateur
              $(document).on('click', '#addUser', function(e){
              let fm1 = document.getElementById('myform');
              fm1.classList.remove('d-none');
              let bt = document.getElementById('addUser');
              bt.classList.add('d-none');
            });

            //   masquer le formulaire d'ajout User
            $(document).on('click', '#annuler', function(e){
                e.preventDefault();
                $('#formAddUser')[0].reset();
              let fr =document.getElementById('myform');
              let bt = document.getElementById('addUser');
              bt.classList.remove('d-none');
              fr.classList.add('d-none');
            });

            
              //  Afficher le formulaire d'ajout Role
              $(document).on('click', '#addRole', function(e){
                  e.preventDefault();
              let fm1 = document.getElementById('formAddRole');
              fm1.classList.remove('d-none');
              let bt = document.getElementById('addRole');
              bt.classList.add('d-none');
            });

            //   masquer le formulaire d'ajout Role
            $(document).on('click', '#annulerRole', function(e){
                e.preventDefault();
                $('#formAddRole')[0].reset();
              let fr =document.getElementById('formAddRole');
              let bt = document.getElementById('addRole');
              bt.classList.remove('d-none');
              fr.classList.add('d-none');
            });

            //  Afficher le formulaire d'ajout Departement
            $(document).on('click', '#addDepartement', function(e){
                  e.preventDefault();
              let fm1 = document.getElementById('formAddDepartement');
              fm1.classList.remove('d-none');
              let bt = document.getElementById('addDepartement');
              bt.classList.add('d-none');
            });

            //   masquer le formulaire d'ajout Departement
            $(document).on('click', '#annulerDepartement', function(e){
                e.preventDefault();
                $('#formAddDepartement')[0].reset();
              let fr =document.getElementById('formAddDepartement');
              let bt = document.getElementById('addDepartement');
              bt.classList.remove('d-none');
              fr.classList.add('d-none');
            });
            

            listeUser();
            listeRole();
            listeDepartement();

             // Fucntion qui recupere les donnees en bd (Liste Role)
             function listeRole(){
                    $.ajax({
                        type: 'ajax',
                        url:'<?= base_url() ?>assets_it.php/roleControlleur/showAllrole',
                        async:false,
                        dataType: 'json',
                        success: function(data){
                            console.log(data);
                            var htmlRole = '';
                            var i;
                            for (i=0; i<data.length; i++) {
                                htmlRole += '<option value="'+data[i].id_role+'"> '+data[i].libelle_role+' </option>';
                            }
                            $('#showdataRole').html(htmlRole);
                        },
                        error:function(){
                            alert('Erreur! narrive pas a obteniries donnnees demandées')
                        }
                    });
                }

                  // Fucntion qui recupere les donnees en bd (Liste Departement)
             function listeDepartement(){
                    $.ajax({
                        type: 'ajax',
                        url:'<?= base_url() ?>assets_it.php/departementControlleur/showAlldepartement',
                        async:false,
                        dataType: 'json',
                        success: function(data){
                            console.log(data);
                            var htmlDepartement = '';
                            var i;
                            for (i=0; i<data.length; i++) {
                                htmlDepartement += '<option value="'+data[i].id_dept+'"> '+data[i].libelle_dept+' </option>';
                            }
                            $('#showdataDepartement').html(htmlDepartement);
                        },
                        error:function(){
                            alert('Erreur! narrive pas a obteniries donnnees demandées')
                        }
                    });
                }

                    //Ajouter dun role
            // -----------------------------------------------------------------------------------
            $('#saveRole').click(function(e){
                e.preventDefault();
                var url = $('#formAddRole').attr('action');               
                var data = $('#formAddRole').serialize();
                //valider le formulaire

                var role = $('input[name=role]');
                var resultat = 0;

                if(role.val()==''){
                    $('#errorRole').html('Obligatoire').fadeIn().delay(2000).fadeOut('slow');
                }else{
                    $('#succesRole').html('Good').fadeIn().delay(2000).fadeOut('slow');
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
                            $('#formAddRole')[0].reset();
                            if (response.type == 'update') {
                                var type = 'Modifié';
                            }else{
                                var type = 'ajouté';
                            }
                            $('.alert-light').html('role '+ type).fadeIn().delay(2000).fadeOut('slow');
                            listeRole();
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

             //Ajouter Departement
            // -----------------------------------------------------------------------------------
            $('#saveDepartement').click(function(e){
                e.preventDefault();
                var url = $('#formAddDepartement').attr('action');                
                var data = $('#formAddDepartement').serialize();
                //valider le formulaire

                var departement = $('input[name=departement]');
                var resultat = 0;

                if(departement.val()==''){
                    $('#errorDepartement').html('Champ requis').fadeIn().delay(2000).fadeOut('slow');
                }else{
                    $('#succesDepartement').html('').fadeIn().delay(2000).fadeOut('slow');
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
                            $('#formAddDepartement')[0].reset();
                            if (response.type == 'update') {
                                var type = 'Modifié';
                            }else{
                                var type = 'ajouté';
                            }
                            $('.alert-light').html('departement '+ type).fadeIn().delay(2000).fadeOut('slow');
                            listeDepartement();
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

        // Fucntion qui recupere les donnees en bd (Liste utilisateur)
        function listeUser(){
            $.ajax({
                type: 'ajax',
                url:'<?= base_url() ?>assets_it.php/utilisateurController/listeUser',
                async:false,
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    var html = '';
                    var i;
                    for (i=0; i<data.length; i++) {
                        html += '<tr>'+
                                ' <td>'+data[i].id_user+'</td>'+
                                    '<td>'+data[i].nom_prenom_user+'</td>'+
                                    '<td>'+data[i].email_user+'</td>'+
                                    '<td>'+data[i].phone_user+'</td>'+
                                    '<td>'+data[i].staff+'</td>'+
                                    '<td>'+data[i].fonction+'</td>'+
                                    '<td>'+data[i].libelle_dept+'</td>'+
                                    '<td>'+data[i].libelle_role+'</td>'+
                                    '<td>'+
                                        '<a href="javascript:;" class="btn btn-outline-dark btn-sm item-edit" data="'+data[i].id_user+'" >Modifier</a>'+
                                        '<a href="javascript:;" class="btn btn-outline-dark btn-sm item-delete" data="'+data[i].id_user+'" >X</a>'+
                                    '</td>'+
                            ' </tr>';
                    }
                    $('#showdata').html(html);
                },
                error:function(){
                    alert('Erreur! narrive pas a obteniries donnnees demandées')
                }
            });
        }

           //Supprimer -----------------------------------------------------------------------
           $('#showdata').on('click', '.item-delete', function(){
                var id = $(this).attr('data');
                var res = confirm("Êtes-vous sûr de vouloir supprimer?");
                if(res){
                        $.ajax({
                        type: 'ajax',
                        method:'get',
                        url:'<?= site_url('userControlleur/delete'); ?>',
                        data:{id:id},
                        async:false,
                        dataType:'json',
                        success: function(response){
                            if (response.success) {
                                $('.alert-light').html('Famille Supprimé').fadeIn().delay(2000).fadeOut('slow');
                                listeUser();
                            } else {
                                alert('Impossile de supprimer cette localisation');
                            }
                        },
                        error:function(){
                            alert('Impossible d ajouter le Famille');
                        }
                    });
                }
                
            });

             //Editer -------------------------------------------------------------------------------
             $('#showdata').on('click', '.item-edit', function(){
                $('#saveuser').html('Modifier');
                $('#myform').attr('action','<?= site_url('userControlleur/updateuser'); ?>');
                var id = $(this).attr('data');
                $.ajax({
                    type: 'ajax',
                    method:'get',
                    url:'<?= site_url('userControlleur/edituser'); ?>',
                    data:{id:id},
                    async:false,
                    dataType: 'json',
                    success: function(data){
                        $('input[name=nom]').val(data.nom_user);
                        $('input[name=email]').val(data.email_user);
                        $('input[name=phone1]').val(data.phone2_user);
                        $('input[name=phone2]').val(data.phone2_user);
                        $('input[name=userId]').val(data.id_user);
                    },
                    error:function(){
                        alert('Impossible d ajouter le Famille');
                    }
                });
            });

             //Ajouter et modification
            // -----------------------------------------------------------------------------------
            $('#saveuser').click(function(e){
                e.preventDefault();
                var url = $('#myform').attr('action');                
                var data = $('#myform').serialize();
                //valider le formulaire

                var nom = $('input[name=nom]');
                var email = $('input[name=email]');
                var phone1 = $('input[name=phone1]');
                var phone2 = $('input[name=phone2]');
                var userId = $('input[name=userId]');
                var resultat = 1;

                if(nom.val()==''){
                    $('#errorNom').html('Le Nom du user requis!').fadeIn().delay(2000).fadeOut('slow');;
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
                            $('.alert-light').html('user '+ type).fadeIn().delay(2000).fadeOut('slow');
                            listeUser();
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