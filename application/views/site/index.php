


<div class="container-fluid" style="height:100%;background-color:#bacce5">
    <div class="d-flex justify-content-between">
        <h4>Localisation</h4>
    </div>
    <div style="height: 10%; border:1px solid #bacce5">
        <div style="display:none;" class="alert alert-light role="alert"></div>
    </div>
        <div class="row">
            <div class="col-md-6">
            <div class="card" style="margin-top:10%; padding: 25px;">
                    <div class="card-header border-2">
                    <span>Ajouter un Site</span>
                    </div>
                    <form id="myform" action="<?= site_url('siteControlleur/addSite'); ?>" style="margin-top: 10px;">
                        <input type="hidden" name="siteId" value="0">
                        <div class="form-row align-items-center">
                            <div class="col-auto form-group ">
                            <label class="sr-only" for="inlineFormInputGroup">Site</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"></div>
                                </div>
                                <input type="text" name="site" value="" class="form-control" id="inlineFormInputGroup" placeholder="Entree le libelle">
                            </div>
                            <span style="color:red" id="error"></span>
                            </div>
                            <div class="col-auto">
                            <button type="submit" id="saveSite" class="btn btn-dark mb-2">Valider</button>
                            </div>
                            <span style="color:red;font-style:italic" ><?= form_error('site'); ?></span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
            <div class="card" style="margin-top:10%; padding: 25px;">
                <div class="card-header border-0">
                <span class="mb-0">site</span>
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

            showAllSite();

            // Fucntion qui recupere les donnees en bd (Liste)
            function showAllSite(){
                $.ajax({
                    type: 'ajax',
                    url:'<?= base_url() ?>assets_it.php/siteControlleur/showAllSite',
                    async:false,
                    dataType: 'json',
                    success: function(data){
                        console.log(data);
                        var html = '';
                        var i;
                        for (i=0; i<data.length; i++) {
                            html += '<tr>'+
                                       ' <td>'+data[i].id_site+'</td>'+
                                        '<td>'+data[i].libelle_site+'</td>'+
                                        '<td>'+
                                            '<a href="javascript:;" class="btn btn-outline-dark btn-sm item-edit" data="'+data[i].id_site+'" >Modifier</a>'+
                                            '<a href="javascript:;" class="btn btn-outline-dark btn-sm item-delete" data="'+data[i].id_site+'" >Supprimer</a>'+
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
            $('#saveSite').click(function(e){
                e.preventDefault();
                var url = $('#myform').attr('action');                
                var data = $('#myform').serialize();
                //valider le formulaire

                var site = $('input[name=site]');
                var siteId = $('input[name=siteId]');
                var resultat = 0;

                if(site.val()==''){
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
                            $('.alert-light').html('site '+ type).fadeIn().delay(2000).fadeOut('slow');
                            showAllSite();
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
                $('#saveSite').html('Modifier');
                $('#myform').attr('action','<?= site_url('siteControlleur/updateSite'); ?>');
                var id = $(this).attr('data');
                $.ajax({
                    type: 'ajax',
                    method:'get',
                    url:'<?= site_url('siteControlleur/editSite'); ?>',
                    data:{id:id},
                    async:false,
                    dataType: 'json',
                    success: function(data){
                        $('input[name=site]').val(data.libelle_site);
                        $('input[name=siteId]').val(data.id_site);
                    },
                    error:function(){
                        alert('Impossible d ajouter le site');
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
                        url:'<?= site_url('siteControlleur/deleteSite'); ?>',
                        data:{id:id},
                        async:false,
                        dataType:'json',
                        success: function(response){
                            if (response.success) {
                                $('.alert-light').html('site Supprimé').fadeIn().delay(2000).fadeOut('slow');
                                showAllSite();
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