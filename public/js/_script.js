
        // loader of every page
        $(window).on('load', function(){
            $(".loader").hide();
        });


        $.fn.capitalize = function() {
            $.each(this, function() {
                this.value = this.value.replace(/\b[a-z]/gi, function($0) {
                    return $0.toUpperCase();
                });
            });
        }

        //usage
        $('#last_name,#first_name,#middle_name').keyup(function() {
            $(this).capitalize();
        }).capitalize();  


      $(document).ready(function(){

            //dropdown select
            $('.js-example-basic-single').select2();

            // to remove dropdown suggested comment in form input
            $('input').attr('autocomplete','off');
            
            // to prevent clicking outside of the modal
            $('.modal').modal({
                show: false,
                backdrop: 'static'
            })


            // Bootstrap toggle icon 
            $('.dropdown-toggle').dropdown();

             // datatables
             var dataSrc = [];
             var table = $('#example').DataTable({
                "scrollY"        : "500px",
                "scrollCollapse" : true,
                "responsive": true,
                'processing': true,
                'language': {
                    'processing': "<img src='/Gear-1s-95px.gif' />"
                },
                // this will show the table after it hide
                "fnPreDrawCallback":function(){
                    $("#example2").show();
                },
                "initComplete": function(){
                   var api = this.api();
                   // Populate a dataset for autocomplete functionality
                   // using data from first, second and third columns
                   api.cells('tr', [1, 2]).every(function(){
                      // Get cell data as plain text
                      var data = $('<div>').html(this.data()).text();           
                      if(dataSrc.indexOf(data) === -1){ dataSrc.push(data); }
                   });
                   // Sort dataset alphabetically
                   dataSrc.sort();
                   // Initialize Typeahead plug-in
                   $('.dataTables_filter input[type="search"]', api.table().container())
                      .typeahead({
                         source: dataSrc,
                         afterSelect: function(value){
                            api.search(value).draw();
                         }
                      }
                   );
                }
             }); 
             // datatables



            $('[data-toggle="tooltip"]').tooltip();

            $('form').each(function() {
              $.validator.setDefaults({
                  ignore: []
              });
            $(this).validate({
                      rules: {
                        last_name: {
                          required: true,
                          maxlength: 20
                        },
                        first_name: {
                          required: true,
                          maxlength: 20 
                        },
                        email: {
                          // required: true,
                          pattern : /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/,
                          // remote:{
                          //       url  :"/checkEmail",
                          //       type :"GET",
                          //  }
                        },
                        secondary_email: {
                          pattern : /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/
                        },
                        // birthdate: {
                        //   required: true
                        // },
                        mobile_number : {
                          required: true,
                        },
                        status: {
                          required: true
                        },
                        sitDesignation: {
                          required: true
                        },
                        site: {
                          required: true
                        },
                        province_code: {
                          required: true
                        },
                        muncity_code: {
                          required: true
                        },
                        brgy_code: {
                          required: true
                        },
                        hfhudcode: {
                          required: true
                        },
                        username: {
                          required: true,
                          minlength: 4,
                          maxlength: 10,
                          // remote:{
                          //       url  :"/checkUser",
                          //       type :"GET",
                          //  }
                        },
                        password: {
                          required: true,
                          minlength: 4,
                          maxlength: 10
                        },
                        comfirm_password: {
                          required: true,
                          equalTo: "#password"
                        },
                        image: {
                          extension: "jpg|jpeg|png|JPG|JPEG|PNG"
                        },
                        primary_contact: {
                          number: true,
                          minlength: 4,
                          maxlength: 12
                        },
                        facility_id: {
                          required: true
                        }
                      },
                      messages:{
                          username:{
                              remote: function() { return $.validator.format("{0} is already exits.", $("#username").val()) }
                          },
                          email:{
                              remote: function() { return $.validator.format("{0} is already exits.", $("#email").val()) }
                          }
                      },
                      highlight: function(element) {
                          $(element).closest('.form-control').addClass('is-invalid');
                      },
                      unhighlight: function(element) {
                          $(element).closest('.form-control').removeClass('is-invalid');
                          $(element).closest('.form-control').addClass('is-valid');
                      },
                      errorElement: 'div',
                      errorClass: 'invalid-feedback',
                      errorPlacement: function(error, element) {
                          if(element.parent('.invalid-feedback').length) {
                              error.insertAfter(element.parent());
                          } else {
                              error.insertAfter(element);
                          }
                      }
              });
            });

            // jquery-mask
            $('input[name="mobile_number"]').mask('0000-0000-000',{
              placeholder: "0917-XXXX-XXX",
              clearIfNotMatch: true
            });

            $('input[name="secondary_contact"]').mask('0000-0000-000',{
              placeholder: "0917-XXXX-XXX",
              clearIfNotMatch: true
            });
            $('input[name="philhealth"]').mask('00-000000000-0',{
              placeholder: "XX-XXXXXXXXX-X",
              clearIfNotMatch: true
            });
              $('input[name="tin"]').mask('000-000-000',{
              placeholder: "XXX-XXX-XXX",
              clearIfNotMatch: true
            });
              $('input[name="sss"]').mask('00-0000000-0',{
              placeholder: "XX-XXXXXXX-X",
              clearIfNotMatch: true
            });
              $('input[name="pagibigmidno"]').mask('0000-0000-0000',{
              placeholder: "XXXX-XXXX-XXXX",
              clearIfNotMatch: true
            });
              $('input[name="pagibigrtn"]').mask('000000000000',{
              placeholder: "XXXXXXXXXXXX",
              clearIfNotMatch: true
            });
              $('input[name="mabuhaymilespal"]').mask('000000000',{
              placeholder: "XXXXXXXXX",
              clearIfNotMatch: true
            });
              $('input[name="getgocebupac"]').mask('0000000000',{
              placeholder: "XXXXXXXXXX",
              clearIfNotMatch: true
            });

       });