<template>
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 80px;">
            <div class="col-md-8">
                 <div  class="card card-default" style="background-color:rgb(25, 25, 29); color:#cdcdd9;margin-top: -38px;     margin-left: -51px;">

                    <div class="card-body" >
                      <a><i class="fa fa-question-circle" >Question</i></a>
                      <a><i class="fa fa-camera"> Camera</i></a>
                      <a><i class="fa fa-microphone"> Shoutout</i></a>
                      <div class="input-group mb-3 mt-2 mb-0">
                        <input type="text" class="form-control" placeholder="Keep Asking" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                        </div>
                        </div>
                       <div class="question" style="margin-top:5px;">
                          <input  type="hidden" value="user" style=" margin-top:15px; margin-bottom:0px;"><input id="mini_question_anonymous" class="btn-toggle-mini" type="checkbox" value="anonymous" checked="checked" name="question[question_type]">
                         <label style=" margin-top:15px; margin-bottom:0px;"><span>Ask anonymously</span></label>
                         <button type="button" class="send-button"><i class="fas fa-paper-plane"></i></button>

                      </div>

                  </div>
                </div>

                <div  class="card card-default"  v-for="post in posts" :key="post.id">
                    <div class="card-body" >
                        <p>{{post.Q_body}}</p>
                        <p> {{getinfo(post.ask_user_id)}}</p>
                         <div class="info">
                            <img class="img-circle" :src="getProfilePhoto(getphoto)"  alt="User Avatar">
                            <span style="color:black;">{{getname}}</span>
                              <div  style=" margin-left: 51px;margin-top: -12px;">
                              <span style="color:#b2b2bb;">15 minitus</span>
                             </div>
                        </div>
<!--
                        {{$myFunc(post.user_id)}}
                        <div v-for="asmk in asmks" :key="asmk.id" v-if="asmk.id=post.user_id">
                                   {{asmk.name}}
                        </div>
-->
                        <div class="action">
                          <a href="#"  @click="editModal(user)"><i class="fa fa-heart fa-lg"></i></a>

                         <a href="#" @click="deleteUser(user.id)"><i class="fa fa-comments fa-lg"></i></a>
                        <div class="input-group mb-3 mt-2 mb-0">
                        <input type="text" class="form-control" placeholder="Keep Asking" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button"><i class="fas fa-paper-plane"></i></button>
                        </div>
                        </div>

                  </div>
                    </div>
                </div>
            </div>

           <div class="col-md-4" style="margin-top: -11px; margin-left: -76px;" >
               <h4 class="section_title">Friends’ 🔥 Leaderboard</h4>
               <hr>
             <div class="info"  v-for="user in users.data" :key="user.id">

                <router-link :to="`Friend_Profile/?id=${user.id}&name=${user.name}`">

                   <img class="img-circle" :src="getProfilePhoto(user.photo)"  alt="User Avatar">
                   <span>{{user.name}}</span>

                </router-link>
              <hr>
              </div>
         <footer >
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
.section_title {
    font-weight: bold;
    font-size: 16px;
    margin: 0 0 15px;
    overflow: hidden;
    color: #fff;
    margin-top:10px
}
</style>



<script>

   export default {

        data(){
            return{
                editmode: true,
                users : [],
                posts :[],
                form:new Form({
                    id : '',
                   name : '',
                   email : '',
                   password : '',
                   type :'',
                   bio : '',
                   photo : '',

                }),
                getname:'',
                getphoto:'',

            }
        },
        methods:
        {
             getinfo(userID)
            {
                let arr=this.users.data;
                let j;
                    for(j=0;j<arr.length;j++)
                    {
                        if(userID==arr[j].id)
                        {
                            this.getname=arr[j].name
                            this.getphoto=arr[j].photo
                        }


                    }
            },
            getResults(page = 1) {
                        axios.get('api/user?page=' + page)
                            .then(response => {
                                this.users = response.data;
                            });
                },
                 getProfilePhoto(photoo){

                let photo = "/img/profile/"+ photoo ;
                return photo;
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
            loadUsers()
        {
          if(this.$gate.isAdminOrAuthor()){
                    axios.get("api/user").then(({ data }) => (this.users = data));
                }
        },


             loadposts()
        {
                    axios.get("api/post").then(({ data }) => (this.posts = data));
        },
        },
        created() {
            Fire.$on('searching',() => {
                let query = this.$parent.search;
                axios.get('api/findUser?q=' + query)
                .then((data) => {
                    this.users = data.data
                })
                .catch(() => {

                })
            })
           this.loadUsers();
           Fire.$on('AfterCreate',() => {
               this.loadUsers();
           });
        //    setInterval(() => this.loadUsers(), 3000);

         this.loadposts();
           Fire.$on('AfterCreate',() => {
               this.loadposts();
           });
        }

    }
</script>

