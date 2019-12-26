<template>
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 120px;">
            <div class="col-md-8">

         <div  class="card card-default" style="margin-top: -66px;     margin-left: -51px;" >

              <div class="card-header">
                     <p>{{$route.query.body}}</p>
              </div>

                    <div class="card-body">
                      <div class="action">
        <form @submit.prevent="CreateAnswer()">
                <div class="modal-body">

                <div class="form-group">
                <textarea v-model="form.ans_body" type="text" name="ans_body" id="ans_body"
                placeholder="Answer" rows="5"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('ans_body') }">
                    </textarea>
                <has-error :form="form" field="ans_body"></has-error>
                </div>
                 <input style="display:none;" type="text" name="dist_ID" id="dist_ID" :value="form.dist_Id=answering($route.query.id)">
                  <input style="display:none;" type="text" name="Q_id" id="Q_id" :value="form.Q_id=answering($route.query.Q_id)">
                </div>
            <div class="modal-footer">
                  <button type="submit" class="send-button"><i class="fas fa-paper-plane"></i></button>
            </div>
         </form>

                     </div>

                    </div>
                </div>
            </div>

           <div class="col-md-4 " >
               <footer style="margin-top: -66px; margin-left: -15px;">
    <nav class="siteLinks">
    <a target="_blank" rel="noopener" href="https://about.ask.fm?lang=en">About ASKfm</a>
    <a target="_blank" rel="noopener" href="https://about.ask.fm/terms/?lang=en">Terms of use</a>
    <a target="_blank" rel="noopener" href="https://safety.ask.fm?lang=en">Safety center</a>
    <a target="_blank" rel="noopener" href="https://about.ask.fm/privacy-policy/?lang=en">Privacy policy</a>
    <a target="_blank" rel="noopener" href="https://support.ask.fm/">Help</a>
    <a target="_blank" rel="noopener" href="https://about.ask.fm/cookie-policy/?lang=en">Cookies policy</a>
    </nav>


  <nav class="social-links">
  <a class="icon-askfm-inverse" target="_blank" href="https://ask.fm/askfm"></a>
  <a class="icon-facebook" target="_blank" rel="noopener" href="https://www.facebook.com/askfmpage"><li class="fab fa-facebook"></li></a>
  <a class="icon-instagram" target="_blank" rel="noopener" href="https://instagram.com/askfm"><i class="fab fa-instagram"></i></a>
  <a class="icon-twitter" target="_blank" rel="noopener" href="https://twitter.com/askfm"><i class="fab fa-twitter"></i></a>
  <a class="icon-vkontakte" target="_blank" rel="noopener" href="https://vk.com/askfm"><i class="fab fa-vk"></i></a>
  </nav>
  <br>

  <div class="languageBox">
    Language: <a class="language " title="Choose language" data-action="PopupOpen" data-url="/home/languages" href="#">English</a>
  </div>
  <hr>
  <div class="copyright">© Ask.fm 2019</div>
  <section class="askfm-ad-slot askfm-ad-slot-side-2 " data-url="/ads/404?login=maxsteel_" data-count-url="/track/ad_slot?ad_block_slot=404" style="display: none;"></section>
</footer>

           </div>




        </div>

    </div>
</template>

<style lang="scss" scoped>
.card-body hr{
    margin-top: 4rem;
    margin-bottom: 1rem;
    border: 1;
    width: 106%;
    padding: 3px;
    background-color: #f2f2f9;
    margin-left: -16px;
    margin-right: 25px;
}

.btn-danger
{
    color: #DDD;
    background-color: #C6304A;
    float: right;
}
.btn-light
{
    color: #C6304A;
     background-color: #ffffff;
     font-weight: bold;
     cursor: pointer;
     font-size: 14px;
     padding: 7px 0;
     text-align: center;
     float: right;
border: brown;

}
.info .btn-light
{
     color: #C6304A;
     background-color: #2b3237;
     font-weight: bold;
     cursor: pointer;
     font-size: 14px;
     padding: 7px 0;
     text-align: center;
     float: right;
         border: brown;
}
.btn-light:hover {
    color: #DDD;
    background-color: #C6304A;
    text-decoration: none;
    border-radius: 18px;
    font-weight: bold;
    padding: 6px 10px;
    border: none;
}

footer .siteLinks {
    line-height: 20px;
    padding: 0 10px;
    text-align: center;
    overflow: hidden;
    width: 300px;
}
footer .siteLinks a {
    display: block;
    width: 140px;
    float: left;
    line-height: 28px;
    text-align: left;
    color:#85858e;
}
footer .social-links a
{
    margin-right: 35px;
    color: black;
    font-size: 25px;
}
.modal-body {
    position: relative;
    -webkit-box-flex: 1;
    flex: 1 1 auto;
     padding: 0rem;
}
.modal-footer {
    display: -webkit-box;
    display: flex;
    -webkit-box-align: center;
    align-items: center;
    -webkit-box-pack: end;
    justify-content: flex-end;
     padding: 0rem;
     border-top: 0px solid #dee2e6;
    border-bottom-right-radius: 0.3rem;
    border-bottom-left-radius: 0.3rem;
}
.card-header p{
    margin-top: 0;
    margin-bottom: 0;
    color: #4A4A50;
    font-weight: bold;
    font-size: 16px;

}
</style>




<script>

   export default {
        data(){
            return{
                editmode: true,
                users : [],
                posts :[],
                answer:[],
                form:new Form({
                   ans_body:'',
                   ans_user_id:'',
                   dist_Id:'',
                   Q_id:''
                })
            }
        },
        methods:
        {
              answering(dist)
             {
                return dist;
             },
            Qid(dist)
            {
                  return dist;
            },
             updateUser(){
                this.$Progress.start();
                // console.log('Editing data');
                this.form.put('api/user/'+this.form.id)
                .then(() => {
                    // success
                    $('#addNew').modal('hide');
                     swal.fire(
                        'Updated!',
                        'Information has been updated.',
                        'success'
                        )
                        this.$Progress.finish();
                         Fire.$emit('AfterCreate');
                })
                .catch(() => {
                    this.$Progress.fail();
                });

            },
             editModal(user){
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(user);
            },
             newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
             deleteUser(id){
                swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {

                        // Send request to the server
                         if (result.value) {
                                this.form.delete('api/user/'+id).then(()=>{
                                        swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                        )
                                    Fire.$emit('AfterCreate');
                                }).catch(()=> {
                                    swal.fire("Failed!", "There was something wronge.", "warning");
                                });
                         }
                    })
            },

           CreateAnswer(){
                 this.$Progress.start();

                this.form.post('http://127.0.0.1:8000/api/answer')
                .then(()=>{
                    Fire.$emit('AfterCreate');
                    toast.fire({
                        icon: 'success',
                        title: 'Answer Created in successfully'
                        })
                    this.$Progress.finish();

                })
                .catch(()=>{

                })

            },
              loadposts()
        {
              axios.get('http://127.0.0.1:8000/api/post').then(({ data }) => (this.posts = data));
        },
             loadAnswer()
        {
                    axios.get("http://127.0.0.1:8000/api/answer").then(({ data }) => (this.answer = data));
        },
          loadUsers()
        {
          axios.get("http://127.0.0.1:8000/api/user").then(({ data }) => (this.users = data));
        },
        },
        created() {
          this.loadUsers();
           Fire.$on('AfterCreate',() => {
               this.loadUsers();
           });
         this.loadAnswer();
           Fire.$on('AfterCreate',() => {
               this.loadAnswer();
           });
         this.loadposts();
           Fire.$on('AfterCreate',() => {
               this.loadposts();
           });
        }

    }
</script>

