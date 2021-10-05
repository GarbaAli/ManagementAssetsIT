<div class="container-fluid" style="height:100%;background-color:#bacce5">
    <div style="height: 10%; border:1px solid #bacce5">
        <div style="display:none;" class="alert alert-light role="alert"></div>
    </div>
        <div class="row">           
            <div class="col-md-12">

            <div class="card" style="margin-top:2%; padding: 25px;">
                    <div class="card-header border-2">
                    <span>Nouveau user</span>
                    </div>
                    <form id="myform" class="needs-validation" method="POST" action="<?= site_url('userControlleur/store'); ?>">
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
                        <button id="saveuser" class="btn btn-outline-dark" type="submit">Valider</button>
                    </form>
                </div>

            <div class="card" style="margin-top:2%;padding:20px">
                <div class="card-header border-0">
                <span class="mb-0">Liste des assets</span>
                </div>
                <div class="table-responsive" style="margin-top: 10px;">

                <table id="tables" class="display nowrap">
                    <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>user</th>
                        <th>Email</th>
                        <th>Phone 1</th>
                        <th>Phone 2</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="list" id="showdata">
                    </tbody>
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
            

            listeUser();

        // Fucntion qui recupere les donnees en bd (Liste utilisateur)
        function listeUser(){
            $.ajax({
                type: 'ajax',
                url:'<?= base_url() ?>assets_it.php/userController/listeUser',
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