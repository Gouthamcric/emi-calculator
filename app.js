

document.getElementById("loan-form").addEventListener("submit", computeResults);
document.getElementById("loan-form2").addEventListener("submit",sendmail);
var i=0;
function sendmail(e){
     const id=document.getElementById("id").value;
     alert("Kindly wait");
     $(document).ready(function(){
        $.ajax({
                     url:"emi_pdf.php?data=mail",
                     method:"POST",
                     data:{dt:id},
              
                     success:function(data)
                      {
                       alert(data);
                      }
                     });
  
  });
      e.preventDefault();
}
function computeResults(e) {
   
     if(i===0)
    {alert("Kindly fill your "+(i+2)+"nd entry!");}
    else if(i===1){
        alert("Kindly fill your "+(i+2)+"rd entry!"); 
    }

    else{
   alert("Kindly fill your "+(i+2)+"th entry!");}

  const UIamount = document.getElementById("amount").value;
  const UIinterest = document.getElementById("interest").value;
  const UIyears = document.getElementById("years").value;
  const UImonths = document.getElementById("months").value;
    const UIbank = document.getElementById("bank").value;
  const UIplans=document.getElementById("plans").value;
    const UIbrand = document.getElementById("ibrand").value;
    const UImodel = document.getElementById("imodel").value;
    const UIvariant = document.getElementById("ivariant").value;
    const UIcity = document.getElementById("icity").value;
        const UIproc = document.getElementById("procFee").value;
   const UIdoc = document.getElementById("docFee").value;
   const email=document.getElementById("email").value;
const id=document.getElementById("id").value;
  

  const principal = parseFloat(UIamount);
  const CalculateInterest = parseFloat(UIinterest) / 100 / 12;
  const calculatedPayments = (parseFloat(UIyears) * 12);
if(document.getElementById('months').disabled===true){};
  

  const x = Math.pow(1 + CalculateInterest, calculatedPayments);
  const monthly = (principal * x * CalculateInterest) / (x - 1);
  const monthlyPayment = monthly.toFixed(2);

  
  

  const totalPayment = (monthly * calculatedPayments).toFixed(2);
const Difference = totalPayment-principal.toFixed(2);
  
  document.getElementById("principleAmount"+i).innerHTML = "₹" + principal;
  
  
  document.getElementById("monthlyPayment"+i).innerHTML = "₹" + monthlyPayment;

  document.getElementById("totalInterest"+i).innerHTML = UIinterest + "%";

  document.getElementById("totalPayment"+i).innerHTML = UImonths;
    document.getElementById("bn"+i).innerHTML = UIbank;
 document.getElementById("brand"+i).innerHTML = UIbrand;
  document.getElementById("model"+i).innerHTML = UImodel;
  document.getElementById("variant"+i).innerHTML = UIvariant;
  document.getElementById("city"+i).innerHTML = UIcity;

  e.preventDefault();
  i++;
   $(document).ready(function(){

     var arr=[];
    // arr[0]="heeloo";
       arr[0]=UIplans;
          arr[1]=principal;
           arr[2]=UIbank;
            arr[3]=CalculateInterest;
             
                arr[4]=UIproc;
                  arr[5]=UIdoc;
                    arr[6]=UImonths;
               
                    arr[7]=UIbrand;
                    arr[8]=UImodel;
                    arr[9]=UIvariant;
                    arr[10]=UIcity; 
                    arr[11]=monthlyPayment;
                    arr[12]=email;
                    arr[13]=id;
                    
    $.ajax({
                     url:"emi_index2.php",
                     method:"POST",
                     data:{arr:arr},
              
                     success:function(data)
                      {
                     
                      }
                     });
  
  });
 
}
