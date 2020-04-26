<?php 
   function load_bankName()
      {
        $opt='';
        $con= mysqli_connect("localhost", "root", "", "emi")or die(mysqli_errno($con));
        $querry="select * from bank";
        $res= mysqli_query($con, $querry)or die(mysqli_errno($con));
        $count= mysqli_num_rows($res);
        $i=0;
        while($i!=$count)
          {
            $out= mysqli_fetch_array($res)or die(mysqli_errno($con));
            $opt .='<option value="'.$out["bankName"].'">'.$out["bankName"].'</option>';
            $i++;
          }
        return $opt;
      }
   ?>
<html>
   <head>
      <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
      <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      <script src="bootstrap/js/jquery.js" type="text/javascript"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" rel="stylesheet"></script>
      <link rel="stylesheet"  href="style_emi.css" type="text/css">
      
      <link rel="stylesheet" href="style2.css">
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>EMI Calculator|NayaGaadi</title>
      <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
      <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      <script src="bootstrap/js/jquery.js" type="text/javascript"></script>
      <link
         rel="stylesheet"
         href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css"
         />
      <link rel="stylesheet" href="css/normalize.css">
      <link rel="stylesheet" href="css/demo.css">
      <link rel="stylesheet" href="style_emi_css.css">
      <script
         defer
         src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"
         ></script>
      <style>
      </style>
      <script type="text/javascript">
     
    $(document).ready(function(){
     var   id=Date.now();
        document.getElementById("id").value=id;

        
        // Section D
$('#downlink').each(function (index, value){
           
               var url='emi_pdf.php?data=down&id='+id;
$(this).attr('href',url);
});
// Section D ends.


//Section B
             $("select.bank").change(function(){
                 var bname = $(this).children("option:selected").val();
                 var Int=0;
                   $.ajax({
                     url:"emi_index3.php",
                     method:"POST",
                     data:{bname:bname},
                     dataType:"text",
                     success:function(data)
                      {
                         var str=data.split("/");
                         var data1=str[0];
                         var data2=str[1];
                         var data3=str[2];
           document.getElementById('interest').value=data1;
           document.getElementById('procfees').value=data2;
           document.getElementById('docfees').value=data3;
                      }
                     });
               });
                     // Section B ends.
                     
         //Section c
               $("select.years").change(function(){
                 var year = $(this).children("option:selected").val()*12;
               document.getElementById('months').value=year;
               document.getElementById('months').disabled=true;
             });
                  $("select.months").change(function(){
                 var year = $(this).children("option:selected").val()/12;
                  
               document.getElementById('years').value=year;
               document.getElementById('years').disabled=true;
             });
             // Section c ends.
             
             // Section A
             
                     $('#plans').change(function(){
                     var type=$(this).val();
                     $.ajax({
                     url:"emi_index.php",
                     method:"POST",
                     data:{type:type},
                     dataType:"text",
                     success:function(data)
                      {
                        $('#mydiv').html(data);
                      }
                     });
             // Section A ends.  
                document.getElementById('amount').disabled=false;
                document.getElementById('bank').disabled=false;
                document.getElementById('years').disabled=false;
                document.getElementById('mon').disabled=false;
                document.getElementById('brand').disabled=false;
                document.getElementById('model').disabled=false;
                document.getElementById('variant').disabled=false;
                document.getElementById('city').disabled=false;
                    });
               
         });
         
      </script>
   </head>
   <body style="align-content: center">
       <div id="widget" style="float:left">
  <div id="zeit"></div>
  <div id="datum"></div>
</div>
       <!-- Sectin 1.1 -->
       <script>window.setInterval('datetime()', 1000);

function datetime() {
  var zeit   = new Date ();
  var stunde = (zeit.getHours() < 10 ? '0' + zeit.getHours() : zeit.getHours());
  var minute = (zeit.getMinutes() < 10 ? '0' + zeit.getMinutes() : zeit.getMinutes());
  var sekunde = (zeit.getSeconds() < 10 ? '0' + zeit.getSeconds() : zeit.getSeconds());
  document.getElementById('zeit').innerHTML  =
    stunde + ':' + minute + ':' + sekunde;
  document.getElementById('datum').innerHTML =
    zeit.getDate() + '.' + (zeit.getMonth() + 1) + '.' + zeit.getFullYear();
}

datetime();</script>
       <!-- Section 1.1 ends. -->
     <!-- Section 1.2 -->  
     <p style="color:white;font-family:sans-serif;font-size:18px; padding-left:925px">
               Select your prefered language :- 
               </p>
       <div id="google_translate_element" style="float:right; margin-top:-25px"></div>
          
       <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'es,en,ml,	mr,hi,pa,ta,te,	ur', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script><section class="section" >
         <!-- Section 1.2 ends. -->
    <div class="container" style="margin-top:30px;">
            <div class="content" style="padding-left:140px;margin-top:-50px">
               <h1 style="color:white; padding-left:100px" >India's First Personalised <u>NayaGaadi EMI Planner</u></h1>
               <p style="color:white;font-family:sans-serif;padding-left:-100px;font-size:18px">
                   The Personalised EMI Planner is a web service that helps you calculate the EMI that you will be required to pay for your dream vehicle.It can be replaced with existing manual process where one needs to remember all the data and do calculations on his own.Instead of this you can choose our service where a user needs only internet as minimum requirement and its platform independent. ​
                  There are features to view all emi plans at once,download EMI plans as a pdf, and receive EMI plans through email.
               </p>
            </div>
        
            <div class="columns" style="padding-left:285px">
               <div class="column is-three-quarters">
                  <div class="card" style="width:600px">
                      <div class="card-header has-text-centered"><p class="card-header-title" style="padding-left:215px;" >Personalised EMI Planner</p></div>
                     <div class="card-content">
                        <!-- Section 1.2 -->
                         <div class="level">
                        
                           <div class="level-left is-marginless ">
                              <div class="level-item">
                                 <p class="number">1</p>
                                 Number of plans
                              </div>
                           </div>
                           <form name="submit" method="post">
                              <!-- Right side -->
                              <div class="level-right" >
                                 <div class="level-item">
                                    <div class="field">
                                       <div class="control">
                                          <div class="columns" >
                                             <div class="column" style="margin-left: 100px;">
                                                <p>No. of plans </p>
                                                <div class="select " style="width:220px">
                                                   <select id="plans" name="plans" class="plans is-medium" style="width:220px" >
                                                      <option disabled selected>No. of plans</option>
                                                      <option value="1">1</option>
                                                      <option value="2">2</option>
                                                      <option value="3">3</option>
                                                      <option value="4">4</option>
                                                      <option value="5">5</option>
                                                      <option value="6">6</option>
                                                      <option value="7">7</option>
                                                      <option value="8">8</option>
                                                   </select>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </form>
                        </div>
                        <!-- Section 1.4 -->
                         <form id="loan-form" >
                           <div class="level">
                              <!-- Left side -->
                              <div class="level-left is-marginless">
                                 <div class="level-item">
                                    <p class="number">2</p>
                                    Loan Amount(Down Payment)
                                 </div>
                              </div>
                              <!-- Right side -->
                              <div class="level-right">
                                 <div class="level-item">
                                    <div class="field">
                                       <div class="control has-icons-left ">
                                          <input class="input" id="amount" type="number" />
                                          <span class="icon is-small is-left" style="color: red">
                                          <i class="fas fa-rupee-sign"></i>
                                          </span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                             <!-- Section 1.4A -->
                           <div class="level">
                              <!-- Left side -->
                              <div class="level-left is-marginless">
                                 <div class="level-item">
                                    <p class="number">3</p>
                                    Bank Name
                                 </div>
                              </div>
                              <!-- Right side -->
                              <div class="level-right">
                                 <div class="level-item">
                                    <div class="field">
                                       <div class="control has-icons-left">
                                          <div class="select">
                                             <select id="bank" class="bank">
                                                <option disabled selected>Select Prefered Bank</option>
                                                <?php echo load_bankName();?>
                                             </select>
                                          </div>
                                          <span class="icon is-small is-left" style="color: red">
                                          <i class="fas fa-university"></i>
                                          </span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                             <!-- Section 1.4A ends. -->
                           <div class="level">
                              <!-- Left side -->
                              <div class="level-left is-marginless">
                                 <div class="level-item">
                                    <p class="number">4</p>
                                    Interest Rate
                                 </div>
                              </div>
                              <!-- Right side -->
                              <div class="level-right">
                                 <div class="level-item">
                                    <div class="field">
                                       <div class="control has-icons-right">
                                          <input  type="text"  class="input" id="interest" disabled/>
                                          <span class="icon is-small is-right" style="color: red">
                                          <i class="fa fa-percentage"></i>
                                          </span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="level">
                              <!-- Left side -->
                              <div class="level-left is-marginless">
                                 <div class="level-item">
                                    <p class="number">5</p>
                                    Processing Fees
                                 </div>
                              </div>
                              <!-- Right side -->
                              <div class="level-right">
                                 <div class="level-item">
                                    <div class="field">
                                       <div class="control has-icons-left">
                                          <input  type="text"  class="input" id="procfees" name="procfees" disabled value="0000"/>
                                          <span class="icon is-small is-left" style="color: red">
                                          <i class="fas fa-rupee-sign"></i>
                                          </span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="level">
                              <!-- Left side -->
                              <div class="level-left is-marginless">
                                 <div class="level-item">
                                    <p class="number">6</p>
                                    Documentation Fees
                                 </div>
                              </div>
                              <!-- Right side -->
                              <div class="level-right">
                                 <div class="level-item">
                                    <div class="field">
                                       <div class="control has-icons-left">
                                          <input id="docfees" name="docfees"  type="text"  class="input" id="docFee" disabled value="0000"/>
                                          <span class="icon is-small is-left" style="color: red">
                                          <i class="fas fa-rupee-sign"></i>
                                          </span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                             <!-- Section 1.4B -->
                           <div class="level">
                              <!-- Left side -->
                              <div class="level-left is-marginless">
                                 <div class="level-item">
                                    <p class="number">7</p>
                                    Duration
                                 </div>
                              </div>
                              <!-- Right side -->
                              <div class="level-right">
                             
                                  <div class="level-left">
                                    
                                 <div class="select" style="width:115px">
                                   
                                    <select id="years" class="years" style="width:115px">
                                       <option disabled selected>Years</option>
                                       <option value="1">1</option>
                                       <option value="2">2</option>
                                       <option value="3">3</option>
                                       <option value="4">4</option>
                                       <option value="5">5</option>
                                       <option value="6">6</option>
                                       <option value="7">7</option>
                                       <option value="8">8</option>
                                       <option value="9">9</option>
                                       <option value="10">10</option>
                                    </select>
                                 </div>
                                     </div>
                                 <div class="level-right">
                                    
                                    <div class="select ">
                                       <select id="months" class="months">
                                          <option disabled selected id="mon" class="mon">Months</option>
                                          <option value="12">12</option>
                                          <option value="24">24</option>
                                          <option value="36">36</option>
                                          <option value="48">48</option>
                                          <option value="60">60</option>
                                          <option value="72">72</option>
                                          <option value="84">84</option>
                                          <option value="96">96</option>
                                          <option value="108">108</option>
                                          <option value="120">120</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="level-item">
                                    <div class="field">
                                    </div>
                                 </div>
                              </div>
                           </div>
                             <!-- Section 1.4B ends. -->
                           <div class="level">
                              <!-- Left side -->
                              <div class="level-left is-marginless">
                                 <div class="level-item">
                                    <p class="number">8</p>
                                    Brand
                                 </div>
                              </div>
                              <!-- Right side -->
                              <div class="level-right">
                                 <div class="level-item">
                                    <div class="field">
                                       <div class="control has-icons-left">
                                          <input class="input" id="ibrand" type="text" />
                                          <span class="icon is-small is-left" style="color: red">
                                          <i class="fas fa-car"></i>
                                          </span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="level">
                              <!-- Left side -->
                              <div class="level-left is-marginless">
                                 <div class="level-item">
                                    <p class="number">9</p>
                                    Model
                                 </div>
                              </div>
                              <!-- Right side -->
                              <div class="level-right">
                                 <div class="level-item">
                                    <div class="field">
                                       <div class="control has-icons-left">
                                          <input class="input" id="imodel" type="text" />
                                          <span class="icon is-small is-left" style="color: red">
                                          <i class="fas fa-car"></i>
                                          </span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="level">
                              <!-- Left side -->
                              <div class="level-left is-marginless">
                                 <div class="level-item">
                                    <p class="number">10</p>
                                    Variant
                                 </div>
                              </div>
                              <!-- Right side -->
                              <div class="level-right">
                                 <div class="level-item">
                                    <div class="field">
                                       <div class="control has-icons-left">
                                          <input class="input" id="ivariant" type="text" />
                                          <span class="icon is-small is-left" style="color: red">
                                          <i class="fas fa-car"></i>
                                          </span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="level">
                              <!-- Left side -->
                              <div class="level-left is-marginless">
                                 <div class="level-item">
                                    <p class="number">11</p>
                                    City
                                 </div>
                              </div>
                              <!-- Right side -->
                              <div class="level-right">
                                 <div class="level-item">
                                    <div class="field">
                                       <div class="control has-icons-left">
                                          <input class="input" id="icity" type="text" />
                                          <span class="icon is-small is-left" style="color: red">
                                          <i class="fa fa-globe"></i>
                                          </span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                            <div class="level">
                              <!-- Left side -->
                              <div class="level-left is-marginless">
                                 <div class="level-item">
                                    <p class="number">12</p>
                                    Email
                                 </div>
                              </div>
                              <!-- Right side -->
                              <div class="level-right">
                                 <div class="level-item">
                                    <div class="field">
                                       <div class="control has-icons-left">
                                          <input class="input" id="email" type="text" />
                                          <span class="icon is-small is-left" style="color: red">
                                          <i class="fa fa-globe"></i>
                                          </span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                                <div class="level">
                              <!-- Left side -->
                              <div class="level-left is-marginless">
                                 <div class="level-item">
                                    <p class="number">13</p>
                                    Unique ID
                                 </div>
                              </div>
                              <!-- Right side -->
                              <div class="level-right">
                                 <div class="level-item">
                                    <div class="field">
                                       <div class="control has-icons-left">
                                           <input class="input" id="id" type="text" disabled/>
                                          <span class="icon is-small is-left" style="color: red">
                                         <i class="fal fa-exclamation"></i>
                                          </span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                              <div class="level">
                              <!-- Left side -->
                              <div class="level-right is-marginless">
                                 <div class="level-item">
                                    <p class="number">14</p>
                                    <Input type="checkbox" class="checkbox is-medium">
                                    I Accept terms and conditions
                                 </div>
                              </div>
                              <!-- Right side -->
                              
                           </div>
                           <div class="control">
                              <button name="submit"  
                                 class="button is-large is-fullwidth is-primary is-outlined"
                                 >
                              Advise Me
                              </button>
                       
                           </div>
                        </form>
                     <!-- Section 1.4 ends. -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
         </div>
      </section>
      <!-- RESULTS -->
   <!-- Section 1.5 -->
   <div id="mydiv">
   </div>
      <!-- Section 1.5 ends. -->
      
      <!-- Secion 1.6 --> 
      <div class="row">
          <div class="col-xs-4 col-xs-offset-4">
          <form id="loan-form2" style="margin-top: -30px;margin-left:-110px;"><button name="mail" class="button is-large is-success" style="padding-left:100px;padding-right:100px"><i class="fas fa-paper-plane"></i> Mail me</button> </form>
          </div>
          <!-- Section 1.6 ends. -->
          <!-- Setion 1.7 -->
          <div class=" col-xs-4">
            
      
     <div class="download-button-container" >
    <!-- The real button -->
    <a class="download-button" id="downlink">
        <span class="button-text-real hidden">Download</span>
        <!-- Extra elements to perform the animations -->
        <span class="button-icon">
            <span class="button-linear-progress">
                <span class="button-linear-progress-bar"></span>
            </span>
            <svg class="button-icon-svg" viewBox="0 0 60 60">
                <path class="button-icon-path button-icon-path-square" d="M 20 40 l 0 -20 l 20 0 l 0 20 Z"></path>
                <path class="button-icon-path button-icon-path-line" d="M 40 20 l -20 20"></path>
            </svg>
        </span>
    </a>
    <!-- Extra elements to perform the animations -->
    <svg class="border-svg" width="240px" height="100px" viewBox="0 0 240 100">
        <path class="border-path hidden" d="M 40 3.5 a 36.5 36.5 0 0 0 -36.5 36.5 a 36.5 36.5 0 0 0 36.5 36.5 C 70 76.5 90 76.5 120 76.5 S 170 76.5 200 76.5 a 36.5 36.5 0 0 0 36.5 -36.5 a 36.5 36.5 0 0 0 -36.5 -36.5 Z"></path>
    </svg>
    <span class="button-text button-text-download">Download</span>
    <span class="button-text button-text-done">done!</span>
  
    <div class="button-progress-container">
        <svg class="button-svg">
            <path class="button-circular-progress" d="M 50 50 m 0 -32.5 a 32.5 32.5 0 0 1 0 65 a 32.5 32.5 0 0 1 0 -65"></path>
        </svg>
        <span class="button-ball"></span>
    </div>
</div>
 
          </div>
          <!-- Section 1.7 ends. -->
      </div>
<script src='js/anime.min.js'></script>
<script src='js/segment.min.js'></script>
<script src='js/demo.js'></script>
      
                             
                              
                        
     
      <h1 class="h">FAQ Section</h1>
      <div class="contain">
         <!-- Accordion Starts-->
         <div class="acc">
            <h3>Question 1: What is Personalised EMI Planner?</h3>
            <div class="content1">
               <div class="content-inner1">
                  <p>The Personalised EMI Planner is a web service that helps you calculate the EMI that you will be required to pay for your dream vehicle.</p>
               </div>
            </div>
         </div>
         <!-- Accordian -->
         <div class="acc">
            <h3>Question 2: Why are the advantages of it?</h3>
            <div class="content1">
               <div class="content-inner1">
                  <p>It can be replaced with existing manual process where one needs to remember all the data and do calculations on his own.Instead of this you can choose our service where a user needs only internet as minimum requirement and its platform independent.</p>
               </div>
            </div>
         </div>
         <!-- Accordian -->
         <div class="acc">
            <h3>Question 3: How to use it?</h3>
            <div class="content1">
               <div class="content-inner1">
                  <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                  <p>
                     The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
                  </p>
               </div>
            </div>
         </div>
         <!-- Accordian -->
         <div class="acc">
            <h3>Question 4: Where can I get some?</h3>
            <div class="content1">
               <div class="content-inner1">
                  <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
               </div>
            </div>
         </div>
      </div>
      <div class="footer">
            <div class="container">     
                <div class="row">                       
                    <div class="col-lg-4 col-sm-4 col-xs-12">
                        <div class="single_footer">
                            <h4>Services</h4>
                            <ul>
                                <li><a href="#">Service-1</a></li>
                                <li><a href="#">Service-2</a></li>
                              
                            </ul>
                        </div>
                    </div><!--- END COL --> 
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="single_footer single_footer_address">
                            <h4>Page Link</h4>
                            <ul>
                                <li><a href="#">Link-1</a></li>
                                <li><a href="#">Link-2</a></li>
                               
                            </ul>
                        </div>
                    </div><!--- END COL -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="single_footer single_footer_address">
                            <h4>Share</h4>
                           
                       
                        <div class="social_profile">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>                          
                    </div><!--- END COL -->         
                </div><!--- END ROW --> 
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <p class="copyright">Copyright © 2019 <a href="#">NayaGaadi</a>.</p>
                    </div><!--- END COL -->                 
                </div><!--- END ROW -->                 
            </div><!--- END CONTAINER -->
        </div>
      </div>
      <script src="app.js"></script>
      <script src="app2.js"></script> 
   </body>
</html>