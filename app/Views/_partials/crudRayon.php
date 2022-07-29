<?= $this->section('js') ?>
  <script>
    $(function () {
      getRayon()
    });

    function formRayonValidate() {
      $("#form-rayon").validate({
        rules: {
          nama_rayon: {
            required: true,
          },
          jumlah_siswa: {
            required: true,
          },
          pembimbing: {
            required: true,
          },
        },
        messages: {
          nama_rayon: {
            required: 'Nama Rayon tidak boleh kosong',
          },
          jumlah_siswa: {
            required: 'Jumlah Siswa tidak boleh kosong',
          },
          pembimbing: {
            required: 'Pembimbing Rayon tidak boleh kosong',
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
          var rayon_id = $('#rayon_id').val()
          if (method == 'POST') {
            var url = '<?= base_url() . route_to('create-rayon') ?>'
          } else if (method == 'PUT') {
            var url = `<?= base_url() ?>/rayon/${rayon_id}`
          }
          var data = $('#form-rayon').serialize()
          const response = await HitData(url, data, 'POST')
          var success = response.success
          if (success) {
            $('#send_form').html('Submit');
            successNotif(response.msg)
            document.getElementById("form-rayon").reset(); 
            getRayon()
            $('#modalRayon').modal('hide')
          } else {
            errorNotif(response.msg)
          }
        }
      });
    }
    
    async function getRayon() {
      try {
        var sectionData = $('#load-rayon')
        url = '<?= base_url() ?>/rayon'
        const response = await HitData(url, null, "GET");
        sectionData.html(response)
        
        $("#rayon-table").DataTable({
          'pageLength': 4,
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#rayon-table-wrapper');
      } catch (error) {
          errorNotif('Error ' . error)
      }
    }

    async function newRayon() {
      try {
        var sectionModal = $('.modals')
        sectionModal.html('')
        url = '<?= base_url() . route_to('new-rayon') ?>'
        const response = await HitData(url, null, 'GET')
        var modalResponse = sectionModal.html(response).find('#modalRayon');
        modalResponse.modal('show')
        formRayonValidate()
      } catch (error) {
        errorNotif('Error ' . error)
      }
    }

    async function editRayon(id) {
      try {
        var sectionModal = $('.modals')
        sectionModal.html('')
        url = `<?= base_url() ?>/rayon/${id}/edit`
        const response = await HitData(url, null, 'GET')
        var modalResponse = sectionModal.html(response).find('#modalRayon');
        modalResponse.modal('show')
        formRayonValidate()
      } catch (error) {
        errorNotif('Error ' . error)
      }
    }

    async function deleteRayon(id) {
      try {
        var url = `<?= base_url() ?>/rayon/${id}/delete`
        const response = await HitData(url, null, 'GET')
        if (response) {
          (response.success) ? successNotif(response.msg) : errorNotif(response.msg)
        }
        getRayon()
      } catch (error) {
        errorNotif(error)
        console.log(error)
      }
    }
  </script>
<?= $this->endSection() ?>