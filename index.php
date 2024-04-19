<?php
include './inc/conn.php';
include './inc/form.php';
include './inc/select.php';

mysqli_free_result($result);
mysqli_close($conn);


?>

<?php include_once  './parts/header.php'; ?>




<div class="container">

<div class="position-relative text-center ">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
      <img src="images/OIP.jpg" alt="">

      <h1 class="display-4 fw-normal" >اربح مع سعود </h1>
      <p class="lead fw-normal">باقي على فتح التسجيل</p>
      <br>



     <style>     
     #countdown{
      color : rgb(0, 217, 255);
    padding: 10px;
    border : 1px solid ;
    border-radius: 5px;
     }
    
     #cards{
      display : none;
     }
    


     #loader{
position: fixed;
top: 50%;
left: 50%;
transform:translate(-50%, -50%);

     }

     .loader-con{
      position: fixed;
      top:0;
      left:0;
      width:100%;
      height: 100%;
      
     }

    </style>
    

      
      <h3 id="countdown"> <script>
       var countDownDate = new Date("april 10, 2024 15:37:25").getTime();
       var x = setInterval(function() {
        var counter = document.querySelector("#countdown");
       var now = new Date().getTime();
      var distance = countDownDate - now;
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  counter.innerHTML = days + "يوم " + hours + "ساعه "
  + minutes + "دقيقة " + seconds + "ثانية ";
  if (distance < 0) {
    clearInterval(x);
    counter.innerHTML = "لقد وصلت متاخرا";
  }
}, 1000);

//برمجية اختيار الرابح
const win = document.querySelector("#winner");
var myModal = new bootstrap.Modal(document.getElementById('modal'), {
  keyboard: false
})
win.addEventListener('click',function(){
setTimeout(function(){
  myModal.show();
} , 1000);
});


var ctx = document.getElementById('circularLoader').getContext('2d');
var al = 0;
var start = 4.72;
var cw = ctx.canvas.width;
var ch = ctx.canvas.height; 
var diff;
function progressSim(){
	diff = ((al / 100) * Math.PI*2*10).toFixed(2);
	ctx.clearRect(0, 0, cw, ch);
	ctx.lineWidth = 17;
	ctx.fillStyle = '#4285f4';
	ctx.strokeStyle = "#4285f4";
	ctx.textAlign = "center";
	ctx.font="28px monospace";
	ctx.fillText(al+'%', cw*.52, ch*.5+5, cw+12);
	ctx.beginPath();
	ctx.arc(100, 100, 75, start, diff/10+start, false);
	ctx.stroke();
	if(al >= 100){
		clearTimeout(sim);
	    // Add scripting here that will run when progress completes
	}
	al++;
}
var sim = setInterval(progressSim, 50);


 </script></h3>








      <p class="lead fw-normal">للسحب على ربح نسخة مجانية من برنامج</p>
      <a class="btn btn-outline-secondary" href="#">Coming soon</a>
</div>
</div>
<!---
    <ul class="list-group list-group-flush">
  <li class="list-group-item">تابع البث المباشر على صفحتي </li>
  <li class="list-group-item">ساقوم ببث مباشر لمدة ساعة عن اسئلة و اجوبه</li>
  <li class="list-group-item">خلال فترة الساعه سيتم فتح صفحة التسجيل هنا حيث ستقوم بتسجيل اسمك و ايميلك</li>
  <li class="list-group-item">في نهاية البث سيتم اختيار اسم عشوائي من قاعدة البيانات</li>
  <li class="list-group-item">الرابح سيحصل على نسخة مجانية من برنامج كامتازيا</li>
</ul>
-->




<div class="position-relative text-center ">
    <div class="col-md-5 p-lg-5 mx-auto my-5">


  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
    <h3>الرجاء ادخال معلوماتك</h3>
  <div class="mb-3">
    <label for="firstName" class="form-label">الاسم الاول</label>
    <input type="text" name="firstName" class="form-control" id="firstName" value="" >
    <div  class="form-text error" ><?php  echo $errors['firstNameError']?></div>
  </div>

  <div class="mb-3">
    <label for="lastName" class="form-label"> الاسم الاخير</label>
    <input type="text" name="lastName" class="form-control" id="lastName" value="" >
    <div  class="form-text error" ><?php  echo $errors['lastNameError']?></div>
  </div>


  <div class="mb-3">
    <label for="email" class="form-label">البريد الالكتروني </label>
    <input type="text" name="Email" class="form-control" id="email"value="" >
    <div  class="form-text error" ><?php  echo $errors['emailError']?></div>
  </div>
  
  
  <button type="submit"  name="submit" class="btn btn-primary">ارسال المعلومات</button>
</form>

    </div>
    </div>

  






</div>

<div class ="loader-con">
<div id="loader">
	<canvas id="circularLoader" width="200" height="200"></canvas>
</div>
</div>
<!-- Button trigger modal -->
<div class="d-grid gap-2 col-6 mx-auto my-5">
<button type="button"  id="winner" class="btn btn-primary" >
اختيار الرابح
</button>
</div>
<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="modalLabel">الرابح في المسابقة </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php   foreach($users as $user) : ?>
        <h1 class=" display-3 text-center modal-title" id="modalLabel"><?php echo htmlspecialchars($user['firstName'])  . ''. htmlspecialchars($user['lastName'])  . '<br>'. htmlspecialchars($user['email']);  ?>  </h1>
        <?php endforeach; ?>
      </div>
      
    </div>
  </div>
</div>





<div id="cards" class="row mb-5 pb-5">

 <?php   foreach($users as $user) : ?>

    <div class="col-sm-6">
        <div class="card my-2 bglight">
          
            <div class="card-body">
                <h5 class="card-title" > </h5> 
<h1><?php echo htmlspecialchars($user['firstName'])  . ''. htmlspecialchars($user['lastName'])  . '<br>'. htmlspecialchars($user['email']);  ?> </h1> 
 </div>
        </div>
                </div>


<?php endforeach; ?>
</div>

<?php include_once  './parts/footer.php'; ?>

