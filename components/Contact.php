
<form action="Contact-Process.php" method="post">

<div class="row justify-content-center mt-5" data-aos="fade-up"
     data-aos-duration="3000">
  <div class="col-4">
   <input type="text" class="form-control" name="client_FirstName" id="FirstName" pattern=[A-Z\sa-z]{3,20} placeholder="First name" aria-label="First name" required>
 </div>
   <div class="col-4">
   <input type="text" class="form-control" name="client_LastName" id="LastName" pattern=[A-Z\sa-z]{3,20} placeholder="Last name" aria-label="Last name" required>
 </div>
</div>

<div class="row justify-content-center mt-5" data-aos="fade-up"
     data-aos-duration="3000">
  <div class="col-4">
     <input type="text" class="form-control" id="email" name="client_email"  aria-describedby="inputGroupPrepend2" placeholder="Email" aria-label="Email" required>
 </div>
 <div class="col-4">
   <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" aria-label="Subject" required>
 </div>
</div>

<div class="row mt-5 justify-content-center" data-aos="fade-up"
     data-aos-duration="3000">
  <div class="col-8">
 <textarea class="form-control" id="message" name="message" placeholder="Write your message for us here" required></textarea>
 </div>
 </div>


 <div class="row justify-content-center mt-3" data-aos="fade-up"
     data-aos-duration="3000">
   <div class="col-2">
   <div class="form-check">
     <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" style="width: 25px; height: 25px;" required>
     <label class="form-check-label" for="invalidCheck2" style="font-size: 20px;">
       Agree to terms and conditions
     </label>
   </div>
 </div>
 </div>

 <div class="col-12 mt-3" data-aos="fade-up"
     data-aos-duration="3000">
   <button class="btn" type="submit" style="background-color: #70AA62; color: white; width: 100px;">SEND</button>
 </div>
</form>

