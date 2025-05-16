 <!-- Core JS -->
 <script src="/assets/vendor/libs/jquery/jquery.js"></script>
 <script src="/assets/vendor/libs/popper/popper.js"></script>
 <script src="/assets/vendor/js/bootstrap.js"></script>
 <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

 <script src="/assets/vendor/js/menu.js"></script>

 <script src="/assets/js/main.js"></script>

 <script async defer src="https://buttons.github.io/buttons.js"></script>


 <!-- Datatables -->
 <script src="/assets/vendor/libs/datatable/datatables-combinado.min.js"></script>

 <!-- Sweet Alert -->
 <script src="/assets/vendor/libs/sweetalert/sweetalert.min.js"></script>

 <script>
     $(document).ready(function() {
         $('#myTable').DataTable({
             "language": {
                 "lengthMenu": "_MENU_",
                 "infoEmpty": "Nenhum registro encontrado",
                 "zeroRecords": "Nenhum registro encontrado",
                 "info": "Exibindo a página _PAGE_ de _PAGES_",
                 "infoFiltered": "(Filtrado de _MAX_ registros)",
                 "search": "Pesquisar:",
                 "paginate": {
                     "first": "Primeiro",
                     "last": "Ultimo",
                     "next": "Proximo",
                     "previous": "Anterior"
                 },

             },
             "lengthMenu": [
                 [10],
                 [10],
             ],
             // "paging": false,
             "info": false

         });
     });
 </script>