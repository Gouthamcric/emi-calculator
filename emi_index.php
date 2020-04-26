 <?php for($i=0;$i<$_REQUEST['type'];$i++){ if($i===0){echo '<div class="row" style="margin-top:-60px">
          
            <div class="col-xs-6" style="padding-left:45px"><h1 class="title" style="color:white">EMI Plan-'.($i+1).'</h1></div>
            <div class="col-xs-6" style="color:white;padding-left:445px"><p style="font-size:20px;font-weight: bolder">Date: <span id="datetime"></span></p></div><script>
var dt = new Date();
document.getElementById("datetime").innerHTML = dt.toLocaleDateString();
</script>

      </div>
    <section class="section" style="margin-top:-30px"> 
<div class="columns is-multiline">
<div class="column   is-one-fifth">
        <div class="notification is-link has-text">
          <p id="brand'.$i.'" class="title is-1"><i class="fas fa-car"></i></p>
          <p class="subtitle is-4">Brand</p>
        </div>
      </div>
   <div class="column  is-one-fifth">
        <div class="notification is-info has-text">
          <p id="model'.$i.'" class="title is-1"><i class="fas fa-car"></i></p>
          <p class="subtitle is-4">Model</p>
        </div>
      </div>
  <div class="column   is-one-fifth">
    <div class="notification is-primary has-text">
      <p id="variant'.$i.'" class="title is-1"><i class="fas fa-car"></i></p>
      <p class="subtitle is-4">Variant</p>
    </div>
  </div>
   <div class="column   is-one-fifth">
    <div class="notification is-info has-text">
      <p id="city'.$i.'" class="title is-1"><i class="fa fa-globe"></i></p>
      <p class="subtitle is-4">City</p>
    </div>
  </div>
     <div class="column is-one-fifth">
    <div class="notification is-info has-text">
        <p id="city" class="title is-1"><i class="fas fa-id-card"></i></p>
      <p class="subtitle is-4">NayaGaadi</p>
    </div>
  </div>   
 <div class="column   is-one-fifth">
        <div class="notification is-link has-text">
            <p id="bn'.$i.'" class="title is-1"><i class="fas fa-university"></i></p>
          <p class="subtitle is-4">Bank Name</p>
        </div>
      </div>
<div class="column  is-one-fifth">
    <div class="notification is-info has-text">
      <p id="principleAmount'.$i.'" class="title is-1">₹</p>
      <p class="subtitle is-4">Loan Amount</p>
    </div>
  </div>
  <div class="column  is-one-fifth">
    <div class="notification is-primary has-text">
      <p id="monthlyPayment'.$i.'" class="title is-1">₹</p>
      <p class="subtitle is-4">EMI Amount</p>
    </div>
  </div>
       <div class="column   is-one-fifth">
        <div class="notification is-link has-text">
          <p id="totalPayment'.$i.'" class="title is-1"><i class="fa fa-calendar" ></i></p>
          <p class="subtitle is-4">No. of months</p>
        </div>
      </div>

    <div class="column   is-one-fifth">
        <div class="notification is-info has-text">
          <p id="totalInterest'.$i.'" class="title is-1">%</p>
          <p class="subtitle is-4">Interest Rate</p>
        </div>
      </div>

 
     
     
</div>
        <hr>
 </section>;'; }
 else
 {echo '<div class="row" style="margin-top:-70px">
          
            <div class="col-xs-6" style="padding-left:45px"><h1 class="title" style="color:white">EMI Plan-'.($i+1).'</h1></div>
            


      </div>
    <section class="section" style="margin-top:-30px"> 
<div class="columns is-multiline">
<div class="column   is-one-fifth">
        <div class="notification is-link has-text">
          <p id="brand'.$i.'" class="title is-1"><i class="fas fa-car"></i></p>
          <p class="subtitle is-4">Brand</p>
        </div>
      </div>
   <div class="column  is-one-fifth">
        <div class="notification is-info has-text">
          <p id="model'.$i.'" class="title is-1"><i class="fas fa-car"></i></p>
          <p class="subtitle is-4">Model</p>
        </div>
      </div>
  <div class="column   is-one-fifth">
    <div class="notification is-primary has-text">
      <p id="variant'.$i.'" class="title is-1"><i class="fas fa-car"></i></p>
      <p class="subtitle is-4">Variant</p>
    </div>
  </div>
   <div class="column   is-one-fifth">
    <div class="notification is-info has-text">
      <p id="city'.$i.'" class="title is-1"><i class="fa fa-globe"></i></p>
      <p class="subtitle is-4">City</p>
    </div>
  </div>
     <div class="column is-one-fifth">
    <div class="notification is-info has-text">
        <p id="city" class="title is-1"><i class="fas fa-id-card"></i></p>
      <p class="subtitle is-4">NayaGaadi</p>
    </div>
  </div>   
 <div class="column   is-one-fifth">
        <div class="notification is-link has-text">
            <p id="bn'.$i.'" class="title is-1"><i class="fas fa-university"></i></p>
          <p class="subtitle is-4">Bank Name</p>
        </div>
      </div>
<div class="column  is-one-fifth">
    <div class="notification is-info has-text">
      <p id="principleAmount'.$i.'" class="title is-1">₹</p>
      <p class="subtitle is-4">Loan Amount</p>
    </div>
  </div>
  <div class="column  is-one-fifth">
    <div class="notification is-primary has-text">
      <p id="monthlyPayment'.$i.'" class="title is-1">₹</p>
      <p class="subtitle is-4">EMI Amount</p>
    </div>
  </div>
       <div class="column   is-one-fifth">
        <div class="notification is-link has-text">
          <p id="totalPayment'.$i.'" class="title is-1"><i class="fa fa-calendar" ></i></p>
          <p class="subtitle is-4">No. of months</p>
        </div>
      </div>

    <div class="column   is-one-fifth">
        <div class="notification is-info has-text">
          <p id="totalInterest'.$i.'" class="title is-1">%</p>
          <p class="subtitle is-4">Interest Rate</p>
        </div>
      </div>

 
     
     
</div>
        <hr>
 </section>;'; }
 } ?>

