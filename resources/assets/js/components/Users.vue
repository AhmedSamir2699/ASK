<template>
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 80px;" v-if="$gate.isAdminOrAuthor()">
          <div class="col-md-8">
            <div class="card card-default" style="margin-top: -33px;     margin-left: -51px;">
              <div class="card-body table-responsive p-0">
                <label class="search-input">
                <i class="fa fa-search" style="display: inline-block;margin-top: 10px; margin-right: 5px;"></i>
                <input class="form-control" type="text" @keyup.enter="searchuser"  v-model="search" placeholder="search" >
                <div class="input-group-append">
                <button class="btn btn-navbar" @click="searchuser()">

                </button>
                </div>
            </label>
                  <div class="user-area" v-if="showsearch==true">
                     <h4  style="color: black;margin-top: 10px;font-weight: 100;margin-bottom: 20px;">Your Frindes</h4>
                     <div v-for="cari in caris" v-bind:key="cari.id">
                        <div class="info">
                            <img class="img-circle" :src="getProfilePhoto(cari.photo)"  alt="User Avatar">
                            <span>{{cari.name}}</span>
                             <button class="btn btn-light" type="button">Ask <i class="fas fa-greater-than fa-xs"></i></button>
                             <button class="star" style="float:right; color:yallow;"><i class="fas fa-star"></i></button>

                       </div>
                        <br>
                            <!--
                          <a href="#"  @click="editModal(cari)"><i class="fa fa-edit blue"></i></a>
                          /
                           <a href="#" @click="deleteUser(cari.id)"><i class="fa fa-trash red"></i></a>

                             -->
                  </div>

                  </div>
                <div class="user-area" v-if="showsearch==false">
                      <h4  class="section_title">Your Frindes</h4>
                 <div  v-for="user in users.data" v-bind:key="user.id">

                        <div class="info">
                            <img class="img-circle" :src="getProfilePhoto(user.photo)"  alt="User Avatar">
                            <span >{{user.name}}</span>

                            <button class="btn btn-light" type="button">Ask <i class="fas fa-greater-than fa-xs"></i></button>
                              <button class="star" style="float:right; color:yallow;"><i class="fas fa-star"></i></button>
                       </div>
                        <br>
                            <!--
                          <a href="#"  @click="editModal(cari)"><i class="fa fa-edit blue"></i></a>
                          /
                           <a href="#" @click="deleteUser(cari.id)"><i class="fa fa-trash red"></i></a>

                             -->
                  </div>
                 </div>
              </div>
              <!-- /.card-body -->
            </div>
             <div class="card-footer">
                  <pagination :data="users" @pagination-change-page="getResults"></pagination>
              </div>

            <!-- /.card -->
          </div>
     <div class="col-md-4 " >
        <footer style="margin-top: -27px; margin-left: -15px;">
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
        <div v-if="!$gate.isAdminOrAuthor()">
            <not-found></not-found>
        </div>
         <!-- Modal -->
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Add New</h5>
            <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update User's Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="editmode ? updateUser() : CreateUser()">
            <div class="modal-body">
            <div class="form-group">
            <input v-model="form.name" type="text" name="name"
            placeholder="Name"
                class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
            <has-error :form="form" field="name"></has-error>
            </div>
            <div class="form-group">
            <input v-model="form.email" type="text" name="email"
            placeholder="Email"
                class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
            <has-error :form="form" field="email"></has-error>
            </div>
            <div class="form-group">
            <input v-model="form.password" type="password" name="password"
            placeholder="Password"
                class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
            <has-error :form="form" field="password"></has-error>
            </div>
            <div class="form-group">
            <textarea v-model="form.bio" type="text" name="bio" id="bio"
            placeholder="Short bio for user(optional)"
                class="form-control" :class="{ 'is-invalid': form.errors.has('bio') }"></textarea>
            <has-error :form="form" field="bio"></has-error>
            </div>
            <div class="form-group">
            <select v-model="form.type" type="text" name="type" id="type" class="form-control"
            :class="{ 'is-invalid': form.errors.has('type') }">
            <option value="">select user Role</option>
            <option value="admin">Admin</option>
            <option value="author">Author</option>
            <option value="user">User</option>
            </select>
            <has-error :form="form" field="type"></has-error>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
               <button v-show="!editmode" type="submit" class="btn btn-primary">Create</button>
            </div>
            </form>
            </div>
        </div>
        </div>
</div>
</template>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@7.1.0/dist/promise.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/0.10.0/lodash.min.js"></script>

<style lang="scss" scoped>
.search-input {

     width: 90%;
    cursor: text;
    line-height: 32px;
    padding: 10px 10px 10px 40px;
    position: relative;
    background-color: #fff;
    padding: 0.375rem 0.75rem;
    font-size: 0.9rem;
    font-weight: 400;
    line-height: 0.6;
    color: #495057;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    margin-bottom: 0;
    margin-left: 26px;
    margin-top: 70px;
}
.section_title {
    font-weight: bold;
    font-size: 12px;
    margin: 0 0 15px;
    overflow: hidden;
    color: #4A4A50;
    margin-top: 30px;
    margin-bottom: 24px;
    margin-left: 10px;
}
.input-group
{
    background-color: #FFF;
   border: 1px solid #e6e6f0;
    border-radius: 2px;
}

.tabBar_wrapper {
    padding: 20px 20px 15px;
}
.tabBar {
    margin-bottom: 0;
    background-color: #f2f2f9;
    border: 3px solid #f2f2f9;
        display: table;
    table-layout: fixed;
    box-sizing: border-box;
    width: 100%;
    border-radius: 7px;
    margin-bottom: 20px;
    background-color: transparent;
    border: solid 1px #fff;
    overflow: hidden;
}
.form-control {

    width: 90%;
    height: calc(1.6em + 0.75rem + 2px);
    font-size: 0.9rem;
    background-color: #fff;
    border: 1px solid #fff;
    border-radius: 0.25rem;
    display: inline-flex;

}
.input-group-append
{
    display: none;
}
.user-area
{
    margin-left: 25px;
}
.user-area span
{
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    color: #4A4A50;
    //display: block;
    font-size: 14px;
    font-weight: bold;
    text-align: left;

}
.info
{
   margin-left: 10px;
}
.info .btn-light
{
     color: #C6304A;
     background-color: #fff;
     font-weight: bold;
     cursor: pointer;
     font-size: 14px;
     padding: 7px 0;
     text-align: center;
     float: right;
     border: brown;
     margin-right: 10px;
}
.btn-light:hover {
    color: #DDD;
    background-color: #C6304A;
    text-decoration: none;
    border-radius: 18px;
    font-weight: bold;
    padding: 6px 10px;
    border: none;
    margin-right: 10px;
}
.star
{
    float: right;
    color: yellow;
    background-color: white;
    border: none;
    margin-right: 3px;
    margin-top: 4px;
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
</style>




<script>
    export default {

        data(){
            return{
                editmode: true,
                users : {},
                form:new Form({
                    id : '',
                   name : '',
                   email : '',
                   password : '',
                   type :'',
                   bio : '',
                   photo : '',

                }),
                search:'',
                showsearch:false,
                caris:{}

            }
        },
        methods:
        {
          searchuser()
           {
                 axios.get('api/findUser?q='+this.search)
                 .then(response=>{
                      this.caris=response.data;
                      this.search='';
                      this.showsearch=true;
                 }).catch(err=>{
                     console.log(err);
                 });
           },
            getProfilePhoto(photoo){

                let photo = "/img/profile/"+ photoo ;
                return photo;
            },
            getResults(page = 1) {
                        axios.get('api/user?page=' + page)
                            .then(response => {
                                this.users = response.data;
                            });
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
            loadUsers()
        {
          if(this.$gate.isAdminOrAuthor()){
                    axios.get("api/user").then(({ data }) => (this.users = data));
                }
        },

           CreateUser(){
                 this.$Progress.start();

                this.form.post('api/user')
                .then(()=>{
                    Fire.$emit('AfterCreate');
                    $('#addNew').modal('hide')

                    toast.fire({
                        icon: 'success',
                        title: 'User Created in successfully'
                        })
                    this.$Progress.finish();

                })
                .catch(()=>{

                })

            }
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
        }

    }
</script>


