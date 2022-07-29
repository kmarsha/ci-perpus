<?= $this->section('js') ?>
  <script>
    $(function () {
      getStudent()
    });

    function formStudentValidate() {
      $.validator.addMethod("exactLength", function(value, element, param) {
        return this.optional(element) || value.length == param;
      }, $.validator.format("Please enter exactly {0} characters."));
      $("#form-student").validate({
        rules: {
          nis_siswa: {
            required: true,
            integer: true,
            exactLength: 8,
          },
          nama_siswa: {
            required: true,
          },
          rayon: {
            required: true,
          },
          rombel: {
            required: true,
          },
        },
        messages: {
          nis_siswa: {
            required: 'NIS Siswa tidak boleh kosong',
            integer: 'NIS hanya boleh diisi dengan angka',
            exactLength: 'Tolong masukkan 8 karakter (angka) saja',
          },
          nama_siswa: {
            required: 'Nama Siswa tidak boleh kosong',
          },
          rayon: {
            required: 'Rayon Siswa tidak boleh kosong',
          },
          rombel: {
            required: 'Rombel Siswa tidak boleh kosong',
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
          var student_id = $('#student_id').val()
          if (method == 'POST') {
            var url = '<?= base_url() . route_to('create-student') ?>'
          } else if (method == 'PUT') {
            var url = `<?= base_url() ?>/student/${student_id}`
          }
          var data = $('#form-student').serialize()
          const response = await HitData(url, data, 'POST')
          var success = response.success
          if (success) {
            $('#send_form').html('Submit');
            successNotif(response.msg)
            document.getElementById("form-student").reset(); 
            getStudent()
            $('#modalStudent').modal('hide')
          } else {
            errorNotif(response.msg)
          }
        }
      });
    }
    
    async function getStudent() {
      try {
        var sectionData = $('#load-student')
        url = '<?= base_url() ?>/student'
        const response = await HitData(url, null, "GET");
        sectionData.html(response)
        
        $("#student-table").DataTable({
          'pageLength': 10,
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#student-table-wrapper');
      } catch (error) {
          errorNotif('Error ' . error)
      }
    }

    async function newStudent() {
      try {
        var sectionModal = $('.modals')
        sectionModal.html('')
        url = '<?= base_url() . route_to('new-student') ?>'
        const response = await HitData(url, null, 'GET')
        var modalResponse = sectionModal.html(response).find('#modalStudent');
        modalResponse.modal('show')
        formStudentValidate()
      } catch (error) {
        errorNotif('Error ' . error)
      }
    }

    async function editStudent(id) {
      try {
        var sectionModal = $('.modals')
        sectionModal.html('')
        url = `<?= base_url() ?>/student/${id}/edit`
        const response = await HitData(url, null, 'GET')
        var modalResponse = sectionModal.html(response).find('#modalStudent');
        modalResponse.modal('show')
        formStudentValidate()
      } catch (error) {
        errorNotif('Error ' . error)
      }
    }

    async function deleteStudent(id) {
      try {
        var url = `<?= base_url() ?>/student/${id}/delete`
        const response = await HitData(url, null, 'GET')
        if (response) {
          (response.success) ? successNotif(response.msg) : errorNotif(response.msg)
        }
        getStudent()
      } catch (error) {
        errorNotif(error)
        console.log(error)
      }
    }
  </script>
<?= $this->endSection() ?>