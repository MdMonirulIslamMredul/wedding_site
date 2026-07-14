


 <form action="{{ route('frontend.contact.submit') }}" method="POST">
     <div class="row">
         <div class="col-md-12"> <span style="color:red;" id="error"></span><span style="color:green;"
                 id="success"></span> </div>
     </div>
     <fieldset>
         <div class="row">
             <div class="col-lg-6 mb-15">
                 <input class="from-control" type="text" placeholder="Your Name?" id="clientname" name="name">
             </div>
             <div class="col-lg-6 mb-15">
                 <input class="from-control" type="text" placeholder="What is your qualification?"
                     id="clientqualification" name="qualification">
             </div>
             <div class="col-lg-6 mb-15">
                 <input class="from-control" type="text" placeholder="Your phone is required" id="clientphone"
                     name="phone">
             </div>
             <div class="col-lg-6 mb-25">
                 <input class="from-control" type="text" placeholder="Your Email is required" id="clientemail"
                     name="email">
             </div>
             <div class="col-lg-6 mb-15">
                 <input class="from-control" type="text" placeholder="Course of Interest for Study"
                     id="clientinterest" name="interest">
             </div>
             <div class="col-lg-6 mb-25">
                 <input class="from-control" type="text" placeholder="Country you Prefer for Study" id="clientprefer"
                     name="prefer">
             </div>
             <div class="col-lg-12 mb-25">
                 <textarea placeholder="Message . . . . . " id="clientmessage" class="form-control" name="message" rows="3"
                     cols="20"></textarea>
             </div>
         </div>
         <div class="form-group mb-0">
             <button type="submit" class="submit-btn" value="">Submit</button>
         </div>
     </fieldset>
 </form>
