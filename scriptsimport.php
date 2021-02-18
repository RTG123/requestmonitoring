  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>
  <!-- <script src="js/hide.js"></script> -->
  <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
  <script type="text/javascript" src="js/toastr.js"></script>
  <script type="text/javascript" src="js/jquery_toast.js"></script>
  <script type="text/javascript" src="js/toaster.js"></script>
  <!-- for datepicker -->
  <script type="text/javascript" src="js/mydatepicker.js"></script>
  

  <script>
  function accomp(){
    var data = document.getElementById("inputaccomp").value;
    if(data=="NEW"){
      $('#modaladduser').modal('show');
    }
    
  }
  function dept(){  
    var dept = document.getElementById("inputdepartment").value;
    if(dept=="NEW"){
      $('#modaladddept').modal('show');
    }
   
  }
  function select(){
    var x = document.getElementById("sel1").value;
    if(x=="QAD"){
      document.getElementById("referencenumber").innerHTML="<?php echo $_SESSION['REFQAD']?>";
      document.getElementById("inputrequestor").value="";
      document.getElementById("inputremarks").value="";
        // document.getElementById("inputsection").value=""; 
      document.getElementById("inputdepartment").value="";
      document.getElementById("inputnor").value="";
      document.getElementById("inputsysusername").value="";
      document.getElementById("inputdate10").value="";
      document.getElementById("inputdate20").value="";
      document.getElementById("inputdetails").value="";
      document.getElementById("inputdate3").value="";
      document.getElementById("inputdate4").value="";
      document.getElementById("inputaccomp").value="";
      document.getElementById("inputcandel").value="";
      document.getElementById("inputattach").value="";
      document.getElementById("inputusertype").value="";
      document.getElementById("inputdatereg").value="";
      document.getElementById("inputinfocard").value="";
      document.getElementById("inputreapp").value="";
      document.getElementById("inputdatechan").value="";
      document.getElementById("inputdatereset").value="";
      document.getElementById("inputinformation").value="";
      document.getElementById("inputimpdate").value="";

     document.getElementById("requestor").style.display="";
      // document.getElementById("section").style.display="";
     document.getElementById("department").style.display="";
     document.getElementById("nor").style.display="";
     document.getElementById("systemusername").style.display="NONE";
     document.getElementById("systemuser").style.display="NONE";
     document.getElementById("date1").style.display="";
     document.getElementById("date2").style.display="";
     document.getElementById("details").style.display="";
     document.getElementById("batch").style.display="NONE";
            

      document.getElementById("date3").style.display="";
      document.getElementById("date4").style.display="";
      document.getElementById("accomp").style.display="";
      document.getElementById("remarks").style.display="";
      document.getElementById("candel").style.display="";
      document.getElementById("attach").style.display="";

      document.getElementById("usertype").style.display="NONE";
      document.getElementById("datereg").style.display="NONE";
      document.getElementById("infocard").style.display="NONE";
      document.getElementById("reapp").style.display="NONE";
      document.getElementById("datechan").style.display="NONE";
      document.getElementById("datereset").style.display="NONE";
      document.getElementById("information").style.display="NONE";
      document.getElementById("impdate").style.display="NONE";
            
       
      document.getElementById("QAD1").style.display="";
      document.getElementById("LAS1").style.display="NONE";
      document.getElementById("NON1").style.display="NONE";
      document.getElementById("PAD1").style.display="NONE";
      document.getElementById("DEF").style.display="NONE";
      document.getElementById("MCUR").style.display="NONE";
      document.getElementById("MCRC").style.display="NONE";
      document.getElementById("MCRR").style.display="NONE";
      document.getElementById("MCPR").style.display="NONE";
    }else if(x=="LAS"){//for lasys
      document.getElementById("referencenumber").innerHTML="<?php echo $_SESSION['REFLA']?>";
      document.getElementById("inputrequestor").value="";
      document.getElementById("inputremarks").value="";
        // document.getElementById("inputsection").value=""; 
      document.getElementById("inputdepartment").value="";
      document.getElementById("inputnor").value="";
      document.getElementById("inputsysusername").value="";
      document.getElementById("inputdate10").value="";
      document.getElementById("inputdate20").value="";
      document.getElementById("inputdetails").value="";
      document.getElementById("inputdate3").value="";
      document.getElementById("inputdate4").value="";
      document.getElementById("inputaccomp").value="";
      document.getElementById("inputcandel").value="";
      document.getElementById("inputattach").value="";
      document.getElementById("inputusertype").value="";
      document.getElementById("inputdatereg").value="";
      document.getElementById("inputinfocard").value="";
      document.getElementById("inputreapp").value="";
      document.getElementById("inputdatechan").value="";
      document.getElementById("inputdatereset").value="";
      document.getElementById("inputinformation").value="";
      document.getElementById("inputimpdate").value="";

      document.getElementById("requestor").style.display="";
      //  document.getElementById("section").style.display="";
      document.getElementById("department").style.display="";
      document.getElementById("nor").style.display="";
      document.getElementById("systemusername").style.display="NONE";
      document.getElementById("systemuser").style.display="NONE";
      document.getElementById("date1").style.display="";
      document.getElementById("date2").style.display="";
      document.getElementById("details").style.display="";
      document.getElementById("batch").style.display="NONE";

      document.getElementById("date3").style.display="";
      document.getElementById("date4").style.display="";
      document.getElementById("accomp").style.display="";
      document.getElementById("remarks").style.display="";
      document.getElementById("candel").style.display="";
      document.getElementById("attach").style.display="";

      document.getElementById("usertype").style.display="NONE";
      document.getElementById("datereg").style.display="NONE";
      document.getElementById("infocard").style.display="NONE";
      document.getElementById("reapp").style.display="NONE";
      document.getElementById("datechan").style.display="NONE";
      document.getElementById("datereset").style.display="NONE";
      document.getElementById("information").style.display="NONE";
      document.getElementById("impdate").style.display="NONE";

      document.getElementById("QAD1").style.display="NONE";
      document.getElementById("LAS1").style.display="";
      document.getElementById("NON1").style.display="NONE";
      document.getElementById("PAD1").style.display="NONE";
      document.getElementById("DEF").style.display="NONE";
      document.getElementById("MCUR").style.display="NONE";
      document.getElementById("MCRC").style.display="NONE";
      document.getElementById("MCRR").style.display="NONE";
      document.getElementById("MCPR").style.display="NONE";
    }else if(x=="NON"){//for non lasys
      document.getElementById("referencenumber").innerHTML="<?php echo $_SESSION['REFNON']?>";
      document.getElementById("inputrequestor").value="";
      document.getElementById("inputremarks").value="";
        // document.getElementById("inputsection").value=""; 
      document.getElementById("inputdepartment").value="";  
      document.getElementById("inputnor").value="";   
      document.getElementById("inputsysusername").value="";
      document.getElementById("inputdate10").value="";
      document.getElementById("inputdate20").value="";
      document.getElementById("inputdetails").value="";
      document.getElementById("inputdate3").value="";
      document.getElementById("inputdate4").value="";
      document.getElementById("inputaccomp").value="";
      document.getElementById("inputcandel").value="";
      document.getElementById("inputattach").value="";
      document.getElementById("inputusertype").value="";
      document.getElementById("inputdatereg").value="";
      document.getElementById("inputinfocard").value="";
      document.getElementById("inputreapp").value="";
      document.getElementById("inputdatechan").value="";
      document.getElementById("inputdatereset").value="";
      document.getElementById("inputinformation").value="";
      document.getElementById("inputimpdate").value="";

      document.getElementById("requestor").style.display="";
      //  document.getElementById("section").style.display="";
      document.getElementById("department").style.display="";
      document.getElementById("nor").style.display="";
      document.getElementById("systemusername").style.display="NONE";
      document.getElementById("systemuser").style.display="NONE";
      document.getElementById("date1").style.display="";
      document.getElementById("date2").style.display="";
      document.getElementById("details").style.display="";
      document.getElementById("batch").style.display="NONE";

      document.getElementById("date3").style.display="";
      document.getElementById("date4").style.display="";
      document.getElementById("accomp").style.display="";
      document.getElementById("remarks").style.display="";
      document.getElementById("candel").style.display="";
      document.getElementById("attach").style.display="";

      document.getElementById("usertype").style.display="NONE";
      document.getElementById("datereg").style.display="NONE";
      document.getElementById("infocard").style.display="NONE";
      document.getElementById("reapp").style.display="NONE";
      document.getElementById("datechan").style.display="NONE";
      document.getElementById("datereset").style.display="NONE";
      document.getElementById("information").style.display="NONE";
      document.getElementById("impdate").style.display="NONE";

      document.getElementById("QAD1").style.display="NONE";
      document.getElementById("LAS1").style.display="NONE";
      document.getElementById("NON1").style.display="";
      document.getElementById("PAD1").style.display="NONE";
      document.getElementById("DEF").style.display="NONE";
      document.getElementById("MCUR").style.display="NONE";
      document.getElementById("MCRC").style.display="NONE";
      document.getElementById("MCRR").style.display="NONE";
      document.getElementById("MCPR").style.display="NONE";
              
    }else if(x=="PAD"){
      document.getElementById("referencenumber").innerHTML="<?php echo $_SESSION['REFPAD']?>";
      document.getElementById("inputrequestor").value="";
      document.getElementById("inputremarks").value="";
        // document.getElementById("inputsection").value=""; 
      document.getElementById("inputdepartment").value="";
      document.getElementById("inputnor").value="";
      document.getElementById("inputsysusername").value="";
      document.getElementById("inputdate10").value="";
      document.getElementById("inputdate20").value="";
      document.getElementById("inputdetails").value="";
      document.getElementById("inputdate3").value="";
      document.getElementById("inputdate4").value="";
      document.getElementById("inputaccomp").value="";
      document.getElementById("inputcandel").value="";
      document.getElementById("inputattach").value="";
      document.getElementById("inputusertype").value="";
      document.getElementById("inputdatereg").value="";
      document.getElementById("inputinfocard").value="";
      document.getElementById("inputreapp").value="";
      document.getElementById("inputdatechan").value="";
      document.getElementById("inputdatereset").value="";
      document.getElementById("inputinformation").value="";
      document.getElementById("inputimpdate").value="";

      document.getElementById("requestor").style.display="";
      //  document.getElementById("section").style.display="";
      document.getElementById("department").style.display="";
      document.getElementById("nor").style.display="";
      document.getElementById("systemusername").style.display="NONE";
      document.getElementById("systemuser").style.display="NONE";
      document.getElementById("date1").style.display="";
      document.getElementById("date2").style.display="";
      document.getElementById("details").style.display="";
      document.getElementById("batch").style.display="NONE";

      document.getElementById("date3").style.display="";
      document.getElementById("date4").style.display="";
      document.getElementById("accomp").style.display="";
      document.getElementById("remarks").style.display="";
      document.getElementById("candel").style.display="";
      document.getElementById("attach").style.display="";

      document.getElementById("usertype").style.display="NONE";
      document.getElementById("datereg").style.display="NONE";
      document.getElementById("infocard").style.display="NONE";
      document.getElementById("reapp").style.display="NONE";
      document.getElementById("datechan").style.display="NONE";
      document.getElementById("datereset").style.display="NONE";
      document.getElementById("information").style.display="NONE";
      document.getElementById("impdate").style.display="NONE";

      document.getElementById("QAD1").style.display="NONE";
      document.getElementById("LAS1").style.display="NONE";
      document.getElementById("NON1").style.display="NONE";
      document.getElementById("PAD1").style.display="";
      document.getElementById("DEF").style.display="NONE";
      document.getElementById("MCUR").style.display="NONE";
      document.getElementById("MCRC").style.display="NONE";
      document.getElementById("MCRR").style.display="NONE";
      document.getElementById("MCPR").style.display="NONE";

    }else if(x=="MCUR"){
      document.getElementById("referencenumber").innerHTML="<?php echo $_SESSION['REFNEW']?>";
      document.getElementById("inputrequestor").value="";
      document.getElementById("inputremarks").value="";
        // document.getElementById("inputsection").value=""; 
      document.getElementById("inputdepartment").value="";
      document.getElementById("inputnor").value="";
      document.getElementById("inputsysusername").value="";
      document.getElementById("inputsysuser").value="";
      document.getElementById("inputdate10").value="";
      document.getElementById("inputdate20").value="";
      document.getElementById("inputdetails").value="";
      document.getElementById("inputdate3").value="";
      document.getElementById("inputdate4").value="";
      document.getElementById("inputaccomp").value="";
      document.getElementById("inputcandel").value="";
      document.getElementById("inputattach").value="";
      document.getElementById("inputusertype").value="";
      document.getElementById("inputdatereg").value="";
      document.getElementById("inputinfocard").value="";
      document.getElementById("inputreapp").value="";
      document.getElementById("inputdatechan").value="";
      document.getElementById("inputdatereset").value="";
      document.getElementById("inputinformation").value="";
      document.getElementById("inputimpdate").value="";
                            

      document.getElementById("requestor").style.display="";
      //  document.getElementById("section").style.display="";
      document.getElementById("department").style.display="";
      document.getElementById("nor").style.display="NONE";
      document.getElementById("systemusername").style.display="";
      document.getElementById("systemuser").style.display="";
      document.getElementById("date1").style.display="";
      document.getElementById("date2").style.display="";
      document.getElementById("details").style.display="NONE";
      document.getElementById("batch").style.display="";

      document.getElementById("date3").style.display="NONE";
      document.getElementById("date4").style.display="NONE";
      document.getElementById("accomp").style.display="NONE";
      document.getElementById("remarks").style.display="";
      document.getElementById("candel").style.display="NONE";
      document.getElementById("attach").style.display="";

      document.getElementById("usertype").style.display="";
      document.getElementById("datereg").style.display="";
      document.getElementById("infocard").style.display="";
      document.getElementById("reapp").style.display="NONE";
      document.getElementById("datechan").style.display="NONE";
      document.getElementById("datereset").style.display="NONE";
      document.getElementById("information").style.display="NONE";
      document.getElementById("impdate").style.display="NONE";

      document.getElementById("QAD1").style.display="NONE";
      document.getElementById("LAS1").style.display="NONE";
      document.getElementById("NON1").style.display="NONE";
      document.getElementById("PAD1").style.display="NONE";
      document.getElementById("DEF").style.display="NONE";
      document.getElementById("MCUR").style.display="";
      document.getElementById("MCRC").style.display="NONE";
      document.getElementById("MCRR").style.display="NONE";
      document.getElementById("MCPR").style.display="NONE";

    }else if(x=="MCRC"){
      document.getElementById("referencenumber").innerHTML="<?php echo $_SESSION['REFREGCHA']?>";
      document.getElementById("inputrequestor").value="";
      document.getElementById("inputremarks").value="";
        // document.getElementById("inputsection").value=""; 
      document.getElementById("inputdepartment").value="";
      document.getElementById("inputnor").value="";
      document.getElementById("inputsysusername").value="";
      document.getElementById("inputdate10").value="";
      document.getElementById("inputdate20").value="";
      document.getElementById("inputdetails").value="";
      document.getElementById("inputdate3").value="";
      document.getElementById("inputdate4").value="";
      document.getElementById("inputaccomp").value="";
      document.getElementById("inputcandel").value="";
      document.getElementById("inputattach").value="";
      document.getElementById("inputusertype").value="";
      document.getElementById("inputdatereg").value="";
      document.getElementById("inputinfocard").value="";
      document.getElementById("inputreapp").value="";
      document.getElementById("inputdatechan").value="";
      document.getElementById("inputdatereset").value="";
      document.getElementById("inputinformation").value="";
      document.getElementById("inputimpdate").value="";

      document.getElementById("requestor").style.display="";
      //  document.getElementById("section").style.display="";
      document.getElementById("department").style.display="";
      document.getElementById("nor").style.display="NONE";
      document.getElementById("systemusername").style.display="";
      document.getElementById("systemuser").style.display="";
      document.getElementById("date1").style.display="";
      document.getElementById("date2").style.display="";
      document.getElementById("details").style.display="NONE";
      document.getElementById("batch").style.display="NONE";

      document.getElementById("date3").style.display="NONE";
      document.getElementById("date4").style.display="NONE";
      document.getElementById("accomp").style.display="NONE";
      document.getElementById("remarks").style.display="NONE";
      document.getElementById("candel").style.display="NONE";
      document.getElementById("attach").style.display="";

      document.getElementById("usertype").style.display="NONE";
      document.getElementById("datereg").style.display="NONE";
      document.getElementById("infocard").style.display="NONE";
      document.getElementById("reapp").style.display="";
      document.getElementById("datechan").style.display="";
      document.getElementById("datereset").style.display="NONE";
      document.getElementById("information").style.display="NONE";
      document.getElementById("impdate").style.display="NONE";

      document.getElementById("QAD1").style.display="NONE";
      document.getElementById("LAS1").style.display="NONE";
      document.getElementById("NON1").style.display="NONE";
      document.getElementById("PAD1").style.display="NONE";
      document.getElementById("DEF").style.display="NONE";
      document.getElementById("MCUR").style.display="NONE";
      document.getElementById("MCRC").style.display="";
      document.getElementById("MCRR").style.display="NONE";
      document.getElementById("MCPR").style.display="NONE";
    }else if(x=="MCRR"){
      document.getElementById("referencenumber").innerHTML="<?php echo $_SESSION['REFREQ']?>";
      document.getElementById("inputrequestor").value="";
      document.getElementById("inputremarks").value="";
        // document.getElementById("inputsection").value=""; 
      document.getElementById("inputdepartment").value="";
      document.getElementById("inputnor").value="";
      document.getElementById("inputsysusername").value="";
      document.getElementById("inputdate10").value="";
      document.getElementById("inputdate20").value="";
      document.getElementById("inputdetails").value="";
      document.getElementById("inputdate3").value="";
      document.getElementById("inputdate4").value="";
      document.getElementById("inputaccomp").value="";
      document.getElementById("inputcandel").value="";
      document.getElementById("inputattach").value="";
      document.getElementById("inputusertype").value="";
      document.getElementById("inputdatereg").value="";
      document.getElementById("inputinfocard").value="";
      document.getElementById("inputreapp").value="";
      document.getElementById("inputdatechan").value="";
      document.getElementById("inputdatereset").value="";
      document.getElementById("inputinformation").value="";
      document.getElementById("inputimpdate").value="";

      document.getElementById("requestor").style.display="NONE";
      //  document.getElementById("section").style.display="";
      document.getElementById("department").style.display="";
      document.getElementById("nor").style.display="NONE";
      document.getElementById("systemusername").style.display="NONE";
      document.getElementById("systemuser").style.display="NONE";
      document.getElementById("date1").style.display="";
      document.getElementById("date2").style.display="";
      document.getElementById("details").style.display="NONE";
      document.getElementById("batch").style.display="NONE";

      document.getElementById("date3").style.display="NONE";
      document.getElementById("date4").style.display="NONE";
      document.getElementById("accomp").style.display="NONE";
      document.getElementById("remarks").style.display="NONE";
      document.getElementById("candel").style.display="NONE";
      document.getElementById("attach").style.display="";

      document.getElementById("usertype").style.display="NONE";
      document.getElementById("datereg").style.display="NONE";
      document.getElementById("infocard").style.display="NONE";
      document.getElementById("reapp").style.display="NONE";
      document.getElementById("datechan").style.display="NONE";
      document.getElementById("datereset").style.display="NONE";
      document.getElementById("information").style.display="";
      document.getElementById("impdate").style.display="";

      document.getElementById("QAD1").style.display="NONE";
      document.getElementById("LAS1").style.display="NONE";
      document.getElementById("NON1").style.display="NONE";
      document.getElementById("PAD1").style.display="NONE";
      document.getElementById("DEF").style.display="NONE";
      document.getElementById("MCUR").style.display="NONE";
      document.getElementById("MCRC").style.display="NONE";
      document.getElementById("MCRR").style.display="";
      document.getElementById("MCPR").style.display="NONE";
    }else if(x=="MCPR"){
      document.getElementById("referencenumber").innerHTML="<?php echo $_SESSION['REFPAS']?>";
      document.getElementById("inputrequestor").value="";
      document.getElementById("inputremarks").value="";
        // document.getElementById("inputsection").value=""; 
      document.getElementById("inputdepartment").value="";
      document.getElementById("inputnor").value="";
      document.getElementById("inputsysusername").value="";
      document.getElementById("inputsysuser").value="";
      document.getElementById("inputdate10").value="";
      document.getElementById("inputdate20").value="";
      document.getElementById("inputdetails").value="";
      document.getElementById("inputdate3").value="";
      document.getElementById("inputdate4").value="";
      document.getElementById("inputaccomp").value="";
      document.getElementById("inputcandel").value="";
      document.getElementById("inputattach").value="";
      document.getElementById("inputusertype").value="";
      document.getElementById("inputdatereg").value="";
      document.getElementById("inputinfocard").value="";
      document.getElementById("inputreapp").value="";
      document.getElementById("inputdatechan").value="";
      document.getElementById("inputdatereset").value="";
      document.getElementById("inputinformation").value="";
      document.getElementById("inputimpdate").value="";

      document.getElementById("requestor").style.display="";
      //  document.getElementById("section").style.display="";
      document.getElementById("department").style.display="";
      document.getElementById("nor").style.display="NONE";
      document.getElementById("systemusername").style.display="";
      document.getElementById("systemuser").style.display="";
      document.getElementById("date1").style.display="";
      document.getElementById("date2").style.display="";
      document.getElementById("details").style.display="NONE";
      document.getElementById("batch").style.display="NONE";

      document.getElementById("date3").style.display="NONE";
      document.getElementById("date4").style.display="NONE";
      document.getElementById("accomp").style.display="NONE";
      document.getElementById("remarks").style.display="NONE";
      document.getElementById("candel").style.display="NONE";
      document.getElementById("attach").style.display="";

      document.getElementById("usertype").style.display="NONE";
      document.getElementById("datereg").style.display="NONE";
      document.getElementById("infocard").style.display="NONE";
      document.getElementById("reapp").style.display="";
      document.getElementById("datechan").style.display="none";
      document.getElementById("datereset").style.display="";
      document.getElementById("information").style.display="NONE";
      document.getElementById("impdate").style.display="NONE";

      document.getElementById("QAD1").style.display="NONE";
      document.getElementById("LAS1").style.display="NONE";
      document.getElementById("NON1").style.display="NONE";
      document.getElementById("PAD1").style.display="NONE";
      document.getElementById("DEF").style.display="NONE";
      document.getElementById("MCUR").style.display="NONE";
      document.getElementById("MCRC").style.display="NONE";
      document.getElementById("MCRR").style.display="NONE";
      document.getElementById("MCPR").style.display="";
    }else {
      document.getElementById("referencenumber").innerHTML="**-**-**-****";
      document.getElementById("inputrequestor").value="";
      document.getElementById("inputremarks").value="";
        // document.getElementById("inputsection").value=""; 
      document.getElementById("inputdepartment").value="";
      document.getElementById("inputnor").value="";
      document.getElementById("inputsysusername").value="";
      document.getElementById("inputdate10").value="";
      document.getElementById("inputdate20").value="";
      document.getElementById("inputdetails").value="";
      document.getElementById("inputdate3").value="";
      document.getElementById("inputdate4").value="";
      document.getElementById("inputaccomp").value="";
      document.getElementById("inputcandel").value="";
      document.getElementById("inputattach").value="";
      document.getElementById("inputusertype").value="";
      document.getElementById("inputdatereg").value="";
      document.getElementById("inputinfocard").value="";
      document.getElementById("inputreapp").value="";
      document.getElementById("inputdatechan").value="";
      document.getElementById("inputdatereset").value="";
      document.getElementById("inputinformation").value="";
      document.getElementById("inputimpdate").value="";

      document.getElementById("requestor").style.display="";
      //  document.getElementById("section").style.display="";
      document.getElementById("department").style.display="";
      document.getElementById("nor").style.display="";
      document.getElementById("systemusername").style.display="NONE";
      document.getElementById("systemuser").style.display="NONE";
      document.getElementById("date1").style.display="";
      document.getElementById("date2").style.display="";
      document.getElementById("details").style.display="";
      document.getElementById("batch").style.display="NONE";

      document.getElementById("date3").style.display="";
      document.getElementById("date4").style.display="";
      document.getElementById("accomp").style.display="";
      document.getElementById("remarks").style.display="";
      document.getElementById("candel").style.display="";
      document.getElementById("attach").style.display="";

      document.getElementById("usertype").style.display="NONE";
      document.getElementById("datereg").style.display="NONE";
      document.getElementById("infocard").style.display="NONE";
      document.getElementById("reapp").style.display="NONE";
      document.getElementById("datechan").style.display="NONE";
      document.getElementById("datereset").style.display="NONE";
      document.getElementById("information").style.display="NONE";
      document.getElementById("impdate").style.display="NONE";
      document.getElementById("DEF").style.display="";

      document.getElementById("QAD1").style.display="NONE";
      document.getElementById("LAS1").style.display="NONE";
      document.getElementById("NON1").style.display="NONE";
      document.getElementById("PAD1").style.display="NONE";
      document.getElementById("DEF").style.display="  ";
      document.getElementById("MCUR").style.display="NONE";
      document.getElementById("MCRC").style.display="NONE";
      document.getElementById("MCRR").style.display="NONE";
      document.getElementById("MCPR").style.display="NONE";
    }
   
  }
  </script>

  
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        today: true,
        trigger: "manual"
      }); // # datae-popover
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      }); // 

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },//
        action_nav: function() {
          return myNavFunction(this.id);
        },///
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },////
        // legend: [{
        //     type: "text",
        //     label: "Special event",
        //     badge: "00"
        //   },
        //   {
        //     type: "block",
        //     // label: "Regular event",
        //   }
        // ]
      });//
    });// 
    function err(){

      $.toast({
            heading: 'ERROR',
            text: 'Data already in the list',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'warning',
            hideAfter: 4000,
            bgColor:'#fc050d',
            stack: false
            });   
    }
    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
     // document.getElementById("wrong").style.display="";
    function success(){
      document.getElementById("stat").style.display="";
          $('.success').addClass("show");
          $('.success').addClass("alert");
          $('.success').removeClass("qwe");
          setTimeout(function(){
          $('.success').removeClass("show");
          $('.success').addClass("qwe");
          }, 4000);
          //onclick
          $('.cross').on('click',function(){
          $('.success').removeClass("show");
          $('.success').addClass("qwe");
          <?php $_SESSION['status'] = '';?>
          });
    }
    function unsuccess(){
      document.getElementById("stat1").style.display="";
        $('.unsuccess').addClass("show");
        $('.unsuccess').addClass("alert");
        $('.unsuccess').removeClass("qwe");
        setTimeout(function(){
        $('.unsuccess').removeClass("show");
        $('.unsuccess').addClass("qwe");
        }, 4000);
        //onclick
        $('.cross').on('click',function(){
        $('.unsuccess').removeClass("show");
        $('.unsuccess').addClass("qwe");
        <?php $_SESSION['status'] = '';?>
        });
    }
    function invalid(){
        document.getElementById("stat2").style.display="";
        $('.invalid').addClass("show");
        $('.invalid').addClass("alert");
        $('.invalid').removeClass("qwe");
        setTimeout(function(){
        $('.invalid').removeClass("show");
        $('.invalid').addClass("qwe");
        }, 4000);
        //onclick
        $('.cross').on('click',function(){
        $('.invalid').removeClass("show");
        $('.invalid').addClass("qwe");
        <?php $_SESSION['status'] = '';?>
        });
    }
  </script>
  <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script> -->
      <link rel="stylesheet" href="datepicker/datepicker.css"/>
      <script type="text/javascript" src="datepicker/datepicker.js"></script>
      