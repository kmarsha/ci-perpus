<?= $this->section('js') ?>
  <script>
    $(function () {
      getPeminjam()
    });

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