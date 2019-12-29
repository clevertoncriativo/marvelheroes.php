<?php include("inc/header.php"); ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-3 py-3 left-sidebar">
                <h5 class="mb-3">
					<b>Informe o seu personagem</b>
				</h5>
                <div class="form-group">
                    <select class="form-control select2 select-character border-top-0 border-left-0 border-right-0 rounded-0 p-0">
                    </select>
                </div>
            </div>
            <div class="col-md-9">
                <div class="">
                    <div class="row py-2">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6"> <img class="img-fluid d-block character-thumbnail" src=""> </div>
                                <div class="px-md-5 p-3 col-md-6 d-flex flex-column justify-content-center">
                                    <h1 class="character-name"></h1>
                                    <p class="character-description text-justify mb-5"> </p>
                                    <h2 class="title-list-stories" style="display:none">Algumas histórias</h2>
                                    <ul class="text-left list-stories">
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
           </div>
     </div>
  </div>
</div>


<?php include("inc/footer.php"); ?>