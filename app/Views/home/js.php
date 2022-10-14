<script src="<?= base_url() ?>/mazer/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= base_url() ?>/mazer/dist/assets/js/bootstrap.bundle.min.js"></script>

<script src="<?= base_url() ?>/mazer/dist/assets/js/mazer.js"></script>
<script src="<?= base_url() ?>/mazer/dist/assets/js/app.js"></script>
<script src="<?= base_url() ?>/mazer/dist/assets/vendors/simple-datatables/simple-datatables.js"></script>

<script src="<?= base_url() ?>/mazer/dist/assets/js/pages/dashboard.js"></script>
<script src="<?= base_url() ?>/mazer/dist/assets/js/pages/form-editor.js"></script>


<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
<script src="<?= base_url() ?>/mazer/dist/assets/vendors/ckeditor/ckeditor.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
<script src="<?= base_url() ?>/ckeditor5/ckeditor.js"></script>


<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
    
<script>
  window.setTimeout(function(){
    $(".alert").fadeTo(500,0).slideUp(500,function(){
      $(this).remove();
    });

  },3000);

</script>


