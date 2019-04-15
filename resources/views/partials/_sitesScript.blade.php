  <script>

        $('#facility_id')
            .select2()
            .on('select2:open', () => {
                $(".select2-results:not(:has(a))").append('<a href="{{ route('facility.create') }}" style="padding: 6px;height: 20px;display: inline-table;">CREATE NEW FACILITY</a>');
        })

      $('#region_code').on('change',function(){
      // Get the region code select id value
      var regionID = $(this).val();    
      if(regionID){
          $.ajax({
             type:"GET",
             // route
             url:"{{url('facility/get-province-list')}}?region_id="+regionID,
             success:function(res){           
              if(res){
                  $("#province_code").empty();
                  $("#province_code").append("<option disabled selected>Choose your Province</option>");
                  $.each(res,function(key,value){
                      $('#province_code').html();
                      $("#province_code").append('<option value="'+key+'">'+value+'</option>');
                  });
             
              }else{
                 $("#province_code").empty();
              }
             }
          });
      }
      else{
          $("#province_code").empty();
          $("#muncity_code").empty();
      }   

     });

          $('#province_code').on('change',function(){
            var provinceID = $(this).val();    
            if(provinceID){
                $.ajax({
                   type:"GET",
                   url:"{{url('facility/get-muncity-list')}}?province_id="+provinceID,
                   success:function(res){              
                    if(res){
                        $("#muncity_code").empty();
                        $("#muncity_code").append('<option disabled selected>Choose your Municipality</option>');
                        $.each(res,function(key,value){
                            $('#muncity_code').html();
                            $("#muncity_code").append('<option value="'+key+'">'+value+'</option>');
                        });
                   
                    }else{
                       $("#muncity_code").empty();
                    }
                   }
                });
            }
            else{
                $("#muncity_code").empty();
            }     
           });

      $('#muncity_code').on('change',function(){
      var muncityID = $(this).val();
      console.log(muncityID);    
      if(muncityID){
          $.ajax({
             type:"GET",
             url:"{{url('facility/get-hfhudcode-list')}}?muncity_id="+muncityID,
             success:function(res){        
             console.log(res);    
              if(res){
                  $("#hfhudcode").empty();
                  $("#hfhudcode").append('<option disabled selected>Choose your Barangay</option>');
                  $.each(res,function(key,value){
                      $('#hfhudcode').html();
                      $("#hfhudcode").append('<option value="'+key+'">'+value+'</option>');
                  });
             
              }else{
                 $("#hfhudcode").empty();
              }
             }
          });
      }
      // else{
      //     $("#brgy_code").empty();
      // }     
     });

  </script>