<?= $this->section('js') ?>
  <script>
    $(function () {
      getPenerbit()
    });

    function formPenerbitValidate() {
      $("#form-penerbit").validate({
        rules: {
          nama_penerbit: {
            required: true,
          },
          perusahaan: {
            required: true,
          },
        },
        messages: {
          nama_penerbit: {
            required: 'Nama Penerbit tidak boleh kosong',
          },
          perusahaan: {
            required: 'Perusahaan tidak boleh kosong',
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
          var penerbit_id = $('#penerbit_id').val()
          if (method == 'POST') {
            var url = '<?= base_url() . route_to('create-penerbit') ?>'
          } else if (method == 'PUT') {
            var url = `<?= base_url() ?>/penerbit/${penerbit_id}`
          }
          var data = $('#form-penerbit').serialize()
          const response = await HitData(url, data, 'POST')
          var success = response.success
          if (success) {
            $('#send_form').html('Submit');
            successNotif(response.msg)
            document.getElementById("form-penerbit").reset(); 
            getPenerbit()
            $('#modalPenerbit').modal('hide')
          } else {
            errorNotif(response.msg)
          }
        }
      });
    }
    
    async function getPenerbit() {
      try {
        var sectionData = $('#load-penerbit')
        url = '<?= base_url() ?>/penerbit'
        const response = await HitData(url, null, "GET");
        sectionData.html(response)
        
        $("#penerbit-table").DataTable({
          'pageLength': 4,
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#penerbit-table-wrapper');
      } catch (error) {
          errorNotif('Error ' . error)
      }
    }

    async function newPenerbit() {
      try {
        var sectionModal = $('.modals')
        sectionModal.html('')
        url = '<?= base_url() . route_to('new-penerbit') ?>'
        const response = await HitData(url, null, 'GET')
        var modalResponse = sectionModal.html(response).find('#modalPenerbit');
        modalResponse.modal('show')
        formPenerbitValidate()
      } catch (error) {
        errorNotif('Error ' . error)
      }
    }

    async function editPenerbit(id) {
      try {
        var sectionModal = $('.modals')
        sectionModal.html('')
        url = `<?= base_url() ?>/penerbit/${id}/edit`
        const response = await HitData(url, null, 'GET')
        var modalResponse = sectionModal.html(response).find('#modalPenerbit');
        modalResponse.modal('show')
        formPenerbitValidate()
      } catch (error) {
        errorNotif('Error ' . error)
      }
    }

    async function deletePenerbit(id) {
      try {
        var url = `<?= base_url() ?>/penerbit/${id}/delete`
        const response = await HitData(url, null, 'GET')
        if (response) {
          (response.success) ? successNotif(response.msg) : errorNotif(response.msg)
        }
        getPenerbit()
      } catch (error) {
        errorNotif(error)
        console.log(error)
      }
    }
  </script>
<?= $this->endSection() ?>