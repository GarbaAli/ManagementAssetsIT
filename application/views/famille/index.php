    <div class="container-fluid" style="height:100%;background-color:#bacce5">
    <div class="d-flex justify-content-between">
        <h4>Familles Materiels</h4>
    </div>
    <div style="height: 10%; border:1px solid #bacce5">
        <div style="display:none;" class="alert alert-light role="alert"></div>
    </div>
        <div class="row">
            <div class="col-md-6">
            <div class="card" style="margin-top:10%; padding: 25px;">
                    <div class="card-header border-2">
                    <span>Ajouter une Famille</span>
                    </div>
                    <form method="POST" id="myform" action="<?= site_url('familleControlleur/store'); ?>" style="margin-top: 10px;">
                         <input type="hidden" name="familleId" value="0">
                        <div class="form-row align-items-center">
                            <div class="col-auto">
                            <label class="sr-only" for="inlineFormInputGroup">Famille</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text"></div>
                                </div>
                                <input type="text" name="famille" value="" class="form-control" id="inlineFormInputGroup" placeholder="Entree le libelle">
                            </div>
                            <span id="error" style="color:red;font-style:italic"></span>
                            </div>
                            <div class="col-auto">
                            <button type="submit" id="saveFamille" class="btn btn-dark mb-2">Valider</button>
                            </div>
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

                <table id="tables" class="display nowrap">
                    <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Libelle</th>
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
            

            listeFamille();

        // Fucntion qui recupere les donnees en bd (Liste)
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
                        html += '<tr>'+
                                ' <td>'+data[i].id_famille+'</td>'+
                                    '<td>'+data[i].libelle_famille+'</td>'+
                                    '<td>'+
                                        '<a href="javascript:;" class="btn btn-outline-dark btn-sm item-edit" data="'+data[i].id_famille+'" >Modifier</a>'+
                                        '<a href="javascript:;" class="btn btn-outline-dark btn-sm item-delete" data="'+data[i].id_famille+'" >Supprimer</a>'+
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
                        url:'<?= site_url('familleControlleur/deleteFamille'); ?>',
                        data:{id:id},
                        async:false,
                        dataType:'json',
                        success: function(response){
                            if (response.success) {
                                $('.alert-light').html('Famille Supprimé').fadeIn().delay(2000).fadeOut('slow');
                                listeFamille();
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
                $('#saveFamille').html('Modifier');
                $('#myform').attr('action','<?= site_url('familleControlleur/updateFamille'); ?>');
                var id = $(this).attr('data');
                $.ajax({
                    type: 'ajax',
                    method:'get',
                    url:'<?= site_url('familleControlleur/editFamille'); ?>',
                    data:{id:id},
                    async:false,
                    dataType: 'json',
                    success: function(data){
                        $('input[name=famille]').val(data.libelle_famille);
                        $('input[name=familleId]').val(data.id_famille);
                    },
                    error:function(){
                        alert('Impossible d ajouter le Famille');
                    }
                });
            });

             //Ajouter et modification
            // -----------------------------------------------------------------------------------
            $('#saveFamille').click(function(e){
                e.preventDefault();
                var url = $('#myform').attr('action');                
                var data = $('#myform').serialize();
                //valider le formulaire

                var famille = $('input[name=famille]');
                var familleId = $('input[name=familleId]');
                var resultat = 0;

                if(famille.val()==''){
                    $('#error').html('Ce champs est requis!');
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
                            $('.alert-light').html('Famille '+ type).fadeIn().delay(2000).fadeOut('slow');
                            listeFamille();
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


