<template id='app':style="{ backgroundImage: `url('./img/user-cover.jpg')` }">
 <div class="container">
     <header class="profileBox">
<div class="profileBox_header">
    <p> {{getinfo($route.query.id)}}</p>
        <img class="img-circle" :src="getProfilePhoto(getphoto)" alt="User Avatar">
        <div class="profileBox_name">
            <span class="userName_wrap">
                <span class="userName" dir="ltr">@maxsteel_</span>

            </span>
                <div class="userName_status">
                    <span class="userName">{{$route.query.name}}</span>
                </div>
            </div>
</div>
</header>
    <div class="row justify-content-cente">

  <div class="col-md-8">


        <div  class="card card-default askBox">

        <div class="card-body" >
            <a><i class="fa fa-question-circle" >Question</i></a>
            <a><i class="fa fa-camera"> Camera</i></a>
            <a><i class="fa fa-microphone"> Shoutout</i></a>
             <form @submit.prevent="CreateUser()">

            <div class="form-group">
            <input  v-model="form.Q_body" type="text" name="Q_body" id="Q_body"  class="form-control" placeholder="What, when, why… ask">
            </div>
                <input style="display:none;" type="text" name="Q_body" id="Q_body" :value="form.dist_Id=asking($route.query.id)" class="form-control" placeholder="What, when, why… ask">
            <div class="question" style="margin-top:5px;">
                <input  type="hidden" value="user" style=" margin-top:15px; margin-bottom:0px;"><input id="mini_question_anonymous" class="btn-toggle-mini" type="checkbox" value="anonymous" checked="checked" name="question[question_type]">
                <label style=" margin-top:15px; margin-bottom:0px;"><span>Ask anonymously</span></label>
                <button type="submit" class="send-button"><i class="fas fa-paper-plane"></i></button>
            </div>
       </form>
        </div>
                </div>

                <div  class="card card-default master"  v-for="post in posts" :key="post.id">
                    <div class="card-body" >
                        <p>{{post.Q_body}}</p>
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
             <div class="col-md-4 profileStats-master" >
             <section class="profileStats">
     <ul class="share">
      <li>
          <div class="profileStats_icon-answer">
        <div class="circle"><i class="fas fa-comment-dots fa-lg" style="text-align: center;"></i></div>
        <div class="profileStats_number">{{posts.length}}</div>
        <div class="profileStats_label">Posts</div>
        </div>
        </li>
        <li>
            <div class="profileStats_icon-likes">
        <div class="circle" style=" background-color: #ee4c22;"><i class="fa fa-heart fa-lg"></i></div>
        <div class="profileStats_number">150</div>
        <div class="profileStats_label">Likes</div>
        </div>
        </li>
        <li>
             <div class="profileStats_icon-followers">
        <div class="circle" style=" background-color: #784589; margin-right:5px;"><i class="fas fa-user-check fa-lg"></i></div>
        <div class="profileStats_number">10</div>
        <div class="profileStats_label">Followers</div>
        </div>
      </li>
     </ul>
      <h3>
          About me
          <a  class="Edit-links" href="/account/settings/profile"><i class="fas fa-pen"> Edit profile</i></a>
      </h3>
          <div class="profileBio_fields">
          <div><i class="fas fa-user">
           الله نفسك وانت سبحانك غني عن العالمين☝
          <hr>Faculty of Computer and information
          <hr>Single❤</i>
          </div>
          <br>
          <div >
          <i class="fa fa-map-marker-alt">  Giza_Haram_Mariouteya Road</i>
          </div>
          <hr>
            <div>
                <i class="fas fa-link">  some links</i>
            </div>
           <hr>
          <div>
                <i class="fas fa-puzzle-piece"> some interesting</i>
          </div>
           <br>
           <div class="profile-images">
               <img src="/img/profile.png"  alt="User images">
               <img src="/img/profile.png"  alt="User images">
               <img src="/img/profile.png"  alt="User images">
          </div>
 <br>
 <footer>
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
    </section>

           </div>


 </div>


</div>
</template>

<style lang="scss" scoped>
body
{
    color: #ee1144;
}
</style>

<style scoped>
.profileBox
{
    background-position: 50% 0;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    background-attachment: local;
}
.profileBox_header
{
    margin-top: 118px;
    margin-left: 142px;
    text-align: inherit;
}
.profileBox_header img
{
       /* vertical-align: middle; */
    /* border-style: none; */
    width: 90px;
    border: none;
    box-shadow: 0px 0px 0px 5px rgba(255, 255, 255, 0.2);
    width: 80px;
    height: 80px;
    background: transparent no-repeat 0 0;
    background-size: 100%;
    position: relative;
    border-radius: 50%;
}
.profileBox_name
{

    display: inline-block;
    text-align: center;
    max-width: 100%;
    position: relative;
    margin-left: 15px;
    /* margin-top: 0px; */
    font-weight: bold;
    color: #ddd;

}
.askBox
{
    background-color:rgb(25, 25, 29);
     color:#cdcdd9;
      opacity: 0.9;
     position: relative;
    display: -webkit-box;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-clip: border-box;
    border: 0 solid rgba(0, 0, 0, 0.125);
    border-radius: 0.5rem;
    margin-top: 10px;
    margin-right: 299px;
    margin-left: -147px;
}
.master
{

        position: relative;
    display: -webkit-box;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #ffffff;
    background-clip: border-box;
    border: 0 solid rgba(0, 0, 0, 0.125);
    border-radius: 0.5rem;
    margin-top: 10px;
    margin-right: 299px;
    margin-left: -147px;
}
.profileStats-master
{
        width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-left: -60px;
    margin-top: 11px;
}
.profileStats {
    color: #DDD;
    float: right;
    margin-top: 15px;
    font-size: 14px;

}
.profileStats h3
{
    font-size: 16px;
    font-weight: bold;
}
.profileStats ul >li
{
    display: table-cell;
    table-layout: fixed;
    padding: 0 10px 0;
    /*width: 100%;*/
    box-sizing: border-box;
    margin-bottom: 30px;
    list-style-type:none;
}

.profileBio_fields
{
        font-family: ProximaNova, "Helvetica Neue", Helvetica, Arial, sans-serif;
}
.profile-images img
{
     width: 90px;
    height: 90px;
    margin-right: 5px;
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
.circle
{
  height: 40px;
  width: 40px;
  background-color: #00aab8;
  border-radius: 50%;
  display: inline-block;
  text-align: center;
}
.circle > i
{
     position:relative;
    top: calc(50% - 10px);

}
.share
{
   margin-left: -30px;
}
.share li
{
    margin-right: 10px;
}

.profileStats_icon-answer,.profileStats_icon-likes,.profileStats_icon-followers
{
    font-size: 17px;
    text-align: center;
    color: #fff;
    margin-bottom: 30px;
    margin-right: 40px;
}
.profileStats .Edit-links
{
    color: #ee1144;
    float: right;
    font-size:12px;
}
.profileStats .profileStats_number
{
    margin-top: 5px;
    font-weight: bold;
    color: #fff;
    line-height: 23px;
    font-size: 19px;
}
.profileStats .profileStats_label
{
        font-weight: bold;
    font-size: 12px;
    color: rgba(255,255,255,0.5);
}
.row {
    display: -webkit-box;
    display: flex;
    flex-wrap: wrap;
    margin-right: -210px;
    margin-left: 350px;
}

</style>


<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@7.1.0/dist/promise.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>


    export default {
       data(){
            return{
                editmode: true,
                posts : [],
                users : [],
                form:new Form({
                   Q_body:'',
                   ask_user_id:'',
                   dist_Id:''
                }),
                getname:'',
                getphoto:'',

            }

        },

        methods:{
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
             getProfilePhoto(photoo){

                let photo = "/img/profile/"+ photoo ;
                return photo;
            },

             asking(dist)
             {
              return dist;
             },

             CreateUser(){
                 this.$Progress.start();
              this.form.post('http://127.0.0.1:8000/api/post')
                .then(()=>{
                    Fire.$emit('AfterCreate');
                    toast.fire({
                        icon: 'success',
                        title: 'User Created in successfully'
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

             this.loadposts();
           Fire.$on('AfterCreate',() => {
               this.loadposts();
           });
        }

    }
</script>

