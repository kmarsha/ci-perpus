<?= $this->section('js') ?>
  <script>
    $(function () {
      getPeminjam()
    });
    
    async function getPeminjam() {
      try {
        var sectionData = $('#load-peminjam')
        url = '<?= base_url() ?>/peminjam'
        const response = await HitData(url, null, "GET");
        sectionData.html(response)
        
        $("#peminjam-table").DataTable({
          'pageLength': 10,
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#peminjam-table-wrapper');
      } catch (error) {
          errorNotif('Error ' . error)
      }
    }

    async function editPeminjam(id) {
      try {
        var sectionModal = $('.modals')
        sectionModal.html('')
        url = `<?= base_url() ?>/peminjam/${id}/edit`
        const response = await HitData(url, null, 'GET')
        var modalResponse = sectionModal.html(response).find('#modalPeminjam');
        modalResponse.modal('show')
        formPeminjamValidate()
      } catch (error) {
        errorNotif('Error ' . error)
      }
    }

    async function deletePeminjam(id) {
      try {
        var url = `<?= base_url() ?>/peminjam/${id}/delete`
        const response = await HitData(url, null, 'GET')
        if (response) {
          (response.success) ? successNotif(response.msg) : errorNotif(response.msg)
        }
        getPeminjam()
      } catch (error) {
        errorNotif(error)
        console.log(error)
      }
    }
  </script>
<?= $this->endSection() ?>