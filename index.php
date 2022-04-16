<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="assets/css/blackvatican.css">
      <link rel="icon" href="assets/img/blackvatican.png" type="image/png">
      <audio id="bvsfx" src="assets/sfx/click.mp3"></audio>
      <title>Black Vatican</title>
   </head>
   <body>
      <div class="p-4">
         <div class="row">
            <div class="col-3">
               <div class="card h-100">
                  <div class="card-header">Card Generator</div>
                  <div class="card-body" id="generator">
                     <div class="p-1">
                        <textarea id="bin" class="form-control" rows="1" placeholder="Bin"></textarea>
                     </div>
                     <div class="row">
                        <div class="col bvleft">
                           <div class="p-1">
                              <select id="month" class="form-control">
                                 <option value="" disabled="disabled" selected="true" >Month</option>
                                 <option value="01">01</option>
                                 <option value="02">02</option>
                                 <option value="03">03</option>
                                 <option value="04">04</option>
                                 <option value="05">05</option>
                                 <option value="06">06</option>
                                 <option value="07">07</option>
                                 <option value="08">08</option>
                                 <option value="09">09</option>
                                 <option value="10">10</option>
                                 <option value="11">11</option>
                                 <option value="12">12</option>
                              </select>
                           </div>
                        </div>
                        <div class="col bvright">
                           <div class="p-1">
                              <select id="year" class="form-control">
                                 <option value="" disabled="disabled" selected="true" >Year</option>
                                 <option value="2021">2021</option>
                                 <option value="2022">2022</option>
                                 <option value="2023">2023</option>
                                 <option value="2024">2024</option>
                                 <option value="2025">2025</option>
                                 <option value="2026">2026</option>
                                 <option value="2027">2027</option>
                                 <option value="2028">2028</option>
                                 <option value="2029">2029</option>
                                 <option value="2030">2030</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="p-1">
                        <textarea id="cvv" class="form-control" rows="1" placeholder="xxx"></textarea>
                     </div>
                     <div class="p-1">
                        <textarea id="amount" class="form-control" rows="1" placeholder="Amount"></textarea> 
                     </div>
                     <div class="p-1">
                        <button class="btn btn-outline-light btn-block" id="generate">Generate</button>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col">
               <div class="card h-100">
                  <div class="card-header">Credit Cards</div>
                  <div class="card-body h-100">
                     <div class="px-3">
                        <textarea class="form-control" id="cards" rows="5"></textarea>
                        <div class="pt-2">
                           <select id="gates" class="form-control">
                              <?php foreach ($apiname as $key => $apiname) {
                                echo '<option value="'.$fname[$key].'">'.$apiname.'</option>';}?>
                           </select>
                        </div>
                        <div class="pt-2">
                           <button class="btn btn-outline-light btn-block" id="check">Check</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-3">
               <div class="card h-100">
                  <div class="card-header text-center">Black Vatican</div>
                  <div class="card-body">
                     <img src="assets/img/blackvatican.png">
                  </div>
                  <div class="card-footer">
                     <center>
                        <div class="px-1">
                           <div class="row" id="counter">
                              <div class="col">                  
                                 CVV : <span id="cvvc">0</span>
                              </div>
                              <div class="col">   
                                 CCN : <span id="ccnc">0</span>
                              </div>
                              <div class="col">
                                 DEAD : <span id="deadc">0</span>
                              </div>
                           </div>
                        </div>
                     </center>
                  </div>
               </div>
            </div>
         </div>
         <div class="pt-4">
            <div class="card">
               <div class="card-header" style="text-align: left">
                  CVV

                  <button class="btn btn-outline-light btn-sm" id="cvvbtn"> Show/Hide
                  </button>
                  <button class="btn btn-outline-light btn-sm" id="cvvcbtn"> Clear
                  </button>
               </div>
               <div class="card-body" id="cvvdiv"></div>
            </div>
         </div>
         <div class="pt-2">
            <div class="card">
               <div class="card-header" style="text-align: left">
                  CCN
                  
                  <button class="btn btn-outline-light btn-sm" id="ccnbtn"> Show/Hide
                  </button>
                  <button class="btn btn-outline-light btn-sm" id="ccncbtn"> Clear
                  </button>
               </div>
               <div class="card-body" id="ccndiv">
               </div>
            </div>
         </div>
         <div class="pt-2">
            <div class="card">
               <div class="card-header" style="text-align: left">
                  DEAD
                  <button class="btn btn-outline-light btn-sm" id="deadbtn"> Show/Hide
                  </button>
                   <button class="btn btn-outline-light btn-sm" id="deadcbtn"> Clear
                  </button>
               </div>
               <div class="card-body" id="deaddiv">
               </div>
            </div>
         </div>
      </div>
   </body>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
   <script src="assets/js/core.js" type="text/javascript"></script>
   <script src="assets/js/generator.js" type="text/javascript"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>