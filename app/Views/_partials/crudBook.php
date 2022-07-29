<?= $this->section('js') ?>
  <script>
    $(function () {
      getBook()
    });

    function formBookValidate() {
      $.validator.addMethod("exactLength", function(value, element, param) {
        return this.optional(element) || value.length == param;
      }, $.validator.format("Please enter exactly {0} characters."));
      $("#form-book").validate({
        rules: {
          judul_buku: {
            required: true,
          },
          penulis_buku: {
            required: true,
          },
          penerbit: {
            required: true,
          },
          tahun_terbit: {
            required: true,
            integer: true,
            exactLength: 4,
          },
        },
        messages: {
          judul_buku: {
            required: 'Judul Buku tidak boleh kosong',
          },
          penulis_buku: {
            required: 'Penulis Buku tidak boleh kosong',
          },
          penerbit: {
            required: 'Penerbit Buku tidak boleh kosong',
          },
          rahun_terbit: {
            required: 'Tahun Terbit tidak boleh kosong',
            integer: 'Tahun Terbit hanya boleh diisi dengan angka',
            exactLength: 'Tolong masukkan 4 karakter (angka) saja',
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
          var buku_id = $('#buku_id').val()
          if (method == 'POST') {
            var url = '<?= base_url() . route_to('create-book') ?>'
          } else if (method == 'PUT') {
            var url = `<?= base_url() ?>/book/${buku_id}`
          }
          var data = $('#form-book').serialize()
          const response = await HitData(url, data, 'POST')
          var success = response.success
          if (success) {
            $('#send_form').html('Submit');
            successNotif(response.msg)
            document.getElementById("form-book").reset(); 
            getBook()
            $('#modalBuku').modal('hide')
          } else {
            errorNotif(response.msg)
          }
        }
      });
    }
    
    async function getBook() {
      try {
        var sectionData = $('#load-book')
        url = '<?= base_url() ?>/book'
        const response = await HitData(url, null, "GET");
        sectionData.html(response)
        
        $("#book-table").DataTable({
          'pageLength': 10,
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#book-table-wrapper');
      } catch (error) {
          errorNotif('Error ' . error)
      }
    }

    async function newBook() {
      try {
        var sectionModal = $('.modals')
        sectionModal.html('')
        url = '<?= base_url() . route_to('new-book') ?>'
        const response = await HitData(url, null, 'GET')
        var modalResponse = sectionModal.html(response).find('#modalBuku');
        modalResponse.modal('show')
        formBookValidate()
      } catch (error) {
        errorNotif('Error ' . error)
      }
    }

    async function editBook(id) {
      try {
        var sectionModal = $('.modals')
        sectionModal.html('')
        url = `<?= base_url() ?>/book/${id}/edit`
        const response = await HitData(url, null, 'GET')
        console.log(response)
        var modalResponse = sectionModal.html(response).find('#modalBuku');
        modalResponse.modal('show')
        formBookValidate()
      } catch (error) {
        errorNotif('Error ' . error)
      }
    }

    async function deleteBook(id) {
      try {
        var url = `<?= base_url() ?>/book/${id}/delete`
        const response = await HitData(url, null, 'GET')
        if (response) {
          (response.success) ? successNotif(response.msg) : errorNotif(response.msg)
        }
        getBook()
      } catch (error) {
        errorNotif(error)
        console.log(error)
      }
    }
  </script>
<?= $this->endSection() ?>