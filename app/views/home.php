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
                        <a href="javascript:void(0);">Todos os Produtos</a>
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

    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card-body">

                    <?php if (!empty($produtos)) : ?>

                        <div class="row row-cols-1 row-cols-md-4 g-4">
                            <?php foreach ($produtos as $index => $produto): ?>
                                <div class="col">
                                    <div class="card text-center">
                                        <img src="../assets/img/avatars/produto_teste.png" class="card-img-top img-fluid mx-auto d-block" style="width: 18rem;">

                                        <div class="card-body d-flex flex-column justify-content-between">
                                            <div>
                                                <h5 class="card-title"><?php echo htmlspecialchars($produto['nome']) ?></h5>
                                                <p class="card-text">Valor: R$ <?php echo number_format($produto['preco'], 2, ',', '.') ?></p>
                                                <p class="card-text">Em Estoque: <?php echo $produto['quantidade'] ?></p>
                                            </div>
                                            <br>
                                            <form method="POST" action="/carrinho/adicionar">
                                                <input type="hidden" name="produto_id" value="<?= $produto['id'] ?>">
                                                <input type="hidden" name="nome" value="<?= $produto['nome'] ?>">
                                                <input type="hidden" name="preco" value="<?= $produto['preco'] ?>">
                                                <input type="number" name="quantidade" class="form-control w-25 d-inline" value="1" min="1" max="<?= $produto['quantidade'] ?>">
                                                <button type="submit" class="btn btn-success">Comprar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else : ?>
                        <h3 class="text-center text-primary">Não existem dados cadastrados!</h3>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>

</div>