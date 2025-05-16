<!--Extende da master.php-->
<?php $this->layout('master',  ['title' => 'Ecommerce | Tecnokor']); ?>

<section>
    <div class="container-fluid d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="mb-0 mb-md-0">
            <nav aria-label="breadcrumb" class="card_body">
                <ol class="breadcrumb breadcrumb-style1 mb-0">
                    <li class="breadcrumb-item texto-cinza">
                        <a href="javascript:void(0);" class="texto-cinza">Pagina inicial</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0);">Lista de Produtos</a>
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

<div id="content">
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">

                                    <?php if (!empty($produtos)) : ?>

                                        <table id="myTable" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nome do Produto</th>
                                                    <th>Preço</th>
                                                    <th>Em Estoque</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($produtos as $index => $produto) : ?>
                                                    <tr>

                                                        <td><?php echo $produto['nome'] ?></td>
                                                        <td><?php echo $produto['preco'] ?></td>
                                                        <td><?php echo $produto['quantidade'] ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarModal-<?php echo $index ?>">
                                                                Editar
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#excluirModal-<?php echo $index ?>">
                                                                Excluir
                                                            </button>
                                                        </td>

                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>

                                        <?php foreach ($produtos as $index => $produto) : ?>
                                            <div class="modal fade" id="editarModal-<?php echo  $index ?>" tabindex="-1" aria-labelledby="editarModalLabel-<?php echo  $index ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title black" id="editarModalLabel-<?php echo $index ?>">Produto : <?php echo $produto['nome'] ?></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/produto/editar" method="POST">
                                                                <div class="col">

                                                                    <div class="mb-3">
                                                                        <label class="form-label texto-black fw-bold" for="basic-default-fullname">Nome do Produto</label>
                                                                        <input type="text" class="form-control" id="nome" name="nome" value="<?= $produto['nome'] ?>">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label class="form-label texto-black fw-bold" for="basic-default-fullname">Preço</label>
                                                                        <input type="text" class="form-control" id="preco" name="preco" value="<?= $produto['preco'] ?>">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label class="form-label texto-black fw-bold">Estoque</label>
                                                                        <input type="text" id="estoque_base" name="estoque_base" class="form-control" value="<?= $produto['quantidade'] ?>">
                                                                    </div>

                                                                </div>

                                                                <div class="modal-footer">
                                                                    <input type="hidden" name="produto_id" value="<?= $produto['id'] ?>">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                                                    <button type="submit" class="btn btn-success">Alterar</button>
                                                                </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>


                                    <?php else : ?>
                                        <h3 class="text-center text-primary">Não existem dados cadastrados!</h3>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>