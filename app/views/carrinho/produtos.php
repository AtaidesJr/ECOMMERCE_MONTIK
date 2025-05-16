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

<?php if (!empty($_SESSION['endereco'])): ?>
    <div class="alert alert-info alert-dismissible fade show">
        Endereço encontrado: <strong class="black"><?= htmlspecialchars($_SESSION['endereco']['logradouro']) ?>, <?= htmlspecialchars($_SESSION['endereco']['bairro']) ?>, <?= htmlspecialchars($_SESSION['endereco']['localidade']) ?> - <?= htmlspecialchars($_SESSION['endereco']['uf']) ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>



<div id="content">
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <?php if (!empty($itens)): ?>
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <h4 class="mb-0 me-3">Meu Carrinho</h4>

                                        <h6 class="mb-0 ms-auto">
                                            <form method="post" action="/carrinho/cep" class="mb-3">
                                                <label for="cep">Digite seu CEP:</label>
                                                <input type="text" id="cep" name="cep" pattern="\d{5}-?\d{3}" placeholder="00000-000" required>
                                                <button type="submit" class="btn btn-warning btn-sm">Verificar CEP</button>
                                            </form>

                                        </h6>
                                    </div>
                                    <br>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Produto</th>
                                                    <th>Preço Unitário</th>
                                                    <th>Quantidade</th>
                                                    <th>Total</th>
                                                    <th>Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody class="fw-bold">

                                                <?php foreach ($itens as $id => $item): ?>
                                                    <tr>
                                                        <td><?= htmlspecialchars($item['nome']) ?></td>
                                                        <td>R$ <?= number_format($item['preco'], 2, ',', '.') ?></td>
                                                        <td>
                                                            <form method="post" action="/carrinho/atualizar" style="display:inline-block;">
                                                                <input type="hidden" name="produto_id" value="<?= $id ?>">
                                                                <input type="number" name="quantidade" value="<?= $item['quantidade'] ?>" min="1" style="width: 60px;">
                                                                <button type="submit" class="btn btn-sm btn-success">Atualizar</button>
                                                            </form>
                                                        </td>
                                                        <td>R$ <?= number_format($item['preco'] * $item['quantidade'], 2, ',', '.') ?></td>
                                                        <td>
                                                            <form method="post" action="/carrinho/remover" style="display:inline-block;" onsubmit="return confirm('Remover este produto?');">
                                                                <input type="hidden" name="produto_id" value="<?= $id ?>">
                                                                <button type="submit" class="btn btn-sm btn-danger">Remover</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <br>
                                        <br>
                                        <div class="d-flex align-items-center">
                                            <h5 class="mb-0 me-3">Subtotal: <span class="badge bg-secondary rounded-pill">R$ <?= number_format($subtotal, 2, ',', '.') ?></span></h5>
                                            <h5 class="mb-0">Frete: R$ <span class="badge bg-secondary rounded-pill"><?= number_format($frete, 2, ',', '.') ?></span></h5>
                                            <h4 class="mb-0 ms-auto">
                                                <span class="badge bg-secondary rounded-pill">Total: R$ <?= number_format($total, 2, ',', '.') ?></span>
                                            </h4>
                                        </div>
                                        <br>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-info">Retornar as Compras</button>
                                            <button type="submit" class="btn btn-dark">Prosseguir para o Pagamento</button>
                                        </div>

                                    </div>

                                </div>
                            <?php else: ?>
                                <br>
                                <h3 class="text-center">Adicione algum item ao carrinho!</h3>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>