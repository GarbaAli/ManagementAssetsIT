
<div class="container-fluid" style="height:100%;background-color:#bacce5">
    <div class="d-flex justify-content-between">
        <h4>departements</h4>
    </div>
    <div style="height: 10%; border:1px solid #bacce5">
        <div style="display:none;" class="alert alert-light departement="alert"></div>
    </div>
        <div class="row">
            <div class="col-md-6">
            <div class="card" style="margin-top:10%; padding: 25px;">
                    <div class="card-header border-2">
                    <span>Ajouter un departement</span>
                    </div>
                    <form id="myform" action="<?= site_url('departementControlleur/adddepartement'); ?>" style="margin-top: 10px;">
                        <input type="hidden" name="departementId" value="0">
                        <div class="form-row align-items-center">
                            <div class="col-auto form-group ">
                            <label class="sr-only" for="inlineFormInputGroup">Departement</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"></div>
                                </div>
                                <input type="text" name="departement" value="" class="form-control" id="inlineFormInputGroup" placeholder="Entree le libelle">
                            </div>
                            <span style="color:red" id="error"></span>
                            </div>
                            <div class="col-auto">
                            <button type="submit" id="savedepartement" class="btn btn-dark mb-2">Valider</button>
                            </div>
                            <span style="color:red;font-style:italic" ></span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
            <div class="card" style="margin-top:10%; padding: 25px;">
                <div class="card-header border-0">
                <span class="mb-0">departement</span>
                </div>
                <div class="table-responsive" style="margin-top: 10px;">

                <table id="tables"  class="display nowrap" style="width:100%">
                    <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Libelle</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="list" id="showdata">
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Libelle</th>
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
                $('#tables').DataTable();
            } );

            showAlldepartement();

            // Fucntion qui recupere les donnees en bd (Liste)
            function showAlldepartement(){
                $.ajax({
                    type: 'ajax',
                    url:'<?= base_url() ?>assets_it.php/departementControlleur/showAlldepartement',
                    async:false,
                    dataType: 'json',
                    success: function(data){
                        console.log(data);
                        var html = '';
                        var i;
                        for (i=0; i<data.length; i++) {
                            html += '<tr>'+
                                       ' <td>'+data[i].id_dept+'</td>'+
                                        '<td>'+data[i].libelle_dept+'</td>'+
                                        '<td>'+
                                            '<a href="javascript:;" class="btn btn-outline-dark btn-sm item-edit" data="'+data[i].id_dept+'" >Modifier</a>'+
                                            '<a href="javascript:;" class="btn btn-outline-dark btn-sm item-delete" data="'+data[i].id_dept+'" >Supprimer</a>'+
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

            //Ajouter et modification
            // -----------------------------------------------------------------------------------
            $('#savedepartement').click(function(e){
                e.preventDefault();
                var url = $('#myform').attr('action');                
                var data = $('#myform').serialize();
                //valider le formulaire

                var departement = $('input[name=departement]');
                var departementId = $('input[name=departementId]');
                var resultat = 0;

                if(departement.val()==''){
                    $('#error').html('Error de saisi');
                }else{
                    $('#error').html('');
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
                            $('#myform')[0].reset();
                            if (response.type == 'update') {
                                var type = 'Modifié';
                            }else{
                                var type = 'ajouté';
                            }
                            $('.alert-light').html('departement '+ type).fadeIn().delay(2000).fadeOut('slow');
                            showAlldepartement();
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

            //Editer -------------------------------------------------------------------------------
            $('#showdata').on('click', '.item-edit', function(){
                $('#savedepartement').html('Modifier');
                $('#myform').attr('action','<?= site_url('departementControlleur/updatedepartement'); ?>');
                var id = $(this).attr('data');
                $.ajax({
                    type: 'ajax',
                    method:'get',
                    url:'<?= site_url('departementControlleur/editdepartement'); ?>',
                    data:{id:id},
                    async:false,
                    dataType: 'json',
                    success: function(data){
                        $('input[name=departement]').val(data.libelle_dept);
                        $('input[name=departementId]').val(data.id_dept);
                    },
                    error:function(){
                        alert('Impossible d ajouter le departement');
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
                        url:'<?= site_url('departementControlleur/deletedepartement'); ?>',
                        data:{id:id},
                        async:false,
                        dataType:'json',
                        success: function(response){
                            if (response.success) {
                                $('.alert-light').html('departement Supprimé').fadeIn().delay(2000).fadeOut('slow');
                                showAlldepartement();
                            } else {
                                alert('Impossile de supprimer ce departement');
                            }
                        },
                        error:function(){
                            alert('Impossible d ajouter le departement');
                        }
                    });
                }
                
            });

        });
    </script>   
</body>
</html>