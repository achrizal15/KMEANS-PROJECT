const base_url = $("meta#base_url").attr("content");

const roleTypeHandler = function () {
   if ($("#role-table").length > 0) {
      $(document).on("click", "#delete-role", function () {
         let id = $(this).data("id")
         let tr = $(this).parents("tr");
         Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
         }).then((result) => {
            if (result.isConfirmed) {
               $.ajax({
                  type: "post",
                  url: base_url + "rolecontroller/delete",
                  data: { "id": id },
                  dataType: "json",
                  success: function (response) {
                     Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                     )
                     tr.remove();
                  }
               });

            }
         })
      })
   }
}
const userTypeHandler = function () {
   if ($("#user-table").length > 0) {
      $(document).on("click", "#delete-user", function () {
         let id = $(this).data("id")
         let tr = $(this).parents("tr");
         Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
         }).then((result) => {
            if (result.isConfirmed) {
               $.ajax({
                  type: "post",
                  url: base_url + "usercontroller/delete",
                  data: { "id": id },
                  dataType: "json",
                  success: function (response) {
                     Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                     )
                     tr.remove();
                  }
               });

            }
         })
      })
   }
}
const materiTypeHandler = function () {
   if ($("#materi-table").length > 0) {
      $(document).on("click", "#delete-materi", function () {
         let id = $(this).data("id")
         let tr = $(this).parents("tr");
         Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
         }).then((result) => {
            if (result.isConfirmed) {
               $.ajax({
                  type: "post",
                  url: base_url + "matericontroller/delete",
                  data: { "id": id },
                  dataType: "json",
                  success: function (response) {
                     Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                     )
                     tr.remove();
                  }
               });

            }
         })
      })
   }
}
const pembelajaranTypeHandler = function () {
   if ($("#pembelajaran-table").length > 0) {
      const idHandlerTugas = $("#tugasHandler")
      $(document).on("click", "#delete-pembelajaran", function () {
         let id = $(this).data("id")
         let tr = $(this).parents("tr");
         Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
         }).then((result) => {
            if (result.isConfirmed) {
               $.ajax({
                  type: "post",
                  url: base_url + "pembelajarancontroller/delete",
                  data: { "id": id },
                  dataType: "json",
                  success: function (response) {
                     Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                     )
                     tr.remove();
                  }
               });

            }
         })
      })
   }
   $(document).on("change", "#tugasHandler", function () {
      if ($(this).prop("checked")) {
         $("#formTugas").css("visibility", "visible")

      } else {
         $("#formTugas").css("visibility", "hidden")
      }
   })
}
const kelasTypeHandler = function () {
   if ($("#kelas-table").length > 0) {
      $(document).on("click", "#delete-kelas", function () {
         let id = $(this).data("id")
         let tr = $(this).parents("tr");
         Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
         }).then((result) => {
            if (result.isConfirmed) {
               $.ajax({
                  type: "post",
                  url: base_url + "kelascontroller/delete",
                  data: { "id": id },
                  dataType: "json",
                  success: function (response) {
                     Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                     )
                     tr.remove();
                  }
               });

            }
         })
      })
   }
}
const angkatanTypeHandler = function () {
   if ($("#angkatan-table").length > 0) {
      $(document).on("click", "#delete-angkatan", function () {
         let id = $(this).data("id")
         let tr = $(this).parents("tr");
         Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
         }).then((result) => {
            if (result.isConfirmed) {
               $.ajax({
                  type: "post",
                  url: base_url + "angkatancontroller/delete",
                  data: { "id": id },
                  dataType: "json",
                  success: function (response) {
                     Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                     )
                     tr.remove();
                  }
               });

            }
         })
      })
   }
}

const soaltesTypeHandler = function () {
   if ($("#soaltes-table").length > 0) {
      $(document).on("click", "#delete-soaltes", function () {
         let id = $(this).data("id")
         let tr = $(this).parents("tr");
         Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
         }).then((result) => {
            if (result.isConfirmed) {
               $.ajax({
                  type: "post",
                  url: base_url + "soaltescontroller/delete",
                  data: { "id": id },
                  dataType: "json",
                  success: function (response) {
                     Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                     )
                     tr.remove();
                  }
               });

            }
         })
      })
   }
   if (typeof datamateri !== "undefined") {
      $(document).on("change", "#select-tingkatan", function () {
         const value = $(this).val()
         $('#select-materi').empty()
         for (let index = 0; index < datamateri.length; index++) {
            const element = datamateri[index];
            if (element.mtingkatan == value) {
               $('#select-materi').append(`<option value="${element.mid}">${element.mnama.toUpperCase()} (${value})</option>`)
            }
         }
      })
   }
}

const PenerimaanTypeHandler = function () {
   if ($("#form-manage-data-kmeans").length == 0) return false;
   $('#generate-kmeans').hide()
   $(document).on("change", "select", function () {
      $('#generate-kmeans').hide()
      $('#siswa-pendaftar-table').html('<h6 class="text-center">Data belum ditampilkan</h6>')
   })
   $(document).on("submit", "#form-manage-data-kmeans", function (e) {
      e.preventDefault();
      const form = $(this);
      const formData = form.serializeArray();
      const data = {};
      for (let i = 0; i < formData.length; i++) {
         data[formData[i].name] = formData[i].value;
      }
      $.ajax({
         type: "get",
         url: `${base_url}/penerimaancontroller/penerimaan_get_data/${data.angkatan}/${data.tingkatan}`,
         dataType: "json",
         success: function (response) {
            let table = "";
            if (response.siswa.length >= 5) {
               $('#generate-kmeans').show()
               table += '<small class="text-danger">2 Cluster diambil dari data 2 teratas.</small>'
            } else {
               $('#generate-kmeans').hide()
               table += "<h6>Data tidak cukup untuk melakukan kmeans</h6>"
            }
            table += `<table class="table" id="siswa-table">
                        <thead>
                           <tr>
                              <th>NAMA</th>`;
            for (let i = 0; i < response.materi.length; i++) {
               table += `<th>${response.materi[i].mnama.toUpperCase()}</th>`;
            }
            table += `</tr></thead><tbody>`;
            for (let i = 0; i < response.nilai_siswa.length; i++) {
               const nilai_siswa = response.nilai_siswa[i];
               table += `<tr><td>${nilai_siswa.nama}</td>`;
               for (let j = 0; j < response.nilai_siswa[i].nilai.length; j++) {
                  table += `<td>${response.nilai_siswa[i].nilai[j].nnilai}</td>`;
               }
               table += `</tr>`;
            }
            table += `</tbody> </table>`
            $('#siswa-pendaftar-table').html(table)
         }
      });

   })
   $(document).on("click", "#generate-kmeans", function () {
      const tingkatan = $("#select-tingkatan").val()
      const angkatan = $("#select-angkatan").val()
      Swal.fire({
         title: 'Anda yakin?',
         text: "Pastikan pendaftaran sudah ditutup untuk mengelompokkan siswa dengan KMEANS!",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Lanjutkan!'
      }).then((result) => {
         if (result.isConfirmed) {
            console.log(1)
         }
      })
   })
}
const initDatatable = () => {
   $(".table-bordered").css("width", "100%")
   const table = $(".table-bordered").DataTable(
      {
         lengthChange: false,
         ordering: false,
         scrollX: true,
      }
   );
   $(document).on("submit", "#filter-table", function (e) {
      e.preventDefault();
      const form = $(this);
      //get all values of the form
      const formData = form.serializeArray();
      //convert to array
      const data = [];
      for (let i = 0; i < formData.length; i++) {
         data.push(formData[i].value);
      }
      table.search(data.join(" ")).draw();
   })
}

$(document).ready(function () {
   PenerimaanTypeHandler();
   initDatatable()
   materiTypeHandler()
   pembelajaranTypeHandler()
   kelasTypeHandler()
   soaltesTypeHandler()
   angkatanTypeHandler()
   userTypeHandler()
   roleTypeHandler()
});