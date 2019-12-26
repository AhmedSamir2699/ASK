<template>
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 80px;">
            <div class="col-md-8">

         <div  class="card card-default" style="margin-top: -35px;     margin-left: -51px;">
                    <div class="card-body"  v-for="post in posts" :key="post.id">
                      <template class="action" v-if="post.dist_Id==  getuserId()">
                         <router-link :to="`answer/?body=${post.Q_body}&id=${post.ask_user_id}&Q_id=${post.Q_id}`">{{post.Q_body}}</router-link>
                         <router-link :to="`answer/?body=${post.Q_body}&id=${post.ask_user_id}&Q_id=${post.Q_id}`"><button class="btn btn-light" type="button">Answer<i class="fa fa-greater-than"></i></button></router-link>
                        <hr>

                     </template>

                    </div>
                </div>
            </div>

           <div class="col-md-4 " style="margin-top: -30px; margin-left: -76px;">
               <h3 class="section_title">Your Frindes</h3>
               <hr style=" border-top: 1px solid rgba(249, 242, 242, 0.1);">

              <div class="info"  v-for="user in users.data" :key="user.id">
                <router-link :to="`Friend_Profile/?id=${user.id}&name=${user.name}`">
                   <img class="img-circle" :src="getProfilePhoto(user.photo)"  alt="User Avatar">
                   <span>{{user.name}}</span>
                </router-link>
              <hr>
              </div>
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
hr:last-child
{
    margin-bottom: 0;

}

.section_title {
    font-weight: bold;
    font-size: 16px;
    margin: 0 0 15px;
    overflow: hidden;
    color: #fff;
    margin-top:10px
}
.btn-danger
{
    color: #DDD;
    background-color: #C6304A;
    float: right;
}
.fa-greater-than
{
    color: #C6304A;
     font-weight: bold;
     cursor: pointer;
     font-size: 14px;
     padding: 6px 10px;
     text-align: center;
     float: right;
     border: brown;
}
.fa-greater-than:hover
{
     color: #DDD;
    text-decoration: none;
    border-radius: 18px;
    font-weight: bold;
    padding: 6px 10px;
    border: none;
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
.card-body {
    -webkit-box-flex: 1;
    flex: 1 1 auto;
    padding: 1.25rem;
    margin-top: -22px;
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

            }

        },
        methods:
        {
            count(c=1)
            {
                  return c++;
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
            getuserId()
            {
                 return this.form.id;
            },
             updateUser(){
                this.$Progress.start();
                this.form.put('api/user/'+this.form.id)
                .then(() => {
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

                    axios.get("api/user").then(({ data }) => (this.users = data));

        },


             loadposts()
        {
                    axios.get("api/post").then(({ data }) => (this.posts = data));
        },
        },
        created() {
  axios.get("api/profile")
            .then(({ data }) => (this.form.fill(data)));

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

