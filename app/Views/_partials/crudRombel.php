<?= $this->section('js') ?>
  <script>
    $(function() {
      getRombel()
    });

    function formRombelValidate() {
      $('#form-rombel').validate({
        rules: {
          nama_rombel: {
            required: true,
          },
          tingkat: {
            required: true,
          },
        },
        messages: {
          nama_rombel: {
            required: 'Nama Rombel tidak boleh kosong',
          },
          tingkat: {
            required: 'Tingkat (kelas) tidak boleh kosong',
          },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        },
        submitHandler: async function(form) {
          $('#send_form').html('Sending...');
          var method = $('#method').text()
          var rombel_id = $('#rombel_id').val()
          if (method == 'POST') {
            var url = '<?= base_url() . route_to('create-rombel') ?>'
          } else if (method == 'PUT') {
            var url = `<?= base_url() ?>/rombel/${rombel_id}`
          }
          var data = $('#form-rombel').serialize()
          const response = await HitData(url, data, 'POST')
          var success = response.success
          if (success) {
            $('#send_form').html('submit')
            successNotif(response.msg)
            document.getElementById('form-rombel').reset()
            getRombel()
            $('#modalRombel').modal('hide')
          } else {
            errorNotif(response.msg)
          }
        }
      })
    }

    async function getRombel() {
      try {
        var sectionData = $('#load-rombel')
        url = '<?= base_url() ?>/rombel'
        const response = await HitData(url, null, 'GET')
        sectionData.html(response)

        $('#rombel-table').DataTable({
          'pageLength': 4,
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#rombel-table-wrapper');
      } catch (error) {
        errorNotif('Error ' . error)
      }
    }

    async function newRombel() {
      try {
        var sectionModal = $('.modals')
        sectionModal.html('')
        url = '<?= base_url() . route_to('new-rombel') ?>'
        const response = await HitData(url, null, 'GET')
        var modalResponse = sectionModal.html(response).find('#modalRombel')
        modalResponse.modal('show')
        formRombelValidate()
      } catch (error) {
        errorNotif('Error ' . error)
      }
    }

    async function editRombel(id) {
      try {
        var sectionModal = $('.modals')
        sectionModal.html('')
        url = `<?= base_url() ?>/rombel/${id}/edit`
        const response = await HitData(url, null, 'GET')
        var modalResponse = sectionModal.html(response).find('#modalRombel')
        modalResponse.modal('show')
        formRombelValidate()
      } catch (error) {
        errorNotif('Error ' . error)
      }
    }

    async function deleteRombel(id) {
      try {
        var url = `<?= base_url() ?>/rombel/${id}/delete`
        const response = await HitData(url, null, 'GET')
        if (response) {
          (response.success) ? successNotif(response.msg) : errorNotif(response.msg)
        }
        getRombel()
      } catch (error) {
        errorNotif(error)
        console.log(error)
      }
    }
  </script>
<?= $this->endSection() ?>