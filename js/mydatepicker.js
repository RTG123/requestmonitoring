   $(document).ready(function(){
    var fordatereq=0;
    var fordaterec=0;
      $('input[name="daterequested"]').datepicker({
        format: 'yyyy/mm/dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
        endDate:"0m",
      }).on("changeDate", function (e) {
        fordatereq=this.value;
        if(fordatereq>fordaterec){
          document.getElementById("inputdate10").value=""; 
          document.getElementById("inputdate20").value=""; 
          fordatereq=0;
          fordaterec=0; 
          $.toast({
            heading: 'ERROR',
            text: 'The date requested must be earlier than the date received',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'warning',
            hideAfter: 4000,
            bgColor:'#fc050d',
            stack: false
            });   
        }
      });
      
      $('input[name="datereceived"]').datepicker({
        format: 'yyyy/mm/dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
        endDate:"0m",
      }).on("changeDate", function (e) {
         fordaterec = this.value;
        if(fordatereq==0){
          document.getElementById("inputdate10").value=""; 
          document.getElementById("inputdate20").value=""; 
          $.toast({
            heading: 'ERROR',
            text: 'Please fill in the date requested first',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'warning',
            hideAfter: 4000,
            bgColor:'#fc050d',
            stack: false
            });
        }else if(fordatereq>fordaterec){     
          document.getElementById("inputdate20").value="";  
          $.toast({
            heading: 'ERROR',
            text: 'The date requested must be earlier than the date received',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'warning',
            hideAfter: 4000,
            bgColor:'#fc050d',
            stack: false
            });   
          }
        });
    })
 
    $(document).ready(function(){
      var date_input=$('input[name="datereg"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      date_input.datepicker({
        format: 'yyyy/mm/dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
        endDate:"0m",
      })
    })

    $(document).ready(function(){
      var date_input=$('input[name="infocard"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      date_input.datepicker({
        format: 'yyyy/mm/dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
        endDate:"0m",
      })
    })

    $(document).ready(function(){
      var minDate = new Date();
      var datestor=0;
      var datestor1 = 0;
      $('#inputdate3').datepicker({
        format: 'yyyy/mm/dd',
        showAnim:'drop',
        numberOfMonth: 1,
        todayHighlight: true,
        minDate: minDate,
        autoclose: true,
        endDate:"0d",
        // endDate:"0m",
      }).on("changeDate", function (e) {
        datestor=this.value;
        if(datestor>datestor1){
          document.getElementById("inputdate3").value=""; 
          document.getElementById("inputdate4").value="";
         datestor=0; 
         datestor1=0; 
          $.toast({
            heading: 'ERROR',
            text: 'The date approved must be earlier than the date done',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'warning',
            hideAfter: 4000,
            bgColor:'#fc050d',
            stack: false
            });   
        }
        
      });

      $('#inputdate4').datepicker({
        format: 'yyyy/mm/dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
        endDate:"0d",
        minDate: $('#inputdate3'),
        // startDate: '-2d'
      }).on("changeDate", function (e) {
         datestor1 = this.value;
        if(datestor==0){
          document.getElementById("inputdate3").value=""; 
          document.getElementById("inputdate4").value=""; 
          $.toast({
            heading: 'ERROR',
            text: 'Please fill in the date approved first',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'warning',
            hideAfter: 4000,
            bgColor:'#fc050d',
            stack: false
            });
        }else if(datestor>datestor1){
            document.getElementById("inputdate4").value="";
            $.toast({
            heading: 'ERROR',
            text: 'The date approved must be earlier than the date done',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'warning',
            hideAfter: 4000,
            bgColor:'#fc050d',
            stack: false
            });
            
          }//if
          
        });
    })
 

// different script
