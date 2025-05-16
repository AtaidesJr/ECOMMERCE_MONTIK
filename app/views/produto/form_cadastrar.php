<!--Extende da master.php-->
<?php
$this->layout('master',  ['title' => 'Home | Portal Tecnokor']);
?>

<section>
    <div class="container-fluid d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="mb-0 mb-md-0">
            <nav aria-label="breadcrumb" class="card_body">
                <ol class="breadcrumb breadcrumb-style1 mb-0">
                    <li class="breadcrumb-item texto-cinza">
                        <a href="javascript:void(0);" class="texto-cinza">Pagina inicial</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0);">Novo Produto</a>
                    </li>
                </ol>
            </nav>
        </div>
        <div>
            <h4 class="card_body clock texto-cinza"></h4>
        </div>
    </div>
    <hr class="my-16 hr-cinza">
</section>

<div class="layout-demo-info">
    <div id="zoom90">
        <div class="container d-flex justify-content-center">
            <div class="col-xl col-md-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id="formBuscaRM" method="POST" action="/produto/cadastrar">
                            <div class="container-fluid d-flex flex-wrap justify-content-center py-0 flex-md-row flex-column">
                                <div class="col-md-10">
                                    <div class="row">

                                        <div class="mb-3">
                                            <label class="form-label texto-black fw-bold" for="basic-default-fullname">Produto</label>
                                            <input type="text" class="form-control" id="nome" name="nome">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label texto-black fw-bold" for="basic-default-fullname">Preço</label>
                                            <input type="text" class="form-control" id="preco" name="preco">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label texto-black fw-bold">Estoque</label>
                                            <input type="text" id="estoque_base" name="estoque_base" class="form-control">
                                        </div>

                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-sm btn-success">Adicionar</button>
                                        <!-- <button type="submit" class="btn btn-sm btn-warning">Cancelar</button> -->
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>