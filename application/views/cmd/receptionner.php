<div class="container-fluid" style="height:100%;background-color:#bacce5;">
    <div class="d-flex justify-content-between">
        <h4>Enregistrement materiels</h4>
    </div>

        <?php if($item[0]->qte_receptionner == 0) { ?>
            <div class="alert alert-light role="alert">Tous les articles ont ete envoyer en stock</div>
        <?php }  ?>
        <?php for ($i=1; $i <= $item[0]->qte_receptionner ; $i++) { ?>    
                    <div class="row">
                    <div class="col-md-12"  id="disp<?= $i ?>">
                    <div style="display:none" class="alert alert-light role="alert"></div>
                    <div class="card" id="formPO" style="margin-top:2%; padding: 25px;">
                            <div class="card-header border-2">
                            <span>materiel <?= $i ?> </span>
                            </div>
                            <span style="color:red" id="error<?= $i ?>"></span>
                            <form id="form<?= $i ?>" action="<?= site_url('inventaireControlleur/addMateriel'); ?>" method="POST">
                                <div class="row col-md-12">
                                    <div class="form-group col-md-4">
                                        <label for="">Serial Number:</label>
                                        <input type="text" name="sn<?= $i ?>" class="form-control" value="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Num.Mac:</label>
                                        <input type="text" name="mac<?= $i ?>" class="form-control" value="">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <input type="hidden" name="modele<?= $i ?>" class="form-control" value="<?= $item[0]->libelle_item  ?>">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <input type="hidden" name="qte" class="form-control" value="">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <input type="hidden" name="item<?= $i ?>" class="form-control" value="<?= $item[0]->id_items  ?>">
                                    </div>

                                    <div class="form-group col-md-6">
                                    <input type="submit" data="<?= $i ?>" class="btn btn-outline-dark save" value="Envoyer en stock">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div> 
        <?php } ?>
            <div class="d-flex justify-content-between">
            <?= anchor("inventaireControlleur/index", 'Inventaire Materiel', ['class'=> 'btn btn-light']); ?>
            <?= anchor("cmdControlleur/show/{$item[0]->cmd_id }", 'Retour aux Items', ['class'=> 'btn btn-light']); ?>
            </div>
    <script src="<?= base_url('assets/js/jquery-3.2.1.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script> 
    <script>
        $(document).ready(function () {
            var qtes = '<?= $item[0]->qte_receptionner  ?>'; 
            qtes = qtes - 1;  
            $('input[name=qte]').val(qtes);
            
            //Ajouter
            // -----------------------------------------------------------------------------------
            $('.save').click(function(e){
                e.preventDefault();
                var id = $(this).attr('data');
                var url = $('#form'+id).attr('action');                
                var data = $('#form'+id).serialize();
                let fm = document.getElementById('disp'+id);
                
                //valider le formulaire

                var sn = $('input[name=sn'+id+']');
                var mac = $('input[name=mac'+id+']');
                var modele = $('input[name=modele'+id+']');
                var item = $('input[name=item'+id+']');
                var qte = $('input[name=qte]'); //3 - 2 - 1
                var resultat = 0;

                if(sn.val()==''){
                    $('#error'+id).html('ce champs est requis!');
                }else{
                    $('#error'+id).html('');
                    resultat = 1;
                }

                if(resultat == 1){
                    $.ajax({
                    type: 'ajax',
                    method:'post',
                    url:'<?= base_url() ?>assets_it.php/inventaireControlleur/addMateriel/'+id,
                    data:data,
                    async:false,
                    dataType: 'json',
                    success: function(response){
                        if (response.success) {
                            qtes = qtes - 1; // 3-1 = 1 
                            $('input[name=qte]').val(qtes); //1
                            $('.alert-light').html('materiel ajouter en stock ').fadeIn().delay(2000).fadeOut('slow');
                            $('#form'+id)[0].reset();
                            fm.classList.toggle('d-none');
                            
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
        });
    </script>   
</body>
</html>